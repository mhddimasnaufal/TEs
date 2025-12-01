<section id="about" class="py-5">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Tentang Naila Nazla Pohan</h2>
            <p class="text-muted">Mengenal lebih dekat wanita istimewa ini</p>
        </div>
        
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-image position-relative">
                    <div class="image-frame">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=600&h=600&fit=crop" 
                             alt="Naila Nazla Pohan" class="img-fluid rounded-circle">
                    </div>
                    <div class="floating-icons">
                        <div class="icon-heart"><i class="fas fa-heart"></i></div>
                        <div class="icon-star"><i class="fas fa-star"></i></div>
                        <div class="icon-music"><i class="fas fa-music"></i></div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <div class="glass-card p-4">
                    <h3 class="mb-4">💖 Profil Naila</h3>
                    
                    <div class="about-info mb-4">
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon me-3">
                                <i class="fas fa-user-circle text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Nama Lengkap</h5>
                                <p class="mb-0">Naila Nazla Pohan</p>
                            </div>
                        </div>
                        
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon me-3">
                                <i class="fas fa-birthday-cake text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Usia</h5>
                                <p class="mb-0">19 Tahun (02 Desember 2006)</p>
                            </div>
                        </div>
                        
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon me-3">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Tempat Lahir</h5>
                                <p class="mb-0">Medan, Sumatera Utara</p>
                            </div>
                        </div>
                        
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon me-3">
                                <i class="fas fa-sun text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Zodiak</h5>
                                <p class="mb-0">Sagitarius (22 Nov - 21 Des)</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="about-description">
                        <h4 class="mb-3">Siapa Naila?</h4>
                        <p class="mb-3">
                            Naila Nazla Pohan adalah wanita cantik yang lahir di Medan pada 2 Desember 2006. 
                            Dengan kepribadian Sagitarius yang optimis dan bersemangat, Naila selalu membawa 
                            keceriaan dan energi positif ke mana pun dia pergi.
                        </p>
                        <p class="mb-3">
                            Dia dikenal dengan senyumannya yang menawan, hati yang baik, dan kepeduliannya 
                            terhadap orang lain. Naila adalah sosok yang inspiratif, cerdas, dan penuh dengan 
                            impian besar untuk masa depannya.
                        </p>
                        <p>
                            Di usianya yang ke-19, Naila terus berkembang menjadi pribadi yang lebih baik 
                            setiap harinya, siap menyambut dunia dengan segala keajaiban yang ditawarkannya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Personality Traits -->
        <div class="row mt-5">
            <div class="col-12" data-aos="fade-up">
                <h3 class="text-center mb-4">✨ Ciri Khas Naila</h3>
                <div class="row">
                    <?php
                    $traits = [
                        ['icon' => 'fas fa-smile', 'title' => 'Senyuman Menawan', 'desc' => 'Senyumannya bisa menerangi ruangan'],
                        ['icon' => 'fas fa-heart', 'title' => 'Hati yang Baik', 'desc' => 'Selalu peduli dengan orang lain'],
                        ['icon' => 'fas fa-brain', 'title' => 'Kecerdasan', 'desc' => 'Pemikiran yang tajam dan kreatif'],
                        ['icon' => 'fas fa-music', 'title' => 'Musikal', 'desc' => 'Memiliki selera musik yang baik'],
                        ['icon' => 'fas fa-compass', 'title' => 'Petualang', 'desc' => 'Suka menjelajah hal baru'],
                        ['icon' => 'fas fa-sun', 'title' => 'Optimis', 'desc' => 'Selalu melihat sisi positif']
                    ];
                    
                    foreach ($traits as $trait) {
                        echo '
                        <div class="col-md-4 mb-4" data-aos="zoom-in">
                            <div class="trait-card text-center p-4 glass-card">
                                <div class="trait-icon mb-3">
                                    <i class="' . $trait['icon'] . ' fa-3x text-primary"></i>
                                </div>
                                <h5>' . $trait['title'] . '</h5>
                                <p class="mb-0">' . $trait['desc'] . '</p>
                            </div>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.about-image .image-frame {
    position: relative;
    padding: 20px;
    background: var(--gradient-primary);
    border-radius: 50%;
    display: inline-block;
}

.about-image img {
    width: 300px;
    height: 300px;
    object-fit: cover;
    border: 5px solid white;
    box-shadow: var(--shadow-hard);
}

.floating-icons {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.icon-heart, .icon-star, .icon-music {
    position: absolute;
    font-size: 24px;
    color: var(--primary-pink);
    animation: floatAround 6s ease-in-out infinite;
}

.icon-heart {
    top: 10%;
    left: 10%;
    animation-delay: 0s;
}

.icon-star {
    top: 20%;
    right: 15%;
    animation-delay: 2s;
}

.icon-music {
    bottom: 20%;
    left: 15%;
    animation-delay: 4s;
}

.trait-card {
    transition: var(--transition-medium);
    height: 100%;
}

.trait-card:hover {
    transform: translateY(-10px) scale(1.05);
}

.trait-icon i {
    background: var(--gradient-primary);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

@keyframes floatAround {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    50% {
        transform: translateY(-20px) rotate(10deg);
    }
}
</style>