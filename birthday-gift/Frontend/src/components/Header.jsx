import React, { useState } from 'react';
import { Link, useLocation } from 'react-router-dom';
import { FiSun, FiMoon, FiHeart, FiHome, FiImage, FiMessageSquare } from 'react-icons/fi';
import { FaBirthdayCake } from 'react-icons/fa';

const Header = ({ isDarkMode, toggleTheme, location }) => {
  const [isMenuOpen, setIsMenuOpen] = useState(false);

  const navItems = [
    { path: '/', label: 'Beranda', icon: <FiHome /> },
    { path: '/messages', label: 'Ucapan', icon: <FiMessageSquare /> },
    { path: '/gallery', label: 'Galeri', icon: <FiImage /> },
    { path: '/love-letter', label: 'Surat Cinta', icon: <FiHeart /> },
  ];

  return (
    <header className="fixed top-0 left-0 right-0 z-40 py-4 px-6">
      <div className="max-w-7xl mx-auto">
        <div className="flex items-center justify-between glass-card rounded-2xl px-6 py-3">
          {/* Logo */}
          <Link to="/" className="flex items-center space-x-3">
            <div className="relative">
              <FaBirthdayCake className="text-3xl text-romantic-pink bloom-effect" />
              <div className="absolute -top-1 -right-1 w-2 h-2 bg-romantic-gold rounded-full animate-ping"></div>
            </div>
            <div>
              <h1 className="text-xl font-playfair font-bold bg-gradient-to-r from-romantic-pink to-romantic-purple bg-clip-text text-transparent">
                Naila's 19th
              </h1>
              <p className="text-xs text-gray-400">02 Desember 2006</p>
            </div>
          </Link>

          {/* Desktop Navigation */}
          <nav className="hidden md:flex items-center space-x-6">
            {navItems.map((item) => (
              <Link
                key={item.path}
                to={item.path}
                className={`flex items-center space-x-2 px-4 py-2 rounded-full transition-all duration-300 ${
                  location.pathname === item.path
                    ? 'bg-gradient-to-r from-romantic-pink/20 to-romantic-purple/20 border border-romantic-pink/30'
                    : 'hover:bg-white/10 dark:hover:bg-black/10'
                }`}
              >
                <span className="text-lg">{item.icon}</span>
                <span className="font-medium">{item.label}</span>
              </Link>
            ))}

            {/* Theme Toggle */}
            <button
              onClick={toggleTheme}
              className="p-3 rounded-full bg-white/10 dark:bg-black/20 hover:bg-white/20 dark:hover:bg-black/30 transition-colors"
              aria-label="Toggle theme"
            >
              {isDarkMode ? (
                <FiSun className="text-xl text-romantic-gold" />
              ) : (
                <FiMoon className="text-xl text-romantic-purple" />
              )}
            </button>
          </nav>

          {/* Mobile Menu Button */}
          <button
            onClick={() => setIsMenuOpen(!isMenuOpen)}
            className="md:hidden p-2 rounded-lg bg-white/10 dark:bg-black/20"
            aria-label="Toggle menu"
          >
            <div className="w-6 h-6 relative">
              <span className={`absolute block h-0.5 w-full bg-current rounded transform transition-all duration-300 ${
                isMenuOpen ? 'rotate-45 top-3' : 'top-1'
              }`}></span>
              <span className={`absolute block h-0.5 w-full bg-current rounded transition-all duration-300 ${
                isMenuOpen ? 'opacity-0' : 'opacity-100 top-3'
              }`}></span>
              <span className={`absolute block h-0.5 w-full bg-current rounded transform transition-all duration-300 ${
                isMenuOpen ? '-rotate-45 top-3' : 'top-5'
              }`}></span>
            </div>
          </button>
        </div>

        {/* Mobile Navigation */}
        {isMenuOpen && (
          <div className="md:hidden mt-4 glass-card rounded-2xl p-4 animate__animated animate__fadeIn">
            <div className="flex flex-col space-y-3">
              {navItems.map((item) => (
                <Link
                  key={item.path}
                  to={item.path}
                  onClick={() => setIsMenuOpen(false)}
                  className={`flex items-center space-x-3 px-4 py-3 rounded-xl transition-all ${
                    location.pathname === item.path
                      ? 'bg-gradient-to-r from-romantic-pink to-romantic-purple text-white'
                      : 'hover:bg-white/10 dark:hover:bg-black/10'
                  }`}
                >
                  <span className="text-xl">{item.icon}</span>
                  <span className="font-medium">{item.label}</span>
                </Link>
              ))}
              <button
                onClick={toggleTheme}
                className="flex items-center justify-center space-x-3 px-4 py-3 rounded-xl bg-white/10 dark:bg-black/20 hover:bg-white/20 dark:hover:bg-black/30"
              >
                {isDarkMode ? (
                  <>
                    <FiSun className="text-xl" />
                    <span>Light Mode</span>
                  </>
                ) : (
                  <>
                    <FiMoon className="text-xl" />
                    <span>Dark Mode</span>
                  </>
                )}
              </button>
            </div>
          </div>
        )}
      </div>
    </header>
  );
};

export default Header;