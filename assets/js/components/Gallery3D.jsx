import React, { useState, useRef, useEffect } from 'react';
import { Canvas, useFrame, useThree } from '@react-three/fiber';
import { OrbitControls, Html, Text, Float } from '@react-three/drei';
import * as THREE from 'three';
import './Gallery3D.css';

// 3D Photo Frame Component
function PhotoFrame({ imageUrl, position = [0, 0, 0], rotation = [0, 0, 0], onClick, isSelected = false }) {
  const meshRef = useRef();
  const [hovered, setHovered] = useState(false);
  
  useFrame((state) => {
    if (meshRef.current) {
      // Gentle floating animation
      meshRef.current.position.y = position[1] + Math.sin(state.clock.elapsedTime * 2) * 0.05;
      
      // Rotation for selected frame
      if (isSelected) {
        meshRef.current.rotation.y += 0.01;
      }
    }
  });

  return (
    <group position={position} rotation={rotation}>
      {/* Frame */}
      <mesh
        ref={meshRef}
        onClick={onClick}
        onPointerOver={() => setHovered(true)}
        onPointerOut={() => setHovered(false)}
        castShadow
      >
        <boxGeometry args={[2.5, 1.8, 0.1]} />
        <meshStandardMaterial
          color={isSelected ? "#ffaa00" : hovered ? "#4a90e2" : "#8b7355"}
          metalness={0.8}
          roughness={0.2}
          emissive={isSelected ? "#ffaa00" : hovered ? "#4a90e2" : "#000000"}
          emissiveIntensity={isSelected ? 0.5 : hovered ? 0.3 : 0}
        />
      </mesh>
      
      {/* Picture */}
      <mesh position={[0, 0, 0.06]}>
        <planeGeometry args={[2.3, 1.6]} />
        <meshBasicMaterial>
          <texture attach="map" image={imageUrl} />
        </meshBasicMaterial>
      </mesh>
      
      {/* Glass reflection */}
      <mesh position={[0, 0, 0.07]}>
        <planeGeometry args={[2.3, 1.6]} />
        <meshPhysicalMaterial
          transmission={0.9}
          thickness={0.1}
          roughness={0}
          clearcoat={1}
          clearcoatRoughness={0}
          transparent
          opacity={0.3}
        />
      </mesh>
      
      {/* Frame ornament */}
      <mesh position={[1.1, 0.75, 0]} scale={[0.2, 0.2, 0.2]}>
        <sphereGeometry />
        <meshStandardMaterial color="#ffd700" metalness={0.9} roughness={0.1} />
      </mesh>
      <mesh position={[-1.1, 0.75, 0]} scale={[0.2, 0.2, 0.2]}>
        <sphereGeometry />
        <meshStandardMaterial color="#ffd700" metalness={0.9} roughness={0.1} />
      </mesh>
      <mesh position={[1.1, -0.75, 0]} scale={[0.2, 0.2, 0.2]}>
        <sphereGeometry />
        <meshStandardMaterial color="#ffd700" metalness={0.9} roughness={0.1} />
      </mesh>
      <mesh position={[-1.1, -0.75, 0]} scale={[0.2, 0.2, 0.2]}>
        <sphereGeometry />
        <meshStandardMaterial color="#ffd700" metalness={0.9} roughness={0.1} />
      </mesh>
      
      {/* Hover effect */}
      {hovered && (
        <Html distanceFactor={10} position={[0, -1.2, 0]}>
          <div className="frame-tooltip">
            <div className="tooltip-arrow">▲</div>
            <div className="tooltip-content">Click to view</div>
          </div>
        </Html>
      )}
    </group>
  );
}

// Floating Photo Component (for circular arrangement)
function FloatingPhoto({ imageUrl, position = [0, 0, 0], onClick, isSelected = false }) {
  const meshRef = useRef();
  const [hovered, setHovered] = useState(false);
  
  useFrame((state) => {
    if (meshRef.current) {
      // Floating animation
      meshRef.current.position.y = position[1] + Math.sin(state.clock.elapsedTime * 1.5 + position[0]) * 0.1;
      
      // Gentle rotation
      meshRef.current.rotation.y = Math.sin(state.clock.elapsedTime * 0.5 + position[0]) * 0.1;
      
      // Scale animation when selected
      if (isSelected) {
        const scale = 1 + Math.sin(state.clock.elapsedTime * 3) * 0.1;
        meshRef.current.scale.setScalar(scale);
      }
    }
  });

  return (
    <Float speed={2} rotationIntensity={0.5} floatIntensity={0.5}>
      <group position={position}>
        <mesh
          ref={meshRef}
          onClick={onClick}
          onPointerOver={() => setHovered(true)}
          onPointerOut={() => setHovered(false)}
          castShadow
        >
          <cylinderGeometry args={[0.8, 0.8, 0.05, 32]} />
          <meshStandardMaterial
            color={isSelected ? "#ffaa00" : hovered ? "#4a90e2" : "#ffffff"}
            metalness={0.7}
            roughness={0.2}
            emissive={isSelected ? "#ffaa00" : "#000000"}
            emissiveIntensity={0.3}
          />
        </mesh>
        
        {/* Photo on cylinder */}
        <mesh position={[0, 0, 0.03]}>
          <circleGeometry args={[0.75, 32]} />
          <meshBasicMaterial side={THREE.DoubleSide}>
            <texture attach="map" image={imageUrl} />
          </meshBasicMaterial>
        </mesh>
        
        {/* Back side */}
        <mesh position={[0, 0, -0.03]} rotation={[Math.PI, 0, 0]}>
          <circleGeometry args={[0.75, 32]} />
          <meshStandardMaterial color="#333333" />
        </mesh>
        
        {/* Edge highlight */}
        <mesh position={[0, 0, 0]}>
          <torusGeometry args={[0.8, 0.02, 16, 100]} />
          <meshStandardMaterial color="#ffd700" metalness={0.9} roughness={0.1} />
        </mesh>
        
        {/* Hover glow */}
        {hovered && (
          <pointLight position={[0, 0, 0.5]} intensity={0.5} color="#4a90e2" />
        )}
      </group>
    </Float>
  );
}

// Gallery Room Component
function GalleryRoom() {
  const floorRef = useRef();
  const wallsRef = useRef();
  
  return (
    <group>
      {/* Floor */}
      <mesh ref={floorRef} position={[0, -3, 0]} rotation={[-Math.PI / 2, 0, 0]} receiveShadow>
        <planeGeometry args={[30, 30]} />
        <meshStandardMaterial color="#2a2a2a" roughness={0.8} />
      </mesh>
      
      {/* Walls */}
      <mesh ref={wallsRef} position={[0, 2, -8]} receiveShadow>
        <boxGeometry args={[30, 10, 0.5]} />
        <meshStandardMaterial color="#3a3a3a" roughness={0.7} />
      </mesh>
      
      {/* Ceiling */}
      <mesh position={[0, 7, 0]} rotation={[Math.PI / 2, 0, 0]} receiveShadow>
        <planeGeometry args={[30, 30]} />
        <meshStandardMaterial color="#1a1a1a" roughness={0.9} />
      </mesh>
      
      {/* Decorative elements */}
      <mesh position={[-10, 0, -7.5]} castShadow>
        <boxGeometry args={[0.5, 6, 0.5]} />
        <meshStandardMaterial color="#8b7355" metalness={0.5} />
      </mesh>
      
      <mesh position={[10, 0, -7.5]} castShadow>
        <boxGeometry args={[0.5, 6, 0.5]} />
        <meshStandardMaterial color="#8b7355" metalness={0.5} />
      </mesh>
      
      {/* Gallery lighting */}
      <spotLight
        position={[0, 6, 5]}
        angle={0.3}
        penumbra={1}
        intensity={0.5}
        castShadow
        shadow-mapSize-width={1024}
        shadow-mapSize-height={1024}
      />
      
      <pointLight position={[-5, 5, 5]} intensity={0.3} color="#ffaa00" />
      <pointLight position={[5, 5, 5]} intensity={0.3} color="#4a90e2" />
      
      {/* Ambient light */}
      <ambientLight intensity={0.2} />
    </group>
  );
}

// Main Gallery Component
function Gallery3D() {
  const [photos, setPhotos] = useState([
    { id: 1, url: 'https://via.placeholder.com/400x300/6a11cb/ffffff?text=Birthday+1', title: 'Birthday Celebration', category: 'party', date: '2023' },
    { id: 2, url: 'https://via.placeholder.com/400x300/2575fc/ffffff?text=Birthday+2', title: 'Family Gathering', category: 'family', date: '2022' },
    { id: 3, url: 'https://via.placeholder.com/400x300/ff0080/ffffff?text=Birthday+3', title: 'Friends Party', category: 'friends', date: '2023' },
    { id: 4, url: 'https://via.placeholder.com/400x300/11998e/ffffff?text=Birthday+4', title: 'Special Moments', category: 'special', date: '2024' },
    { id: 5, url: 'https://via.placeholder.com/400x300/38ef7d/ffffff?text=Birthday+5', title: 'Cake Time!', category: 'party', date: '2023' },
    { id: 6, url: 'https://via.placeholder.com/400x300/f46b45/ffffff?text=Birthday+6', title: 'Memories', category: 'special', date: '2022' },
    { id: 7, url: 'https://via.placeholder.com/400x300/a8ff78/ffffff?text=Birthday+7', title: 'Laughter', category: 'friends', date: '2023' },
    { id: 8, url: 'https://via.placeholder.com/400x300/ff5e62/ffffff?text=Birthday+8', title: 'Joyful Times', category: 'family', date: '2024' },
  ]);
  
  const [selectedPhoto, setSelectedPhoto] = useState(null);
  const [layout, setLayout] = useState('grid'); // 'grid', 'circular', 'wall'
  const [autoRotate, setAutoRotate] = useState(true);
  const [showInfo, setShowInfo] = useState(true);
  const [categoryFilter, setCategoryFilter] = useState('all');
  
  const controlsRef = useRef();
  
  // Filter photos by category
  const filteredPhotos = categoryFilter === 'all' 
    ? photos 
    : photos.filter(photo => photo.category === categoryFilter);
  
  // Calculate positions based on layout
  const getPhotoPositions = () => {
    switch(layout) {
      case 'grid':
        return filteredPhotos.map((photo, index) => {
          const row = Math.floor(index / 4);
          const col = index % 4;
          return [(col - 1.5) * 3, (1 - row) * 2.5, -5];
        });
      case 'circular':
        const radius = 5;
        return filteredPhotos.map((photo, index) => {
          const angle = (index / filteredPhotos.length) * Math.PI * 2;
          return [
            Math.cos(angle) * radius,
            Math.sin(index * 0.5) * 1.5,
            Math.sin(angle) * radius - 3
          ];
        });
      case 'wall':
        return filteredPhotos.map((photo, index) => {
          const row = Math.floor(index / 3);
          const col = index % 3;
          return [(col - 1) * 3, (2 - row) * 2.5, -7.9];
        });
      default:
        return [];
    }
  };
  
  const positions = getPhotoPositions();
  
  const handlePhotoClick = (photo) => {
    setSelectedPhoto(photo);
  };
  
  const handleAddPhoto = () => {
    const newPhoto = {
      id: photos.length + 1,
      url: `https://via.placeholder.com/400x300/${Math.floor(Math.random()*16777215).toString(16)}/ffffff?text=New+${photos.length + 1}`,
      title: `New Memory ${photos.length + 1}`,
      category: ['party', 'family', 'friends', 'special'][Math.floor(Math.random() * 4)],
      date: '2024'
    };
    setPhotos([...photos, newPhoto]);
  };
  
  const handleResetView = () => {
    if (controlsRef.current) {
      controlsRef.current.reset();
    }
  };
  
  return (
    <div className="gallery3d-container">
      <div className="gallery-controls">
        <h2>🖼️ 3D Birthday Gallery</h2>
        
        <div className="controls-group">
          <div className="control-item">
            <label>Layout:</label>
            <div className="layout-buttons">
              <button 
                className={`layout-btn ${layout === 'grid' ? 'active' : ''}`}
                onClick={() => setLayout('grid')}
              >
                ▦ Grid
              </button>
              <button 
                className={`layout-btn ${layout === 'circular' ? 'active' : ''}`}
                onClick={() => setLayout('circular')}
              >
                ⭕ Circular
              </button>
              <button 
                className={`layout-btn ${layout === 'wall' => 'active' : ''}`}
                onClick={() => setLayout('wall')}
              >
                🧱 Wall
              </button>
            </div>
          </div>
          
          <div className="control-item">
            <label>Category:</label>
            <select 
              value={categoryFilter} 
              onChange={(e) => setCategoryFilter(e.target.value)}
              className="category-select"
            >
              <option value="all">All Photos</option>
              <option value="party">Party</option>
              <option value="family">Family</option>
              <option value="friends">Friends</option>
              <option value="special">Special</option>
            </select>
          </div>
          
          <div className="control-item">
            <label>View Options:</label>
            <div className="toggle-buttons">
              <button 
                className={`toggle-btn ${autoRotate ? 'active' : ''}`}
                onClick={() => setAutoRotate(!autoRotate)}
              >
                {autoRotate ? '⏸️ Pause' : '▶️ Auto Rotate'}
              </button>
              <button 
                className={`toggle-btn ${showInfo ? 'active' : ''}`}
                onClick={() => setShowInfo(!showInfo)}
              >
                {showInfo ? '📖 Hide Info' : '📖 Show Info'}
              </button>
            </div>
          </div>
        </div>
        
        <div className="action-buttons">
          <button className="action-btn" onClick={handleAddPhoto}>
            📸 Add Photo
          </button>
          <button className="action-btn" onClick={handleResetView}>
            🔄 Reset View
          </button>
          <button className="action-btn" onClick={() => setSelectedPhoto(null)}>
            ❌ Clear Selection
          </button>
        </div>
        
        {selectedPhoto && (
          <div className="selected-photo-info">
            <h3>📷 Selected Photo</h3>
            <div className="photo-details">
              <div className="photo-preview">
                <img src={selectedPhoto.url} alt={selectedPhoto.title} />
              </div>
              <div className="photo-meta">
                <h4>{selectedPhoto.title}</h4>
                <p><strong>Category:</strong> {selectedPhoto.category}</p>
                <p><strong>Date:</strong> {selectedPhoto.date}</p>
                <p><strong>ID:</strong> {selectedPhoto.id}</p>
              </div>
            </div>
            <div className="photo-actions">
              <button className="photo-action-btn">💖 Like</button>
              <button className="photo-action-btn">💬 Comment</button>
              <button className="photo-action-btn">📤 Share</button>
            </div>
          </div>
        )}
      </div>
      
      <div className="gallery-view">
        <Canvas
          shadows
          camera={{ position: [0, 2, 10], fov: 60 }}
          className="gallery-canvas"
        >
          <GalleryRoom />
          
          {/* Render photos based on layout */}
          {filteredPhotos.map((photo, index) => {
            const position = positions[index] || [0, 0, 0];
            
            if (layout === 'circular') {
              return (
                <FloatingPhoto
                  key={photo.id}
                  imageUrl={photo.url}
                  position={position}
                  onClick={() => handlePhotoClick(photo)}
                  isSelected={selectedPhoto?.id === photo.id}
                />
              );
            } else {
              const rotation = layout === 'wall' ? [0, 0, 0] : [0, Math.PI * 0.1, 0];
              return (
                <PhotoFrame
                  key={photo.id}
                  imageUrl={photo.url}
                  position={position}
                  rotation={rotation}
                  onClick={() => handlePhotoClick(photo)}
                  isSelected={selectedPhoto?.id === photo.id}
                />
              );
            }
          })}
          
          {/* Center light */}
          <pointLight position={[0, 5, 0]} intensity={0.5} color="#ffffff" />
          
          {/* Orbit controls */}
          <OrbitControls
            ref={controlsRef}
            enableZoom={true}
            enablePan={true}
            enableRotate={true}
            zoomSpeed={0.8}
            panSpeed={0.8}
            rotateSpeed={0.8}
            autoRotate={autoRotate}
            autoRotateSpeed={0.5}
            maxPolarAngle={Math.PI / 1.5}
            minDistance={5}
            maxDistance={20}
          />
          
          {/* Help text */}
          <Html position={[0, -2.5, -5]}>
            <div className="gallery-help">
              <p>🖱️ Drag to look around • Scroll to zoom • Click photos to select</p>
            </div>
          </Html>
          
          {/* Photo info labels */}
          {showInfo && filteredPhotos.map((photo, index) => {
            const position = positions[index] || [0, 0, 0];
            const labelPosition = [position[0], position[1] - 1.2, position[2]];
            
            return (
              <Html key={`label-${photo.id}`} position={labelPosition} distanceFactor={10}>
                <div className="photo-label">
                  <div className="label-title">{photo.title}</div>
                  <div className="label-category">{photo.category}</div>
                </div>
              </Html>
            );
          })}
        </Canvas>
      </div>
      
      <div className="gallery-stats">
        <h3>📊 Gallery Statistics</h3>
        <div className="stats-grid">
          <div className="stat-card">
            <div className="stat-icon">🖼️</div>
            <div className="stat-content">
              <div className="stat-value">{photos.length}</div>
              <div className="stat-label">Total Photos</div>
            </div>
          </div>
          
          <div className="stat-card">
            <div className="stat-icon">📁</div>
            <div className="stat-content">
              <div className="stat-value">
                {[...new Set(photos.map(p => p.category))].length}
              </div>
              <div className="stat-label">Categories</div>
            </div>
          </div>
          
          <div className="stat-card">
            <div className="stat-icon">📅</div>
            <div className="stat-content">
              <div className="stat-value">
                {[...new Set(photos.map(p => p.date))].length}
              </div>
              <div className="stat-label">Years</div>
            </div>
          </div>
        </div>
        
        <div className="category-breakdown">
          <h4>📈 Category Breakdown</h4>
          <div className="category-bars">
            {['party', 'family', 'friends', 'special'].map(category => {
              const count = photos.filter(p => p.category === category).length;
              const percentage = (count / photos.length) * 100;
              
              return (
                <div key={category} className="category-bar">
                  <div className="bar-label">{category}</div>
                  <div className="bar-container">
                    <div 
                      className="bar-fill" 
                      style={{ width: `${percentage}%` }}
                    ></div>
                  </div>
                  <div className="bar-value">{count} ({percentage.toFixed(0)}%)</div>
                </div>
              );
            })}
          </div>
        </div>
        
        <div className="upload-section">
          <h4>📤 Upload Your Photos</h4>
          <div className="upload-zone">
            <div className="upload-icon">📸</div>
            <p>Drag & drop photos here or click to browse</p>
            <button className="upload-btn">Choose Files</button>
            <p className="upload-note">Max 10MB per photo • JPG, PNG, GIF</p>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Gallery3D;