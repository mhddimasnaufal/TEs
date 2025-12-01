<?php
/**
 * VoiceMessage Section - Record and Listen to Voice Messages
 */
?>
<section id="voicemessage" class="voice-section">
    <div class="section-header">
        <h2 class="section-title">Voice Messages for You</h2>
        <div class="section-divider">
            <div class="divider-line"></div>
            <div class="divider-star">🎤</div>
            <div class="divider-line"></div>
        </div>
        <p class="section-subtitle">Hear heartfelt birthday wishes from loved ones</p>
    </div>

    <div class="voice-container">
        <div class="voice-recorder">
            <div class="recorder-header">
                <h3><i class="fas fa-microphone"></i> Record Your Message</h3>
                <p>Record a personal voice message for Naila (max 1 minute)</p>
            </div>
            
            <div class="recorder-body">
                <div class="recorder-visualizer">
                    <canvas id="voiceVisualizer"></canvas>
                    <div class="visualizer-overlay" id="recorderStatus">
                        <i class="fas fa-microphone"></i>
                        <p>Ready to record</p>
                    </div>
                </div>
                
                <div class="recorder-controls">
                    <button id="recordBtn" class="control-btn record">
                        <i class="fas fa-circle"></i> Record
                    </button>
                    <button id="stopBtn" class="control-btn stop" disabled>
                        <i class="fas fa-stop"></i> Stop
                    </button>
                    <button id="playBtn" class="control-btn play" disabled>
                        <i class="fas fa-play"></i> Play
                    </button>
                    <button id="saveBtn" class="control-btn save" disabled>
                        <i class="fas fa-save"></i> Save
                    </button>
                    <button id="clearBtn" class="control-btn clear" disabled>
                        <i class="fas fa-trash"></i> Clear
                    </button>
                </div>
                
                <div class="recorder-timer">
                    <div class="timer-display">
                        <span id="minutes">00</span>:<span id="seconds">00</span>
                    </div>
                    <div class="timer-progress">
                        <div class="progress-bar" id="progressBar"></div>
                    </div>
                </div>
                
                <div class="recorder-info">
                    <div class="info-item">
                        <i class="fas fa-info-circle"></i>
                        <p>Maximum recording time: 1 minute</p>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-headphones"></i>
                        <p>Use headphones for better quality</p>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-shield-alt"></i>
                        <p>Your recording is private and secure</p>
                    </div>
                </div>
            </div>
            
            <div class="recorder-footer">
                <div class="name-input">
                    <input type="text" id="senderName" placeholder="Your name (optional)">
                    <button id="sendMessageBtn" class="send-btn" disabled>
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </div>
                <p class="privacy-note">
                    <i class="fas fa-lock"></i> Messages are stored securely and can only be accessed by Naila
                </p>
            </div>
        </div>
        
        <div class="voice-messages">
            <div class="messages-header">
                <h3><i class="fas fa-inbox"></i> Received Messages</h3>
                <div class="messages-filter">
                    <select id="filterSelect">
                        <option value="all">All Messages</option>
                        <option value="recent">Recent</option>
                        <option value="longest">Longest</option>
                        <option value="shortest">Shortest</option>
                    </select>
                    <button id="refreshBtn" class="refresh-btn">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>
            </div>
            
            <div class="messages-list" id="messagesList">
                <!-- Messages will be loaded here -->
                <div class="message-item">
                    <div class="message-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="message-content">
                        <div class="message-header">
                            <h4>Sarah Johnson</h4>
                            <span class="message-time">2 hours ago</span>
                        </div>
                        <div class="message-audio">
                            <audio src="assets/audio/message1.mp3" preload="metadata"></audio>
                            <div class="audio-controls">
                                <button class="audio-play">
                                    <i class="fas fa-play"></i>
                                </button>
                                <div class="audio-progress">
                                    <div class="progress-bar"></div>
                                </div>
                                <span class="audio-duration">0:45</span>
                                <button class="audio-like">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <p class="message-preview">"Happy Birthday Naila! Wishing you all the best..."</p>
                    </div>
                </div>
                
                <div class="message-item">
                    <div class="message-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="message-content">
                        <div class="message-header">
                            <h4>Michael Chen</h4>
                            <span class="message-time">5 hours ago</span>
                        </div>
                        <div class="message-audio">
                            <audio src="assets/audio/message2.mp3" preload="metadata"></audio>
                            <div class="audio-controls">
                                <button class="audio-play">
                                    <i class="fas fa-play"></i>
                                </button>
                                <div class="audio-progress">
                                    <div class="progress-bar"></div>
                                </div>
                                <span class="audio-duration">1:15</span>
                                <button class="audio-like">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <p class="message-preview">"To the most amazing person! Have a wonderful birthday..."</p>
                    </div>
                </div>
                
                <div class="message-item">
                    <div class="message-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="message-content">
                        <div class="message-header">
                            <h4>Family Group</h4>
                            <span class="message-time">1 day ago</span>
                        </div>
                        <div class="message-audio">
                            <audio src="assets/audio/message3.mp3" preload="metadata"></audio>
                            <div class="audio-controls">
                                <button class="audio-play">
                                    <i class="fas fa-play"></i>
                                </button>
                                <div class="audio-progress">
                                    <div class="progress-bar"></div>
                                </div>
                                <span class="audio-duration">2:30</span>
                                <button class="audio-like liked">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <p class="message-preview">"Happy Birthday from all of us! We love you so much..."</p>
                    </div>
                </div>
            </div>
            
            <div class="messages-stats">
                <div class="stat">
                    <i class="fas fa-message"></i>
                    <div class="stat-info">
                        <h4 id="totalMessages">24</h4>
                        <p>Messages</p>
                    </div>
                </div>
                <div class="stat">
                    <i class="far fa-clock"></i>
                    <div class="stat-info">
                        <h4 id="totalTime">45:20</h4>
                        <p>Total Time</p>
                    </div>
                </div>
                <div class="stat">
                    <i class="fas fa-heart"></i>
                    <div class="stat-info">
                        <h4 id="totalLikes">156</h4>
                        <p>Likes</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="voice-guidelines">
        <h3><i class="fas fa-lightbulb"></i> Tips for Great Voice Messages</h3>
        <div class="guidelines-grid">
            <div class="guideline">
                <div class="guideline-icon">
                    <i class="fas fa-volume-up"></i>
                </div>
                <h4>Speak Clearly</h4>
                <p>Find a quiet place and speak at a normal pace</p>
            </div>
            <div class="guideline">
                <div class="guideline-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h4>Be Personal</h4>
                <p>Share a memory or inside joke to make it special</p>
            </div>
            <div class="guideline">
                <div class="guideline-icon">
                    <i class="fas fa-smile"></i>
                </div>
                <h4>Be Positive</h4>
                <p>Focus on happy wishes and celebrations</p>
            </div>
            <div class="guideline">
                <div class="guideline-icon">
                    <i class="fas fa-music"></i>
                </div>
                <h4>Add Creativity</h4>
                <p>Sing a birthday song or add sound effects</p>
            </div>
        </div>
    </div>
</section>

<style>
.voice-section {
    background: linear-gradient(135deg, #2d1b69 0%, #1a237e 100%);
    color: white;
    padding: 80px 20px;
    position: relative;
    overflow: hidden;
}

.voice-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 30%, rgba(255, 119, 198, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(120, 119, 198, 0.1) 0%, transparent 50%);
    z-index: 0;
}

.voice-section > * {
    position: relative;
    z-index: 1;
}

.voice-container {
    max-width: 1400px;
    margin: 0 auto 60px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
}

.voice-recorder, .voice-messages {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.recorder-header {
    padding: 25px;
    background: rgba(0, 0, 0, 0.2);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.recorder-header h3 {
    margin: 0 0 10px 0;
    font-size: 22px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.recorder-header p {
    margin: 0;
    color: rgba(255, 255, 255, 0.7);
    font-size: 16px;
}

.recorder-body {
    padding: 25px;
}

.recorder-visualizer {
    position: relative;
    width: 100%;
    height: 200px;
    background: rgba(0, 0, 0, 0.3);
    border-radius: 15px;
    margin-bottom: 30px;
    overflow: hidden;
}

#voiceVisualizer {
    width: 100%;
    height: 100%;
}

.visualizer-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: rgba(0, 0, 0, 0.5);
    color: white;
    text-align: center;
    padding: 20px;
}

.visualizer-overlay i {
    font-size: 48px;
    margin-bottom: 15px;
    color: #6a11cb;
}

.visualizer-overlay p {
    margin: 0;
    font-size: 18px;
    color: rgba(255, 255, 255, 0.9);
}

.recorder-controls {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.control-btn {
    padding: 15px 30px;
    border: none;
    border-radius: 50px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
    min-width: 120px;
    justify-content: center;
}

.control-btn.record {
    background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
    color: white;
}

.control-btn.stop {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.control-btn.play {
    background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    color: white;
}

.control-btn.save {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    color: white;
}

.control-btn.clear {
    background: linear-gradient(135deg, #8e9eab 0%, #eef2f3 100%);
    color: #333;
}

.control-btn:hover:not(:disabled) {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.control-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none !important;
}

.recorder-timer {
    margin-bottom: 25px;
}

.timer-display {
    text-align: center;
    font-size: 48px;
    font-family: monospace;
    font-weight: bold;
    margin-bottom: 15px;
    color: white;
}

.timer-progress {
    width: 100%;
    height: 6px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    overflow: hidden;
}

.progress-bar {
    width: 0%;
    height: 100%;
    background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
    border-radius: 3px;
    transition: width 0.1s linear;
}

.recorder-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 15px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
}

.info-item i {
    color: #6a11cb;
    font-size: 18px;
}

.info-item p {
    margin: 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
}

.recorder-footer {
    padding: 25px;
    background: rgba(0, 0, 0, 0.2);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.name-input {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
}

#senderName {
    flex: 1;
    padding: 15px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    color: white;
    font-size: 16px;
}

#senderName::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.send-btn {
    padding: 15px 30px;
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    border: none;
    border-radius: 10px;
    color: white;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
}

.send-btn:hover:not(:disabled) {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(106, 17, 203, 0.4);
}

.send-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none !important;
}

.privacy-note {
    margin: 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.voice-messages .messages-header {
    padding: 25px;
    background: rgba(0, 0, 0, 0.2);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.messages-header h3 {
    margin: 0;
    font-size: 22px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.messages-filter {
    display: flex;
    gap: 10px;
    align-items: center;
}

#filterSelect {
    padding: 10px 15px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    color: white;
    cursor: pointer;
    min-width: 150px;
}

#filterSelect option {
    background: #1a237e;
    color: white;
}

.refresh-btn {
    width: 44px;
    height: 44px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    color: white;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.refresh-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: rotate(180deg);
}

.messages-list {
    max-height: 600px;
    overflow-y: auto;
    padding: 20px;
}

.message-item {
    display: flex;
    gap: 20px;
    padding: 20px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 15px;
    margin-bottom: 15px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
}

.message-item:hover {
    background: rgba(255, 255, 255, 0.05);
    transform: translateX(5px);
}

.message-avatar {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.message-content {
    flex: 1;
    min-width: 0;
}

.message-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    flex-wrap: wrap;
    gap: 10px;
}

.message-header h4 {
    margin: 0;
    font-size: 18px;
    color: white;
}

.message-time {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.6);
}

.message-audio {
    margin-bottom: 15px;
}

.message-audio audio {
    display: none;
}

.audio-controls {
    display: flex;
    align-items: center;
    gap: 15px;
    background: rgba(0, 0, 0, 0.3);
    padding: 15px;
    border-radius: 10px;
}

.audio-play {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    border: none;
    border-radius: 50%;
    color: white;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.audio-play:hover {
    transform: scale(1.1);
}

.audio-progress {
    flex: 1;
    height: 6px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    overflow: hidden;
    position: relative;
}

.audio-progress .progress-bar {
    height: 100%;
    background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
    width: 0%;
    transition: width 0.1s linear;
}

.audio-duration {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
    min-width: 40px;
    text-align: center;
}

.audio-like {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border: none;
    border-radius: 50%;
    color: white;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.audio-like:hover {
    background: rgba(255, 255, 255, 0.2);
}

.audio-like.liked {
    color: #ff416c;
}

.message-preview {
    margin: 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
    font-style: italic;
    line-height: 1.5;
}

.messages-stats {
    display: flex;
    justify-content: space-around;
    padding: 25px;
    background: rgba(0, 0, 0, 0.2);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.stat {
    display: flex;
    align-items: center;
    gap: 15px;
}

.stat i {
    font-size: 32px;
    color: #6a11cb;
}

.stat-info h4 {
    margin: 0 0 5px 0;
    font-size: 24px;
    color: white;
}

.stat-info p {
    margin: 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
}

.voice-guidelines {
    max-width: 1000px;
    margin: 60px auto 0;
    padding: 40px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.voice-guidelines h3 {
    margin: 0 0 30px 0;
    font-size: 24px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.guidelines-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 25px;
}

.guideline {
    text-align: center;
    padding: 25px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 15px;
    transition: transform 0.3s ease;
}

.guideline:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.05);
}

.guideline-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 30px;
}

.guideline h4 {
    margin: 0 0 10px 0;
    font-size: 18px;
    color: white;
}

.guideline p {
    margin: 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.6;
}

@media (max-width: 1024px) {
    .voice-container {
        grid-template-columns: 1fr;
        gap: 30px;
    }
}

@media (max-width: 768px) {
    .voice-section {
        padding: 60px 15px;
    }
    
    .recorder-controls {
        flex-direction: column;
        align-items: stretch;
    }
    
    .control-btn {
        min-width: auto;
    }
    
    .name-input {
        flex-direction: column;
    }
    
    .messages-header {
        flex-direction: column;
        align-items: stretch;
    }
    
    .messages-filter {
        width: 100%;
    }
    
    #filterSelect {
        flex: 1;
    }
    
    .message-item {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    
    .message-header {
        flex-direction: column;
        align-items: center;
    }
    
    .audio-controls {
        flex-wrap: wrap;
    }
    
    .audio-progress {
        order: 3;
        width: 100%;
    }
}

@media (max-width: 480px) {
    .messages-stats {
        flex-direction: column;
        gap: 20px;
        align-items: center;
    }
    
    .stat {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // DOM Elements
    const visualizer = document.getElementById('voiceVisualizer');
    const recorderStatus = document.getElementById('recorderStatus');
    const recordBtn = document.getElementById('recordBtn');
    const stopBtn = document.getElementById('stopBtn');
    const playBtn = document.getElementById('playBtn');
    const saveBtn = document.getElementById('saveBtn');
    const clearBtn = document.getElementById('clearBtn');
    const minutesDisplay = document.getElementById('minutes');
    const secondsDisplay = document.getElementById('seconds');
    const progressBar = document.getElementById('progressBar');
    const senderName = document.getElementById('senderName');
    const sendMessageBtn = document.getElementById('sendMessageBtn');
    const messagesList = document.getElementById('messagesList');
    const totalMessages = document.getElementById('totalMessages');
    const totalTime = document.getElementById('totalTime');
    const totalLikes = document.getElementById('totalLikes');
    const filterSelect = document.getElementById('filterSelect');
    const refreshBtn = document.getElementById('refreshBtn');

    // State variables
    let mediaRecorder = null;
    let audioChunks = [];
    let audioBlob = null;
    let audioUrl = null;
    let isRecording = false;
    let isPlaying = false;
    let timerInterval = null;
    let recordingSeconds = 0;
    const MAX_RECORDING_TIME = 60; // 1 minute in seconds

    // Canvas setup for visualizer
    let canvasCtx = null;
    let audioContext = null;
    let analyser = null;
    let dataArray = null;
    let animationId = null;

    if (visualizer) {
        canvasCtx = visualizer.getContext('2d');
        visualizer.width = visualizer.offsetWidth;
        visualizer.height = visualizer.offsetHeight;
    }

    // Initialize stats
    updateStats();

    // Initialize audio context
    function initAudioContext() {
        if (!audioContext) {
            audioContext = new (window.AudioContext || window.webkitAudioContext)();
        }
    }

    // Initialize visualizer
    function initVisualizer() {
        if (!canvasCtx || !audioContext) return;

        analyser = audioContext.createAnalyser();
        analyser.fftSize = 256;
        const bufferLength = analyser.frequencyBinCount;
        dataArray = new Uint8Array(bufferLength);

        drawVisualizer();
    }

    function drawVisualizer() {
        if (!canvasCtx || !analyser || !dataArray) return;

        animationId = requestAnimationFrame(drawVisualizer);

        analyser.getByteFrequencyData(dataArray);

        canvasCtx.fillStyle = 'rgba(0, 0, 0, 0.1)';
        canvasCtx.fillRect(0, 0, visualizer.width, visualizer.height);

        const barWidth = (visualizer.width / dataArray.length) * 2.5;
        let barHeight;
        let x = 0;

        for (let i = 0; i < dataArray.length; i++) {
            barHeight = dataArray[i] * (visualizer.height / 256);

            const gradient = canvasCtx.createLinearGradient(0, 0, 0, visualizer.height);
            gradient.addColorStop(0, '#6a11cb');
            gradient.addColorStop(1, '#2575fc');

            canvasCtx.fillStyle = gradient;
            canvasCtx.fillRect(x, visualizer.height - barHeight, barWidth, barHeight);

            x += barWidth + 1;
        }
    }

    // Timer functions
    function startTimer() {
        clearInterval(timerInterval);
        recordingSeconds = 0;
        updateTimerDisplay();
        
        timerInterval = setInterval(() => {
            recordingSeconds++;
            updateTimerDisplay();
            
            // Update progress bar
            const progress = (recordingSeconds / MAX_RECORDING_TIME) * 100;
            progressBar.style.width = `${Math.min(progress, 100)}%`;
            
            // Stop recording if max time reached
            if (recordingSeconds >= MAX_RECORDING_TIME) {
                stopRecording();
            }
        }, 1000);
    }

    function stopTimer() {
        clearInterval(timerInterval);
    }

    function updateTimerDisplay() {
        const mins = Math.floor(recordingSeconds / 60).toString().padStart(2, '0');
        const secs = (recordingSeconds % 60).toString().padStart(2, '0');
        
        minutesDisplay.textContent = mins;
        secondsDisplay.textContent = secs;
    }

    // Recording functions
    async function startRecording() {
        try {
            initAudioContext();
            
            const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
            mediaRecorder = new MediaRecorder(stream);
            
            // Connect stream to visualizer
            if (audioContext) {
                const source = audioContext.createMediaStreamSource(stream);
                analyser = audioContext.createAnalyser();
                source.connect(analyser);
                initVisualizer();
            }
            
            audioChunks = [];
            
            mediaRecorder.ondataavailable = (event) => {
                audioChunks.push(event.data);
            };
            
            mediaRecorder.onstop = () => {
                audioBlob = new Blob(audioChunks, { type: 'audio/webm' });
                audioUrl = URL.createObjectURL(audioBlob);
                
                // Enable play, save, and clear buttons
                playBtn.disabled = false;
                saveBtn.disabled = false;
                clearBtn.disabled = false;
                sendMessageBtn.disabled = false;
                
                // Stop visualizer
                if (animationId) {
                    cancelAnimationFrame(animationId);
                    animationId = null;
                }
                
                // Clear canvas
                if (canvasCtx) {
                    canvasCtx.clearRect(0, 0, visualizer.width, visualizer.height);
                }
                
                // Update status
                updateRecorderStatus('Recording stopped. Ready to play or save.', 'fas fa-check-circle', '#38ef7d');
            };
            
            mediaRecorder.start();
            isRecording = true;
            
            // Update UI
            recordBtn.disabled = true;
            stopBtn.disabled = false;
            
            // Start timer
            startTimer();
            
            // Update status
            updateRecorderStatus('Recording... Speak now!', 'fas fa-microphone', '#ff416c');
            
        } catch (error) {
            console.error('Error accessing microphone:', error);
            updateRecorderStatus('Microphone access denied. Please allow microphone access.', 'fas fa-exclamation-triangle', '#ff4b2b');
        }
    }

    function stopRecording() {
        if (mediaRecorder && isRecording) {
            mediaRecorder.stop();
            isRecording = false;
            
            // Stop all tracks
            mediaRecorder.stream.getTracks().forEach(track => track.stop());
            
            // Update UI
            recordBtn.disabled = false;
            stopBtn.disabled = true;
            
            // Stop timer
            stopTimer();
        }
    }

    function playRecording() {
        if (!audioUrl) return;
        
        const audio = new Audio(audioUrl);
        isPlaying = true;
        
        // Update UI
        playBtn.disabled = true;
        playBtn.innerHTML = '<i class="fas fa-pause"></i> Playing';
        
        audio.play();
        
        audio.onended = () => {
            isPlaying = false;
            playBtn.disabled = false;
            playBtn.innerHTML = '<i class="fas fa-play"></i> Play';
        };
    }

    function clearRecording() {
        // Clear recording data
        audioChunks = [];
        audioBlob = null;
        
        if (audioUrl) {
            URL.revokeObjectURL(audioUrl);
            audioUrl = null;
        }
        
        // Reset UI
        playBtn.disabled = true;
        saveBtn.disabled = true;
        clearBtn.disabled = true;
        sendMessageBtn.disabled = true;
        
        // Reset timer
        stopTimer();
        recordingSeconds = 0;
        updateTimerDisplay();
        progressBar.style.width = '0%';
        
        // Clear canvas
        if (canvasCtx) {
            canvasCtx.clearRect(0, 0, visualizer.width, visualizer.height);
        }
        
        // Update status
        updateRecorderStatus('Ready to record', 'fas fa-microphone', '#6a11cb');
    }

    function saveRecording() {
        if (!audioBlob || !senderName.value.trim()) {
            alert('Please enter your name before saving.');
            return;
        }
        
        // In a real application, you would upload to server
        // For demo, we'll add to messages list
        addMessageToPlaylist(senderName.value);
        
        // Reset form
        clearRecording();
        senderName.value = '';
        
        alert('Message saved successfully! (In a real app, this would upload to server)');
    }

    function updateRecorderStatus(text, iconClass, color) {
        if (!recorderStatus) return;
        
        const icon = recorderStatus.querySelector('i');
        const paragraph = recorderStatus.querySelector('p');
        
        if (icon) icon.className = iconClass;
        if (paragraph) paragraph.textContent = text;
        
        if (icon && color) {
            icon.style.color = color;
        }
    }

    // Message playlist functions
    function addMessageToPlaylist(name) {
        const messageId = Date.now();
        const duration = `${Math.floor(recordingSeconds / 60)}:${(recordingSeconds % 60).toString().padStart(2, '0')}`;
        const timeAgo = 'Just now';
        
        const messageItem = document.createElement('div');
        messageItem.className = 'message-item';
        messageItem.innerHTML = `
            <div class="message-avatar">
                <i class="fas fa-user"></i>
            </div>
            <div class="message-content">
                <div class="message-header">
                    <h4>${name}</h4>
                    <span class="message-time">${timeAgo}</span>
                </div>
                <div class="message-audio">
                    <audio src="${audioUrl}" preload="metadata"></audio>
                    <div class="audio-controls">
                        <button class="audio-play">
                            <i class="fas fa-play"></i>
                        </button>
                        <div class="audio-progress">
                            <div class="progress-bar"></div>
                        </div>
                        <span class="audio-duration">${duration}</span>
                        <button class="audio-like">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
                <p class="message-preview">"Your voice message has been recorded successfully!"</p>
            </div>
        `;
        
        // Add to top of list
        messagesList.insertBefore(messageItem, messagesList.firstChild);
        
        // Initialize audio controls for new item
        initAudioControls(messageItem);
        
        // Update stats
        updateStats();
    }

    function initAudioControls(messageItem) {
        const audioElement = messageItem.querySelector('audio');
        const playBtn = messageItem.querySelector('.audio-play');
        const progressBar = messageItem.querySelector('.audio-progress .progress-bar');
        const durationDisplay = messageItem.querySelector('.audio-duration');
        const likeBtn = messageItem.querySelector('.audio-like');
        
        let isPlaying = false;
        
        // Set duration
        audioElement.addEventListener('loadedmetadata', () => {
            const duration = audioElement.duration;
            const mins = Math.floor(duration / 60);
            const secs = Math.floor(duration % 60);
            durationDisplay.textContent = `${mins}:${secs.toString().padStart(2, '0')}`;
        });
        
        // Play/pause functionality
        playBtn.addEventListener('click', () => {
            if (isPlaying) {
                audioElement.pause();
                playBtn.innerHTML = '<i class="fas fa-play"></i>';
            } else {
                audioElement.play();
                playBtn.innerHTML = '<i class="fas fa-pause"></i>';
            }
            isPlaying = !isPlaying;
        });
        
        // Update progress bar
        audioElement.addEventListener('timeupdate', () => {
            const progress = (audioElement.currentTime / audioElement.duration) * 100;
            progressBar.style.width = `${progress}%`;
        });
        
        // Reset when finished
        audioElement.addEventListener('ended', () => {
            isPlaying = false;
            playBtn.innerHTML = '<i class="fas fa-play"></i>';
        });
        
        // Like functionality
        likeBtn.addEventListener('click', () => {
            likeBtn.classList.toggle('liked');
            const icon = likeBtn.querySelector('i');
            if (likeBtn.classList.contains('liked')) {
                icon.className = 'fas fa-heart';
            } else {
                icon.className = 'far fa-heart';
            }
            updateStats();
        });
    }

    function updateStats() {
        const messageItems = document.querySelectorAll('.message-item');
        const likes = document.querySelectorAll('.audio-like.liked').length;
        
        // Calculate total duration
        let totalSeconds = 0;
        messageItems.forEach(item => {
            const durationText = item.querySelector('.audio-duration').textContent;
            const [mins, secs] = durationText.split(':').map(Number);
            totalSeconds += mins * 60 + secs;
        });
        
        const totalMins = Math.floor(totalSeconds / 60);
        const totalSecs = totalSeconds % 60;
        
        // Update displays
        if (totalMessages) totalMessages.textContent = messageItems.length;
        if (totalTime) totalTime.textContent = `${totalMins}:${totalSecs.toString().padStart(2, '0')}`;
        if (totalLikes) totalLikes.textContent = likes;
    }

    // Initialize existing messages
    function initExistingMessages() {
        const messageItems = document.querySelectorAll('.message-item');
        messageItems.forEach(item => {
            initAudioControls(item);
        });
    }

    // Filter functionality
    if (filterSelect) {
        filterSelect.addEventListener('change', function() {
            const filter = this.value;
            const messageItems = Array.from(document.querySelectorAll('.message-item'));
            
            // Sort based on filter
            switch(filter) {
                case 'recent':
                    // Already sorted by recent first
                    break;
                case 'longest':
                    messageItems.sort((a, b) => {
                        const aDuration = a.querySelector('.audio-duration').textContent;
                        const bDuration = b.querySelector('.audio-duration').textContent;
                        return timeToSeconds(bDuration) - timeToSeconds(aDuration);
                    });
                    break;
                case 'shortest':
                    messageItems.sort((a, b) => {
                        const aDuration = a.querySelector('.audio-duration').textContent;
                        const bDuration = b.querySelector('.audio-duration').textContent;
                        return timeToSeconds(aDuration) - timeToSeconds(bDuration);
                    });
                    break;
            }
            
            // Reorder messages
            messagesList.innerHTML = '';
            messageItems.forEach(item => {
                messagesList.appendChild(item);
            });
        });
    }

    function timeToSeconds(timeStr) {
        const [mins, secs] = timeStr.split(':').map(Number);
        return mins * 60 + secs;
    }

    // Refresh button
    if (refreshBtn) {
        refreshBtn.addEventListener('click', function() {
            this.classList.add('refreshing');
            setTimeout(() => {
                this.classList.remove('refreshing');
                // In real app, this would fetch new messages from server
                alert('Refreshed messages! (New messages would load from server)');
            }, 1000);
        });
    }

    // Event listeners
    if (recordBtn) {
        recordBtn.addEventListener('click', startRecording);
    }
    
    if (stopBtn) {
        stopBtn.addEventListener('click', stopRecording);
    }
    
    if (playBtn) {
        playBtn.addEventListener('click', playRecording);
    }
    
    if (saveBtn) {
        saveBtn.addEventListener('click', saveRecording);
    }
    
    if (clearBtn) {
        clearBtn.addEventListener('click', clearRecording);
    }
    
    if (sendMessageBtn) {
        sendMessageBtn.addEventListener('click', saveRecording);
    }
    
    // Enable send button when name is entered
    if (senderName) {
        senderName.addEventListener('input', function() {
            sendMessageBtn.disabled = !this.value.trim() || !audioBlob;
        });
    }

    // Initialize
    initExistingMessages();
    
    // Handle window resize
    window.addEventListener('resize', () => {
        if (visualizer) {
            visualizer.width = visualizer.offsetWidth;
            visualizer.height = visualizer.offsetHeight;
        }
    });
});
</script>