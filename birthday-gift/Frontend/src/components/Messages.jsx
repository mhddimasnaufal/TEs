import React, { useState, useEffect } from 'react';
import { FiMessageSquare, FiUser, FiCalendar, FiMapPin, FiStar, FiRefreshCw } from 'react-icons/fi';
import { gsap } from 'gsap';

const Messages = ({ fetchWithToken, apiToken }) => {
  const [messages, setMessages] = useState([]);
  const [birthdayData, setBirthdayData] = useState(null);
  const [loading, setLoading] = useState(true);
  const [activeMessage, setActiveMessage] = useState(0);

  useEffect(() => {
    const fetchMessages = async () => {
      setLoading(true);
      if (apiToken) {
        const data = await fetchWithToken('getMessage.php');
        if (data?.data) {
          setMessages(data.data.messages || []);
          setBirthdayData(data.data.birthday_person);
        }
      }
      setLoading(false);
    };

    fetchMessages();

    // Animate messages
    gsap.from('.message-card', {
      duration: 0.8,
      y: 50,
      opacity: 0,
      stagger: 0.2,
      ease: 'power3.out',
    });
  }, [apiToken, fetchWithToken]);

  const handleNextMessage = () => {
    setActiveMessage((prev) => (prev + 1) % messages.length);
  };

  const handlePrevMessage = () => {
    setActiveMessage((prev) => (prev - 1 + messages.length) % messages.length);
  };

  const handleRefresh = async () => {
    setLoading(true);
    if (apiToken) {
      const data = await fetchWithToken('getMessage.php');
      if (data?.data?.messages) {
        setMessages(data.data.messages);
      }
    }
    setLoading(false);
    
    // Add animation
    gsap.fromTo('.message-card',
      { rotationY: -180, opacity: 0 },
      { rotationY: 0, opacity: 1, duration: 0.8, ease: 'back.out(1.7)' }
    );
  };

  const sampleMessages = [
    {
      id: 1,
      name: 'Naila Nazla Pohan',
      age: 19,
      birthplace: 'Medan',
      birthdate: '02 Desember 2006',
      zodiac: 'Sagitarius',
      message: 'Selamat ulang tahun yang ke-19 untuk cinta hidupku. Semoga setiap detik dalam hidupmu dipenuhi kebahagiaan, cinta, dan keberhasilan. Aku selalu bersyukur memiliki kamu di hidupku.',
      date: '2025-12-02',
      from: 'Yang selalu mencintaimu'
    },
    {
      id: 2,
      name: 'Untuk Naila',
      age: 19,
      birthplace: 'Medan',
      birthdate: '02 Desember 2006',
      zodiac: 'Sagitarius',
      message: 'Di hari spesialmu ini, aku berdoa agar semua impianmu menjadi kenyataan. Kamu adalah berkah terbesar dalam hidupku, dan aku tak sabar melihat semua hal menakjubkan yang akan kamu capai.',
      date: '2025-12-02',
      from: 'Seseorang yang selalu ada'
    },
    {
      id: 3,
      name: 'Naila Nazla Pohan',
      age: 19,
      birthplace: 'Medan',
      birthdate: '02 Desember 2006',
      zodiac: 'Sagitarius',
      message: 'Tahun ini adalah awal dari petualangan baru. Nikmati setiap momen, tertawa sebanyak-banyaknya, dan ketahuilah bahwa kamu sangat dicintai. Selamat ulang tahun sayang!',
      date: '2025-12-02',
      from: 'Yang selalu mengagumimu'
    }
  ];

  const displayMessages = messages.length > 0 ? messages : sampleMessages;
  const currentMessage = displayMessages[activeMessage];

  return (
    <div className="min-h-screen pt-24 pb-16 px-4">
      {/* Header */}
      <div className="text-center mb-12">
        <h1 className="text-5xl md:text-6xl font-playfair font-bold mb-4">
          <span className="bg-gradient-to-r from-romantic-pink to-romantic-purple bg-clip-text text-transparent">
            Ucapan Spesial
          </span>
        </h1>
        <p className="text-xl text-gray-400 max-w-2xl mx-auto">
          Kata-kata tulus untuk Naila di hari ulang tahunnya yang ke-19
        </p>
      </div>

      {/* Birthday Info */}
      {birthdayData && (
        <div className="glass-card rounded-3xl p-8 max-w-4xl mx-auto mb-12">
          <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div className="text-center">
              <FiUser className="text-3xl text-romantic-pink mx-auto mb-3" />
              <p className="text-2xl font-bold">{birthdayData.name}</p>
              <p className="text-gray-400">Nama</p>
            </div>
            <div className="text-center">
              <div className="text-3xl text-romantic-gold mx-auto mb-3">🎂</div>
              <p className="text-2xl font-bold">{birthdayData.age} Tahun</p>
              <p className="text-gray-400">Usia</p>
            </div>
            <div className="text-center">
              <FiMapPin className="text-3xl text-romantic-purple mx-auto mb-3" />
              <p className="text-2xl font-bold">{birthdayData.birthplace}</p>
              <p className="text-gray-400">Tempat Lahir</p>
            </div>
            <div className="text-center">
              <FiStar className="text-3xl text-romantic-gold mx-auto mb-3" />
              <p className="text-2xl font-bold">{birthdayData.birthdate}</p>
              <p className="text-gray-400">Tanggal Lahir</p>
            </div>
          </div>
        </div>
      )}

      {/* Main Message Card */}
      <div className="max-w-4xl mx-auto">
        <div className="relative mb-8">
          {/* Refresh Button */}
          <button
            onClick={handleRefresh}
            className="absolute -top-16 right-0 btn-secondary flex items-center space-x-2"
            disabled={loading}
          >
            <FiRefreshCw className={`${loading ? 'animate-spin' : ''}`} />
            <span>{loading ? 'Memuat...' : 'Refresh'}</span>
          </button>

          {/* Message Card */}
          <div className="message-card glass-card rounded-3xl p-8 md:p-12">
            {loading ? (
              <div className="text-center py-12">
                <div className="w-16 h-16 border-4 border-romantic-pink border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
                <p className="text-gray-400">Memuat ucapan spesial...</p>
              </div>
            ) : (
              <>
                {/* Message Header */}
                <div className="flex items-start justify-between mb-8">
                  <div>
                    <div className="flex items-center space-x-3 mb-2">
                      <div className="w-12 h-12 rounded-full bg-gradient-to-r from-romantic-pink to-romantic-purple flex items-center justify-center">
                        <FiMessageSquare className="text-white text-2xl" />
                      </div>
                      <div>
                        <h3 className="text-2xl font-bold">Ucapan #{activeMessage + 1}</h3>
                        <p className="text-gray-400 flex items-center space-x-2">
                          <FiCalendar className="inline" />
                          <span>{currentMessage.date}</span>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div className="text-3xl text-romantic-pink">
                    💌
                  </div>
                </div>

                {/* Message Content */}
                <div className="mb-8">
                  <div className="relative">
                    <div className="absolute -top-3 -left-3 w-6 h-6 bg-romantic-pink rounded-full animate-ping"></div>
                    <div className="absolute -bottom-3 -right-3 w-6 h-6 bg-romantic-gold rounded-full animate-ping animation-delay-1000"></div>
                    
                    <div className="text-xl md:text-2xl leading-relaxed font-poppins italic p-6 rounded-2xl bg-white/5">
                      "{currentMessage.message}"
                    </div>
                  </div>
                </div>

                {/* Message Footer */}
                <div className="border-t border-white/20 pt-6">
                  <div className="flex flex-col md:flex-row md:items-center md:justify-between space-y-6 md:space-y-0">
                    <div>
                      <p className="text-gray-400">Dari:</p>
                      <p className="text-2xl font-bold">{currentMessage.from}</p>
                    </div>
                    
                    <div className="flex items-center space-x-4">
                      <div className="text-center">
                        <p className="text-3xl font-bold text-romantic-gold">{currentMessage.age}</p>
                        <p className="text-gray-400">Tahun</p>
                      </div>
                      <div className="text-center">
                        <p className="text-xl font-bold">{currentMessage.zodiac}</p>
                        <p className="text-gray-400">Zodiak</p>
                      </div>
                      <div className="text-center">
                        <p className="text-xl font-bold">{currentMessage.birthplace}</p>
                        <p className="text-gray-400">Kota</p>
                      </div>
                    </div>
                  </div>
                </div>
              </>
            )}
          </div>
        </div>

        {/* Navigation */}
        <div className="flex justify-between items-center">
          <button
            onClick={handlePrevMessage}
            className="btn-secondary flex items-center space-x-2"
            disabled={loading}
          >
            <span>← Sebelumnya</span>
          </button>
          
          <div className="flex space-x-2">
            {displayMessages.map((_, index) => (
              <button
                key={index}
                onClick={() => setActiveMessage(index)}
                className={`w-3 h-3 rounded-full transition-all ${
                  index === activeMessage
                    ? 'bg-romantic-pink scale-125'
                    : 'bg-white/30 hover:bg-white/50'
                }`}
                aria-label={`Go to message ${index + 1}`}
              />
            ))}
          </div>
          
          <button
            onClick={handleNextMessage}
            className="btn-secondary flex items-center space-x-2"
            disabled={loading}
          >
            <span>Selanjutnya →</span>
          </button>
        </div>

        {/* All Messages Grid */}
        <div className="mt-16">
          <h3 className="text-3xl font-bold mb-6 text-center">Semua Ucapan</h3>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {displayMessages.map((msg, index) => (
              <div
                key={msg.id}
                className={`glass-card rounded-2xl p-6 cursor-pointer transition-all duration-300 hover:scale-105 ${
                  index === activeMessage ? 'ring-2 ring-romantic-pink' : ''
                }`}
                onClick={() => setActiveMessage(index)}
              >
                <div className="flex items-start justify-between mb-4">
                  <div className="w-10 h-10 rounded-full bg-gradient-to-r from-romantic-pink to-romantic-purple flex items-center justify-center">
                    <span className="text-white font-bold">{index + 1}</span>
                  </div>
                  <div className="text-2xl">🎁</div>
                </div>
                <p className="text-gray-300 line-clamp-3 mb-4">{msg.message}</p>
                <div className="text-sm text-gray-400">
                  Dari: <span className="text-romantic-gold">{msg.from}</span>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
    </div>
  );
};

export default Messages;