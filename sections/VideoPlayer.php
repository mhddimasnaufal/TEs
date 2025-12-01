<?php
/**
 * VideoPlayer Section - Birthday Videos and Messages
 */
?>
<section id="videoplayer" class="video-section">
    <div class="section-header">
        <h2 class="section-title">Birthday Videos & Messages</h2>
        <div class="section-divider">
            <div class="divider-line"></div>
            <div class="divider-star">🎬</div>
            <div class="divider-line"></div>
        </div>
        <p class="section-subtitle">Watch heartfelt messages from loved ones</p>
    </div>

    <div class="video-container">
        <div class="main-video-player">
            <div class="video-wrapper">
                <div class="video-placeholder" id="videoPlaceholder">
                    <div class="placeholder-content">
                        <i class="fas fa-play-circle"></i>
                        <p>Select a video to play</p>
                    </div>
                </div>
                <video id="mainVideo" class="video-element" controls preload="metadata">
                    <source src="" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            
            <div class="video-controls">
                <div class="control-left">
                    <button id="playBtn" class="control-btn">
                        <i class="fas fa-play"></i> Play
                    </button>
                    <button id="pauseBtn" class="control-btn">
                        <i class="fas fa-pause"></i> Pause
                    </button>
                    <button id="muteBtn" class="control-btn">
                        <i class="fas fa-volume-up"></i> Mute
                    </button>
                </div>
                
                <div class="control-right">
                    <div class="volume-control">
                        <i class="fas fa-volume-down"></i>
                        <input type="range" id="volumeSlider" min="0" max="1" step="0.1" value="0.7">
                        <i class="fas fa-volume-up"></i>
                    </div>
                    
                    <div class="playback-speed">
                        <select id="speedSelect">
                            <option value="0.5">0.5x</option>
                            <option value="0.75">0.75x</option>
                            <option value="1" selected>Normal</option>
                            <option value="1.25">1.25x</option>
                            <option value="1.5">1.5x</option>
                            <option value="2">2x</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="video-info">
                <h3 id="videoTitle">Select a Video</h3>
                <p id="videoDescription">Choose from the video playlist below</p>
                <div class="video-meta">
                    <span><i class="far fa-clock"></i> Duration: <span id="videoDuration">--:--</span></span>
                    <span><i class="far fa-calendar"></i> Date: <span id="videoDate">--/--/----</span></span>
                    <span><i class="fas fa-user"></i> From: <span id="videoFrom">--</span></span>
                </div>
            </div>
        </div>
        
        <div class="video-playlist">
            <div class="playlist-header">
                <h3><i class="fas fa-list"></i> Video Playlist</h3>
                <div class="playlist-count">
                    <span id="playlistCount">0</span> Videos
                </div>
            </div>
            
            <div class="playlist-items" id="videoPlaylist">
                <!-- Videos will be loaded here -->
                <div class="playlist-item active" data-video="assets/videos/birthday-wish-1.mp4" 
                     data-title="Happy Birthday Naila!" 
                     data-description="A special birthday message from family"
                     data-duration="1:45" 
                     data-date="2024-01-15"
                     data-from="Family">
                    <div class="item-thumbnail">
                        <div class="thumbnail-overlay">
                            <i class="fas fa-play"></i>
                        </div>
                        <img src="assets/images/thumbnails/video1.jpg" alt="Video Thumbnail" onerror="this.src='https://via.placeholder.com/120x68/6a11cb/ffffff?text=Video+1'">
                    </div>
                    <div class="item-info">
                        <h4>Happy Birthday Naila!</h4>
                        <p>From: Family</p>
                        <div class="item-meta">
                            <span><i class="far fa-clock"></i> 1:45</span>
                            <span><i class="fas fa-heart"></i> 24</span>
                        </div>
                    </div>
                </div>
                
                <div class="playlist-item" data-video="assets/videos/birthday-wish-2.mp4" 
                     data-title="Best Wishes from Friends" 
                     data-description="Friends send their love and birthday wishes"
                     data-duration="2:30" 
                     data-date="2024-01-16"
                     data-from="Friends">
                    <div class="item-thumbnail">
                        <div class="thumbnail-overlay">
                            <i class="fas fa-play"></i>
                        </div>
                        <img src="assets/images/thumbnails/video2.jpg" alt="Video Thumbnail" onerror="this.src='https://via.placeholder.com/120x68/2575fc/ffffff?text=Video+2'">
                    </div>
                    <div class="item-info">
                        <h4>Best Wishes from Friends</h4>
                        <p>From: Friends</p>
                        <div class="item-meta">
                            <span><i class="far fa-clock"></i> 2:30</span>
                            <span><i class="fas fa-heart"></i> 18</span>
                        </div>
                    </div>
                </div>
                
                <div class="playlist-item" data-video="assets/videos/birthday-wish-3.mp4" 
                     data-title="Surprise Message!" 
                     data-description="A surprise birthday message you'll love"
                     data-duration="3:15" 
                     data-date="2024-01-17"
                     data-from="Special Someone">
                    <div class="item-thumbnail">
                        <div class="thumbnail-overlay">
                            <i class="fas fa-play"></i>
                        </div>
                        <img src="assets/images/thumbnails/video3.jpg" alt="Video Thumbnail" onerror="this.src='https://via.placeholder.com/120x68/ff0080/ffffff?text=Video+3'">
                    </div>
                    <div class="item-info">
                        <h4>Surprise Message!</h4>
                        <p>From: Special Someone</p>
                        <div class="item-meta">
                            <span><i class="far fa-clock"></i> 3:15</span>
                            <span><i class="fas fa-heart"></i> 32</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="playlist-footer">
                <button id="addVideoBtn" class="add-btn">
                    <i class="fas fa-plus"></i> Add Your Video Message
                </button>
                <p class="footer-note">
                    <i class="fas fa-info-circle"></i> Videos are pre-loaded for best experience
                </p>
            </div>
        </div>
    </div>
    
    <div class="video-upload-section">
        <div class="upload-container">
            <div class="upload-icon">
                <i class="fas fa-video"></i>
            </div>
            <div class="upload-content">
                <h3>Share Your Birthday Message</h3>
                <p>Record a short video message for Naila's birthday (max 2 minutes)</p>
                <div class="upload-actions">
                    <button class="upload-btn">
                        <i class="fas fa-upload"></i> Upload Video
                    </button>
                    <button class="record-btn">
                        <i class="fas fa-microphone"></i> Record Now
                    </button>
                </div>
                <div class="upload-guidelines">
                    <p><strong>Guidelines:</strong> Keep it positive • Speak clearly • 2 minutes max • MP4 format preferred</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="video-stats">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-video"></i>
            </div>
            <div class="stat-content">
                <h3 id="totalVideos">12</h3>
                <p>Total Videos</p>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="far fa-clock"></i>
            </div>
            <div class="stat-content">
                <h3 id="totalDuration">45:30</h3>
                <p>Total Duration</p>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-heart"></i>
            </div>
            <div class="stat-content">
                <h3 id="totalLikes">248</h3>
                <p>Total Likes</p>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-content">
                <h3 id="totalContributors">42</h3>
                <p>Contributors</p>
            </div>
        </div>
    </div>
</section>

<style>
.video-section {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
    color: white;
    padding: 80px 20px;
    position: relative;
    overflow: hidden;
}

.video-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 30% 30%, rgba(106, 17, 203, 0.2) 0%, transparent 50%),
        radial-gradient(circle at 70% 70%, rgba(37, 117, 252, 0.2) 0%, transparent 50%);
    z-index: 0;
}

.video-section > * {
    position: relative;
    z-index: 1;
}

.video-container {
    max-width: 1400px;
    margin: 0 auto 60px;
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 40px;
}

.main-video-player {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.video-wrapper {
    position: relative;
    width: 100%;
    height: 500px;
    background: #000;
    overflow: hidden;
}

.video-placeholder {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, #0a0a2a, #1a1a3a);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    color: white;
    z-index: 1;
}

.placeholder-content {
    text-align: center;
    animation: pulse 2s infinite;
}

.placeholder-content i {
    font-size: 80px;
    color: #6a11cb;
    margin-bottom: 20px;
}

.placeholder-content p {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.8);
}

.video-element {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: none;
}

.video-controls {
    padding: 20px;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.control-left, .control-right {
    display: flex;
    gap: 10px;
    align-items: center;
    flex-wrap: wrap;
}

.control-btn {
    padding: 10px 20px;
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

.volume-control {
    display: flex;
    align-items: center;
    gap: 10px;
}

.volume-control i {
    color: rgba(255, 255, 255, 0.7);
}

#volumeSlider {
    width: 100px;
    height: 6px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    outline: none;
    -webkit-appearance: none;
}

#volumeSlider::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 16px;
    height: 16px;
    background: #6a11cb;
    border-radius: 50%;
    cursor: pointer;
}

.playback-speed select {
    padding: 8px 15px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

.playback-speed select option {
    background: #1a1a2e;
    color: white;
}

.video-info {
    padding: 25px;
    background: rgba(255, 255, 255, 0.03);
}

.video-info h3 {
    margin: 0 0 10px 0;
    font-size: 22px;
    color: white;
}

.video-info p {
    margin: 0 0 15px 0;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.6;
}

.video-meta {
    display: flex;
    gap: 25px;
    flex-wrap: wrap;
}

.video-meta span {
    display: flex;
    align-items: center;
    gap: 8px;
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
}

.video-meta i {
    color: #6a11cb;
}

.video-playlist {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.1);
    height: fit-content;
}

.playlist-header {
    padding: 20px;
    background: rgba(0, 0, 0, 0.3);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.playlist-header h3 {
    margin: 0;
    font-size: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.playlist-count {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 500;
}

.playlist-items {
    max-height: 600px;
    overflow-y: auto;
    padding: 10px;
}

.playlist-item {
    display: flex;
    gap: 15px;
    padding: 15px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 10px;
    margin-bottom: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.playlist-item:hover {
    background: rgba(255, 255, 255, 0.07);
    transform: translateX(5px);
}

.playlist-item.active {
    background: rgba(106, 17, 203, 0.1);
    border-color: #6a11cb;
}

.item-thumbnail {
    position: relative;
    width: 120px;
    height: 68px;
    border-radius: 8px;
    overflow: hidden;
    flex-shrink: 0;
}

.item-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.thumbnail-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.playlist-item:hover .thumbnail-overlay {
    opacity: 1;
}

.thumbnail-overlay i {
    color: white;
    font-size: 24px;
}

.item-info {
    flex: 1;
    min-width: 0;
}

.item-info h4 {
    margin: 0 0 8px 0;
    font-size: 16px;
    color: white;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.item-info p {
    margin: 0 0 10px 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.6);
}

.item-meta {
    display: flex;
    gap: 15px;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.5);
}

.item-meta span {
    display: flex;
    align-items: center;
    gap: 5px;
}

.playlist-footer {
    padding: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    text-align: center;
}

.add-btn {
    width: 100%;
    padding: 15px;
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    border: none;
    color: white;
    border-radius: 10px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: transform 0.3s ease;
}

.add-btn:hover {
    transform: translateY(-3px);
}

.footer-note {
    margin: 15px 0 0 0;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.video-upload-section {
    max-width: 1000px;
    margin: 60px auto;
    padding: 40px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    border: 2px dashed rgba(255, 255, 255, 0.2);
}

.upload-container {
    display: flex;
    gap: 40px;
    align-items: center;
}

.upload-icon {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 48px;
}

.upload-content {
    flex: 1;
}

.upload-content h3 {
    margin: 0 0 10px 0;
    font-size: 28px;
    color: white;
}

.upload-content p {
    margin: 0 0 25px 0;
    color: rgba(255, 255, 255, 0.8);
    font-size: 16px;
}

.upload-actions {
    display: flex;
    gap: 20px;
    margin-bottom: 25px;
}

.upload-btn, .record-btn {
    padding: 15px 30px;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
}

.upload-btn {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    color: white;
}

.record-btn {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.upload-btn:hover, .record-btn:hover {
    transform: translateY(-3px);
}

.upload-guidelines {
    padding: 15px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border-left: 4px solid #6a11cb;
}

.upload-guidelines p {
    margin: 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
}

.video-stats {
    max-width: 1200px;
    margin: 60px auto 0;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.stat-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: transform 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-10px);
    background: rgba(255, 255, 255, 0.08);
}

.stat-icon {
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

.stat-content h3 {
    margin: 0 0 10px 0;
    font-size: 36px;
    color: white;
    font-weight: bold;
}

.stat-content p {
    margin: 0;
    color: rgba(255, 255, 255, 0.7);
    font-size: 16px;
}

@media (max-width: 1024px) {
    .video-container {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .video-wrapper {
        height: 400px;
    }
}

@media (max-width: 768px) {
    .video-section {
        padding: 60px 15px;
    }
    
    .video-wrapper {
        height: 300px;
    }
    
    .video-controls {
        flex-direction: column;
        align-items: stretch;
    }
    
    .control-left, .control-right {
        justify-content: center;
    }
    
    .upload-container {
        flex-direction: column;
        text-align: center;
    }
    
    .upload-actions {
        flex-direction: column;
    }
    
    .video-stats {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .video-stats {
        grid-template-columns: 1fr;
    }
    
    .video-meta {
        flex-direction: column;
        gap: 10px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const videoPlayer = document.getElementById('mainVideo');
    const videoPlaceholder = document.getElementById('videoPlaceholder');
    const playlistItems = document.querySelectorAll('.playlist-item');
    const playBtn = document.getElementById('playBtn');
    const pauseBtn = document.getElementById('pauseBtn');
    const muteBtn = document.getElementById('muteBtn');
    const volumeSlider = document.getElementById('volumeSlider');
    const speedSelect = document.getElementById('speedSelect');
    const videoTitle = document.getElementById('videoTitle');
    const videoDescription = document.getElementById('videoDescription');
    const videoDuration = document.getElementById('videoDuration');
    const videoDate = document.getElementById('videoDate');
    const videoFrom = document.getElementById('videoFrom');
    const playlistCount = document.getElementById('playlistCount');
    const totalVideos = document.getElementById('totalVideos');
    const totalDuration = document.getElementById('totalDuration');
    const totalLikes = document.getElementById('totalLikes');
    const totalContributors = document.getElementById('totalContributors');

    // Initialize playlist count
    if (playlistCount && playlistItems.length > 0) {
        playlistCount.textContent = playlistItems.length;
        totalVideos.textContent = playlistItems.length;
    }

    // Calculate total duration
    let totalMinutes = 0;
    playlistItems.forEach(item => {
        const duration = item.getAttribute('data-duration');
        if (duration) {
            const [minutes, seconds] = duration.split(':').map(Number);
            totalMinutes += minutes + seconds / 60;
        }
    });
    if (totalDuration) {
        const hours = Math.floor(totalMinutes / 60);
        const minutes = Math.floor(totalMinutes % 60);
        totalDuration.textContent = hours > 0 ? `${hours}:${minutes.toString().padStart(2, '0')}` : `${minutes}:00`;
    }

    // Calculate total likes
    let likes = 0;
    playlistItems.forEach(item => {
        const heartSpan = item.querySelector('.fa-heart').parentElement;
        if (heartSpan) {
            const likeCount = parseInt(heartSpan.textContent.match(/\d+/));
            if (!isNaN(likeCount)) {
                likes += likeCount;
            }
        }
    });
    if (totalLikes) {
        totalLikes.textContent = likes;
    }

    // Video player functionality
    function loadVideo(videoSrc, title, description, duration, date, from) {
        if (!videoPlayer) return;
        
        // Show loading
        videoPlaceholder.style.display = 'flex';
        videoPlayer.style.display = 'none';
        
        // Update video source
        videoPlayer.src = videoSrc;
        
        // Update video info
        if (videoTitle) videoTitle.textContent = title;
        if (videoDescription) videoDescription.textContent = description;
        if (videoDuration) videoDuration.textContent = duration;
        if (videoDate) videoDate.textContent = formatDate(date);
        if (videoFrom) videoFrom.textContent = from;
        
        // Load video
        videoPlayer.load();
        
        // When video is loaded
        videoPlayer.onloadeddata = function() {
            videoPlaceholder.style.display = 'none';
            videoPlayer.style.display = 'block';
            
            // Auto-play if user has interacted before
            if (window.hasInteracted) {
                videoPlayer.play().catch(e => console.log('Auto-play prevented:', e));
            }
        };
        
        // Error handling
        videoPlayer.onerror = function() {
            videoPlaceholder.style.display = 'flex';
            videoPlayer.style.display = 'none';
            videoPlaceholder.innerHTML = `
                <div class="placeholder-content">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h3>Video Not Available</h3>
                    <p>This video cannot be loaded. Please try another one.</p>
                    <button onclick="location.reload()" style="margin-top: 20px; padding: 10px 20px; background: #6a11cb; border: none; border-radius: 5px; color: white; cursor: pointer;">
                        Reload Page
                    </button>
                </div>
            `;
        };
    }

    function formatDate(dateString) {
        if (!dateString || dateString === '--/--/----') return dateString;
        try {
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            });
        } catch (e) {
            return dateString;
        }
    }

    // Playlist item click handler
    playlistItems.forEach(item => {
        item.addEventListener('click', function() {
            // Remove active class from all items
            playlistItems.forEach(i => i.classList.remove('active'));
            
            // Add active class to clicked item
            this.classList.add('active');
            
            // Get video data
            const videoSrc = this.getAttribute('data-video');
            const title = this.getAttribute('data-title');
            const description = this.getAttribute('data-description');
            const duration = this.getAttribute('data-duration');
            const date = this.getAttribute('data-date');
            const from = this.getAttribute('data-from');
            
            // Load video
            loadVideo(videoSrc, title, description, duration, date, from);
        });
    });

    // Control buttons
    if (playBtn) {
        playBtn.addEventListener('click', function() {
            window.hasInteracted = true;
            videoPlayer.play();
        });
    }
    
    if (pauseBtn) {
        pauseBtn.addEventListener('click', function() {
            videoPlayer.pause();
        });
    }
    
    if (muteBtn) {
        muteBtn.addEventListener('click', function() {
            videoPlayer.muted = !videoPlayer.muted;
            const icon = this.querySelector('i');
            if (videoPlayer.muted) {
                icon.className = 'fas fa-volume-mute';
            } else {
                icon.className = 'fas fa-volume-up';
            }
        });
    }
    
    if (volumeSlider) {
        volumeSlider.addEventListener('input', function() {
            videoPlayer.volume = this.value;
        });
    }
    
    if (speedSelect) {
        speedSelect.addEventListener('change', function() {
            videoPlayer.playbackRate = parseFloat(this.value);
        });
    }

    // Video events
    videoPlayer.addEventListener('play', function() {
        if (playBtn) {
            const icon = playBtn.querySelector('i');
            icon.className = 'fas fa-play';
            playBtn.innerHTML = '<i class="fas fa-play"></i> Playing';
        }
    });
    
    videoPlayer.addEventListener('pause', function() {
        if (playBtn) {
            playBtn.innerHTML = '<i class="fas fa-play"></i> Play';
        }
    });
    
    // Load first video by default
    if (playlistItems.length > 0) {
        const firstItem = playlistItems[0];
        firstItem.click();
    }

    // Upload button functionality
    const addVideoBtn = document.getElementById('addVideoBtn');
    const uploadBtn = document.querySelector('.upload-btn');
    const recordBtn = document.querySelector('.record-btn');
    
    function showUploadModal() {
        alert('In a real application, this would open a video upload form.\n\nFor now, you can send videos to: videos@nailabirthday.com');
    }
    
    if (addVideoBtn) {
        addVideoBtn.addEventListener('click', showUploadModal);
    }
    
    if (uploadBtn) {
        uploadBtn.addEventListener('click', showUploadModal);
    }
    
    if (recordBtn) {
        recordBtn.addEventListener('click', function() {
            alert('Recording functionality would be implemented with the MediaRecorder API.\n\nPlease use a modern browser that supports video recording.');
        });
    }

    // Track user interaction for auto-play
    document.addEventListener('click', function() {
        window.hasInteracted = true;
    }, { once: true });
});
</script>