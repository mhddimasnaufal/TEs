<?php
/**
 * Musik placeholder untuk website ulang tahun
 * Jika tidak ada file musik asli, gunakan URL eksternal atau generate audio
 */

// Daftar musik ulang tahun yang bisa digunakan
$birthdayMusic = [
    'local' => [
        'title' => 'Happy Birthday Song',
        'url' => 'assets/music/birthday-song.mp3',
        'artist' => 'Traditional',
        'duration' => '00:30'
    ],
    'external' => [
        [
            'title' => 'Happy Birthday Jazz',
            'url' => 'https://assets.mixkit.co/music/preview/mixkit-happy-birthday-jazz-528.mp3',
            'artist' => 'Mixkit',
            'duration' => '00:30'
        ],
        [
            'title' => 'Birthday Celebration',
            'url' => 'https://assets.mixkit.co/music/preview/mixkit-birthday-celebration-529.mp3',
            'artist' => 'Mixkit',
            'duration' => '01:03'
        ],
        [
            'title' => 'Happy Birthday Piano',
            'url' => 'https://assets.mixkit.co/music/preview/mixkit-happy-birthday-piano-527.mp3',
            'artist' => 'Mixkit',
            'duration' => '00:30'
        ]
    ],
    'youtube' => [
        [
            'title' => 'Happy Birthday Music',
            'url' => 'https://www.youtube.com/watch?v=GqK_DiH2qQ0',
            'embed' => 'https://www.youtube.com/embed/GqK_DiH2qQ0',
            'artist' => 'YouTube Audio Library',
            'duration' => '02:00'
        ]
    ]
];

// Fungsi untuk mendapatkan musik berdasarkan preferensi
function getBirthdayMusic($preference = 'local') {
    global $birthdayMusic;
    
    // Cek jika file lokal ada
    if ($preference === 'local' && file_exists($birthdayMusic['local']['url'])) {
        return $birthdayMusic['local'];
    }
    
    // Jika file lokal tidak ada, gunakan external pertama
    return $birthdayMusic['external'][0];
}

// Fungsi untuk generate audio placeholder sederhana
function generateToneAudio($frequency = 440, $duration = 1) {
    // Generate simple sine wave tone
    $sampleRate = 44100;
    $samples = $duration * $sampleRate;
    
    $data = '';
    for ($i = 0; $i < $samples; $i++) {
        $sample = sin(2 * M_PI * $frequency * $i / $sampleRate);
        $data .= pack('s', $sample * 32767);
    }
    
    // Create WAV header
    $header = pack('N', 0x52494646); // RIFF
    $header .= pack('V', 36 + strlen($data)); // Chunk size
    $header .= pack('N', 0x57415645); // WAVE
    $header .= pack('N', 0x666d7420); // fmt
    $header .= pack('V', 16); // Subchunk size
    $header .= pack('v', 1); // Audio format (PCM)
    $header .= pack('v', 1); // Channels
    $header .= pack('V', $sampleRate); // Sample rate
    $header .= pack('V', $sampleRate * 2); // Byte rate
    $header .= pack('v', 2); // Block align
    $header .= pack('v', 16); // Bits per sample
    $header .= pack('N', 0x64617461); // data
    $header .= pack('V', strlen($data)); // Data size
    
    return $header . $data;
}

// Cek dan buat file musik jika tidak ada
function ensureMusicFilesExist() {
    $musicFiles = [
        'assets/music/birthday-song.mp3' => 'Happy Birthday',
        'assets/music/background-music.mp3' => 'Background Music'
    ];
    
    foreach ($musicFiles as $file => $description) {
        if (!file_exists($file)) {
            // Create placeholder tone
            $audioData = generateToneAudio(440, 30); // 30-second A tone
            
            // Convert to base64 for HTML5 audio
            $base64Audio = 'data:audio/wav;base64,' . base64_encode($audioData);
            
            // Create HTML file with embedded audio
            $htmlContent = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>Placeholder: $description</title>
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
        }
        audio {
            margin-top: 20px;
            width: 300px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎵 $description</h1>
        <p>This is a placeholder audio file.</p>
        <p>Replace this file with actual music in:</p>
        <code>$file</code>
        <br><br>
        <audio controls>
            <source src="$base64Audio" type="audio/wav">
            Your browser does not support the audio element.
        </audio>
        <p style="margin-top: 20px; font-size: 12px; opacity: 0.8;">
            Note: In the actual website, replace this placeholder with real music files.
        </p>
    </div>
</body>
</html>
HTML;
            
            file_put_contents($file . '.html', $htmlContent);
            echo "Created placeholder for: $file\n";
        }
    }
}

// Fungsi untuk mendapatkan playlist musik
function getMusicPlaylist() {
    return [
        [
            'id' => 1,
            'title' => 'Happy Birthday',
            'artist' => 'Traditional',
            'url' => 'assets/music/birthday-song.mp3',
            'cover' => 'assets/images/icons/birthday-cake.png',
            'duration' => '00:30'
        ],
        [
            'id' => 2,
            'title' => 'Celebration Time',
            'artist' => 'Background Music',
            'url' => 'assets/music/background-music.mp3',
            'cover' => 'assets/images/icons/star-icon.png',
            'duration' => '02:00'
        ],
        [
            'id' => 3,
            'title' => 'Joyful Moments',
            'artist' => 'Instrumental',
            'url' => 'https://assets.mixkit.co/music/preview/mixkit-happy-birthday-jazz-528.mp3',
            'cover' => 'assets/images/icons/heart-icon.png',
            'duration' => '00:30'
        ]
    ];
}

// Inisialisasi musik
ensureMusicFilesExist();
$currentMusic = getBirthdayMusic();

// Output sebagai JSON jika diminta via AJAX
if (isset($_GET['ajax']) && $_GET['ajax'] == 'music') {
    header('Content-Type: application/json');
    echo json_encode([
        'music' => $currentMusic,
        'playlist' => getMusicPlaylist(),
        'status' => 'success'
    ]);
    exit;
}
?>

<!-- Template HTML untuk audio player -->
<div class="music-player" id="musicPlayer" style="display: none;">
    <div class="player-container">
        <div class="player-info">
            <div class="cover-art">
                <img src="assets/images/icons/birthday-cake.png" alt="Cover">
            </div>
            <div class="track-info">
                <h4 class="track-title">Happy Birthday</h4>
                <p class="track-artist">Traditional</p>
            </div>
        </div>
        
        <div class="player-controls">
            <button class="control-btn prev">
                <i class="fas fa-step-backward"></i>
            </button>
            <button class="control-btn play-pause">
                <i class="fas fa-play"></i>
            </button>
            <button class="control-btn next">
                <i class="fas fa-step-forward"></i>
            </button>
        </div>
        
        <div class="player-progress">
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
            <div class="time-display">
                <span class="current-time">0:00</span>
                <span class="duration">0:30</span>
            </div>
        </div>
        
        <div class="player-volume">
            <i class="fas fa-volume-up"></i>
            <input type="range" class="volume-slider" min="0" max="1" step="0.1" value="0.7">
        </div>
    </div>
    
    <audio id="birthdayAudio" preload="metadata">
        <source src="<?php echo $currentMusic['url']; ?>" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>
</div>

<script>
// JavaScript untuk music player
document.addEventListener('DOMContentLoaded', function() {
    const musicPlayer = document.getElementById('musicPlayer');
    const audioElement = document.getElementById('birthdayAudio');
    const playPauseBtn = document.querySelector('.play-pause');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    const progressBar = document.querySelector('.progress-fill');
    const currentTimeDisplay = document.querySelector('.current-time');
    const durationDisplay = document.querySelector('.duration');
    const volumeSlider = document.querySelector('.volume-slider');
    
    // Show music player after page load
    setTimeout(() => {
        musicPlayer.style.display = 'block';
        musicPlayer.classList.add('show');
    }, 2000);
    
    // Format time (seconds to mm:ss)
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins}:${secs.toString().padStart(2, '0')}`;
    }
    
    // Update progress bar
    function updateProgress() {
        if (audioElement.duration) {
            const progress = (audioElement.currentTime / audioElement.duration) * 100;
            progressBar.style.width = `${progress}%`;
            currentTimeDisplay.textContent = formatTime(audioElement.currentTime);
        }
    }
    
    // Update duration display
    audioElement.addEventListener('loadedmetadata', function() {
        durationDisplay.textContent = formatTime(audioElement.duration);
    });
    
    // Play/Pause functionality
    playPauseBtn.addEventListener('click', function() {
        if (audioElement.paused) {
            audioElement.play();
            this.innerHTML = '<i class="fas fa-pause"></i>';
        } else {
            audioElement.pause();
            this.innerHTML = '<i class="fas fa-play"></i>';
        }
    });
    
    // Update progress on timeupdate
    audioElement.addEventListener('timeupdate', updateProgress);
    
    // Click on progress bar to seek
    document.querySelector('.progress-bar').addEventListener('click', function(e) {
        const rect = this.getBoundingClientRect();
        const pos = (e.clientX - rect.left) / rect.width;
        audioElement.currentTime = pos * audioElement.duration;
    });
    
    // Volume control
    volumeSlider.addEventListener('input', function() {
        audioElement.volume = this.value;
    });
    
    // Auto-play when user interacts with page
    let hasInteracted = false;
    
    document.addEventListener('click', function initAudio() {
        if (!hasInteracted) {
            hasInteracted = true;
            audioElement.volume = 0.3;
            audioElement.play().catch(e => {
                console.log('Auto-play prevented:', e);
            });
            document.removeEventListener('click', initAudio);
        }
    });
    
    // Play next/prev (placeholder functionality)
    prevBtn.addEventListener('click', function() {
        // In full implementation, this would go to previous track
        audioElement.currentTime = 0;
    });
    
    nextBtn.addEventListener('click', function() {
        // In full implementation, this would go to next track
        audioElement.currentTime = 0;
    });
    
    // Loop the song
    audioElement.addEventListener('ended', function() {
        audioElement.currentTime = 0;
        audioElement.play();
    });
    
    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        switch(e.key) {
            case ' ':
                e.preventDefault();
                playPauseBtn.click();
                break;
            case 'ArrowLeft':
                audioElement.currentTime = Math.max(0, audioElement.currentTime - 5);
                break;
            case 'ArrowRight':
                audioElement.currentTime = Math.min(audioElement.duration, audioElement.currentTime + 5);
                break;
            case 'm':
            case 'M':
                audioElement.muted = !audioElement.muted;
                break;
        }
    });
});
</script>

<style>
.music-player {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 350px;
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.1);
    z-index: 1000;
    transform: translateY(100px);
    opacity: 0;
    transition: all 0.5s ease;
}

.music-player.show {
    transform: translateY(0);
    opacity: 1;
}

.player-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.player-info {
    display: flex;
    align-items: center;
    gap: 15px;
}

.cover-art {
    width: 60px;
    height: 60px;
    border-radius: 10px;
    overflow: hidden;
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

.cover-art img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.track-info {
    flex: 1;
}

.track-title {
    margin: 0;
    font-size: 16px;
    color: white;
    font-weight: 500;
}

.track-artist {
    margin: 5px 0 0 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
}

.player-controls {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
}

.control-btn {
    width: 50px;
    height: 50px;
    border: none;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    color: white;
    font-size: 18px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.control-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.1);
}

.play-pause {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    font-size: 24px;
}

.player-progress {
    width: 100%;
}

.progress-bar {
    width: 100%;
    height: 6px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    cursor: pointer;
    overflow: hidden;
    margin-bottom: 8px;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #6a11cb, #2575fc);
    border-radius: 3px;
    width: 0%;
    transition: width 0.1s linear;
}

.time-display {
    display: flex;
    justify-content: space-between;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.7);
}

.player-volume {
    display: flex;
    align-items: center;
    gap: 15px;
}

.player-volume i {
    font-size: 20px;
    color: rgba(255, 255, 255, 0.7);
}

.volume-slider {
    flex: 1;
    height: 6px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    outline: none;
    -webkit-appearance: none;
}

.volume-slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 16px;
    height: 16px;
    background: #6a11cb;
    border-radius: 50%;
    cursor: pointer;
}

@media (max-width: 768px) {
    .music-player {
        width: calc(100% - 40px);
        right: 20px;
        left: 20px;
        bottom: 10px;
    }
}
</style>