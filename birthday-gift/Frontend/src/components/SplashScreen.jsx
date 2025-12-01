import React, { useEffect } from 'react';
import { gsap } from 'gsap';

const SplashScreen = () => {
  useEffect(() => {
    // Create floating hearts
    const createHeart = () => {
      const heart = document.createElement('div');
      heart.innerHTML = '❤️';
      heart.className = 'absolute text-4xl opacity-70';
      heart.style.left = `${Math.random() * 100}vw`;
      heart.style.top = '100vh';
      document.querySelector('.splash-screen').appendChild(heart);

      gsap.to(heart, {
        y: '-100vh',
        x: `${Math.random() * 100 - 50}px`,
        rotation: Math.random() * 360,
        duration: Math.random() * 3 + 2,
        ease: 'power1.out',
        onComplete: () => heart.remove(),
      });
    };

    // Create multiple hearts
    const heartInterval = setInterval(createHeart, 300);
    
    // Main animation
    const tl = gsap.timeline();
    tl.from('.splash-title', {
      duration: 1.5,
      scale: 0,
      rotation: 360,
      ease: 'back.out(1.7)',
    })
    .from('.splash-subtitle', {
      duration: 1,
      y: 50,
      opacity: 0,
      ease: 'power3.out',
    }, '-=0.5')
    .to('.splash-heart', {
      duration: 1,
      scale: 1.5,
      repeat: 3,
      yoyo: true,
      ease: 'power2.inOut',
    });

    return () => clearInterval(heartInterval);
  }, []);

  return (
    <div className="splash-screen">
      <div className="splash-content text-center">
        <h1 className="splash-title text-6xl md:text-8xl font-playfair font-bold mb-6 
                      bg-gradient-to-r from-romantic-pink via-romantic-gold to-romantic-purple 
                      bg-clip-text text-transparent">
          Happy Birthday
        </h1>
        
        <div className="splash-heart heart-beat text-7xl mb-6">
          ❤️
        </div>
        
        <h2 className="splash-subtitle text-3xl md:text-4xl font-poppins font-semibold 
                      text-white neon-text">
          Naila Nazla Pohan
        </h2>
        
        <p className="text-xl mt-4 text-white/80 animate-pulse">
          Loading special moments...
        </p>
      </div>
    </div>
  );
};

export default SplashScreen;