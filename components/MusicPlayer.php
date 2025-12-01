<div id="music-player" class="position-fixed bottom-0 end-0 p-3" style="z-index: 1000;">
    <div class="glass-card p-3">
        <div class="d-flex align-items-center">
            <button id="playPauseBtn" class="btn btn-primary btn-sm rounded-circle me-2">
                <i class="fas fa-play"></i>
            </button>
            
            <div class="audio-info ms-2">
                <small class="d-block">Background Music</small>
                <small class="text-muted">Romantic Piano</small>
            </div>
            
            <div class="volume-control ms-3">
                <input type="range" id="volumeSlider" min="0" max="1" step="0.1" value="0.5" 
                       class="form-range" style="width: 80px;">
            </div>
        </div>
        
        <!-- Waveform Visualization -->
        <div class="waveform-container mt-2" style="height: 40px;">
            <canvas id="waveformCanvas"></canvas>
        </div>
    </div>
    
    <!-- Audio Element -->
    <audio id="bgMusic" loop>
        <source src="assets/audio/bg-music.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const audio = document.getElementById('bgMusic');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const volumeSlider = document.getElementById('volumeSlider');
    const canvas = document.getElementById('waveformCanvas');
    const ctx = canvas.getContext('2d');
    
    // Set canvas size
    canvas.width = 200;
    canvas.height = 40;
    
    // Play/Pause functionality
    playPauseBtn.addEventListener('click', function() {
        if (audio.paused) {
            audio.play();
            playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
        } else {
            audio.pause();
            playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
        }
    });
    
    // Volume control
    volumeSlider.addEventListener('input', function() {
        audio.volume = this.value;
    });
    
    // Auto-play with user interaction
    document.body.addEventListener('click', function initAudio() {
        if (audio.paused) {
            audio.play().catch(e => console.log('Autoplay prevented'));
            playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
        }
        document.body.removeEventListener('click', initAudio);
    }, { once: true });
    
    // Waveform animation
    function drawWaveform() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        // Create gradient
        const gradient = ctx.createLinearGradient(0, 0, canvas.width, 0);
        gradient.addColorStop(0, '#ff6b8b');
        gradient.addColorStop(0.5, '#a855f7');
        gradient.addColorStop(1, '#ff6b8b');
        
        ctx.fillStyle = gradient;
        
        // Draw bars
        const barCount = 40;
        const barWidth = canvas.width / barCount;
        
        for (let i = 0; i < barCount; i++) {
            const height = Math.sin(Date.now() * 0.001 + i * 0.3) * 15 + 10;
            const x = i * barWidth;
            const y = (canvas.height - height) / 2;
            
            ctx.fillRect(x, y, barWidth - 2, height);
        }
        
        requestAnimationFrame(drawWaveform);
    }
    
    drawWaveform();
});
</script>