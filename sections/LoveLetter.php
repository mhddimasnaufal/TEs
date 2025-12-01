<section id="love-letter" class="py-5 position-relative">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Surat Cinta untuk Naila</h2>
            <p class="text-muted">Kata-kata yang berasal dari hati terdalam</p>
        </div>
        
        <div class="love-letter-container glass-card" data-aos="zoom-in">
            <div class="letter-content poetic-text">
                <p class="mb-4" data-aos="fade-right" data-aos-delay="100">
                    Naila yang tersayang,
                </p>
                
                <p class="mb-4" data-aos="fade-left" data-aos-delay="200">
                    Di hari ulang tahunmu yang ke-19 ini, aku ingin mengucapkan selamat dengan sepenuh hati. 
                    Setiap tahun yang berlalu membuatku semakin menyadari betapa beruntungnya aku mengenalmu. 
                    Kamu adalah bunga yang mekar di taman hidupku, memberikan warna dan aroma yang membuat setiap hari menjadi istimewa.
                </p>
                
                <p class="mb-4" data-aos="fade-right" data-aos-delay="300">
                    Senyummu adalah matahari yang menyinari hari-hariku. Tatapan matamu adalah bintang yang menuntunku di malam gelap. 
                    Suaramu adalah melodi indah yang selalu ingin kudengar. Dalam dirimu, aku menemukan kedamaian yang tak terkatakan 
                    dan kebahagiaan yang tak ternilai.
                </p>
                
                <p class="mb-4" data-aos="fade-left" data-aos-delay="400">
                    Di usiamu yang ke-19 ini, aku berharap semua impian dan cita-citamu menjadi kenyataan. 
                    Semoga setiap langkahmu diberkahi, setiap usahamu diberi kemudahan, dan setiap doamu dikabulkan. 
                    Kamu pantas mendapatkan yang terbaik dari kehidupan ini, karena kamu adalah yang terbaik dalam hidupku.
                </p>
                
                <p class="mb-4" data-aos="fade-right" data-aos-delay="500">
                    Terima kasih telah menjadi dirimu yang luar biasa. Terima kasih telah menyinari dunia dengan kebaikan hatimu. 
                    Terima kasih telah menjadi Naila yang selalu membuatku tersenyum. Selamat ulang tahun, sayang. 
                    Semoga tahun ini membawa lebih banyak kebahagiaan, kesuksesan, dan cinta dalam hidupmu.
                </p>
                
                <div class="letter-signature" data-aos="fade-up" data-aos-delay="600">
                    <p>Dengan cinta yang tak terhingga,</p>
                    <p>Untuk selamanya dan seterusnya ❤️</p>
                </div>
            </div>
        </div>
        
        <!-- Floating Hearts around letter -->
        <div class="position-absolute top-50 start-0 translate-middle-y">
            <div class="heart-floating" style="animation-delay: 0s;"></div>
            <div class="heart-floating" style="animation-delay: 1s;"></div>
            <div class="heart-floating" style="animation-delay: 2s;"></div>
        </div>
        
        <div class="position-absolute top-50 end-0 translate-middle-y">
            <div class="heart-floating" style="animation-delay: 0.5s;"></div>
            <div class="heart-floating" style="animation-delay: 1.5s;"></div>
            <div class="heart-floating" style="animation-delay: 2.5s;"></div>
        </div>
    </div>
</section>

<style>
.heart-floating {
    width: 20px;
    height: 20px;
    background: var(--primary-pink);
    transform: rotate(45deg);
    position: relative;
    margin: 20px 0;
    animation: float-heart 4s ease-in-out infinite;
}

.heart-floating:before,
.heart-floating:after {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    background: var(--primary-pink);
    border-radius: 50%;
}

.heart-floating:before {
    top: -10px;
    left: 0;
}

.heart-floating:after {
    top: 0;
    left: -10px;
}

@keyframes float-heart {
    0%, 100% {
        transform: rotate(45deg) translateY(0);
        opacity: 0.7;
    }
    50% {
        transform: rotate(45deg) translateY(-20px);
        opacity: 1;
    }
}
</style>