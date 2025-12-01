<section id="wish-wall" class="py-5">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Wish Wall untuk Naila</h2>
            <p class="text-muted">Ucapan dan doa dari hati ke hati</p>
        </div>
        
        <div class="wish-wall">
            <div class="row">
                <?php
                $wishes = [
                    [
                        'message' => "Semoga di usia 19 tahun ini, Naila semakin cantik, cerdas, dan sukses dalam segala hal! 🌟",
                        'author' => 'Dari teman-teman',
                        'icon' => 'fas fa-users'
                    ],
                    [
                        'message' => "Selamat ulang tahun! Semoga semua impian dan cita-citamu tercapai. Kamu pantas mendapatkan yang terbaik! 💖",
                        'author' => 'Keluarga',
                        'icon' => 'fas fa-home'
                    ],
                    [
                        'message' => "Naila, di hari spesialmu ini, aku berharap kebahagiaan selalu menyertaimu di setiap langkah kehidupanmu. 🌈",
                        'author' => 'Sahabat',
                        'icon' => 'fas fa-heart'
                    ],
                    [
                        'message' => "19 tahun penuh dengan keindahan. Teruslah bersinar seperti bintang di langit malam! ✨",
                        'author' => 'Adik Kelas',
                        'icon' => 'fas fa-star'
                    ],
                    [
                        'message' => "Semoga tahun ini membawa lebih banyak tawa, lebih banyak cinta, dan lebih banyak kebahagiaan untukmu! 😊",
                        'author' => 'Senior',
                        'icon' => 'fas fa-smile'
                    ],
                    [
                        'message' => "Naila, kamu adalah inspirasi bagi banyak orang. Teruslah menjadi dirimu yang luar biasa! 🌸",
                        'author' => 'Guru',
                        'icon' => 'fas fa-graduation-cap'
                    ],
                    [
                        'message' => "Selamat merayakan hari lahir! Semoga setiap harimu dipenuhi dengan cinta dan kedamaian. 🕊️",
                        'author' => 'Tetangga',
                        'icon' => 'fas fa-dove'
                    ],
                    [
                        'message' => "Di usia 19, dunia ada di genggamanmu. Raih semua impianmu dengan penuh semangat! 🚀",
                        'author' => 'Mentor',
                        'icon' => 'fas fa-rocket'
                    ],
                    [
                        'message' => "Naila, kamu adalah berkah bagi orang-orang di sekitarmu. Semoga kamu juga diberkahi selalu. 🙏",
                        'author' => 'Orang Tua',
                        'icon' => 'fas fa-pray'
                    ]
                ];
                
                foreach ($wishes as $index => $wish) {
                    echo '
                    <div class="col-md-4 mb-4" data-aos="flip-up" data-aos-delay="' . ($index * 100) . '">
                        <div class="wish-card glass-card h-100">
                            <div class="wish-icon mb-3">
                                <i class="' . $wish['icon'] . ' fa-2x text-primary"></i>
                            </div>
                            <div class="wish-message mb-4">
                                <p class="mb-0">"' . $wish['message'] . '"</p>
                            </div>
                            <div class="wish-author text-end">
                                <small class="text-muted">
                                    <i class="fas fa-user me-1"></i>
                                    ' . $wish['author'] . '
                                </small>
                            </div>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
        
        <!-- Auto-generating wishes -->
        <div class="text-center mt-5">
            <button id="generateWish" class="btn btn-primary btn-lg">
                <i class="fas fa-magic me-2"></i>Generate Wish Otomatis
            </button>
            <div id="autoWish" class="mt-4"></div>
        </div>
    </div>
</section>

<style>
.wish-card {
    transition: all 0.5s ease;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.wish-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(255, 255, 255, 0.3),
        transparent
    );
    transition: left 0.7s ease;
}

.wish-card:hover::before {
    left: 100%;
}

.wish-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 
        0 20px 40px rgba(255, 107, 139, 0.3),
        0 0 60px rgba(168, 85, 247, 0.2);
}

.wish-icon {
    text-align: center;
}

.wish-icon i {
    background: var(--gradient-primary);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.wish-message {
    font-style: italic;
    line-height: 1.6;
    min-height: 120px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const generateBtn = document.getElementById('generateWish');
    const autoWishDiv = document.getElementById('autoWish');
    
    const wishTemplates = [
        "Semoga hari ini menjadi awal dari tahun yang penuh dengan keajaiban dan kebahagiaan untuk Naila! 🌟",
        "Naila, di usiamu yang ke-19, semoga setiap langkahmu diberkahi dan setiap usahamu membuahkan hasil yang manis! 💝",
        "Selamat ulang tahun untuk wanita yang membuat dunia lebih indah dengan kehadirannya! 🌸",
        "Semoga tahun ini membawamu lebih dekat dengan semua impian dan cita-citamu! ✨",
        "Naila, teruslah bersinar seperti matahari yang menyinari hari-hari kita! ☀️",
        "Di hari spesialmu, aku berharap semua yang terbaik selalu menyertaimu! 🎂",
        "Semoga kebahagiaan, kesehatan, dan kesuksesan selalu menjadi teman setiamu! 💖",
        "Naila, kamu adalah bintang yang paling terang di langit malam! ⭐",
        "Selamat merayakan 19 tahun keindahan, kecerdasan, dan kebaikan! 🎉",
        "Semoga setiap harimu dipenuhi dengan tawa, cinta, dan petualangan yang menyenangkan! 😊"
    ];
    
    const authors = [
        "Dari seseorang yang mengagumimu",
        "Pengagum rahasia",
        "Malaikat penjaga",
        "Bintang kejora",
        "Pelangi setelah hujan",
        "Angin sepoi-sepoi",
        "Matahari pagi",
        "Bulan purnama",
        "Bunga musim semi",
        "Burung berkicau"
    ];
    
    const icons = [
        'fas fa-star',
        'fas fa-heart',
        'fas fa-sun',
        'fas fa-moon',
        'fas fa-feather-alt',
        'fas fa-cloud',
        'fas fa-umbrella',
        'fas fa-tree',
        'fas fa-water',
        'fas fa-mountain'
    ];
    
    if (generateBtn && autoWishDiv) {
        generateBtn.addEventListener('click', function() {
            // Random selection
            const randomMessage = wishTemplates[Math.floor(Math.random() * wishTemplates.length)];
            const randomAuthor = authors[Math.floor(Math.random() * authors.length)];
            const randomIcon = icons[Math.floor(Math.random() * icons.length)];
            
            // Create wish element
            const wishElement = document.createElement('div');
            wishElement.className = 'glass-card p-4';
            wishElement.innerHTML = `
                <div class="d-flex align-items-start">
                    <div class="wish-icon me-3">
                        <i class="${randomIcon} fa-2x text-primary"></i>
                    </div>
                    <div class="flex-grow-1">
                        <p class="mb-2">"${randomMessage}"</p>
                        <small class="text-muted d-block text-end">
                            <i class="fas fa-user me-1"></i>
                            ${randomAuthor}
                        </small>
                    </div>
                </div>
            `;
            
            // Add animation
            wishElement.style.opacity = '0';
            wishElement.style.transform = 'translateY(20px)';
            
            // Clear previous and add new
            autoWishDiv.innerHTML = '';
            autoWishDiv.appendChild(wishElement);
            
            // Animate in
            setTimeout(() => {
                wishElement.style.transition = 'all 0.5s ease';
                wishElement.style.opacity = '1';
                wishElement.style.transform = 'translateY(0)';
            }, 10);
            
            // Add to wish wall
            const wishCard = document.createElement('div');
            wishCard.className = 'col-md-4 mb-4';
            wishCard.setAttribute('data-aos', 'flip-up');
            wishCard.innerHTML = `
                <div class="wish-card glass-card h-100">
                    <div class="wish-icon mb-3">
                        <i class="${randomIcon} fa-2x text-primary"></i>
                    </div>
                    <div class="wish-message mb-4">
                        <p class="mb-0">"${randomMessage}"</p>
                    </div>
                    <div class="wish-author text-end">
                        <small class="text-muted">
                            <i class="fas fa-user me-1"></i>
                            ${randomAuthor}
                        </small>
                    </div>
                </div>
            `;
            
            // Add to grid
            const wishWall = document.querySelector('.wish-wall .row');
            if (wishWall.children.length < 9) { // Limit to 9 wishes
                wishWall.appendChild(wishCard);
                
                // Refresh AOS
                if (typeof AOS !== 'undefined') {
                    AOS.refresh();
                }
            }
        });
    }
    
    // Auto-generate wishes every 30 seconds
    setInterval(() => {
        if (generateBtn && Math.random() > 0.7) { // 30% chance
            generateBtn.click();
        }
    }, 30000);
});
</script>