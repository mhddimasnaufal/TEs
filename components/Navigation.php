<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand nav-brand" href="#hero">
            🎉 Naila's Birthday
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#hero">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">Tentang Naila</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallery">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#love-letter">Surat Cinta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#timeline">Timeline</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#wish-wall">Wish Wall</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="secret.php" target="_blank">
                        <i class="fas fa-lock me-1"></i>Secret
                    </a>
                </li>
            </ul>
            
            <!-- Music Toggle Button -->
            <button id="navMusicToggle" class="btn btn-outline-primary ms-3">
                <i class="fas fa-music"></i>
            </button>
        </div>
    </div>
</nav>

<script>
// Navigation active state
document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-link');
    
    window.addEventListener('scroll', function() {
        let current = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            
            if (scrollY >= (sectionTop - 200)) {
                current = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    });
    
    // Music toggle
    const musicToggle = document.getElementById('navMusicToggle');
    if (musicToggle) {
        musicToggle.addEventListener('click', function() {
            const audio = document.getElementById('bgMusic');
            if (audio.paused) {
                audio.play();
                this.innerHTML = '<i class="fas fa-volume-up"></i>';
            } else {
                audio.pause();
                this.innerHTML = '<i class="fas fa-volume-mute"></i>';
            }
        });
    }
});
</script>