/**
 * Audio Player for Birthday Website
 * Music playlist and sound effects
 */

class AudioPlayer {
    constructor() {
        this.audio = document.getElementById('birthday-music');
        this.playBtn = document.getElementById('play-btn');
        this.prevBtn = document.getElementById('prev-btn');
        this.nextBtn = document.getElementById('next-btn');
        this.volumeBtn = document.getElementById('volume-btn');
        this.volumeSlider = document.getElementById('volume-slider');
        this.musicToggle = document.getElementById('music-toggle');
        this.currentSongElement = document.getElementById('current-song');
        
        this.isPlaying = false;
        this.currentVolume = 0.5;
        this.isMuted = false;
        
        // Birthday playlist
        this.playlist = [
            {
                title: "Happy Birthday - Instrumental",
                src: "assets/music/happy-birthday.mp3",
                artist: "Traditional"
            },
            {
                title: "Perfect - Piano Cover",
                src: "assets/music/perfect-piano.mp3",
                artist: "Ed Sheeran"
            },
            {
                title: "A Thousand Years",
                src: "assets/music/a-thousand-years.mp3",
                artist: "Christina Perri"
            },
            {
                title: "Can't Help Falling In Love",
                src: "assets/music/cant-help-falling.mp3",
                artist: "Elvis Presley"
            },
            {
                title: "You Are The Reason",
                src: "assets/music/you-are-the-reason.mp3",
                artist: "Calum Scott"
            }
        ];
        
        this.currentTrackIndex = 0;
        
        // Sound effects
        this.soundEffects = {
            click: new Audio('assets/sounds/click.mp3'),
            success: new Audio('assets/sounds/success.mp3'),
            heart: new Audio('assets/sounds/heart.mp3'),
            confetti: new Audio('assets/sounds/confetti.mp3')
        };
        
        this.init();
    }
    
    init() {
        this.setupEventListeners();
        this.loadTrack(this.currentTrackIndex);
        this.updateVolumeIcon();
        
        // Preload sound effects
        Object.values(this.soundEffects).forEach(sound => {
            sound.volume = 0.3;
        });
    }
    
    setupEventListeners() {
        // Play/Pause button
        this.playBtn.addEventListener('click', () => this.togglePlay());
        
        // Navigation buttons
        this.prevBtn.addEventListener('click', () => this.prevTrack());
        this.nextBtn.addEventListener('click', () => this.nextTrack());
        
        // Volume control
        this.volumeSlider.addEventListener('input', (e) => this.setVolume(e.target.value / 100));
        this.volumeBtn.addEventListener('click', () => this.toggleMute());
        
        // Music toggle in nav
        this.musicToggle.addEventListener('click', () => this.toggleBackgroundMusic());
        
        // Audio events
        this.audio.addEventListener('ended', () => this.nextTrack());
        this.audio.addEventListener('timeupdate', () => this.updateProgress());
        this.audio.addEventListener('loadedmetadata', () => this.updateSongInfo());
        
        // Keyboard shortcuts
        document.addEventListener('keydown', (e) => this.handleKeyPress(e));
    }
    
    loadTrack(index) {
        if (index < 0) index = this.playlist.length - 1;
        if (index >= this.playlist.length) index = 0;
        
        this.currentTrackIndex = index;
        const track = this.playlist[index];
        
        this.audio.src = track.src;
        this.currentSongElement.textContent = `${track.title} - ${track.artist}`;
        
        if (this.isPlaying) {
            this.audio.play().catch(e => console.log("Autoplay blocked:", e));
        }
    }
    
    togglePlay() {
        this.playSound('click');
        
        if (this.audio.paused) {
            this.play();
        } else {
            this.pause();
        }
    }
    
    play() {
        this.audio.play()
            .then(() => {
                this.isPlaying = true;
                this.updatePlayButton();
            })
            .catch(e => {
                console.log("Play failed:", e);
                // Show play button to user
                this.playBtn.innerHTML = '<i class="fas fa-play"></i>';
                this.playBtn.title = "Click to play music";
            });
    }
    
    pause() {
        this.audio.pause();
        this.isPlaying = false;
        this.updatePlayButton();
    }
    
    updatePlayButton() {
        const icon = this.isPlaying ? 'fa-pause' : 'fa-play';
        this.playBtn.innerHTML = `<i class="fas ${icon}"></i>`;
        this.playBtn.title = this.isPlaying ? "Pause" : "Play";
    }
    
    prevTrack() {
        this.playSound('click');
        this.loadTrack(this.currentTrackIndex - 1);
        if (this.isPlaying) {
            this.audio.play();
        }
    }
    
    nextTrack() {
        this.playSound('click');
        this.loadTrack(this.currentTrackIndex + 1);
        if (this.isPlaying) {
            this.audio.play();
        }
    }
    
    setVolume(volume) {
        this.currentVolume = Math.max(0, Math.min(1, volume));
        this.audio.volume = this.currentVolume;
        
        // Update all sound effects volume
        Object.values(this.soundEffects).forEach(sound => {
            sound.volume = this.currentVolume * 0.3;
        });
        
        this.updateVolumeIcon();
        this.isMuted = false;
    }
    
    toggleMute() {
        this.playSound('click');
        this.isMuted = !this.isMuted;
        
        if (this.isMuted) {
            this.audio.volume = 0;
            this.volumeBtn.innerHTML = '<i class="fas fa-volume-mute"></i>';
        } else {
            this.audio.volume = this.currentVolume;
            this.updateVolumeIcon();
        }
        
        this.volumeSlider.value = this.isMuted ? 0 : this.currentVolume * 100;
    }
    
    updateVolumeIcon() {
        let icon = 'fa-volume-up';
        
        if (this.currentVolume === 0) {
            icon = 'fa-volume-mute';
        } else if (this.currentVolume < 0.5) {
            icon = 'fa-volume-down';
        }
        
        this.volumeBtn.innerHTML = `<i class="fas ${icon}"></i>`;
    }
    
    toggleBackgroundMusic() {
        this.playSound('click');
        
        if (this.isPlaying) {
            this.pause();
            this.musicToggle.innerHTML = '<i class="fas fa-play"></i>';
        } else {
            this.play();
            this.musicToggle.innerHTML = '<i class="fas fa-pause"></i>';
        }
    }
    
    updateProgress() {
        // This function can be expanded to show progress bar
        // Currently handled by HTML5 audio element
    }
    
    updateSongInfo() {
        // Update duration and other info if needed
    }
    
    playSound(effectName) {
        if (this.soundEffects[effectName]) {
            const sound = this.soundEffects[effectName].cloneNode();
            sound.volume = this.currentVolume * 0.3;
            sound.play().catch(e => console.log("Sound effect failed:", e));
        }
    }
    
    playBirthdayFanfare() {
        // Special birthday fanfare
        const fanfare = new Audio('assets/sounds/birthday-fanfare.mp3');
        fanfare.volume = this.currentVolume;
        fanfare.play().catch(e => console.log("Fanfare failed:", e));
        
        // Visual effects
        if (window.createBirthdayEffect) {
            window.createBirthdayEffect('hearts');
        }
    }
    
    handleKeyPress(event) {
        // Space bar toggles play/pause
        if (event.code === 'Space' && !event.target.matches('input, textarea')) {
            event.preventDefault();
            this.togglePlay();
        }
        
        // Left/Right arrows for track navigation
        if (event.code === 'ArrowLeft') {
            this.prevTrack();
        } else if (event.code === 'ArrowRight') {
            this.nextTrack();
        }
        
        // Up/Down arrows for volume
        if (event.code === 'ArrowUp') {
            event.preventDefault();
            this.setVolume(Math.min(1, this.currentVolume + 0.1));
            this.volumeSlider.value = this.currentVolume * 100;
        } else if (event.code === 'ArrowDown') {
            event.preventDefault();
            this.setVolume(Math.max(0, this.currentVolume - 0.1));
            this.volumeSlider.value = this.currentVolume * 100;
        }
        
        // M key toggles mute
        if (event.code === 'KeyM') {
            this.toggleMute();
        }
    }
    
    // Public methods
    playHeartSound() {
        this.playSound('heart');
    }
    
    playConfettiSound() {
        this.playSound('confetti');
    }
    
    playSuccessSound() {
        this.playSound('success');
    }
    
    // Get current playlist
    getPlaylist() {
        return this.playlist;
    }
    
    // Get current track
    getCurrentTrack() {
        return this.playlist[this.currentTrackIndex];
    }
    
    // Clean up
    destroy() {
        this.audio.pause();
        this.audio.src = '';
        
        Object.values(this.soundEffects).forEach(sound => {
            sound.pause();
            sound.src = '';
        });
    }
}

// Initialize audio player when page loads
function initAudioPlayer() {
    window.audioPlayer = new AudioPlayer();
    return window.audioPlayer;
}

// Global functions
function playBirthdayMusic() {
    if (window.audioPlayer) {
        window.audioPlayer.play();
        window.audioPlayer.playBirthdayFanfare();
    }
}

function pauseBirthdayMusic() {
    if (window.audioPlayer) {
        window.audioPlayer.pause();
    }
}

function toggleMusic() {
    if (window.audioPlayer) {
        window.audioPlayer.togglePlay();
    }
}

// Export for global use
window.initAudioPlayer = initAudioPlayer;
window.playBirthdayMusic = playBirthdayMusic;
window.pauseBirthdayMusic = pauseBirthdayMusic;
window.toggleMusic = toggleMusic;