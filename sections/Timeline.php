<section id="timeline" class="py-5 position-relative">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Timeline Cinta Kita</h2>
            <p class="text-muted">Perjalanan indah yang kita lalui bersama</p>
        </div>
        
        <div class="timeline">
            <?php
            $timelineEvents = [
                [
                    'date' => 'Januari 2024',
                    'title' => 'Pertama Kali Bertemu',
                    'description' => 'Mata kita pertama kali bertemu di sebuah acara teman. Saat itu, senyummu langsung mencuri perhatianku.',
                    'icon' => 'fas fa-eye',
                    'color' => 'primary'
                ],
                [
                    'date' => 'Februari 2024',
                    'title' => 'Pertama Kali Chat',
                    'description' => 'Percakapan pertama kita dimulai dengan sapaan sederhana, tapi berlanjut hingga larut malam.',
                    'icon' => 'fas fa-comments',
                    'color' => 'success'
                ],
                [
                    'date' => 'Maret 2024',
                    'title' => 'Nonton Bareng Pertama',
                    'description' => 'Film pertama yang kita tonton bersama adalah film romantis. Kamu tertidur di pundakku di menit ke-30.',
                    'icon' => 'fas fa-film',
                    'color' => 'warning'
                ],
                [
                    'date' => 'April 2024',
                    'title' => 'Jalan-jalan Pertama',
                    'description' => 'Kita menghabiskan hari Minggu dengan jalan-jalan di taman. Itu adalah hari yang cerah dan indah.',
                    'icon' => 'fas fa-walking',
                    'color' => 'info'
                ],
                [
                    'date' => 'Mei 2024',
                    'title' => 'Ulang Tahun Pertama yang Kita Rayakan',
                    'description' => 'Aku ingat bagaimana matamu berbinar saat melihat kue ulang tahun yang aku siapkan.',
                    'icon' => 'fas fa-birthday-cake',
                    'color' => 'danger'
                ],
                [
                    'date' => 'Desember 2024',
                    'title' => 'Natal Pertama Bersama',
                    'description' => 'Kita bertukar hadiah dan menghabiskan malam Natal dengan cerita dan tawa.',
                    'icon' => 'fas fa-gift',
                    'color' => 'success'
                ],
                [
                    'date' => 'Desember 2025',
                    'title' => 'Ulang Tahun ke-19',
                    'description' => 'Hari ini! Website ini dibuat khusus untuk merayakan hari spesialmu.',
                    'icon' => 'fas fa-heart',
                    'color' => 'danger'
                ]
            ];
            
            foreach ($timelineEvents as $index => $event) {
                $animationClass = $index % 2 === 0 ? 'fade-right' : 'fade-left';
                echo '
                <div class="timeline-item" data-aos="' . $animationClass . '">
                    <div class="timeline-content">
                        <div class="timeline-date">
                            <i class="' . $event['icon'] . ' me-2"></i>
                            ' . $event['date'] . '
                        </div>
                        <h4 class="mt-2 mb-3">' . $event['title'] . '</h4>
                        <p class="mb-0">' . $event['description'] . '</p>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
    
    <!-- Background Elements -->
    <div class="timeline-hearts">
        <div class="heart"></div>
        <div class="heart"></div>
        <div class="heart"></div>
    </div>
</section>

<style>
.timeline {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 0;
}

.timeline::after {
    content: '';
    position: absolute;
    width: 6px;
    background: linear-gradient(to bottom, 
        var(--primary-pink) 0%, 
        var(--purple) 50%, 
        var(--primary-pink) 100%);
    top: 0;
    bottom: 0;
    left: 50%;
    margin-left: -3px;
    border-radius: 3px;
}

.timeline-item {
    padding: 10px 40px;
    position: relative;
    width: 50%;
    box-sizing: border-box;
}

.timeline-item:nth-child(odd) {
    left: 0;
}

.timeline-item:nth-child(even) {
    left: 50%;
}

.timeline-content {
    padding: 20px 30px;
    background: white;
    border-radius: 15px;
    box-shadow: var(--shadow-soft);
    position: relative;
    border-left: 4px solid var(--primary-pink);
}

.timeline-item:nth-child(odd) .timeline-content {
    border-left: none;
    border-right: 4px solid var(--primary-pink);
}

.timeline-date {
    font-size: 0.9rem;
    color: var(--purple);
    font-weight: 600;
}

.timeline-hearts {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: -1;
}

.timeline-hearts .heart {
    position: absolute;
    width: 20px;
    height: 20px;
    background: var(--primary-pink);
    transform: rotate(45deg);
    opacity: 0.3;
}

.timeline-hearts .heart:nth-child(1) {
    top: 20%;
    left: 25%;
    animation: float 8s ease-in-out infinite;
}

.timeline-hearts .heart:nth-child(2) {
    top: 50%;
    right: 30%;
    animation: float 6s ease-in-out infinite reverse;
}

.timeline-hearts .heart:nth-child(3) {
    bottom: 20%;
    left: 40%;
    animation: float 10s ease-in-out infinite;
}

.timeline-hearts .heart:before,
.timeline-hearts .heart:after {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    background: var(--primary-pink);
    border-radius: 50%;
}

.timeline-hearts .heart:before {
    top: -10px;
    left: 0;
}

.timeline-hearts .heart:after {
    top: 0;
    left: -10px;
}

@media (max-width: 768px) {
    .timeline::after {
        left: 31px;
    }
    
    .timeline-item {
        width: 100%;
        padding-left: 70px;
        padding-right: 25px;
    }
    
    .timeline-item:nth-child(even) {
        left: 0;
    }
    
    .timeline-content {
        border-left: 4px solid var(--primary-pink);
        border-right: none;
    }
}
</style>