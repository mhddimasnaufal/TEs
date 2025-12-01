import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import { gsap } from 'gsap';
import { 
  FiGift, 
  FiCamera, 
  FiMessageCircle, 
  FiMusic,
  FiCalendar,
  FiMapPin,
  FiStar
} from 'react-icons/fi';

const MainPage = ({ fetchWithToken, apiToken }) => {
  const [birthdayData, setBirthdayData] = useState(null);
  const [particles, setParticles] = useState([]);

  useEffect(() => {
    // Create floating particles
    const newParticles = Array.from({ length: 30 }).map((_, i) => ({
      id: i,
      x: Math.random() * 100,
      y: Math.random() * 100,
      size: Math.random() * 10 + 5,
      duration: Math.random() * 3 + 2,
      delay: Math.random() * 2,
    }));
    setParticles(newParticles);

    // Fetch birthday data
    const fetchData = async () => {
      if (apiToken) {
        const data = await fetchWithToken('getMessage.php');
        if (data?.data?.birthday_person) {
          setBirthdayData(data.data.birthday_person);
        }
      }
    };

    fetchData();

    // Animate elements
    const tl = gsap.timeline();
    tl.from('.hero-title', {
      duration: 1.5,
      y: 100,
      opacity: 0,
      ease: 'power4.out',
      stagger: 0.3,
    })
    .from('.hero-stats', {
      duration: 1,
      scale: 0,
      opacity: 0,
      ease: 'back.out(1.7)',
      stagger: 0.2,
    }, '-=0.5')
    .from('.action-button', {
      duration: 0.8,
      y: 50,
      opacity: 0,
      ease: 'power3.out',
      stagger: 0.15,
    }, '-=0.3');

    // Floating animation for stats cards
    gsap.to('.hero-stats', {
      y: -10,
      duration: 2,
      repeat: -1,
      yoyo: true,
      ease: 'sine.inOut',
    });
  }, [apiToken, fetchWithToken]);

  const actionButtons = [
    {
      path: '/messages',
      icon: <FiMessageCircle />,
      label: 'Lihat Ucapan',
      color: 'from-romantic-pink to-purple-500',
    },
    {
      path: '/gallery',
      icon: <FiCamera />,
      label: 'Galeri Kenangan',
      color: 'from-purple-500 to-blue-500',
    },
    {
      path: '/love-letter',
      icon: <FiGift />,
      label: 'Surat Cinta',
      color: 'from-blue-500 to-cyan-400',
    },
  ];

  return (
    <div className="min-h-screen pt-24 pb-16 px-4">
      {/* Animated particles */}
      {particles.map((particle) => (
        <div
          key={particle.id}
          className="particle absolute rounded-full bg-gradient-to-r from-romantic-pink/30 to-romantic-gold/30"
          style={{
            width: particle.size,
            height: particle.size,
            left: `${particle.x}%`,
            top: `${particle.y}%`,
            animationDelay: `${particle.delay}s`,
            animationDuration: `${particle.duration}s`,
          }}
        />
      ))}

      <div className="max-w-6xl mx-auto">
        {/* Hero Section */}
        <div className="text-center mb-12">
          <div className="inline-block relative mb-6">
            <div className="absolute inset-0 bg-gradient-to-r from-romantic-pink via-romantic-purple to-romantic-gold rounded-full blur-xl opacity-70 animate-pulse"></div>
            <div className="relative glass-card rounded-3xl px-8 py-6">
              <h1 className="hero-title text-5xl md:text-7xl lg:text-8xl font-playfair font-bold mb-4">
                <span className="bg-gradient-to-r from-romantic-pink via-romantic-gold to-romantic-purple bg-clip-text text-transparent">
                  Happy Birthday
                </span>
              </h1>
              <h2 className="hero-title text-3xl md:text-4xl font-poppins font-semibold text-white mb-2">
                Naila Nazla Pohan
              </h2>
              <p className="hero-title text-xl text-gray-300">
                Celebrating 19 Wonderful Years
              </p>
            </div>
          </div>

          {/* Birthday Stats */}
          <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div className="hero-stats glass-card rounded-2xl p-6 transform hover:scale-105 transition-transform duration-300">
              <div className="flex items-center justify-center space-x-3 mb-4">
                <FiCalendar className="text-3xl text-romantic-pink" />
                <h3 className="text-2xl font-bold">Usia</h3>
              </div>
              <p className="text-5xl font-bold bg-gradient-to-r from-romantic-pink to-romantic-gold bg-clip-text text-transparent">
                19
              </p>
              <p className="text-gray-400 mt-2">Tahun Kehidupan</p>
            </div>

            <div className="hero-stats glass-card rounded-2xl p-6 transform hover:scale-105 transition-transform duration-300">
              <div className="flex items-center justify-center space-x-3 mb-4">
                <FiMapPin className="text-3xl text-romantic-purple" />
                <h3 className="text-2xl font-bold">Tempat Lahir</h3>
              </div>
              <p className="text-3xl font-bold text-white">Medan</p>
              <p className="text-gray-400 mt-2">Kota Asal</p>
            </div>

            <div className="hero-stats glass-card rounded-2xl p-6 transform hover:scale-105 transition-transform duration-300">
              <div className="flex items-center justify-center space-x-3 mb-4">
                <FiStar className="text-3xl text-romantic-gold" />
                <h3 className="text-2xl font-bold">Zodiak</h3>
              </div>
              <p className="text-3xl font-bold text-white">Sagitarius</p>
              <p className="text-gray-400 mt-2">02 Desember 2006</p>
            </div>
          </div>

          {/* Action Buttons */}
          <div className="flex flex-wrap justify-center gap-6 mb-12">
            {actionButtons.map((button, index) => (
              <Link
                key={index}
                to={button.path}
                className={`action-button group relative overflow-hidden rounded-2xl p-1 bg-gradient-to-r ${button.color} transition-all duration-300 hover:scale-105 hover:shadow-2xl`}
              >
                <div className="glass-card rounded-xl px-8 py-6">
                  <div className="flex flex-col items-center space-y-4">
                    <div className="text-4xl transform group-hover:scale-110 transition-transform duration-300">
                      {button.icon}
                    </div>
                    <span className="text-xl font-semibold">{button.label}</span>
                  </div>
                </div>
              </Link>
            ))}
          </div>

          {/* Special Message */}
          <div className="glass-card rounded-3xl p-8 max-w-3xl mx-auto mb-12">
            <div className="relative">
              <div className="absolute -top-3 -left-3 w-6 h-6 bg-romantic-pink rounded-full animate-ping"></div>
              <div className="absolute -bottom-3 -right-3 w-6 h-6 bg-romantic-gold rounded-full animate-ping animation-delay-1000"></div>
              
              <p className="text-xl md:text-2xl leading-relaxed text-center font-poppins italic">
                "Untuk Naila, di hari spesialmu yang ke-19, semoga setiap harimu dipenuhi 
                dengan cinta, tawa, dan impian yang menjadi kenyataan. Kamu adalah cahaya 
                yang menerangi dunia sekitarmu."
              </p>
              
              <div className="flex items-center justify-center mt-8 space-x-4">
                <div className="w-12 h-12 rounded-full bg-gradient-to-r from-romantic-pink to-romantic-purple flex items-center justify-center">
                  <FiHeart className="text-white text-xl" />
                </div>
                <div>
                  <p className="font-semibold">Dengan cinta,</p>
                  <p className="text-gray-400">Yang selalu mencintaimu</p>
                </div>
              </div>
            </div>
          </div>

          {/* Countdown Timer (optional) */}
          <div className="glass-card rounded-2xl p-6 inline-block">
            <div className="flex items-center space-x-4">
              <FiMusic className="text-2xl text-romantic-pink animate-pulse" />
              <div>
                <p className="font-semibold">Musik Romantis</p>
                <p className="text-sm text-gray-400">Lofi beats untuk suasana hati</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default MainPage;