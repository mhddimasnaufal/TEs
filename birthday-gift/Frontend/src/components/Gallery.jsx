import React, { useState, useEffect } from 'react';
import { FiX, FiChevronLeft, FiChevronRight, FiDownload, FiHeart } from 'react-icons/fi';
import { gsap } from 'gsap';

const Gallery = ({ fetchWithToken, apiToken }) => {
  const [images, setImages] = useState([]);
  const [selectedImage, setSelectedImage] = useState(null);
  const [loading, setLoading] = useState(true);
  const [favorites, setFavorites] = useState(new Set());

  useEffect(() => {
    // Fetch gallery data
    const fetchGallery = async () => {
      setLoading(true);
      if (apiToken) {
        const data = await fetchWithToken('getGallery.php');
        if (data?.data) {
          setImages(data.data);
        }
      }
      setLoading(false);
    };

    fetchGallery();

    // Animate gallery items
    gsap.from('.gallery-item', {
      duration: 0.8,
      scale: 0.8,
      opacity: 0,
      stagger: 0.1,
      ease: 'back.out(1.7)',
    });
  }, [apiToken, fetchWithToken]);

  const handleImageClick = (image) => {
    setSelectedImage(image);
    document.body.style.overflow = 'hidden';
  };

  const handleCloseLightbox = () => {
    setSelectedImage(null);
    document.body.style.overflow = 'auto';
  };

  const handlePrev = () => {
    const currentIndex = images.findIndex(img => img.id === selectedImage.id);
    const prevIndex = (currentIndex - 1 + images.length) % images.length;
    setSelectedImage(images[prevIndex]);
  };

  const handleNext = () => {
    const currentIndex = images.findIndex(img => img.id === selectedImage.id);
    const nextIndex = (currentIndex + 1) % images.length;
    setSelectedImage(images[nextIndex]);
  };

  const toggleFavorite = (id, e) => {
    e.stopPropagation();
    const newFavorites = new Set(favorites);
    if (newFavorites.has(id)) {
      newFavorites.delete(id);
    } else {
      newFavorites.add(id);
    }
    setFavorites(newFavorites);
  };

  const downloadImage = async (imageUrl, imageName, e) => {
    e.stopPropagation();
    try {
      const response = await fetch(imageUrl);
      const blob = await response.blob();
      const url = window.URL.createObjectURL(blob);
      const link = document.createElement('a');
      link.href = url;
      link.download = `naila-memory-${imageName}.jpg`;
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      window.URL.revokeObjectURL(url);
    } catch (error) {
      console.error('Download error:', error);
    }
  };

  const sampleImages = [
    {
      id: 1,
      title: 'Momen Spesial',
      description: 'Kenangan indah bersama',
      category: 'special',
      color: 'from-romantic-pink to-purple-500',
    },
    {
      id: 2,
      title: 'Kebersamaan',
      description: 'Senyuman yang menyimpan cerita',
      category: 'together',
      color: 'from-purple-500 to-blue-500',
    },
    {
      id: 3,
      title: 'Petualangan',
      description: 'Melangkah bersama menuju impian',
      category: 'adventure',
      color: 'from-blue-500 to-cyan-400',
    },
    {
      id: 4,
      title: 'Canda Tawa',
      description: 'Momen penuh kebahagiaan',
      category: 'happy',
      color: 'from-romantic-gold to-yellow-400',
    },
    {
      id: 5,
      title: 'Romantis',
      description: 'Kasih sayang yang tak ternilai',
      category: 'romantic',
      color: 'from-romantic-pink to-red-400',
    },
    {
      id: 6,
      title: 'Impian',
      description: 'Bersama meraih masa depan',
      category: 'dream',
      color: 'from-indigo-500 to-purple-600',
    },
  ];

  const displayImages = images.length > 0 ? images : sampleImages;

  return (
    <div className="min-h-screen pt-24 pb-16 px-4">
      {/* Header */}
      <div className="text-center mb-12">
        <h1 className="text-5xl md:text-6xl font-playfair font-bold mb-4">
          <span className="bg-gradient-to-r from-romantic-pink to-romantic-purple bg-clip-text text-transparent">
            Galeri Kenangan
          </span>
        </h1>
        <p className="text-xl text-gray-400 max-w-2xl mx-auto">
          Koleksi momen spesial yang membuktikan betapa berharganya setiap detik bersamamu
        </p>
      </div>

      {/* Category Filter */}
      <div className="flex flex-wrap justify-center gap-3 mb-8">
        {['Semua', 'Spesial', 'Bersama', 'Petualangan', 'Bahagia', 'Romantis'].map((category) => (
          <button
            key={category}
            className="px-6 py-2 rounded-full glass-card hover:bg-white/10 transition-colors"
          >
            {category}
          </button>
        ))}
      </div>

      {/* Gallery Grid */}
      {loading ? (
        <div className="flex justify-center items-center h-64">
          <div className="text-center">
            <div className="w-16 h-16 border-4 border-romantic-pink border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
            <p className="text-gray-400">Memuat kenangan indah...</p>
          </div>
        </div>
      ) : (
        <div className="max-w-7xl mx-auto">
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            {displayImages.map((image) => (
              <div
                key={image.id}
                className="gallery-item group relative overflow-hidden rounded-2xl cursor-pointer transform transition-all duration-500 hover:scale-[1.02]"
                onClick={() => handleImageClick(image)}
              >
                {/* Image Container */}
                <div className="relative aspect-square">
                  <div className={`absolute inset-0 bg-gradient-to-br ${image.color || 'from-romantic-pink to-romantic-purple'} opacity-80 group-hover:opacity-100 transition-opacity duration-500`}></div>
                  
                  {/* Image Content */}
                  <div className="relative z-10 h-full p-6 flex flex-col justify-between">
                    <div className="flex justify-between items-start">
                      <div>
                        <h3 className="text-2xl font-bold mb-2">{image.title}</h3>
                        <p className="text-white/80">{image.description}</p>
                      </div>
                      <button
                        onClick={(e) => toggleFavorite(image.id, e)}
                        className="p-2 rounded-full bg-white/20 hover:bg-white/30 transition-colors"
                      >
                        <FiHeart 
                          className={`text-xl ${favorites.has(image.id) ? 'text-romantic-pink fill-romantic-pink' : 'text-white'}`} 
                        />
                      </button>
                    </div>
                    
                    <div className="flex justify-between items-center">
                      <span className="px-3 py-1 rounded-full bg-black/40 text-sm">
                        {image.category || 'Memory'}
                      </span>
                      <button
                        onClick={(e) => downloadImage(`/${image.image || 'placeholder.jpg'}`, image.title, e)}
                        className="p-2 rounded-full bg-white/20 hover:bg-white/30 transition-colors"
                      >
                        <FiDownload className="text-white" />
                      </button>
                    </div>
                  </div>
                </div>

                {/* Hover Overlay */}
                <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
                  <p className="text-white text-lg">Klik untuk melihat detail →</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      )}

      {/* Lightbox */}
      {selectedImage && (
        <div className="lightbox-overlay animate__animated animate__fadeIn">
          <button
            onClick={handleCloseLightbox}
            className="absolute top-6 right-6 z-50 p-3 rounded-full bg-white/10 hover:bg-white/20 transition-colors"
          >
            <FiX className="text-2xl" />
          </button>

          <button
            onClick={handlePrev}
            className="absolute left-6 top-1/2 transform -translate-y-1/2 z-50 p-3 rounded-full bg-white/10 hover:bg-white/20 transition-colors"
          >
            <FiChevronLeft className="text-2xl" />
          </button>

          <button
            onClick={handleNext}
            className="absolute right-6 top-1/2 transform -translate-y-1/2 z-50 p-3 rounded-full bg-white/10 hover:bg-white/20 transition-colors"
          >
            <FiChevronRight className="text-2xl" />
          </button>

          <div className="relative max-w-4xl w-full">
            <div className="lightbox-image">
              <div className={`aspect-video rounded-2xl bg-gradient-to-br ${selectedImage.color || 'from-romantic-pink to-romantic-purple'} flex items-center justify-center`}>
                <div className="text-center p-8">
                  <h3 className="text-4xl font-bold mb-4">{selectedImage.title}</h3>
                  <p className="text-xl mb-6">{selectedImage.description}</p>
                  <p className="text-white/80">Ini adalah momen spesial untuk Naila</p>
                </div>
              </div>
            </div>
            
            <div className="mt-6 flex justify-between items-center">
              <div>
                <h4 className="text-2xl font-bold">{selectedImage.title}</h4>
                <p className="text-gray-300">{selectedImage.description}</p>
              </div>
              <div className="flex space-x-4">
                <button
                  onClick={(e) => toggleFavorite(selectedImage.id, e)}
                  className="p-3 rounded-full bg-white/10 hover:bg-white/20 transition-colors"
                >
                  <FiHeart className={`text-xl ${favorites.has(selectedImage.id) ? 'text-romantic-pink fill-romantic-pink' : 'text-white'}`} />
                </button>
                <button
                  onClick={(e) => downloadImage(`/${selectedImage.image || 'placeholder.jpg'}`, selectedImage.title, e)}
                  className="p-3 rounded-full bg-white/10 hover:bg-white/20 transition-colors"
                >
                  <FiDownload className="text-xl" />
                </button>
              </div>
            </div>
          </div>
        </div>
      )}

      {/* Stats */}
      <div className="mt-16 glass-card rounded-3xl p-8 max-w-4xl mx-auto">
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
          <div>
            <p className="text-5xl font-bold bg-gradient-to-r from-romantic-pink to-romantic-gold bg-clip-text text-transparent">
              {displayImages.length}
            </p>
            <p className="text-gray-400">Kenangan Tersimpan</p>
          </div>
          <div>
            <p className="text-5xl font-bold bg-gradient-to-r from-romantic-purple to-blue-500 bg-clip-text text-transparent">
              {favorites.size}
            </p>
            <p className="text-gray-400">Favorit</p>
          </div>
          <div>
            <p className="text-5xl font-bold bg-gradient-to-r from-romantic-gold to-yellow-400 bg-clip-text text-transparent">
              19
            </p>
            <p className="text-gray-400">Tahun Penuh Cerita</p>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Gallery;