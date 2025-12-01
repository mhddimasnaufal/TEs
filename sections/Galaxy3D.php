<?php
/**
 * Galaxy3D Section - Interactive 3D Galaxy with Stars
 */
?>
<section id="galaxy3d" class="galaxy-section">
    <div class="section-header">
        <h2 class="section-title">Galaxy of Stars for You</h2>
        <div class="section-divider">
            <div class="divider-line"></div>
            <div class="divider-star">✦</div>
            <div class="divider-line"></div>
        </div>
        <p class="section-subtitle">Each star represents a beautiful moment in your life</p>
    </div>

    <div class="galaxy-container">
        <div id="galaxyCanvas"></div>
        
        <div class="galaxy-controls">
            <div class="control-group">
                <button id="autoRotateBtn" class="control-btn active">
                    <i class="fas fa-sync-alt"></i> Auto Rotate
                </button>
                <button id="addStarBtn" class="control-btn">
                    <i class="fas fa-star"></i> Add Star
                </button>
                <button id="resetViewBtn" class="control-btn">
                    <i class="fas fa-redo"></i> Reset View
                </button>
            </div>
            
            <div class="control-sliders">
                <div class="slider-group">
                    <label for="rotationSpeed">Rotation Speed</label>
                    <input type="range" id="rotationSpeed" min="0" max="2" step="0.1" value="0.5">
                </div>
                <div class="slider-group">
                    <label for="starDensity">Star Density</label>
                    <input type="range" id="starDensity" min="50" max="500" step="10" value="150">
                </div>
                <div class="slider-group">
                    <label for="galaxySize">Galaxy Size</label>
                    <input type="range" id="galaxySize" min="1" max="5" step="0.5" value="2.5">
                </div>
            </div>
        </div>
        
        <div class="galaxy-info">
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-magic"></i>
                </div>
                <div class="info-content">
                    <h4>Interactive Galaxy</h4>
                    <p>Click and drag to rotate the galaxy. Scroll to zoom in/out.</p>
                </div>
            </div>
            
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="info-content">
                    <h4>Special Stars</h4>
                    <p>Look for the golden stars - they represent special memories!</p>
                </div>
            </div>
            
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-birthday-cake"></i>
                </div>
                <div class="info-content">
                    <h4>Birthday Wishes</h4>
                    <p>Each star carries birthday wishes from friends and family.</p>
                </div>
            </div>
        </div>
        
        <div class="star-messages">
            <h3><i class="fas fa-comment-alt"></i> Messages on Stars</h3>
            <div class="messages-container">
                <div class="message">
                    <div class="message-star">★</div>
                    <p>"Happy Birthday Naila! May your day be as bright as these stars!"</p>
                </div>
                <div class="message">
                    <div class="message-star">★</div>
                    <p>"To the most wonderful person! Wishing you endless happiness!"</p>
                </div>
                <div class="message">
                    <div class="message-star">★</div>
                    <p>"Another year of amazing memories! Keep shining bright!"</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="galaxy-instructions">
        <p><i class="fas fa-mouse-pointer"></i> <strong>Controls:</strong> Drag to rotate • Scroll to zoom • Click stars to see messages</p>
        <p><i class="fas fa-mobile-alt"></i> <strong>Mobile:</strong> Touch and drag to interact</p>
    </div>
</section>

<style>
.galaxy-section {
    background: linear-gradient(135deg, #0a0a2a 0%, #1a1a3a 100%);
    color: white;
    padding: 80px 20px;
    position: relative;
    overflow: hidden;
}

.galaxy-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 50%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.2) 0%, transparent 50%);
    z-index: 0;
}

.galaxy-section > * {
    position: relative;
    z-index: 1;
}

.galaxy-container {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr;
    gap: 40px;
}

#galaxyCanvas {
    width: 100%;
    height: 500px;
    background: rgba(10, 10, 30, 0.7);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    position: relative;
    overflow: hidden;
}

.galaxy-controls {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    padding: 25px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.control-group {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 25px;
}

.control-btn {
    padding: 12px 25px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: white;
    border-radius: 50px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.control-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
}

.control-btn.active {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    border-color: transparent;
}

.control-sliders {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.slider-group {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.slider-group label {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 5px;
}

.slider-group input[type="range"] {
    width: 100%;
    height: 6px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    outline: none;
    -webkit-appearance: none;
}

.slider-group input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 20px;
    height: 20px;
    background: #6a11cb;
    border-radius: 50%;
    cursor: pointer;
}

.galaxy-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.info-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    padding: 25px;
    display: flex;
    gap: 20px;
    align-items: flex-start;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: transform 0.3s ease;
}

.info-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.08);
}

.info-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.info-content h4 {
    margin: 0 0 10px 0;
    font-size: 18px;
    color: white;
}

.info-content p {
    margin: 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.6;
}

.star-messages {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    padding: 30px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.star-messages h3 {
    margin: 0 0 25px 0;
    font-size: 22px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.messages-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.message {
    background: rgba(255, 255, 255, 0.03);
    border-radius: 10px;
    padding: 20px;
    display: flex;
    gap: 15px;
    align-items: flex-start;
    transition: all 0.3s ease;
}

.message:hover {
    background: rgba(255, 255, 255, 0.05);
    transform: translateX(5px);
}

.message-star {
    color: #FFD700;
    font-size: 24px;
    animation: twinkle 2s infinite;
}

@keyframes twinkle {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

.message p {
    margin: 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
}

.galaxy-instructions {
    margin-top: 30px;
    padding: 20px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 10px;
    text-align: center;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
}

.galaxy-instructions p {
    margin: 10px 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.galaxy-instructions i {
    color: #6a11cb;
}

@media (max-width: 768px) {
    .galaxy-section {
        padding: 60px 15px;
    }
    
    #galaxyCanvas {
        height: 400px;
    }
    
    .control-group {
        justify-content: center;
    }
    
    .control-btn {
        padding: 10px 20px;
        font-size: 13px;
    }
    
    .galaxy-info {
        grid-template-columns: 1fr;
    }
    
    .galaxy-instructions p {
        flex-direction: column;
        gap: 5px;
    }
}
</style>

<script>
// Galaxy 3D implementation will be handled by React component
// This PHP file provides the container and fallback content
document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('galaxyCanvas');
    
    if (!canvas) return;
    
    // Fallback message if WebGL/Three.js not available
    if (!window.WebGLRenderingContext || !canvas.getContext('webgl')) {
        canvas.innerHTML = `
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white; padding: 20px;">
                <i class="fas fa-exclamation-triangle" style="font-size: 48px; margin-bottom: 20px; color: #FFD700;"></i>
                <h3 style="margin-bottom: 10px;">3D Galaxy Not Available</h3>
                <p>Your browser doesn't support WebGL. Please try using Chrome, Firefox, or Edge.</p>
                <div style="margin-top: 20px; display: flex; justify-content: center; gap: 10px;">
                    <div class="star" style="animation: twinkle 2s infinite;">★</div>
                    <div class="star" style="animation: twinkle 2s infinite 0.5s;">★</div>
                    <div class="star" style="animation: twinkle 2s infinite 1s;">★</div>
                </div>
            </div>
        `;
    }
    
    // Basic controls functionality
    const autoRotateBtn = document.getElementById('autoRotateBtn');
    const addStarBtn = document.getElementById('addStarBtn');
    const resetViewBtn = document.getElementById('resetViewBtn');
    
    if (autoRotateBtn) {
        autoRotateBtn.addEventListener('click', function() {
            this.classList.toggle('active');
            // Will be handled by React component
        });
    }
    
    if (addStarBtn) {
        addStarBtn.addEventListener('click', function() {
            // Will be handled by React component
            this.classList.add('active');
            setTimeout(() => this.classList.remove('active'), 500);
        });
    }
    
    if (resetViewBtn) {
        resetViewBtn.addEventListener('click', function() {
            // Will be handled by React component
            this.classList.add('active');
            setTimeout(() => this.classList.remove('active'), 500);
        });
    }
    
    // Slider functionality
    const sliders = ['rotationSpeed', 'starDensity', 'galaxySize'];
    sliders.forEach(sliderId => {
        const slider = document.getElementById(sliderId);
        if (slider) {
            slider.addEventListener('input', function() {
                // Will be handled by React component
            });
        }
    });
});
</script>