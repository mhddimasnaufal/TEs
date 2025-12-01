<?php
/**
 * Heartbeat Section - Interactive Heartbeat Visualization
 */
?>
<section id="heartbeat" class="heartbeat-section">
    <div class="section-header">
        <h2 class="section-title">Heartbeat of Joy</h2>
        <div class="section-divider">
            <div class="divider-line"></div>
            <div class="divider-star">💖</div>
            <div class="divider-line"></div>
        </div>
        <p class="section-subtitle">Feel the rhythm of happiness on your special day</p>
    </div>

    <div class="heartbeat-container">
        <div class="heartbeat-visualization">
            <div class="heart-animation">
                <div class="heart" id="heartPulse">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="pulse-ring"></div>
                <div class="pulse-ring delay-1"></div>
                <div class="pulse-ring delay-2"></div>
            </div>
            
            <div class="heartbeat-canvas">
                <canvas id="heartbeatChart"></canvas>
            </div>
        </div>
        
        <div class="heartbeat-controls">
            <div class="control-group">
                <h3><i class="fas fa-sliders-h"></i> Heartbeat Controls</h3>
                
                <div class="control-item">
                    <label for="heartRate">Heart Rate</label>
                    <div class="slider-with-value">
                        <input type="range" id="heartRate" min="40" max="160" step="1" value="72">
                        <span id="heartRateValue">72 BPM</span>
                    </div>
                </div>
                
                <div class="control-item">
                    <label for="heartIntensity">Intensity</label>
                    <div class="slider-with-value">
                        <input type="range" id="heartIntensity" min="1" max="10" step="1" value="5">
                        <span id="heartIntensityValue">5</span>
                    </div>
                </div>
                
                <div class="control-item">
                    <label for="heartRhythm">Rhythm Pattern</label>
                    <select id="heartRhythm">
                        <option value="normal">Normal</option>
                        <option value="excited">Excited</option>
                        <option value="calm">Calm</option>
                        <option value="love">In Love</option>
                        <option value="party">Party Mode</option>
                    </select>
                </div>
            </div>
            
            <div class="preset-buttons">
                <button class="preset-btn" data-rate="60" data-intensity="3" data-rhythm="calm">
                    <i class="fas fa-spa"></i> Calm
                </button>
                <button class="preset-btn" data-rate="72" data-intensity="5" data-rhythm="normal">
                    <i class="fas fa-heartbeat"></i> Normal
                </button>
                <button class="preset-btn" data-rate="90" data-intensity="7" data-rhythm="excited">
                    <i class="fas fa-star"></i> Excited
                </button>
                <button class="preset-btn" data-rate="120" data-intensity="9" data-rhythm="love">
                    <i class="fas fa-heart"></i> In Love
                </button>
                <button class="preset-btn" data-rate="140" data-intensity="10" data-rhythm="party">
                    <i class="fas fa-birthday-cake"></i> Party Mode
                </button>
            </div>
        </div>
        
        <div class="heartbeat-stats">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <div class="stat-content">
                        <h3 id="currentBPM">72</h3>
                        <p>Current BPM</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="far fa-clock"></i>
                    </div>
                    <div class="stat-content">
                        <h3 id="heartAge">25</h3>
                        <p>Heart Age</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-fire"></i>
                    </div>
                    <div class="stat-content">
                        <h3 id="energyLevel">85%</h3>
                        <p>Energy Level</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-laugh-beam"></i>
                    </div>
                    <div class="stat-content">
                        <h3 id="happinessIndex">92%</h3>
                        <p>Happiness Index</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="heartbeat-emotions">
            <h3><i class="fas fa-smile"></i> Emotional States</h3>
            <div class="emotions-grid">
                <div class="emotion-card" data-emotion="joy">
                    <div class="emotion-icon">
                        <i class="fas fa-laugh"></i>
                    </div>
                    <div class="emotion-content">
                        <h4>Joy</h4>
                        <p>Pure happiness and delight</p>
                        <div class="emotion-meter">
                            <div class="meter-fill" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
                
                <div class="emotion-card" data-emotion="love">
                    <div class="emotion-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="emotion-content">
                        <h4>Love</h4>
                        <p>Affection and deep care</p>
                        <div class="emotion-meter">
                            <div class="meter-fill" style="width: 85%"></div>
                        </div>
                    </div>
                </div>
                
                <div class="emotion-card" data-emotion="excitement">
                    <div class="emotion-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="emotion-content">
                        <h4>Excitement</h4>
                        <p>Anticipation and thrill</p>
                        <div class="emotion-meter">
                            <div class="meter-fill" style="width: 80%"></div>
                        </div>
                    </div>
                </div>
                
                <div class="emotion-card" data-emotion="gratitude">
                    <div class="emotion-icon">
                        <i class="fas fa-hands"></i>
                    </div>
                    <div class="emotion-content">
                        <h4>Gratitude</h4>
                        <p>Thankfulness and appreciation</p>
                        <div class="emotion-meter">
                            <div class="meter-fill" style="width: 75%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="heartbeat-messages">
            <h3><i class="fas fa-comment-heart"></i> Heartfelt Messages</h3>
            <div class="messages-flow">
                <div class="message-bubble" style="--delay: 0s">
                    <div class="bubble-content">
                        <p>"Your happiness makes my heart beat faster!"</p>
                        <span class="bubble-time">Just now</span>
                    </div>
                </div>
                
                <div class="message-bubble" style="--delay: 2s">
                    <div class="bubble-content">
                        <p>"Wishing you a day full of love and joy!"</p>
                        <span class="bubble-time">2s ago</span>
                    </div>
                </div>
                
                <div class="message-bubble" style="--delay: 4s">
                    <div class="bubble-content">
                        <p>"Every beat celebrates your amazing spirit!"</p>
                        <span class="bubble-time">4s ago</span>
                    </div>
                </div>
                
                <div class="message-bubble" style="--delay: 6s">
                    <div class="bubble-content">
                        <p>"Heart full of love for you on your birthday!"</p>
                        <span class="bubble-time">6s ago</span>
                    </div>
                </div>
            </div>
            
            <div class="add-message">
                <input type="text" id="heartMessageInput" placeholder="Add a heartbeat message...">
                <button id="sendHeartMessage">
                    <i class="fas fa-heart"></i>
                </button>
            </div>
        </div>
    </div>
    
    <div class="heartbeat-info">
        <div class="info-card">
            <div class="info-icon">
                <i class="fas fa-brain"></i>
            </div>
            <div class="info-content">
                <h4>How It Works</h4>
                <p>The heartbeat visualization is synchronized with emotional states and messages. Each interaction affects the rhythm.</p>
            </div>
        </div>
        
        <div class="info-card">
            <div class="info-icon">
                <i class="fas fa-heartbeat"></i>
            </div>
            <div class="info-content">
                <h4>Real-time Monitoring</h4>
                <p>The BPM (Beats Per Minute) changes based on emotions and interactions with the birthday celebration.</p>
            </div>
        </div>
        
        <div class="info-card">
            <div class="info-icon">
                <i class="fas fa-magic"></i>
            </div>
            <div class="info-content">
                <h4>Interactive Experience</h4>
                <p>Adjust the controls to see how different emotional states affect the heartbeat pattern.</p>
            </div>
        </div>
    </div>
</section>

<style>
.heartbeat-section {
    background: linear-gradient(135deg, #8a2387 0%, #f27121 100%);
    color: white;
    padding: 80px 20px;
    position: relative;
    overflow: hidden;
}

.heartbeat-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 70% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    z-index: 0;
}

.heartbeat-section > * {
    position: relative;
    z-index: 1;
}

.heartbeat-container {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr;
    gap: 40px;
}

.heartbeat-visualization {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 30px;
    padding: 40px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 40px;
    align-items: center;
}

.heart-animation {
    position: relative;
    width: 200px;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.heart {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 48px;
    color: white;
    z-index: 2;
    position: relative;
    animation: heartbeat 1.2s ease-in-out infinite;
    box-shadow: 0 0 30px rgba(255, 65, 108, 0.5);
}

@keyframes heartbeat {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

.pulse-ring {
    position: absolute;
    width: 120px;
    height: 120px;
    border: 2px solid rgba(255, 65, 108, 0.7);
    border-radius: 50%;
    animation: pulse 2s linear infinite;
    opacity: 0;
}

.pulse-ring.delay-1 {
    animation-delay: 0.7s;
}

.pulse-ring.delay-2 {
    animation-delay: 1.4s;
}

@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 0.8;
    }
    100% {
        transform: scale(2);
        opacity: 0;
    }
}

.heartbeat-canvas {
    width: 100%;
    height: 200px;
    background: rgba(0, 0, 0, 0.2);
    border-radius: 15px;
    overflow: hidden;
}

#heartbeatChart {
    width: 100%;
    height: 100%;
}

.heartbeat-controls {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    padding: 30px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.control-group h3 {
    margin: 0 0 25px 0;
    font-size: 22px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.control-item {
    margin-bottom: 25px;
}

.control-item label {
    display: block;
    margin-bottom: 10px;
    font-size: 16px;
    color: rgba(255, 255, 255, 0.9);
}

.slider-with-value {
    display: flex;
    align-items: center;
    gap: 20px;
}

.slider-with-value input[type="range"] {
    flex: 1;
    height: 8px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 4px;
    outline: none;
    -webkit-appearance: none;
}

.slider-with-value input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 24px;
    height: 24px;
    background: #ff416c;
    border-radius: 50%;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(255, 65, 108, 0.5);
}

.slider-with-value span {
    min-width: 80px;
    text-align: right;
    font-weight: bold;
    font-size: 18px;
    color: #ff416c;
}

.control-item select {
    width: 100%;
    padding: 12px 15px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

.control-item select option {
    background: #8a2387;
    color: white;
}

.preset-buttons {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 15px;
    margin-top: 30px;
}

.preset-btn {
    padding: 15px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    color: white;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.preset-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-3px);
}

.preset-btn i {
    font-size: 20px;
}

.preset-btn[data-rhythm="calm"] i { color: #38ef7d; }
.preset-btn[data-rhythm="normal"] i { color: #667eea; }
.preset-btn[data-rhythm="excited"] i { color: #fbbd08; }
.preset-btn[data-rhythm="love"] i { color: #ff416c; }
.preset-btn[data-rhythm="party"] i { color: #f27121; }

.heartbeat-stats {
    margin-top: 20px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.stat-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    padding: 25px;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: transform 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.08);
}

.stat-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    font-size: 24px;
}

.stat-content h3 {
    margin: 0 0 10px 0;
    font-size: 32px;
    color: white;
    font-weight: bold;
}

.stat-content p {
    margin: 0;
    color: rgba(255, 255, 255, 0.7);
    font-size: 16px;
}

.heartbeat-emotions {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    padding: 30px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.heartbeat-emotions h3 {
    margin: 0 0 25px 0;
    font-size: 22px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.emotions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.emotion-card {
    background: rgba(255, 255, 255, 0.03);
    border-radius: 15px;
    padding: 25px;
    display: flex;
    gap: 20px;
    align-items: center;
    border: 1px solid rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
    cursor: pointer;
}

.emotion-card:hover {
    background: rgba(255, 255, 255, 0.05);
    transform: translateY(-3px);
}

.emotion-card.active {
    background: rgba(255, 65, 108, 0.1);
    border-color: #ff416c;
}

.emotion-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.emotion-card[data-emotion="joy"] .emotion-icon {
    background: rgba(56, 239, 125, 0.2);
    color: #38ef7d;
}

.emotion-card[data-emotion="love"] .emotion-icon {
    background: rgba(255, 65, 108, 0.2);
    color: #ff416c;
}

.emotion-card[data-emotion="excitement"] .emotion-icon {
    background: rgba(251, 189, 8, 0.2);
    color: #fbbd08;
}

.emotion-card[data-emotion="gratitude"] .emotion-icon {
    background: rgba(103, 126, 234, 0.2);
    color: #667eea;
}

.emotion-content {
    flex: 1;
    min-width: 0;
}

.emotion-content h4 {
    margin: 0 0 8px 0;
    font-size: 18px;
    color: white;
}

.emotion-content p {
    margin: 0 0 15px 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
}

.emotion-meter {
    width: 100%;
    height: 6px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    overflow: hidden;
}

.meter-fill {
    height: 100%;
    background: linear-gradient(90deg, #ff416c 0%, #ff4b2b 100%);
    border-radius: 3px;
    transition: width 0.3s ease;
}

.heartbeat-messages {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    padding: 30px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.heartbeat-messages h3 {
    margin: 0 0 25px 0;
    font-size: 22px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.messages-flow {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-bottom: 25px;
    max-height: 300px;
    overflow-y: auto;
    padding-right: 10px;
}

.message-bubble {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 15px 20px;
    max-width: 80%;
    animation: floatUp 0.5s ease-out var(--delay) both;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.message-bubble:nth-child(even) {
    align-self: flex-end;
    background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
}

@keyframes floatUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.bubble-content p {
    margin: 0 0 8px 0;
    font-size: 16px;
    line-height: 1.5;
}

.bubble-time {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.7);
    display: block;
    text-align: right;
}

.add-message {
    display: flex;
    gap: 15px;
}

#heartMessageInput {
    flex: 1;
    padding: 15px 20px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 25px;
    color: white;
    font-size: 16px;
}

#heartMessageInput::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

#sendHeartMessage {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
    border: none;
    border-radius: 50%;
    color: white;
    font-size: 20px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

#sendHeartMessage:hover {
    transform: scale(1.1);
    box-shadow: 0 5px 15px rgba(255, 65, 108, 0.4);
}

.heartbeat-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
    margin-top: 40px;
}

.info-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    padding: 25px;
    display: flex;
    gap: 20px;
    align-items: flex-start;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.info-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
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

@media (max-width: 1024px) {
    .heartbeat-visualization {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .heart-animation {
        margin: 0 auto;
    }
}

@media (max-width: 768px) {
    .heartbeat-section {
        padding: 60px 15px;
    }
    
    .preset-buttons {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .emotions-grid {
        grid-template-columns: 1fr;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .heartbeat-info {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .preset-buttons {
        grid-template-columns: 1fr;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .message-bubble {
        max-width: 90%;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // DOM Elements
    const heartRateSlider = document.getElementById('heartRate');
    const heartRateValue = document.getElementById('heartRateValue');
    const heartIntensitySlider = document.getElementById('heartIntensity');
    const heartIntensityValue = document.getElementById('heartIntensityValue');
    const heartRhythmSelect = document.getElementById('heartRhythm');
    const presetButtons = document.querySelectorAll('.preset-btn');
    const emotionCards = document.querySelectorAll('.emotion-card');
    const heartMessageInput = document.getElementById('heartMessageInput');
    const sendHeartMessage = document.getElementById('sendHeartMessage');
    const messagesFlow = document.querySelector('.messages-flow');
    const currentBPM = document.getElementById('currentBPM');
    const heartAge = document.getElementById('heartAge');
    const energyLevel = document.getElementById('energyLevel');
    const happinessIndex = document.getElementById('happinessIndex');
    const heartPulse = document.getElementById('heartPulse');
    
    // Chart variables
    let heartbeatChart = null;
    let chartData = [];
    let chartLabels = [];
    let animationFrame = null;
    let lastUpdate = 0;
    const updateInterval = 100; // ms
    
    // Initialize chart
    function initHeartbeatChart() {
        const canvas = document.getElementById('heartbeatChart');
        if (!canvas) return;
        
        const ctx = canvas.getContext('2d');
        
        // Generate initial data
        chartLabels = [];
        chartData = [];
        
        for (let i = 0; i < 100; i++) {
            chartLabels.push(i);
            chartData.push(generateHeartbeatValue(i, 72, 5, 'normal'));
        }
        
        // Create gradient
        const gradient = ctx.createLinearGradient(0, 0, 0, canvas.height);
        gradient.addColorStop(0, 'rgba(255, 65, 108, 0.8)');
        gradient.addColorStop(1, 'rgba(255, 75, 43, 0.2)');
        
        heartbeatChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartLabels,
                datasets: [{
                    data: chartData,
                    borderColor: gradient,
                    backgroundColor: 'rgba(255, 65, 108, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 0,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 0
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: false
                    }
                },
                scales: {
                    x: {
                        display: false,
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        display: false,
                        min: 0,
                        max: 100,
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
        
        // Start animation loop
        startChartAnimation();
    }
    
    // Generate heartbeat value based on parameters
    function generateHeartbeatValue(x, rate, intensity, rhythm) {
        const baseFrequency = rate / 60; // Convert BPM to Hz
        let value = 50;
        
        switch(rhythm) {
            case 'normal':
                value += Math.sin(x * baseFrequency * 0.1) * intensity * 2;
                value += Math.sin(x * baseFrequency * 0.3) * intensity * 1;
                break;
            case 'excited':
                value += Math.sin(x * baseFrequency * 0.2) * intensity * 3;
                value += Math.sin(x * baseFrequency * 0.5) * intensity * 1.5;
                break;
            case 'calm':
                value += Math.sin(x * baseFrequency * 0.05) * intensity * 1.5;
                value += Math.sin(x * baseFrequency * 0.15) * intensity * 0.8;
                break;
            case 'love':
                value += Math.sin(x * baseFrequency * 0.08) * intensity * 2.5;
                // Add double beat effect
                value += Math.sin(x * baseFrequency * 0.16) * intensity * 1.2;
                break;
            case 'party':
                value += Math.sin(x * baseFrequency * 0.3) * intensity * 4;
                value += Math.sin(x * baseFrequency * 0.6) * intensity * 2;
                break;
        }
        
        // Add some noise
        value += (Math.random() - 0.5) * intensity;
        
        // Clamp value
        return Math.max(0, Math.min(100, value));
    }
    
    // Update chart animation
    function startChartAnimation() {
        if (!heartbeatChart) return;
        
        function updateChart(timestamp) {
            if (!lastUpdate) lastUpdate = timestamp;
            
            const elapsed = timestamp - lastUpdate;
            
            if (elapsed > updateInterval) {
                lastUpdate = timestamp;
                
                // Get current values
                const rate = parseInt(heartRateSlider.value);
                const intensity = parseInt(heartIntensitySlider.value);
                const rhythm = heartRhythmSelect.value;
                
                // Shift data
                chartData.shift();
                chartLabels.shift();
                
                // Add new data point
                const lastX = chartLabels[chartLabels.length - 1] || 0;
                chartLabels.push(lastX + 1);
                chartData.push(generateHeartbeatValue(lastX + 1, rate, intensity, rhythm));
                
                // Update chart
                heartbeatChart.data.labels = chartLabels;
                heartbeatChart.data.datasets[0].data = chartData;
                heartbeatChart.update('none');
                
                // Update heartbeat animation speed
                updateHeartbeatAnimation(rate);
                
                // Update stats based on current values
                updateStats(rate, intensity, rhythm);
            }
            
            animationFrame = requestAnimationFrame(updateChart);
        }
        
        animationFrame = requestAnimationFrame(updateChart);
    }
    
    // Update heartbeat animation speed
    function updateHeartbeatAnimation(bpm) {
        if (!heartPulse) return;
        
        // Calculate animation duration from BPM
        const interval = 60 / bpm; // seconds per beat
        const duration = interval * 1000; // milliseconds
        
        // Update animation
        heartPulse.style.animationDuration = `${duration}ms`;
        
        // Update pulse rings
        const pulseRings = document.querySelectorAll('.pulse-ring');
        pulseRings.forEach(ring => {
            ring.style.animationDuration = `${duration * 1.5}ms`;
        });
    }
    
    // Update stats display
    function updateStats(rate, intensity, rhythm) {
        if (currentBPM) currentBPM.textContent = rate;
        
        // Calculate heart age (lower is better)
        let age = 25;
        if (rate > 100) age += Math.floor((rate - 100) / 5);
        if (rate < 60) age -= Math.floor((60 - rate) / 10);
        if (heartAge) heartAge.textContent = age;
        
        // Calculate energy level
        let energy = 50 + (intensity * 5);
        if (rhythm === 'party') energy += 20;
        if (rhythm === 'calm') energy -= 15;
        if (energyLevel) energyLevel.textContent = `${Math.min(100, energy)}%`;
        
        // Calculate happiness index
        let happiness = 70 + (intensity * 4);
        if (rhythm === 'love') happiness += 15;
        if (rhythm === 'excited') happiness += 10;
        if (happinessIndex) happinessIndex.textContent = `${Math.min(100, happiness)}%`;
    }
    
    // Update slider value displays
    function updateSliderDisplays() {
        const rate = parseInt(heartRateSlider.value);
        const intensity = parseInt(heartIntensitySlider.value);
        
        if (heartRateValue) heartRateValue.textContent = `${rate} BPM`;
        if (heartIntensityValue) heartIntensityValue.textContent = intensity;
    }
    
    // Handle slider changes
    heartRateSlider.addEventListener('input', function() {
        updateSliderDisplays();
    });
    
    heartIntensitySlider.addEventListener('input', function() {
        updateSliderDisplays();
    });
    
    // Handle rhythm changes
    heartRhythmSelect.addEventListener('change', function() {
        // Update emotion cards
        emotionCards.forEach(card => {
            card.classList.remove('active');
            if (card.getAttribute('data-emotion') === this.value) {
                card.classList.add('active');
            }
        });
    });
    
    // Handle preset buttons
    presetButtons.forEach(button => {
        button.addEventListener('click', function() {
            const rate = this.getAttribute('data-rate');
            const intensity = this.getAttribute('data-intensity');
            const rhythm = this.getAttribute('data-rhythm');
            
            // Update controls
            heartRateSlider.value = rate;
            heartIntensitySlider.value = intensity;
            heartRhythmSelect.value = rhythm;
            
            // Update displays
            updateSliderDisplays();
            
            // Trigger change event
            heartRhythmSelect.dispatchEvent(new Event('change'));
            
            // Highlight selected preset
            presetButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Handle emotion cards
    emotionCards.forEach(card => {
        card.addEventListener('click', function() {
            const emotion = this.getAttribute('data-emotion');
            
            // Update rhythm select
            heartRhythmSelect.value = emotion;
            
            // Trigger change event
            heartRhythmSelect.dispatchEvent(new Event('change'));
            
            // Highlight selected emotion
            emotionCards.forEach(c => c.classList.remove('active'));
            this.classList.add('active');
            
            // Update intensity based on emotion meter
            const meterFill = this.querySelector('.meter-fill');
            if (meterFill) {
                const width = parseInt(meterFill.style.width);
                const intensity = Math.floor(width / 10); // Convert percentage to 1-10 scale
                heartIntensitySlider.value = intensity;
                updateSliderDisplays();
            }
        });
    });
    
    // Handle message sending
    sendHeartMessage.addEventListener('click', function() {
        const message = heartMessageInput.value.trim();
        
        if (message) {
            addHeartMessage(message);
            heartMessageInput.value = '';
            
            // Increase heart rate temporarily
            const currentRate = parseInt(heartRateSlider.value);
            heartRateSlider.value = Math.min(160, currentRate + 10);
            updateSliderDisplays();
            
            // Reset after 5 seconds
            setTimeout(() => {
                heartRateSlider.value = currentRate;
                updateSliderDisplays();
            }, 5000);
        }
    });
    
    heartMessageInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendHeartMessage.click();
        }
    });
    
    // Add message to flow
    function addHeartMessage(message) {
        const messageBubble = document.createElement('div');
        messageBubble.className = 'message-bubble';
        messageBubble.style.cssText = '--delay: 0s; align-self: flex-end; background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);';
        
        const now = new Date();
        const timeString = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        
        messageBubble.innerHTML = `
            <div class="bubble-content">
                <p>${message}</p>
                <span class="bubble-time">${timeString}</span>
            </div>
        `;
        
        messagesFlow.appendChild(messageBubble);
        
        // Scroll to bottom
        messagesFlow.scrollTop = messagesFlow.scrollHeight;
        
        // Animate in
        messageBubble.style.animation = 'floatUp 0.5s ease-out';
    }
    
    // Initialize everything
    updateSliderDisplays();
    initHeartbeatChart();
    
    // Set initial active preset
    presetButtons[1].click(); // Normal preset
    
    // Clean up on page unload
    window.addEventListener('beforeunload', function() {
        if (animationFrame) {
            cancelAnimationFrame(animationFrame);
        }
    });
});
</script>