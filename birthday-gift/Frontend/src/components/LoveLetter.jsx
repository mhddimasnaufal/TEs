import React, { useEffect, useRef } from 'react';
import { gsap } from 'gsap';
import { FiHeart, FiFeather, FiClock, FiSend } from 'react-icons/fi';

const LoveLetter = () => {
  const letterRef = useRef(null);
  const text = `Sayangku Naila,

Di hari ulang tahunmu yang ke-19 ini, aku ingin mengungkapkan perasaanku yang terdalam. Setiap momen bersamamu adalah halaman baru dalam buku kehidupan kita yang penuh warna.

Kamu lahir di Medan pada 2 Desember 2006, dan sejak itu dunia menjadi lebih indah. Sekarang di tahun 2025, kamu telah tumbuh menjadi wanita yang cantik, kuat, dan penuh impian.

Aku bersyukur untuk:
• Senyumanmu yang menerangi hari
• Ketulusan hatimu yang murni
• Impianmu yang menginspirasi
• Cintamu yang tanpa syarat

Di usia 19 tahun ini, semoga semua harapan dan mimpimu menjadi kenyataan. Jadilah versi terbaik dari dirimu sendiri, karena kamu sudah sempurna di mataku.

Selalu ingat, tidak peduli seberapa jauh kamu pergi atau seberapa tinggi kamu terbang, aku akan selalu di sini untuk mendukungmu, mencintaimu, dan menjadi tempat pulangmu.

Selamat ulang tahun, sayang. Semoga tahun ini membawa kebahagiaan yang tak terhingga, kesuksesan dalam setiap langkah, dan cinta yang terus tumbuh.

Dengan seluruh cinta di hatiku,
Yang selalu mencintaimu

"Dalam setiap detik usiamu, ada cerita yang membuatku jatuh cinta berulang kali."`;

  useEffect(() => {
    // Create typewriter effect
    const textElement = letterRef.current;
    const letters = text.split('');
    textElement.innerHTML = '';

    const tl = gsap.timeline();
    
    letters.forEach((letter, i) => {
      const span = document.createElement('span');
      span.textContent = letter;
      span.style.opacity = '0';
      textElement.appendChild(span);

      tl.to(span, {
        opacity: 1,
        duration: 0.03,
        delay: i * 0.03,
        ease: 'none',
      }, 0);
    });

    // Animate other elements
    gsap.from('.letter-container', {
      duration: 1,
      scale: 0.8,
      opacity: 0,
      ease: 'back.out(1.7)',
    });

    gsap.from('.decoration-element', {
      duration: 1.5,
      y: 50,
      opacity: 0,
      stagger: 0.2,
      ease: 'power3.out',
    });
  }, []);

  const handlePrint = () => {
    window.print();
  };

  return (
    <div className="min-h-screen pt-24 pb-16 px-4">
      <div className="max-w-4xl mx-auto">
        {/* Header */}
        <div className="text-center mb-12">
          <h1 className="text-5xl md:text-6xl font-playfair font-bold mb-4">
            <span className="bg-gradient-to-r from-romantic-pink to-romantic-purple bg-clip-text text-transparent">
              Surat Cinta
            </span>
          </h1>
          <p className="text-xl text-gray-400">
            Kata-kata dari hati untuk Naila di hari spesialnya
          </p>
        </div>

        {/* Decorative Elements */}
        <div className="flex justify-center mb-8 space-x-6">
          {[1, 2, 3].map((i) => (
            <div
              key={i}
              className="decoration-element w-4 h-4 rounded-full bg-gradient-to-r from-romantic-pink to-romantic-gold"
            />
          ))}
        </div>

        {/* Love Letter Container */}
        <div className="letter-container relative">
          {/* Vintage Paper Effect */}
          <div className="absolute inset-0 bg-yellow-50/5 rounded-3xl blur-sm"></div>
          
          <div className="relative glass-card rounded-3xl p-8 md:p-12">
            {/* Letter Header */}
            <div className="border-b border-white/20 pb-6 mb-8">
              <div className="flex items-center justify-between mb-4">
                <div className="flex items-center space-x-3">
                  <div className="w-12 h-12 rounded-full bg-gradient-to-r from-romantic-pink to-romantic-purple flex items-center justify-center">
                    <FiFeather className="text-white text-2xl" />
                  </div>
                  <div>
                    <h3 className="text-2xl font-bold">Surat untuk Naila</h3>
                    <p className="text-gray-400 flex items-center space-x-2">
                      <FiClock className="inline" />
                      <span>02 Desember 2025</span>
                    </p>
                  </div>
                </div>
                <div className="text-4xl text-romantic-pink animate-pulse">
                  <FiHeart />
                </div>
              </div>
            </div>

            {/* Letter Content */}
            <div className="mb-8">
              <div 
                ref={letterRef}
                className="text-lg md:text-xl leading-relaxed font-poppins whitespace-pre-line min-h-[400px] typing-animation"
              >
                {/* Text will be inserted via JavaScript */}
              </div>
            </div>

            {/* Letter Footer */}
            <div className="border-t border-white/20 pt-6">
              <div className="flex flex-col md:flex-row md:items-center md:justify-between space-y-6 md:space-y-0">
                <div className="flex items-center space-x-4">
                  <div className="w-16 h-16 rounded-full bg-gradient-to-r from-romantic-pink via-romantic-purple to-romantic-gold p-1">
                    <div className="w-full h-full rounded-full bg-dark-bg flex items-center justify-center">
                      <span className="text-2xl">💌</span>
                    </div>
                  </div>
                  <div>
                    <p className="font-bold text-xl">Dengan cinta abadi,</p>
                    <p className="text-gray-400">Untuk Naila Nazla Pohan</p>
                  </div>
                </div>

                <div className="flex space-x-4">
                  <button
                    onClick={handlePrint}
                    className="btn-secondary flex items-center space-x-2"
                  >
                    <FiSend />
                    <span>Simpan Surat</span>
                  </button>
                  <button
                    onClick={() => window.location.href = 'mailto:?subject=Surat Cinta untuk Naila&body=' + encodeURIComponent(text)}
                    className="btn-primary flex items-center space-x-2"
                  >
                    <FiHeart />
                    <span>Bagikan Cinta</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        {/* Floating Hearts */}
        <div className="mt-12 flex justify-center space-x-4">
          {['❤️', '💖', '💕', '💗', '💓'].map((heart, i) => (
            <div
              key={i}
              className="text-3xl animate-float"
              style={{ animationDelay: `${i * 0.2}s` }}
            >
              {heart}
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default LoveLetter;