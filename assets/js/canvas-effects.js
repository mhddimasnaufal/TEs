/**
 * Canvas Effects for Birthday Website
 * 3D Background, Particles, and Special Effects
 */

// Global variables
let canvas, ctx;
let particles = [];
let stars = [];
let mouse = { x: 0, y: 0, radius: 100 };
let animationId;

// Configuration
const config = {
    particleCount: 150,
    starCount: 200,
    particleColors: ['#ff6b6b', '#4ecdc4', '#ffe66d', '#ff9a76', '#a8e6cf'],
    connectionDistance: 100,
    particleSize: 3,
    starSize: 2,
    speed: 0.5
};

// Initialize canvas effects
function initCanvasEffects() {
    canvas = document.getElementById('background-canvas');
    if (!canvas) return;
    
    ctx = canvas.getContext('2d');
    
    // Set canvas size
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);
    
    // Create particles
    createParticles();
    
    // Create stars
    createStars();
    
    // Start animation
    animate();
    
    // Mouse interaction
    canvas.addEventListener('mousemove', handleMouseMove);
    canvas.addEventListener('touchmove', handleTouchMove, { passive: true });
}

// Resize canvas to window size
function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}

// Create particles
function createParticles() {
    particles = [];
    
    for (let i = 0; i < config.particleCount; i++) {
        particles.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            size: Math.random() * config.particleSize + 1,
            speedX: (Math.random() - 0.5) * config.speed,
            speedY: (Math.random() - 0.5) * config.speed,
            color: config.particleColors[Math.floor(Math.random() * config.particleColors.length)],
            originalX: Math.random() * canvas.width,
            originalY: Math.random() * canvas.height,
            waveOffset: Math.random() * Math.PI * 2
        });
    }
}

// Create stars for galaxy effect
function createStars() {
    stars = [];
    
    for (let i = 0; i < config.starCount; i++) {
        const angle = Math.random() * Math.PI * 2;
        const distance = Math.random() * Math.min(canvas.width, canvas.height) / 2;
        const speed = 0.0005 + Math.random() * 0.0005;
        
        stars.push({
            x: canvas.width / 2 + Math.cos(angle) * distance,
            y: canvas.height / 2 + Math.sin(angle) * distance,
            size: Math.random() * config.starSize + 1,
            originalAngle: angle,
            distance: distance,
            speed: speed,
            brightness: Math.random() * 0.5 + 0.5,
            twinkleSpeed: Math.random() * 0.05 + 0.01,
            twinkleOffset: Math.random() * Math.PI * 2
        });
    }
}

// Handle mouse movement
function handleMouseMove(event) {
    const rect = canvas.getBoundingClientRect();
    mouse.x = event.clientX - rect.left;
    mouse.y = event.clientY - rect.top;
}

// Handle touch movement
function handleTouchMove(event) {
    event.preventDefault();
    const rect = canvas.getBoundingClientRect();
    const touch = event.touches[0];
    mouse.x = touch.clientX - rect.left;
    mouse.y = touch.clientY - rect.top;
}

// Draw particles
function drawParticles() {
    particles.forEach(particle => {
        ctx.beginPath();
        ctx.arc(particle.x, particle.y, particle.size, 0, Math.PI * 2);
        ctx.fillStyle = particle.color;
        ctx.fill();
    });
}

// Draw connections between particles
function drawConnections() {
    ctx.strokeStyle = 'rgba(255, 255, 255, 0.1)';
    ctx.lineWidth = 0.5;
    
    for (let i = 0; i < particles.length; i++) {
        for (let j = i + 1; j < particles.length; j++) {
            const dx = particles[i].x - particles[j].x;
            const dy = particles[i].y - particles[j].y;
            const distance = Math.sqrt(dx * dx + dy * dy);
            
            if (distance < config.connectionDistance) {
                // Calculate opacity based on distance
                const opacity = 1 - (distance / config.connectionDistance);
                ctx.strokeStyle = `rgba(255, 255, 255, ${opacity * 0.2})`;
                
                ctx.beginPath();
                ctx.moveTo(particles[i].x, particles[i].y);
                ctx.lineTo(particles[j].x, particles[j].y);
                ctx.stroke();
            }
        }
    }
}

// Draw stars
function drawStars() {
    stars.forEach(star => {
        // Twinkle effect
        const twinkle = Math.sin(Date.now() * star.twinkleSpeed + star.twinkleOffset) * 0.3 + 0.7;
        const brightness = star.brightness * twinkle;
        
        ctx.beginPath();
        ctx.arc(star.x, star.y, star.size, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(255, 255, 255, ${brightness})`;
        ctx.fill();
    });
}

// Update particles
function updateParticles() {
    particles.forEach(particle => {
        // Wave motion
        particle.x = particle.originalX + Math.sin(Date.now() * 0.001 + particle.waveOffset) * 20;
        particle.y = particle.originalY + Math.cos(Date.now() * 0.001 + particle.waveOffset) * 20;
        
        // Mouse interaction
        const dx = mouse.x - particle.x;
        const dy = mouse.y - particle.y;
        const distance = Math.sqrt(dx * dx + dy * dy);
        
        if (distance < mouse.radius) {
            const angle = Math.atan2(dy, dx);
            const force = (mouse.radius - distance) / mouse.radius;
            
            particle.x -= Math.cos(angle) * force * 10;
            particle.y -= Math.sin(angle) * force * 10;
        }
        
        // Boundary check
        if (particle.x < 0) particle.x = canvas.width;
        if (particle.x > canvas.width) particle.x = 0;
        if (particle.y < 0) particle.y = canvas.height;
        if (particle.y > canvas.height) particle.y = 0;
    });
}

// Update stars (rotate galaxy)
function updateStars() {
    stars.forEach(star => {
        star.originalAngle += star.speed;
        star.x = canvas.width / 2 + Math.cos(star.originalAngle) * star.distance;
        star.y = canvas.height / 2 + Math.sin(star.originalAngle) * star.distance;
        
        // Pulsing effect
        star.distance += Math.sin(Date.now() * 0.001) * 0.1;
    });
}

// Create heart-shaped particles
function createHeartEffect(x, y) {
    const heartParticles = [];
    const heartColor = '#ff6b6b';
    
    // Create heart shape using parametric equations
    for (let t = 0; t < Math.PI * 2; t += 0.1) {
        const size = 16;
        const heartX = size * 16 * Math.pow(Math.sin(t), 3);
        const heartY = -(size * (13 * Math.cos(t) - 5 * Math.cos(2*t) - 2 * Math.cos(3*t) - Math.cos(4*t)));
        
        heartParticles.push({
            x: x + heartX,
            y: y + heartY,
            size: Math.random() * 3 + 1,
            color: heartColor,
            speedX: (Math.random() - 0.5) * 2,
            speedY: (Math.random() - 0.5) * 2,
            life: 1
        });
    }
    
    return heartParticles;
}

// Draw text on canvas
function drawBirthdayText() {
    ctx.save();
    ctx.fillStyle = 'rgba(255, 255, 255, 0.1)';
    ctx.font = 'bold 48px "Dancing Script", cursive';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    
    const text = 'Happy Birthday Naila!';
    const x = canvas.width / 2;
    const y = canvas.height / 2;
    
    // Text shadow
    ctx.shadowColor = 'rgba(255, 107, 107, 0.5)';
    ctx.shadowBlur = 20;
    ctx.fillText(text, x, y);
    
    // Stroke effect
    ctx.lineWidth = 2;
    ctx.strokeStyle = 'rgba(255, 255, 255, 0.3)';
    ctx.strokeText(text, x, y);
    
    ctx.restore();
}

// Main animation loop
function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    
    // Create gradient background
    const gradient = ctx.createLinearGradient(0, 0, 0, canvas.height);
    gradient.addColorStop(0, '#0c0c2d');
    gradient.addColorStop(0.5, '#1a1a3e');
    gradient.addColorStop(1, '#2d2d5c');
    ctx.fillStyle = gradient;
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    
    // Update and draw elements
    updateStars();
    updateParticles();
    
    drawStars();
    drawParticles();
    drawConnections();
    
    // Draw birthday text occasionally
    if (Date.now() % 10000 < 100) {
        drawBirthdayText();
    }
    
    animationId = requestAnimationFrame(animate);
}

// Create special birthday effect
function createBirthdayEffect(effectType, options = {}) {
    switch (effectType) {
        case 'hearts':
            createHeartExplosion(options.x || canvas.width / 2, options.y || canvas.height / 2);
            break;
        case 'sparkles':
            createSparkleEffect(options.x || canvas.width / 2, options.y || canvas.height / 2);
            break;
        case 'rainbow':
            createRainbowEffect();
            break;
    }
}

// Heart explosion effect
function createHeartExplosion(x, y) {
    const hearts = createHeartEffect(x, y);
    let heartAnimationId;
    
    function animateHearts() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        hearts.forEach((heart, index) => {
            heart.x += heart.speedX;
            heart.y += heart.speedY;
            heart.life -= 0.01;
            heart.size *= 0.99;
            
            if (heart.life > 0) {
                ctx.beginPath();
                ctx.arc(heart.x, heart.y, heart.size, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(255, 107, 107, ${heart.life})`;
                ctx.fill();
            } else {
                hearts.splice(index, 1);
            }
        });
        
        if (hearts.length > 0) {
            heartAnimationId = requestAnimationFrame(animateHearts);
        } else {
            cancelAnimationFrame(heartAnimationId);
        }
    }
    
    animateHearts();
}

// Sparkle effect
function createSparkleEffect(x, y) {
    const sparkles = [];
    const colors = ['#ff6b6b', '#ffe66d', '#4ecdc4', '#ff9a76'];
    
    for (let i = 0; i < 50; i++) {
        sparkles.push({
            x: x + (Math.random() - 0.5) * 100,
            y: y + (Math.random() - 0.5) * 100,
            size: Math.random() * 4 + 1,
            color: colors[Math.floor(Math.random() * colors.length)],
            speedX: (Math.random() - 0.5) * 4,
            speedY: (Math.random() - 0.5) * 4,
            life: 1
        });
    }
    
    let sparkleAnimationId;
    
    function animateSparkles() {
        sparkles.forEach((sparkle, index) => {
            sparkle.x += sparkle.speedX;
            sparkle.y += sparkle.speedY;
            sparkle.life -= 0.02;
            sparkle.speedX *= 0.95;
            sparkle.speedY *= 0.95;
            
            if (sparkle.life > 0) {
                ctx.beginPath();
                ctx.arc(sparkle.x, sparkle.y, sparkle.size, 0, Math.PI * 2);
                ctx.fillStyle = `${sparkle.color}${Math.floor(sparkle.life * 255).toString(16).padStart(2, '0')}`;
                ctx.fill();
            } else {
                sparkles.splice(index, 1);
            }
        });
        
        if (sparkles.length > 0) {
            sparkleAnimationId = requestAnimationFrame(animateSparkles);
        } else {
            cancelAnimationFrame(sparkleAnimationId);
        }
    }
    
    animateSparkles();
}

// Rainbow effect
function createRainbowEffect() {
    const rainbowColors = [
        '#ff0000', '#ff7f00', '#ffff00',
        '#00ff00', '#0000ff', '#4b0082', '#9400d3'
    ];
    
    let radius = 50;
    let angle = 0;
    
    function drawRainbow() {
        angle += 0.01;
        radius += 0.5;
        
        rainbowColors.forEach((color, i) => {
            const segmentAngle = (Math.PI * 2) / rainbowColors.length;
            const startAngle = angle + i * segmentAngle;
            const endAngle = startAngle + segmentAngle;
            
            ctx.beginPath();
            ctx.arc(canvas.width / 2, canvas.height / 2, radius + i * 10, startAngle, endAngle);
            ctx.strokeStyle = color;
            ctx.lineWidth = 10;
            ctx.stroke();
        });
        
        if (radius < 300) {
            requestAnimationFrame(drawRainbow);
        }
    }
    
    drawRainbow();
}

// Clean up
function cleanupCanvas() {
    if (animationId) {
        cancelAnimationFrame(animationId);
    }
    particles = [];
    stars = [];
}

// Export functions for global use
window.initCanvasEffects = initCanvasEffects;
window.createBirthdayEffect = createBirthdayEffect;
window.cleanupCanvas = cleanupCanvas;