import React, { useState, useEffect } from 'react';
import { Routes, Route, Link, useLocation } from 'react-router-dom';
import { gsap } from 'gsap';
import Confetti from 'react-confetti';
import SplashScreen from './components/SplashScreen';
import Header from './components/Header';
import MainPage from './components/MainPage';
import LoveLetter from './components/LoveLetter';
import Gallery from './components/Gallery';
import Messages from './components/Messages';
import MusicPlayer from './components/MusicPlayer';

const API_BASE_URL = 'http://localhost:8000/api';

function App() {
  const [isLoading, setIsLoading] = useState(true);
  const [isDarkMode, setIsDarkMode] = useState(true);
  const [showConfetti, setShowConfetti] = useState(true);
  const [apiToken, setApiToken] = useState(null);
  const [windowSize, setWindowSize] = useState({
    width: window.innerWidth,
    height: window.innerHeight,
  });

  const location = useLocation();

  // Initialize animations
  useEffect(() => {
    const tl = gsap.timeline();
    
    if (isLoading) {
      tl.to('.splash-content', {
        duration: 2,
        scale: 1.2,
        opacity: 0,
        ease: 'power3.inOut',
        onComplete: () => setIsLoading(false)
      });
    } else {
      tl.fromTo('.main-content',
        { opacity: 0, y: 50 },
        { opacity: 1, y: 0, duration: 1, ease: 'power3.out' }
      );
    }

    // Handle window resize
    const handleResize = () => {
      setWindowSize({
        width: window.innerWidth,
        height: window.innerHeight,
      });
    };

    window.addEventListener('resize', handleResize);
    return () => window.removeEventListener('resize', handleResize);
  }, [isLoading]);

  // Generate initial API token
  useEffect(() => {
    const generateToken = async () => {
      try {
        const response = await fetch(`${API_BASE_URL}/getMessage.php`, {
          method: 'GET',
          headers: {
            'Content-Type': 'application/json',
          },
        });
        
        const data = await response.json();
        if (data.token) {
          setApiToken(data.token);
        }
      } catch (error) {
        console.error('Error generating token:', error);
      }
    };

    generateToken();
  }, []);

  // Auto-hide confetti after 10 seconds
  useEffect(() => {
    const timer = setTimeout(() => {
      setShowConfetti(false);
    }, 10000);

    return () => clearTimeout(timer);
  }, []);

  const toggleTheme = () => {
    setIsDarkMode(!isDarkMode);
    if (!isDarkMode) {
      document.documentElement.classList.add('dark');
    } else {
      document.documentElement.classList.remove('dark');
    }
  };

  const fetchWithToken = async (endpoint) => {
    try {
      const response = await fetch(`${API_BASE_URL}/${endpoint}`, {
        headers: {
          'Authorization': `Bearer ${apiToken}`,
          'Content-Type': 'application/json',
        },
      });

      if (!response.ok) {
        throw new Error('Network response was not ok');
      }

      return await response.json();
    } catch (error) {
      console.error('Fetch error:', error);
      return null;
    }
  };

  if (isLoading) {
    return <SplashScreen />;
  }

  return (
    <div className={`min-h-screen transition-colors duration-300 ${
      isDarkMode 
        ? 'dark bg-gradient-dark text-white' 
        : 'bg-gradient-to-br from-soft-pink via-white to-soft-pink text-gray-800'
    }`}>
      {showConfetti && (
        <Confetti
          width={windowSize.width}
          height={windowSize.height}
          recycle={false}
          numberOfPieces={200}
          gravity={0.1}
        />
      )}

      <div className="relative overflow-hidden">
        {/* Animated background particles */}
        {[...Array(20)].map((_, i) => (
          <div
            key={i}
            className="particle"
            style={{
              width: `${Math.random() * 20 + 5}px`,
              height: `${Math.random() * 20 + 5}px`,
              top: `${Math.random() * 100}%`,
              left: `${Math.random() * 100}%`,
              animationDelay: `${Math.random() * 5}s`,
            }}
          />
        ))}

        <Header 
          isDarkMode={isDarkMode} 
          toggleTheme={toggleTheme} 
          location={location}
        />

        <div className="main-content">
          <Routes>
            <Route 
              path="/" 
              element={
                <MainPage 
                  fetchWithToken={fetchWithToken}
                  apiToken={apiToken}
                />
              } 
            />
            <Route path="/love-letter" element={<LoveLetter />} />
            <Route 
              path="/gallery" 
              element={
                <Gallery 
                  fetchWithToken={fetchWithToken}
                  apiToken={apiToken}
                />
              } 
            />
            <Route 
              path="/messages" 
              element={
                <Messages 
                  fetchWithToken={fetchWithToken}
                  apiToken={apiToken}
                />
              } 
            />
          </Routes>
        </div>

        <MusicPlayer />
      </div>
    </div>
  );
}

export default App;