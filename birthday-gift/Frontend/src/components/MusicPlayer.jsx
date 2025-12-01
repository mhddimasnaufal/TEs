import React, { useState, useRef, useEffect } from 'react';
import { FiPlay, FiPause, FiVolume2, FiVolumeX, FiMusic } from 'react-icons/fi';
import { gsap } from 'gsap';

const MusicPlayer = () => {
  const [isPlaying, setIsPlaying] = useState(false);
  const [volume, setVolume] = useState(0.7);
  const [isMuted, setIsMuted] = useState(false);
  const audioRef = useRef(null);
  const visualizerRef = useRef(null);

  useEffect(() => {
    // Auto-play on load (with user interaction requirement)
    const handleFirstInteraction = () => {
      if (!isPlaying) {
        togglePlay();
      }
      document.removeEventListener('click', handleFirstInteraction);
    };

    document.addEventListener('click', handleFirstInteraction);

    // Create visualizer bars
    const createVisualizer = () => {
      if (!visualizerRef.current) return;

      visualizerRef.current.innerHTML = '';
      const bars = 20;
      
      for (let i = 0; i < bars; i++) {
        const bar = document.createElement('div');
        bar.className = 'visualizer-bar';
        bar.style.width = '3px';
        bar.style.height = '20px';
        bar.style.margin = '0 2px';
        bar.style.background = `linear-gradient(to top, #ff7eb9, #9d4edd)`;
        bar.style.borderRadius = '2px';
        visualizerRef.current.appendChild(bar);

        // Animate each bar
        gsap.to(bar, {
          height: `${Math.random() * 40 + 10}px`,
          duration: 0.5,
          repeat: -1,
          yoyo: true,
          ease: 'sine.inOut',
          delay: i * 0.05,
        });
      }
    };

    createVisualizer();

    return () => {
      document.removeEventListener('click', handleFirstInteraction);
    };
  }, []);

  const togglePlay = () => {
    if (audioRef.current) {
      if (isPlaying) {
        audioRef.current.pause();
      } else {
        audioRef.current.play().catch(e => console.log('Autoplay prevented:', e));
      }
      setIsPlaying(!isPlaying);
    }
  };

  const toggleMute = () => {
    if (audioRef.current) {
      audioRef.current.muted = !isMuted;
      setIsMuted(!isMuted);
    }
  };

  const handleVolumeChange = (e) => {
    const newVolume = parseFloat(e.target.value);
    setVolume(newVolume);
    if (audioRef.current) {
      audioRef.current.volume = newVolume;
    }
  };

  return (
    <div className="fixed bottom-6 right-6 z-30">
      {/* Hidden Audio Element */}
      <audio
        ref={audioRef}
        loop
        volume={volume}
        onPlay={() => setIsPlaying(true)}
        onPause={() => setIsPlaying(false)}
      >
        <source src="/music.mp3" type="audio/mpeg" />
        <source src="/music.ogg" type="audio/ogg" />
        Your browser does not support the audio element.
      </audio>

      {/* Music Player Card */}
      <div className="glass-card rounded-2xl p-4 backdrop-blur-xl">
        <div className="flex items-center space-x-4">
          {/* Album Art */}
          <div className="relative">
            <div className="w-16 h-16 rounded-xl bg-gradient-to-br from-romantic-pink to-romantic-purple flex items-center justify-center">
              <FiMusic className="text-white text-2xl" />
            </div>
            <div className="absolute -top-1 -right-1 w-4 h-4 bg-romantic-gold rounded-full animate-ping"></div>
          </div>

          {/* Song Info */}
          <div className="flex-1 min-w-0">
            <p className="font-semibold truncate">Romantic Lofi Beats</p>
            <p className="text-sm text-gray-400">For Naila's Birthday</p>
            
            {/* Visualizer */}
            <div ref={visualizerRef} className="flex items-end h-6 mt-2"></div>
          </div>

          {/* Controls */}
          <div className="flex items-center space-x-3">
            {/* Play/Pause */}
            <button
              onClick={togglePlay}
              className="w-12 h-12 rounded-full bg-gradient-to-r from-romantic-pink to-romantic-purple flex items-center justify-center hover:scale-105 transition-transform"
              aria-label={isPlaying ? 'Pause music' : 'Play music'}
            >
              {isPlaying ? (
                <FiPause className="text-white text-xl" />
              ) : (
                <FiPlay className="text-white text-xl ml-1" />
              )}
            </button>

            {/* Volume Control */}
            <div className="hidden md:flex items-center space-x-2">
              <button
                onClick={toggleMute}
                className="p-2 rounded-full hover:bg-white/10 transition-colors"
                aria-label={isMuted ? 'Unmute' : 'Mute'}
              >
                {isMuted ? (
                  <FiVolumeX className="text-xl" />
                ) : (
                  <FiVolume2 className="text-xl" />
                )}
              </button>
              
              <input
                type="range"
                min="0"
                max="1"
                step="0.01"
                value={volume}
                onChange={handleVolumeChange}
                className="w-24 accent-romantic-pink"
                aria-label="Volume slider"
              />
            </div>
          </div>
        </div>

        {/* Mobile Volume Slider */}
        <div className="mt-3 md:hidden">
          <div className="flex items-center space-x-2">
            <FiVolume2 className="text-gray-400" />
            <input
              type="range"
              min="0"
              max="1"
              step="0.01"
              value={volume}
              onChange={handleVolumeChange}
              className="flex-1 accent-romantic-pink"
            />
          </div>
        </div>
      </div>

      {/* Floating Notes Animation */}
      <div className="absolute inset-0 overflow-hidden pointer-events-none">
        {[...Array(3)].map((_, i) => (
          <div
            key={i}
            className="absolute text-2xl opacity-30"
            style={{
              left: `${Math.random() * 100}%`,
              top: `${Math.random() * 100}%`,
              animation: `float ${Math.random() * 3 + 2}s ease-in-out infinite`,
              animationDelay: `${i}s`,
            }}
          >
            {['🎵', '🎶', '🎼'][i % 3]}
          </div>
        ))}
      </div>
    </div>
  );
};

export default MusicPlayer;