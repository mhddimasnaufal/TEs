    </main>

    <!-- Floating Elements -->
    <div class="floating-hearts"></div>
    <div class="floating-balloons"></div>
    
    <!-- Confetti Container -->
    <div id="confetti-container"></div>
    
    <!-- Audio Player -->
    <div class="audio-player">
        <audio id="birthday-music" loop>
            <source src="assets/music/happy-birthday.mp3" type="audio/mpeg">
            <source src="assets/music/happy-birthday.ogg" type="audio/ogg">
            Your browser does not support the audio element.
        </audio>
        <div class="player-controls">
            <button id="prev-btn" class="player-btn"><i class="fas fa-step-backward"></i></button>
            <button id="play-btn" class="player-btn"><i class="fas fa-play"></i></button>
            <button id="next-btn" class="player-btn"><i class="fas fa-step-forward"></i></button>
            <div class="volume-control">
                <button id="volume-btn" class="player-btn"><i class="fas fa-volume-up"></i></button>
                <input type="range" id="volume-slider" min="0" max="100" value="50">
            </div>
            <div class="playlist-info">
                <span id="current-song">Happy Birthday - Instrumental</span>
            </div>
        </div>
    </div>
    
    <!-- Scroll to Top -->
    <button id="scroll-top" class="scroll-top-btn">
        <i class="fas fa-chevron-up"></i>
    </button>
    
    <!-- Message Modal -->
    <div id="message-modal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <div class="modal-body" id="modal-body">
                <!-- Dynamic content -->
            </div>
        </div>
    </div>

    <!-- JavaScript Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/ScrollTrigger.min.js"></script>
    <script src="assets/js/canvas-effects.js"></script>
    <script src="assets/js/audio-player.js"></script>
    
    <!-- React Components (via CDN for now) -->
    <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    
    <!-- Custom JS -->
    <script type="text/babel" src="assets/js/components/App.jsx"></script>
    <script type="text/babel" src="assets/js/components/Gallery3D.jsx"></script>
    <script type="text/babel" src="assets/js/components/QuizGame.jsx"></script>
    
    <!-- Main Script -->
    <script>
        // Global variables
        let currentSection = 'home';
        let isMusicPlaying = false;
        
        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize loading screen
            setTimeout(() => {
                document.getElementById('loading-screen').style.opacity = '0';
                setTimeout(() => {
                    document.getElementById('loading-screen').style.display = 'none';
                }, 1000);
            }, 2000);
            
            // Initialize audio player
            initAudioPlayer();
            
            // Initialize canvas effects
            initCanvasEffects();
            
            // Initialize navigation
            initNavigation();
            
            // Initialize scroll to top
            initScrollTop();
            
            // Start floating animations
            startFloatingAnimations();
        });
        
        function initNavigation() {
            // Smooth scrolling for anchor links
            $('a[href*="#"]').on('click', function(e) {
                e.preventDefault();
                const target = $(this.hash);
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 80
                    }, 800);
                    
                    // Update active nav link
                    $('.nav-link').removeClass('active');
                    $(this).addClass('active');
                }
            });
            
            // Mobile menu toggle
            $('.nav-toggle').on('click', function() {
                $('.nav-menu').toggleClass('show');
            });
            
            // Update active link on scroll
            $(window).on('scroll', function() {
                const scrollPos = $(window).scrollTop() + 100;
                
                $('section').each(function() {
                    const sectionTop = $(this).offset().top;
                    const sectionBottom = sectionTop + $(this).outerHeight();
                    
                    if (scrollPos >= sectionTop && scrollPos <= sectionBottom) {
                        const id = $(this).attr('id');
                        $('.nav-link').removeClass('active');
                        $(`.nav-link[href="#${id}"]`).addClass('active');
                        currentSection = id;
                    }
                });
            });
        }
        
        function initScrollTop() {
            const scrollBtn = $('#scroll-top');
            
            $(window).on('scroll', function() {
                if ($(this).scrollTop() > 300) {
                    scrollBtn.addClass('show');
                } else {
                    scrollBtn.removeClass('show');
                }
            });
            
            scrollBtn.on('click', function() {
                $('html, body').animate({scrollTop: 0}, 600);
            });
        }
        
        function startFloatingAnimations() {
            // Create floating hearts
            for (let i = 0; i < 20; i++) {
                createFloatingElement('heart');
            }
            
            // Create floating balloons
            for (let i = 0; i < 10; i++) {
                createFloatingElement('balloon');
            }
        }
        
        function createFloatingElement(type) {
            const container = type === 'heart' ? '.floating-hearts' : '.floating-balloons';
            const element = document.createElement('div');
            element.className = `floating-${type}`;
            element.innerHTML = type === 'heart' ? '❤️' : '🎈';
            
            // Random properties
            const size = Math.random() * 30 + 20;
            const left = Math.random() * 100;
            const duration = Math.random() * 20 + 10;
            const delay = Math.random() * 5;
            
            element.style.cssText = `
                font-size: ${size}px;
                left: ${left}%;
                animation-duration: ${duration}s;
                animation-delay: ${delay}s;
                opacity: ${Math.random() * 0.5 + 0.3};
            `;
            
            document.querySelector(container).appendChild(element);
            
            // Remove element after animation completes
            setTimeout(() => {
                element.remove();
                createFloatingElement(type); // Create new one
            }, (duration + delay) * 1000);
        }
        
        // Modal functions
        function openModal(content) {
            $('#modal-body').html(content);
            $('#message-modal').fadeIn();
        }
        
        function closeModal() {
            $('#message-modal').fadeOut();
        }
        
        // Close modal on click outside
        $(document).on('click', function(e) {
            if ($(e.target).hasClass('modal')) {
                closeModal();
            }
        });
        
        $('.close-modal').on('click', closeModal);
        
        // Utility function for showing messages
        function showMessage(title, content, type = 'info') {
            const icon = type === 'success' ? '✅' : type === 'error' ? '❌' : '💌';
            openModal(`
                <div class="message-popup ${type}">
                    <div class="message-icon">${icon}</div>
                    <h3>${title}</h3>
                    <div class="message-content">${content}</div>
                </div>
            `);
        }
        
        // Birthday countdown (if today is the birthday)
        function updateBirthdayCountdown() {
            const birthday = new Date('2024-08-15'); // Replace with actual birthday
            const today = new Date();
            const nextBirthday = new Date(today.getFullYear(), birthday.getMonth(), birthday.getDate());
            
            if (today > nextBirthday) {
                nextBirthday.setFullYear(nextBirthday.getFullYear() + 1);
            }
            
            const diff = nextBirthday - today;
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            
            if (days === 0) {
                // It's the birthday today!
                showConfetti();
                playBirthdayMusic();
            }
        }
        
        function showConfetti() {
            const confettiContainer = document.getElementById('confetti-container');
            const colors = ['#ff6b6b', '#4ecdc4', '#ffe66d', '#ff9a76', '#a8e6cf'];
            
            for (let i = 0; i < 150; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.cssText = `
                    position: absolute;
                    width: ${Math.random() * 10 + 5}px;
                    height: ${Math.random() * 10 + 5}px;
                    background: ${colors[Math.floor(Math.random() * colors.length)]};
                    top: -20px;
                    left: ${Math.random() * 100}%;
                    animation: fall ${Math.random() * 3 + 2}s linear forwards;
                    border-radius: ${Math.random() > 0.5 ? '50%' : '0'};
                `;
                
                confettiContainer.appendChild(confetti);
                
                setTimeout(() => {
                    confetti.remove();
                }, 5000);
            }
        }
        
        function playBirthdayMusic() {
            const music = document.getElementById('birthday-music');
            music.play().catch(e => console.log("Autoplay blocked:", e));
            isMusicPlaying = true;
            $('#music-toggle i').removeClass('fa-play').addClass('fa-pause');
        }
    </script>
</body>
</html>