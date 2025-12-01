import React, { useState, useEffect, useRef } from 'react';
import { Canvas, useFrame, useThree } from '@react-three/fiber';
import { OrbitControls, Stars, Html, Text } from '@react-three/drei';
import * as THREE from 'three';
import './App.css';

// Galaxy Component
function Galaxy({ count = 150 }) {
  const meshRef = useRef();
  const positions = useRef(new Float32Array(count * 3));
  const colors = useRef(new Float32Array(count * 3));
  const sizes = useRef(new Float32Array(count));

  useEffect(() => {
    const radius = 5;
    
    for (let i = 0; i < count; i++) {
      // Spiral galaxy distribution
      const r = Math.random() * radius;
      const theta = Math.random() * Math.PI * 2;
      const phi = Math.acos(2 * Math.random() - 1);
      
      const x = r * Math.sin(phi) * Math.cos(theta);
      const y = (Math.random() - 0.5) * 2;
      const z = r * Math.sin(phi) * Math.sin(theta);
      
      positions.current[i * 3] = x;
      positions.current[i * 3 + 1] = y;
      positions.current[i * 3 + 2] = z;
      
      // Color based on position
      colors.current[i * 3] = 0.5 + 0.5 * Math.sin(x);
      colors.current[i * 3 + 1] = 0.3 + 0.7 * Math.sin(y * 2);
      colors.current[i * 3 + 2] = 0.8 + 0.2 * Math.sin(z * 3);
      
      // Size variation
      sizes.current[i] = 0.1 + Math.random() * 0.3;
    }
  }, [count]);

  useFrame((state) => {
    if (meshRef.current) {
      meshRef.current.rotation.y += 0.001;
    }
  });

  return (
    <points ref={meshRef}>
      <bufferGeometry>
        <bufferAttribute
          attach="attributes-position"
          count={positions.current.length / 3}
          array={positions.current}
          itemSize={3}
        />
        <bufferAttribute
          attach="attributes-color"
          count={colors.current.length / 3}
          array={colors.current}
          itemSize={3}
        />
        <bufferAttribute
          attach="attributes-size"
          count={sizes.current.length}
          array={sizes.current}
          itemSize={1}
        />
      </bufferGeometry>
      <pointsMaterial
        size={0.1}
        vertexColors
        transparent
        opacity={0.8}
        sizeAttenuation
        blending={THREE.AdditiveBlending}
      />
    </points>
  );
}

// Birthday Star Component
function BirthdayStar({ position = [0, 0, 0], onClick }) {
  const meshRef = useRef();
  const [hovered, setHovered] = useState(false);
  
  useFrame((state) => {
    if (meshRef.current) {
      meshRef.current.rotation.x += 0.01;
      meshRef.current.rotation.y += 0.01;
      
      // Pulsing animation
      const scale = 1 + Math.sin(state.clock.elapsedTime * 2) * 0.2;
      meshRef.current.scale.setScalar(scale);
    }
  });

  return (
    <mesh
      ref={meshRef}
      position={position}
      onClick={onClick}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => setHovered(false)}
    >
      <icosahedronGeometry args={[0.3, 0]} />
      <meshStandardMaterial
        color={hovered ? "#ffd700" : "#ffaa00"}
        emissive="#ffaa00"
        emissiveIntensity={0.5}
        roughness={0.1}
        metalness={0.8}
      />
      {hovered && (
        <Html distanceFactor={10}>
          <div className="star-label">
            <div className="star-icon">✨</div>
            <div className="star-text">Click for birthday wish!</div>
          </div>
        </Html>
      )}
    </mesh>
  );
}

// Constellation Lines Component
function Constellation({ points = [] }) {
  const lineRef = useRef();
  
  useEffect(() => {
    if (lineRef.current && points.length > 1) {
      const lineGeometry = new THREE.BufferGeometry().setFromPoints(points);
      lineRef.current.geometry = lineGeometry;
    }
  }, [points]);

  return (
    <line ref={lineRef}>
      <lineBasicMaterial color="#4a90e2" linewidth={2} />
    </line>
  );
}

// Main Galaxy Scene Component
function GalaxyScene() {
  const [stars, setStars] = useState(150);
  const [rotationSpeed, setRotationSpeed] = useState(0.5);
  const [autoRotate, setAutoRotate] = useState(true);
  const [constellations, setConstellations] = useState([]);
  const [showConstellations, setShowConstellations] = useState(true);
  
  const controlsRef = useRef();
  
  // Birthday wishes data
  const birthdayWishes = [
    { id: 1, text: "Happy Birthday Naila! 🎂", position: [2, 1, 0] },
    { id: 2, text: "Wishing you endless joy! ✨", position: [-2, -1, 1] },
    { id: 3, text: "May all your dreams come true! 🌟", position: [1, -2, -1] },
    { id: 4, text: "Another year of amazing memories! 💖", position: [-1, 2, 0.5] },
  ];
  
  // Create constellation patterns
  useEffect(() => {
    const newConstellations = [];
    const constellationPoints = [];
    
    // Create a heart-shaped constellation
    for (let i = 0; i < 20; i++) {
      const t = (i / 20) * Math.PI * 2;
      const x = 3 * Math.pow(Math.sin(t), 3);
      const y = 3 * Math.cos(t) - 1.5 * Math.cos(2 * t) - 0.6 * Math.cos(3 * t) - 0.2 * Math.cos(4 * t);
      const z = Math.sin(t) * 1.5;
      constellationPoints.push(new THREE.Vector3(x, y, z));
    }
    newConstellations.push(constellationPoints);
    
    setConstellations(newConstellations);
  }, []);
  
  const handleAddStar = () => {
    setStars(prev => prev + 50);
  };
  
  const handleStarClick = (wish) => {
    alert(`Birthday Wish: ${wish.text}`);
  };
  
  const handleResetView = () => {
    if (controlsRef.current) {
      controlsRef.current.reset();
    }
  };
  
  return (
    <div className="galaxy-app">
      <div className="galaxy-controls-panel">
        <h2>🌌 Interactive Galaxy</h2>
        
        <div className="control-group">
          <label>Star Count: {stars}</label>
          <input
            type="range"
            min="50"
            max="500"
            value={stars}
            onChange={(e) => setStars(parseInt(e.target.value))}
          />
        </div>
        
        <div className="control-group">
          <label>Rotation Speed: {rotationSpeed.toFixed(1)}</label>
          <input
            type="range"
            min="0"
            max="2"
            step="0.1"
            value={rotationSpeed}
            onChange={(e) => setRotationSpeed(parseFloat(e.target.value))}
          />
        </div>
        
        <div className="button-group">
          <button 
            className={`control-btn ${autoRotate ? 'active' : ''}`}
            onClick={() => setAutoRotate(!autoRotate)}
          >
            {autoRotate ? '⏸️ Pause' : '▶️ Auto Rotate'}
          </button>
          
          <button className="control-btn" onClick={handleAddStar}>
            ⭐ Add Stars
          </button>
          
          <button className="control-btn" onClick={handleResetView}>
            🔄 Reset View
          </button>
          
          <button 
            className={`control-btn ${showConstellations ? 'active' : ''}`}
            onClick={() => setShowConstellations(!showConstellations)}
          >
            {showConstellations ? '🌠 Hide Constellations' : '🌠 Show Constellations'}
          </button>
        </div>
        
        <div className="wishes-panel">
          <h3>✨ Birthday Wishes</h3>
          <div className="wishes-list">
            {birthdayWishes.map(wish => (
              <div key={wish.id} className="wish-item">
                <span className="wish-star">★</span>
                <span className="wish-text">{wish.text}</span>
              </div>
            ))}
          </div>
        </div>
      </div>
      
      <div className="galaxy-canvas">
        <Canvas
          camera={{ position: [0, 0, 10], fov: 60 }}
          style={{ background: '#0a0a2a' }}
        >
          <color attach="background" args={['#0a0a2a']} />
          
          {/* Ambient and directional light */}
          <ambientLight intensity={0.2} />
          <pointLight position={[10, 10, 10]} intensity={0.5} color="#4a90e2" />
          <pointLight position={[-10, -10, -10]} intensity={0.3} color="#ff4da6" />
          
          {/* Galaxy stars */}
          <Galaxy count={stars} />
          
          {/* Additional background stars */}
          <Stars
            radius={100}
            depth={50}
            count={5000}
            factor={4}
            saturation={0}
            fade
            speed={1}
          />
          
          {/* Birthday stars with wishes */}
          {birthdayWishes.map(wish => (
            <BirthdayStar
              key={wish.id}
              position={wish.position}
              onClick={() => handleStarClick(wish)}
            />
          ))}
          
          {/* Constellations */}
          {showConstellations && constellations.map((points, index) => (
            <Constellation key={index} points={points} />
          ))}
          
          {/* Center of galaxy - bright star */}
          <mesh position={[0, 0, 0]}>
            <sphereGeometry args={[0.5, 32, 32]} />
            <meshBasicMaterial color="#ffffff" />
            <pointLight intensity={2} color="#ffffff" />
          </mesh>
          
          {/* Orbit controls */}
          <OrbitControls
            ref={controlsRef}
            enableZoom={true}
            enablePan={true}
            enableRotate={true}
            zoomSpeed={0.6}
            panSpeed={0.5}
            rotateSpeed={rotationSpeed}
            autoRotate={autoRotate}
            autoRotateSpeed={rotationSpeed}
            maxDistance={20}
            minDistance={3}
          />
          
          {/* Help text */}
          <Html position={[0, -4, 0]}>
            <div className="help-text">
              <p>🖱️ Drag to rotate • Scroll to zoom • Click stars for wishes</p>
            </div>
          </Html>
        </Canvas>
      </div>
      
      <div className="galaxy-info-panel">
        <h3>🌟 About This Galaxy</h3>
        <div className="info-cards">
          <div className="info-card">
            <div className="info-icon">✨</div>
            <div className="info-content">
              <h4>Interactive Stars</h4>
              <p>Each star represents a birthday wish. Click to read them!</p>
            </div>
          </div>
          
          <div className="info-card">
            <div className="info-icon">🌌</div>
            <div className="info-content">
              <h4>Real-time Controls</h4>
              <p>Adjust star count, rotation speed, and view settings.</p>
            </div>
          </div>
          
          <div className="info-card">
            <div className="info-icon">💫</div>
            <div className="info-content">
              <h4>Constellations</h4>
              <p>Special patterns that form meaningful shapes.</p>
            </div>
          </div>
        </div>
        
        <div className="stats-panel">
          <h4>📊 Galaxy Stats</h4>
          <div className="stats-grid">
            <div className="stat">
              <div className="stat-value">{stars}</div>
              <div className="stat-label">Total Stars</div>
            </div>
            <div className="stat">
              <div className="stat-value">{constellations.length}</div>
              <div className="stat-label">Constellations</div>
            </div>
            <div className="stat">
              <div className="stat-value">{birthdayWishes.length}</div>
              <div className="stat-label">Birthday Wishes</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

// Main App Component
function App() {
  const [activeTab, setActiveTab] = useState('galaxy');
  
  return (
    <div className="app-container">
      <header className="app-header">
        <h1>🎂 Naila's Birthday Galaxy</h1>
        <p>An interactive 3D galaxy filled with birthday wishes</p>
      </header>
      
      <nav className="app-nav">
        <button 
          className={`nav-btn ${activeTab === 'galaxy' ? 'active' : ''}`}
          onClick={() => setActiveTab('galaxy')}
        >
          🌌 Galaxy
        </button>
        <button 
          className={`nav-btn ${activeTab === 'wishes' ? 'active' : ''}`}
          onClick={() => setActiveTab('wishes')}
        >
          ✨ Wishes
        </button>
        <button 
          className={`nav-btn ${activeTab === 'about' ? 'active' : ''}`}
          onClick={() => setActiveTab('about')}
        >
          💝 About
        </button>
      </nav>
      
      <main className="app-main">
        {activeTab === 'galaxy' && <GalaxyScene />}
        
        {activeTab === 'wishes' && (
          <div className="wishes-page">
            <h2>✨ Birthday Wishes Collection</h2>
            <div className="wishes-grid">
              {[
                { id: 1, from: "Family", message: "Happy Birthday to our amazing Naila! We love you so much!", date: "Today" },
                { id: 2, from: "Friends", message: "Wishing you the happiest birthday ever! Let's celebrate!", date: "Today" },
                { id: 3, from: "Best Friend", message: "To many more years of friendship and laughter!", date: "Yesterday" },
                { id: 4, from: "Colleagues", message: "Happy Birthday! You light up every room you enter.", date: "2 days ago" },
              ].map(wish => (
                <div key={wish.id} className="wish-card">
                  <div className="wish-header">
                    <div className="wish-from">{wish.from}</div>
                    <div className="wish-date">{wish.date}</div>
                  </div>
                  <div className="wish-message">{wish.message}</div>
                  <div className="wish-footer">
                    <button className="wish-like-btn">💖 Like</button>
                    <button className="wish-reply-btn">💌 Reply</button>
                  </div>
                </div>
              ))}
            </div>
            
            <div className="add-wish-form">
              <h3>Add Your Wish</h3>
              <textarea placeholder="Write your birthday wish for Naila..." rows={4} />
              <input type="text" placeholder="Your name (optional)" />
              <button className="submit-wish-btn">Send Wish ✨</button>
            </div>
          </div>
        )}
        
        {activeTab === 'about' && (
          <div className="about-page">
            <h2>💝 About This Project</h2>
            <div className="about-content">
              <div className="about-card">
                <h3>🎯 Purpose</h3>
                <p>This interactive 3D galaxy was created to celebrate Naila's birthday in a unique and memorable way. Each star represents a wish, memory, or special moment.</p>
              </div>
              
              <div className="about-card">
                <h3>🌟 Technology</h3>
                <p>Built with React Three Fiber (Three.js) for the 3D graphics, React for the interface, and modern web technologies for an immersive experience.</p>
              </div>
              
              <div className="about-card">
                <h3>✨ Features</h3>
                <ul>
                  <li>Interactive 3D galaxy with real-time controls</li>
                  <li>Clickable stars with birthday wishes</li>
                  <li>Dynamic constellations and effects</li>
                  <li>Responsive design for all devices</li>
                </ul>
              </div>
            </div>
            
            <div className="credits">
              <h3>💖 Made with love for Naila</h3>
              <p>Happy Birthday! May your special day be as amazing as you are.</p>
            </div>
          </div>
        )}
      </main>
      
      <footer className="app-footer">
        <p>🎂 Happy Birthday Naila! • Made with 💖 • {new Date().getFullYear()}</p>
        <div className="footer-links">
          <button>⭐ Share</button>
          <button>🔗 Copy Link</button>
          <button>📱 View Mobile</button>
        </div>
      </footer>
    </div>
  );
}

export default App;