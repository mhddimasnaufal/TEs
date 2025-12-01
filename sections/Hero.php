<section id="hero" class="position-relative">
    <!-- 3D Canvas -->
    <div id="threejs-container"></div>
    
    <!-- Floating Hearts -->
    <div class="floating-hearts"></div>
    
    <!-- Hero Content -->
    <div class="container hero-content">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <h1 class="birthday-title mb-4">
                    Happy Birthday, Naila Nazla Pohan 🎉💗
                </h1>
                
                <div class="subtitle mb-5">
                    <p class="lead">Merayakan hari spesial untuk wanita paling istimewa</p>
                </div>
                
                <div class="d-flex flex-wrap justify-content-center gap-3 mb-5">
                    <div class="info-badge">
                        <i class="fas fa-cake-candles me-2"></i>
                        <span class="fw-bold">19 Tahun</span>
                    </div>
                    
                    <div class="info-badge">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        <span class="fw-bold">Medan, 02 Desember 2006</span>
                    </div>
                    
                    <div class="info-badge">
                        <i class="fas fa-star me-2"></i>
                        <span class="fw-bold">Zodiak: Sagittarius</span>
                    </div>
                </div>
                
                <div class="mt-5">
                    <a href="#about" class="btn btn-primary btn-lg px-5 py-3 rounded-pill">
                        <i class="fas fa-heart me-2"></i>
                        Jelajahi Keistimewaanmu
                    </a>
                    
                    <button onclick="createConfetti()" class="btn btn-outline-primary btn-lg px-5 py-3 rounded-pill ms-3">
                        <i class="fas fa-gift me-2"></i>
                        Klik untuk Konfeti!
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <div class="mouse">
            <div class="wheel"></div>
        </div>
        <div class="arrow">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</section>

<style>
.scroll-indicator {
    position: absolute;
    bottom: 40px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
}

.mouse {
    width: 30px;
    height: 50px;
    border: 2px solid var(--primary-pink);
    border-radius: 20px;
    display: flex;
    justify-content: center;
    margin: 0 auto 10px;
}

.wheel {
    width: 6px;
    height: 10px;
    background: var(--primary-pink);
    border-radius: 3px;
    margin-top: 10px;
    animation: scrollWheel 2s infinite;
}

.arrow {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.arrow span {
    display: block;
    width: 10px;
    height: 10px;
    border-bottom: 2px solid var(--primary-pink);
    border-right: 2px solid var(--primary-pink);
    transform: rotate(45deg);
    margin: -5px;
    animation: arrowDown 2s infinite;
}

.arrow span:nth-child(2) {
    animation-delay: -0.2s;
}

.arrow span:nth-child(3) {
    animation-delay: -0.4s;
}

@keyframes scrollWheel {
    0% {
        opacity: 1;
        transform: translateY(0);
    }
    100% {
        opacity: 0;
        transform: translateY(20px);
    }
}

@keyframes arrowDown {
    0% {
        opacity: 0;
    }
    50% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}
</style>