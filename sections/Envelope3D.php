<section id="envelope" class="section envelope-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-envelope-open-text"></i>
                Surat Untuk Naila
            </h2>
            <p class="section-subtitle">
                Buka amplop spesial ini untuk membaca pesan rahasia
            </p>
        </div>
        
        <div class="envelope-container">
            <div class="envelope-3d" id="envelope-3d">
                <!-- Front of envelope -->
                <div class="envelope-front">
                    <div class="envelope-flap"></div>
                    <div class="envelope-body">
                        <div class="envelope-address">
                            <div class="stamp">
                                <span class="stamp-text">LOVE</span>
                                <div class="stamp-design">❤️</div>
                            </div>
                            <div class="address-text">
                                <h3>Untuk: Naila Nazla Pohan</h3>
                                <p>Dari: Yang Selalu Menyayangimu</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Back of envelope (hidden) -->
                <div class="envelope-back">
                    <div class="seal" id="envelope-seal">
                        <div class="seal-icon">💝</div>
                        <div class="seal-text">Click to Open</div>
                    </div>
                </div>
                
                <!-- Letter inside -->
                <div class="letter" id="birthday-letter">
                    <div class="letter-content">
                        <div class="letter-header">
                            <div class="letter-date"><?php echo date('d F Y'); ?></div>
                            <div class="letter-heart">💌</div>
                        </div>
                        
                        <div class="letter-body">
                            <h3 class="letter-greeting">My Dearest Naila,</h3>
                            
                            <div class="letter-text">
                                <p>Di hari yang spesial ini, aku ingin mengucapkan <strong>Selamat Ulang Tahun</strong> yang ke-<?php echo date('Y') - 2000; ?> untukmu! 🎉</p>
                                
                                <p>Setiap tahun bersamamu adalah anugerah terindah. Kamu membawa begitu banyak kebahagiaan, cinta, dan kehangatan dalam hidupku. Melihatmu tersenyum adalah salah satu hal favoritku di dunia ini.</p>
                                
                                <p>Kamu adalah:</p>
                                <ul class="letter-list">
                                    <li><i class="fas fa-star"></i> Cahaya di hari-hariku yang gelap</li>
                                    <li><i class="fas fa-heart"></i> Alasan tersenyum setiap hari</li>
                                    <li><i class="fas fa-music"></i> Melodi indah dalam hidupku</li>
                                    <li><i class="fas fa-sun"></i> Sinar matahari yang menghangatkan</li>
                                </ul>
                                
                                <p>Aku berharap tahun ini membawa semua kebahagiaan dan impian yang kamu inginkan. Semoga setiap hari dipenuhi dengan tawa, petualangan, dan cinta tanpa batas.</p>
                                
                                <p>Terima kasih sudah menjadi dirimu yang luar biasa. Dunia ini lebih indah dengan kehadiranmu.</p>
                                
                                <div class="letter-closing">
                                    <p>Dengan semua cintaku,</p>
                                    <div class="signature">
                                        <div class="signature-line"></div>
                                        <p class="signature-name">Yang Selalu Menyayangimu</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="letter-footer">
                            <div class="letter-ps">
                                <strong>P.S.</strong> Ada banyak kejutan lainnya untukmu di website ini!
                            </div>
                            <button class="close-letter-btn" id="close-letter">
                                <i class="fas fa-times"></i> Tutup Surat
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="envelope-instructions">
                <p><i class="fas fa-mouse-pointer"></i> Klik segel untuk membuka surat</p>
                <p><i class="fas fa-arrows-alt"></i> Seret untuk melihat dari berbagai sudut</p>
            </div>
        </div>
        
        <div class="extra-messages">
            <div class="message-cards">
                <div class="message-card" data-message="1">
                    <div class="message-card-icon">💕</div>
                    <h4>Pesan Cinta</h4>
                    <p>Klik untuk pesan spesial</p>
                </div>
                
                <div class="message-card" data-message="2">
                    <div class="message-card-icon">🎂</div>
                    <h4>Harapan Ulang Tahun</h4>
                    <p>Doa-doa terbaik untukmu</p>
                </div>
                
                <div class="message-card" data-message="3">
                    <div class="message-card-icon">✨</div>
                    <h4>Kenangan Indah</h4>
                    <p>Momen spesial kita</p>
                </div>
                
                <div class="message-card" data-message="4">
                    <div class="message-card-icon">🌹</div>
                    <h4>Janji</h4>
                    <p>Untuk masa depan kita</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// 3D Envelope Interaction
document.addEventListener('DOMContentLoaded', function() {
    const envelope = document.getElementById('envelope-3d');
    const seal = document.getElementById('envelope-seal');
    const letter = document.getElementById('birthday-letter');
    const closeBtn = document.getElementById('close-letter');
    const messageCards = document.querySelectorAll('.message-card');
    
    let isOpen = false;
    let rotationX = 0;
    let rotationY = 0;
    let isDragging = false;
    let startX, startY;
    
    // Open envelope on seal click
    seal.addEventListener('click', function(e) {
        e.stopPropagation();
        if (!isOpen) {
            openEnvelope();
        }
    });
    
    // Close letter
    closeBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        closeEnvelope();
    });
    
    function openEnvelope() {
        isOpen = true;
        envelope.classList.add('open');
        letter.classList.add('open');
        
        // Play sound
        if (window.audioPlayer) {
            window.audioPlayer.playSound('success');
        }
        
        // Show confetti
        showMiniConfetti();
    }
    
    function closeEnvelope() {
        isOpen = false;
        envelope.classList.remove('open');
        letter.classList.remove('open');
    }
    
    // 3D Rotation with mouse drag
    envelope.addEventListener('mousedown', startDrag);
    envelope.addEventListener('touchstart', startDrag);
    
    function startDrag(e) {
        isDragging = true;
        const clientX = e.type.includes('mouse') ? e.clientX : e.touches[0].clientX;
        const clientY = e.type.includes('mouse') ? e.clientY : e.touches[0].clientY;
        
        startX = clientX - rotationY;
        startY = clientY - rotationX;
        
        document.addEventListener('mousemove', drag);
        document.addEventListener('touchmove', drag);
        document.addEventListener('mouseup', stopDrag);
        document.addEventListener('touchend', stopDrag);
    }
    
    function drag(e) {
        if (!isDragging) return;
        
        e.preventDefault();
        const clientX = e.type.includes('mouse') ? e.clientX : e.touches[0].clientX;
        const clientY = e.type.includes('mouse') ? e.clientY : e.touches[0].clientY;
        
        rotationY = clientX - startX;
        rotationX = clientY - startY;
        
        // Limit rotation
        rotationX = Math.max(-30, Math.min(30, rotationX));
        rotationY = Math.max(-30, Math.min(30, rotationY));
        
        updateEnvelopeRotation();
    }
    
    function stopDrag() {
        isDragging = false;
        document.removeEventListener('mousemove', drag);
        document.removeEventListener('touchmove', drag);
        
        // Slowly return to original position
        const returnAnimation = setInterval(() => {
            rotationX *= 0.95;
            rotationY *= 0.95;
            
            if (Math.abs(rotationX) < 0.5 && Math.abs(rotationY) < 0.5) {
                rotationX = 0;
                rotationY = 0;
                clearInterval(returnAnimation);
            }
            
            updateEnvelopeRotation();
        }, 16);
    }
    
    function updateEnvelopeRotation() {
        envelope.style.transform = `
            perspective(1000px)
            rotateX(${rotationX}deg)
            rotateY(${rotationY}deg)
            ${isOpen ? 'translateZ(100px)' : ''}
        `;
    }
    
    // Message cards
    messageCards.forEach(card => {
        card.addEventListener('click', function() {
            const messageId = this.dataset.message;
            showMessageCard(messageId);
            
            // Play sound
            if (window.audioPlayer) {
                window.audioPlayer.playHeartSound();
            }
        });
    });
    
    function showMessageCard(id) {
        const messages = {
            1: {
                title: "Pesan Cinta 💕",
                content: `
                    <p>Naila, cintaku padamu tumbuh lebih kuat setiap hari. Kamu membuatku menjadi versi terbaik dari diriku sendiri.</p>
                    <p>"Aku mencintaimu bukan hanya karena siapa dirimu, tapi karena siapa diriku ketika bersamamu."</p>
                    <div class="message-heart">❤️</div>
                `
            },
            2: {
                title: "Harapan Ulang Tahun 🎂",
                content: `
                    <p>Di ulang tahunmu ini, aku berharap:</p>
                    <ul>
                        <li>Semoga semua impianmu terkabul</li>
                        <li>Semoga kesehatan selalu menyertaimu</li>
                        <li>Semoga kebahagiaan tak pernah berhenti</li>
                        <li>Semoga cinta mengelilingimu setiap hari</li>
                    </ul>
                    <p>Cheers to another amazing year! 🥂</p>
                `
            },
            3: {
                title: "Kenangan Indah ✨",
                content: `
                    <p>Beberapa momen favoritku bersamamu:</p>
                    <div class="memories-grid">
                        <div class="memory">Tertawa sampai perut sakit</div>
                        <div class="memory">Percakapan larut malam</div>
                        <div class="memory">Petualangan spontan kita</div>
                        <div class="memory">Momen tenang bersama</div>
                    </div>
                    <p>Setiap kenangan bersamamu adalah harta berharga.</p>
                `
            },
            4: {
                title: "Janji untuk Masa Depan 🌹",
                content: `
                    <p>Aku berjanji untuk:</p>
                    <ul>
                        <li>Selalu mendukung impianmu</li>
                        <li>Menjadi tempat ternyaman bagimu</li>
                        <li>Membuatmu tersenyum setiap hari</li>
                        <li>Mencintaimu lebih dalam setiap waktu</li>
                    </ul>
                    <p>Bersamamu, masa depan terasa begitu cerah.</p>
                `
            }
        };
        
        const message = messages[id];
        if (message) {
            openModal(`
                <div class="message-popup">
                    <div class="message-icon">${message.title.split(' ').pop()}</div>
                    <h3>${message.title}</h3>
                    <div class="message-content">${message.content}</div>
                    <button class="close-popup-btn" onclick="closeModal()">
                        <i class="fas fa-heart"></i> Terima Kasih
                    </button>
                </div>
            `);
        }
    }
    
    function showMiniConfetti() {
        const colors = ['#ff6b6b', '#4ecdc4', '#ffe66d'];
        const envelopeRect = envelope.getBoundingClientRect();
        
        for (let i = 0; i < 50; i++) {
            const confetti = document.createElement('div');
            confetti.className = 'mini-confetti';
            confetti.style.cssText = `
                position: fixed;
                width: ${Math.random() * 8 + 4}px;
                height: ${Math.random() * 8 + 4}px;
                background: ${colors[Math.floor(Math.random() * colors.length)]};
                top: ${envelopeRect.top + envelopeRect.height / 2}px;
                left: ${envelopeRect.left + envelopeRect.width / 2}px;
                border-radius: ${Math.random() > 0.5 ? '50%' : '0'};
                pointer-events: none;
                z-index: 1000;
            `;
            
            document.body.appendChild(confetti);
            
            // Animate
            const animation = confetti.animate([
                {
                    transform: 'translate(0, 0) rotate(0deg)',
                    opacity: 1
                },
                {
                    transform: `translate(${Math.random() * 200 - 100}px, ${Math.random() * 200 - 100}px) rotate(${Math.random() * 360}deg)`,
                    opacity: 0
                }
            ], {
                duration: 1000 + Math.random() * 1000,
                easing: 'cubic-bezier(0.215, 0.61, 0.355, 1)'
            });
            
            animation.onfinish = () => confetti.remove();
        }
    }
    
    // Auto-rotate when not interacting
    let autoRotate = true;
    
    function autoRotateEnvelope() {
        if (!isDragging && !isOpen && autoRotate) {
            rotationY += 0.1;
            updateEnvelopeRotation();
        }
        requestAnimationFrame(autoRotateEnvelope);
    }
    
    autoRotateEnvelope();
    
    // Stop auto-rotate on hover
    envelope.addEventListener('mouseenter', () => autoRotate = false);
    envelope.addEventListener('mouseleave', () => autoRotate = true);
});
</script>

<style>
.envelope-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    position: relative;
    overflow: hidden;
}

.envelope-container {
    position: relative;
    height: 500px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    perspective: 1000px;
}

.envelope-3d {
    width: 300px;
    height: 200px;
    position: relative;
    transform-style: preserve-3d;
    transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.envelope-front,
.envelope-back,
.letter {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    border-radius: 10px;
}

.envelope-front {
    background: linear-gradient(45deg, #ff6b6b, #ff8e8e);
    transform: translateZ(1px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.envelope-flap {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 50%;
    background: #ff5252;
    clip-path: polygon(0 0, 50% 100%, 100% 0);
    border-radius: 10px 10px 0 0;
}

.envelope-body {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 60%;
    background: #ff7b7b;
    border-radius: 0 0 10px 10px;
}

.envelope-address {
    padding: 20px;
    text-align: center;
    color: white;
}

.stamp {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 60px;
    height: 60px;
    background: white;
    border-radius: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    transform: rotate(15deg);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.stamp-text {
    font-size: 10px;
    font-weight: bold;
    color: #ff6b6b;
}

.stamp-design {
    font-size: 20px;
}

.address-text h3 {
    margin: 0;
    font-size: 1.2rem;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}

.address-text p {
    margin: 5px 0 0;
    opacity: 0.9;
}

.envelope-back {
    background: linear-gradient(45deg, #ff5252, #ff7b7b);
    transform: rotateY(180deg) translateZ(1px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
}

.seal {
    width: 80px;
    height: 80px;
    background: white;
    border-radius: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    animation: pulse 2s infinite;
}

.seal:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
}

.seal-icon {
    font-size: 30px;
}

.seal-text {
    font-size: 10px;
    font-weight: bold;
    color: #ff6b6b;
    margin-top: 5px;
}

.letter {
    background: #fff8e1;
    color: #5d4037;
    padding: 20px;
    transform: rotateY(180deg) translateZ(-1px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
    opacity: 0;
    transition: opacity 0.5s ease, transform 0.5s ease;
    overflow-y: auto;
    display: none;
}

.letter.open {
    opacity: 1;
    transform: rotateY(0) translateZ(50px);
    display: block;
}

.letter-content {
    height: 100%;
}

.letter-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 2px solid #ffcc80;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.letter-date {
    font-style: italic;
    color: #8d6e63;
}

.letter-heart {
    font-size: 24px;
}

.letter-greeting {
    color: #d84315;
    margin-bottom: 20px;
}

.letter-text {
    line-height: 1.6;
}

.letter-list {
    margin: 15px 0;
    padding-left: 20px;
}

.letter-list li {
    margin: 8px 0;
    display: flex;
    align-items: center;
}

.letter-list i {
    color: #ff6b6b;
    margin-right: 10px;
}

.letter-closing {
    margin-top: 30px;
    text-align: right;
}

.signature {
    margin-top: 20px;
    display: inline-block;
}

.signature-line {
    width: 150px;
    height: 2px;
    background: #5d4037;
    margin-bottom: 5px;
}

.signature-name {
    font-family: 'Dancing Script', cursive;
    font-size: 1.4rem;
    font-weight: bold;
}

.letter-footer {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px dashed #ffcc80;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.letter-ps {
    font-size: 0.9rem;
    color: #8d6e63;
}

.close-letter-btn {
    background: #ff6b6b;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 20px;
    cursor: pointer;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.close-letter-btn:hover {
    background: #ff5252;
    transform: translateY(-2px);
}

.envelope-instructions {
    margin-top: 30px;
    text-align: center;
    color: rgba(255, 255, 255, 0.8);
}

.envelope-instructions p {
    margin: 5px 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.extra-messages {
    margin-top: 50px;
}

.message-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-top: 30px;
}

.message-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.message-card:hover {
    transform: translateY(-10px);
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

.message-card-icon {
    font-size: 40px;
    margin-bottom: 15px;
}

.message-card h4 {
    margin: 10px 0;
    color: white;
}

.message-card p {
    font-size: 0.9rem;
    opacity: 0.8;
}

.mini-confetti {
    position: absolute;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

@media (max-width: 768px) {
    .envelope-3d {
        transform: scale(0.8);
    }
    
    .letter {
        padding: 15px;
    }
    
    .message-cards {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .envelope-3d {
        transform: scale(0.6);
    }
    
    .message-cards {
        grid-template-columns: 1fr;
    }
}
</style>