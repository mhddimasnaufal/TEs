// Main JavaScript File

// Smooth Scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Navbar Background on Scroll
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 100) {
        navbar.style.background = 'rgba(255, 255, 255, 0.98)';
        navbar.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.1)';
    } else {
        navbar.style.background = 'rgba(255, 255, 255, 0.95)';
        navbar.style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.1)';
    }
});

// Initialize Tooltips
const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

// Modal Gallery
const galleryItems = document.querySelectorAll('.gallery-item');
const modal = document.getElementById('galleryModal');
const modalImage = document.getElementById('modalImage');

if (modal && modalImage) {
    galleryItems.forEach(item => {
        item.addEventListener('click', function() {
            const imgSrc = this.querySelector('img').src;
            modalImage.src = imgSrc;
            const modalInstance = new bootstrap.Modal(modal);
            modalInstance.show();
        });
    });
}

// Heartbeat Animation
function createHeartbeat() {
    const heartbeat = document.createElement('div');
    heartbeat.className = 'heartbeat';
    heartbeat.style.position = 'fixed';
    heartbeat.style.bottom = '20px';
    heartbeat.style.right = '20px';
    heartbeat.style.width = '60px';
    heartbeat.style.height = '60px';
    heartbeat.style.background = 'var(--gradient-primary)';
    heartbeat.style.borderRadius = '50%';
    heartbeat.style.zIndex = '1000';
    heartbeat.style.cursor = 'pointer';
    heartbeat.style.display = 'flex';
    heartbeat.style.alignItems = 'center';
    heartbeat.style.justifyContent = 'center';
    heartbeat.style.fontSize = '24px';
    heartbeat.style.color = 'white';
    heartbeat.innerHTML = '❤️';
    heartbeat.style.animation = 'heartbeat 1.5s ease-in-out infinite, pulse-glow 2s ease-in-out infinite';
    
    heartbeat.addEventListener('click', function() {
        const audio = document.getElementById('bgMusic');
        if (audio.paused) {
            audio.play();
            this.innerHTML = '❤️';
        } else {
            audio.pause();
            this.innerHTML = '💔';
        }
    });
    
    document.body.appendChild(heartbeat);
}

// Falling Petals Animation
function initPetalsAnimation() {
    const canvas = document.getElementById('petals-canvas');
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    
    const particles = [];
    const particleCount = 150;
    const colors = [
        'rgba(255, 182, 193, 0.8)',  // Light pink
        'rgba(255, 105, 180, 0.8)',  // Hot pink
        'rgba(255, 192, 203, 0.8)',  // Pink
        'rgba(255, 182, 193, 0.8)',  // Light pink
        'rgba(255, 105, 180, 0.6)',  // Hot pink
        'rgba(216, 180, 254, 0.6)',  // Light purple
        'rgba(255, 255, 255, 0.8)'   // White
    ];
    
    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height - canvas.height;
            this.size = Math.random() * 10 + 5;
            this.speedX = Math.random() * 3 - 1.5;
            this.speedY = Math.random() * 3 + 1;
            this.color = colors[Math.floor(Math.random() * colors.length)];
            this.rotation = Math.random() * 360;
            this.rotationSpeed = Math.random() * 2 - 1;
            this.wobble = Math.random() * 2;
        }
        
        update() {
            this.x += this.speedX + Math.sin(this.y * 0.01) * this.wobble;
            this.y += this.speedY;
            this.rotation += this.rotationSpeed;
            
            if (this.y > canvas.height) {
                this.y = 0;
                this.x = Math.random() * canvas.width;
            }
            if (this.x > canvas.width) this.x = 0;
            if (this.x < 0) this.x = canvas.width;
        }
        
        draw() {
            ctx.save();
            ctx.translate(this.x, this.y);
            ctx.rotate(this.rotation * Math.PI / 180);
            ctx.fillStyle = this.color;
            ctx.beginPath();
            
            // Draw petal shape
            for (let i = 0; i < 5; i++) {
                const angle = (i * 72 * Math.PI) / 180;
                const x = Math.cos(angle) * this.size;
                const y = Math.sin(angle) * this.size;
                if (i === 0) ctx.moveTo(x, y);
                else ctx.lineTo(x, y);
            }
            
            ctx.closePath();
            ctx.fill();
            ctx.restore();
        }
    }
    
    function init() {
        for (let i = 0; i < particleCount; i++) {
            particles.push(new Particle());
        }
    }
    
    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach(particle => {
            particle.update();
            particle.draw();
        });
        requestAnimationFrame(animate);
    }
    
    window.addEventListener('resize', function() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });
    
    init();
    animate();
}

// Typewriter Effect
function typeWriter(element, text, speed = 50) {
    let i = 0;
    element.innerHTML = '';
    
    function type() {
        if (i < text.length) {
            element.innerHTML += text.charAt(i);
            i++;
            setTimeout(type, speed);
        }
    }
    
    type();
}

// Parallax Effect
function initParallax() {
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.parallax');
        
        parallaxElements.forEach(element => {
            const rate = element.getAttribute('data-rate') || 0.5;
            element.style.transform = `translateY(${scrolled * rate}px)`;
        });
    });
}

// Confetti Animation
function createConfetti() {
    const confettiCount = 200;
    const confettiContainer = document.createElement('div');
    confettiContainer.style.position = 'fixed';
    confettiContainer.style.top = '0';
    confettiContainer.style.left = '0';
    confettiContainer.style.width = '100%';
    confettiContainer.style.height = '100%';
    confettiContainer.style.pointerEvents = 'none';
    confettiContainer.style.zIndex = '9999';
    
    for (let i = 0; i < confettiCount; i++) {
        const confetti = document.createElement('div');
        confetti.style.position = 'absolute';
        confetti.style.width = Math.random() * 10 + 5 + 'px';
        confetti.style.height = Math.random() * 10 + 5 + 'px';
        confetti.style.background = [
            'var(--primary-pink)',
            'var(--purple)',
            'var(--light-pink)',
            'var(--light-purple)',
            '#ffffff'
        ][Math.floor(Math.random() * 5)];
        confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
        confetti.style.top = '-20px';
        confetti.style.left = Math.random() * 100 + 'vw';
        confetti.style.opacity = Math.random() + 0.5;
        confetti.style.transform = `rotate(${Math.random() * 360}deg)`;
        
        const animation = confetti.animate([
            { 
                transform: `translateY(0) rotate(0deg)`,
                opacity: 1 
            },
            { 
                transform: `translateY(${window.innerHeight}px) rotate(${Math.random() * 720}deg)`,
                opacity: 0 
            }
        ], {
            duration: Math.random() * 3000 + 2000,
            easing: 'cubic-bezier(0.215, 0.610, 0.355, 1)'
        });
        
        animation.onfinish = () => confetti.remove();
        confettiContainer.appendChild(confetti);
    }
    
    document.body.appendChild(confettiContainer);
    setTimeout(() => confettiContainer.remove(), 5000);
}

// Gift Box Surprise
function initGiftBox() {
    const giftBox = document.querySelector('.gift-box');
    if (!giftBox) return;
    
    giftBox.addEventListener('click', function() {
        // Open lid animation
        const lid = this.querySelector('.box-lid');
        lid.style.transform = 'rotateX(-120deg)';
        
        // Create confetti
        createConfetti();
        
        // Show message after delay
        setTimeout(() => {
            const message = document.createElement('div');
            message.className = 'alert alert-success glass-card';
            message.style.position = 'fixed';
            message.style.top = '50%';
            message.style.left = '50%';
            message.style.transform = 'translate(-50%, -50%)';
            message.style.zIndex = '10000';
            message.style.maxWidth = '500px';
            message.style.textAlign = 'center';
            message.style.fontSize = '1.5rem';
            message.style.fontFamily = "'Dancing Script', cursive";
            message.innerHTML = `
                <h4>💝 Surprise! 💝</h4>
                <p>Untuk Naila yang tercinta,</p>
                <p>Semoga di hari spesial ini semua harapan dan impianmu menjadi kenyataan. Kamu adalah berkah terindah dalam hidupku.</p>
                <p>Selamat ulang tahun sayang! 💕</p>
                <button class="btn btn-pink mt-3" onclick="this.parentElement.remove()">Tutup</button>
            `;
            
            document.body.appendChild(message);
        }, 1000);
    });
}

// Initialize everything when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Create floating hearts
    createFloatingHearts();
    
    // Initialize parallax
    initParallax();
    
    // Initialize gift box
    initGiftBox();
    
    // Create heartbeat element
    createHeartbeat();
    
    // Typewriter effect for hero title
    const heroTitle = document.querySelector('.birthday-title');
    if (heroTitle) {
        const originalText = heroTitle.textContent;
        typeWriter(heroTitle, originalText);
    }
    
    // Wish wall messages
    const wishMessages = [
        "Semoga semua impianmu terwujud, Naila! ✨",
        "Naila pantas mendapatkan kebahagiaan tanpa batas! 💖",
        "Selamat ulang tahun untuk wanita paling cantik! 🌸",
        "Semoga tahun ini membawa berkah melimpah untukmu! 🌟",
        "Kamu adalah bintang yang menyinari dunia! ⭐",
        "Selamat merayakan hari spesialmu! 🎂",
        "Semoga setiap harimu dipenuhi cinta dan tawa! 😊",
        "Kesehatan, kebahagiaan, dan kesuksesan selalu menyertaimu! 💫",
        "Teruslah bersinar seperti biasanya! ✨",
        "Dunia lebih indah karena ada kamu di dalamnya! 🌍"
    ];
    
    // Populate wish wall
    const wishWall = document.querySelector('.wish-wall');
    if (wishWall) {
        wishMessages.forEach((message, index) => {
            const wishCard = document.createElement('div');
            wishCard.className = 'wish-card glass-card';
            wishCard.style.animationDelay = `${index * 0.2}s`;
            wishCard.innerHTML = `<p>${message}</p>`;
            wishWall.appendChild(wishCard);
        });
    }
});

// Create floating hearts background
function createFloatingHearts() {
    const heartsContainer = document.querySelector('.floating-hearts');
    if (!heartsContainer) return;
    
    for (let i = 0; i < 20; i++) {
        const heart = document.createElement('div');
        heart.className = 'heart';
        heart.style.left = `${Math.random() * 100}vw`;
        heart.style.top = `${Math.random() * 100}vh`;
        heart.style.width = `${Math.random() * 20 + 10}px`;
        heart.style.height = heart.style.width;
        heart.style.animationDelay = `${Math.random() * 5}s`;
        heart.style.opacity = `${Math.random() * 0.5 + 0.3}`;
        heart.style.background = `hsl(${Math.random() * 30 + 330}, 100%, 70%)`;
        
        heartsContainer.appendChild(heart);
    }
}