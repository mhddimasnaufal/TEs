// GSAP Premium Animations

function initGSAPAnimations() {
    // Check if GSAP is loaded
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
        console.warn('GSAP not loaded');
        return;
    }
    
    // Register ScrollTrigger plugin
    gsap.registerPlugin(ScrollTrigger);
    
    // Hero Section Animations
    const heroTimeline = gsap.timeline();
    
    heroTimeline
        .from('.birthday-title', {
            duration: 1.5,
            y: 100,
            opacity: 0,
            ease: "power4.out"
        })
        .from('.subtitle', {
            duration: 1,
            y: 50,
            opacity: 0,
            ease: "power3.out"
        }, "-=0.5")
        .from('.info-badge', {
            duration: 0.8,
            y: 30,
            opacity: 0,
            stagger: 0.2,
            ease: "back.out(1.7)"
        }, "-=0.3")
        .from('.hero-content .btn', {
            duration: 0.8,
            y: 30,
            opacity: 0,
            stagger: 0.2,
            ease: "power3.out"
        }, "-=0.5");
    
    // Floating hearts animation
    gsap.to('.heart', {
        y: -20,
        duration: 2,
        repeat: -1,
        yoyo: true,
        ease: "power1.inOut",
        stagger: 0.2
    });
    
    // Section title animations
    gsap.utils.toArray('.section-title').forEach(section => {
        gsap.from(section, {
            scrollTrigger: {
                trigger: section,
                start: "top 80%",
                end: "top 50%",
                toggleActions: "play none none reverse"
            },
            y: 50,
            opacity: 0,
            duration: 1,
            ease: "power3.out"
        });
    });
    
    // Glass card animations
    gsap.utils.toArray('.glass-card').forEach((card, i) => {
        gsap.from(card, {
            scrollTrigger: {
                trigger: card,
                start: "top 85%",
                end: "top 60%",
                toggleActions: "play none none reverse"
            },
            y: 50,
            opacity: 0,
            duration: 1,
            delay: i * 0.1,
            ease: "power3.out"
        });
    });
    
    // Timeline items animation
    gsap.utils.toArray('.timeline-item').forEach((item, i) => {
        gsap.from(item, {
            scrollTrigger: {
                trigger: item,
                start: "top 90%",
                end: "top 70%",
                toggleActions: "play none none reverse"
            },
            x: i % 2 === 0 ? -100 : 100,
            opacity: 0,
            duration: 1,
            delay: i * 0.2,
            ease: "power3.out"
        });
    });
    
    // Love letter paragraphs
    gsap.utils.toArray('.letter-content p').forEach((p, i) => {
        gsap.from(p, {
            scrollTrigger: {
                trigger: p,
                start: "top 90%",
                end: "top 70%",
                toggleActions: "play none none reverse"
            },
            x: i % 2 === 0 ? -50 : 50,
            opacity: 0,
            duration: 1,
            delay: i * 0.3,
            ease: "power3.out"
        });
    });
    
    // Gallery items
    gsap.utils.toArray('.gallery-item').forEach((item, i) => {
        gsap.from(item, {
            scrollTrigger: {
                trigger: item,
                start: "top 90%",
                end: "top 70%",
                toggleActions: "play none none reverse"
            },
            scale: 0.8,
            opacity: 0,
            duration: 0.8,
            delay: i * 0.1,
            ease: "back.out(1.7)"
        });
    });
    
    // Countdown numbers
    gsap.from('.countdown-number', {
        scrollTrigger: {
            trigger: '.countdown-container',
            start: "top 80%",
            end: "top 50%",
            toggleActions: "play none none reverse"
        },
        scale: 0,
        opacity: 0,
        duration: 1,
        stagger: 0.2,
        ease: "elastic.out(1, 0.5)"
    });
    
    // Wish cards animation
    gsap.utils.toArray('.wish-card').forEach((card, i) => {
        gsap.from(card, {
            scrollTrigger: {
                trigger: card,
                start: "top 95%",
                end: "top 75%",
                toggleActions: "play none none reverse"
            },
            rotationY: 180,
            opacity: 0,
            duration: 0.8,
            delay: i * 0.1,
            ease: "power3.out"
        });
    });
    
    // Parallax scrolling effect
    gsap.utils.toArray('.parallax').forEach(layer => {
        const depth = layer.dataset.depth || 0.5;
        
        gsap.to(layer, {
            y: () => window.innerHeight * depth,
            ease: "none",
            scrollTrigger: {
                trigger: layer.parentElement,
                start: "top bottom",
                end: "bottom top",
                scrub: true
            }
        });
    });
    
    // 3D tilt effect on hover
    document.querySelectorAll('.hover-3d').forEach(element => {
        element.addEventListener('mousemove', (e) => {
            const rect = element.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateY = ((x - centerX) / centerX) * 10;
            const rotateX = ((centerY - y) / centerY) * 10;
            
            gsap.to(element, {
                duration: 0.5,
                rotateX: rotateX,
                rotateY: rotateY,
                ease: "power2.out"
            });
        });
        
        element.addEventListener('mouseleave', () => {
            gsap.to(element, {
                duration: 0.5,
                rotateX: 0,
                rotateY: 0,
                ease: "elastic.out(1, 0.5)"
            });
        });
    });
    
    // Text reveal animation
    const textRevealElements = document.querySelectorAll('.text-reveal');
    textRevealElements.forEach(element => {
        gsap.from(element, {
            scrollTrigger: {
                trigger: element,
                start: "top 85%",
                end: "top 60%",
                toggleActions: "play none none reverse"
            },
            y: 50,
            opacity: 0,
            duration: 1,
            ease: "power3.out"
        });
    });
    
    // Infinite rotation for decorative elements
    gsap.to('.spin-slow', {
        rotation: 360,
        duration: 20,
        repeat: -1,
        ease: "none"
    });
    
    gsap.to('.spin-medium', {
        rotation: 360,
        duration: 10,
        repeat: -1,
        ease: "none"
    });
    
    // Pulse animation for important elements
    gsap.to('.pulse-element', {
        scale: 1.1,
        duration: 1,
        repeat: -1,
        yoyo: true,
        ease: "power1.inOut"
    });
    
    // Staggered fade-in for lists
    gsap.utils.toArray('.stagger-fade-in li').forEach((li, i) => {
        gsap.from(li, {
            scrollTrigger: {
                trigger: li.parentElement,
                start: "top 85%",
                toggleActions: "play none none reverse"
            },
            x: -30,
            opacity: 0,
            duration: 0.5,
            delay: i * 0.1,
            ease: "power3.out"
        });
    });
    
    // Navbar background on scroll
    gsap.to('.navbar', {
        scrollTrigger: {
            trigger: 'body',
            start: "100px top",
            end: "200px top",
            scrub: true
        },
        backgroundColor: 'rgba(255, 255, 255, 0.98)',
        backdropFilter: 'blur(10px)',
        ease: "none"
    });
    
    // Progress bar animation
    const progressBars = document.querySelectorAll('.progress-bar');
    progressBars.forEach(bar => {
        gsap.from(bar, {
            scrollTrigger: {
                trigger: bar.parentElement,
                start: "top 90%",
                toggleActions: "play none none reverse"
            },
            width: 0,
            duration: 2,
            ease: "power4.out"
        });
    });
    
    // Split text animation (if available)
    if (typeof SplitText !== 'undefined') {
        const splitTextElements = document.querySelectorAll('.split-text');
        splitTextElements.forEach(element => {
            const split = new SplitText(element, { type: "chars,words" });
            
            gsap.from(split.chars, {
                scrollTrigger: {
                    trigger: element,
                    start: "top 90%",
                    toggleActions: "play none none reverse"
                },
                opacity: 0,
                y: 50,
                rotationX: -90,
                duration: 1,
                stagger: 0.02,
                ease: "back.out(1.7)"
            });
        });
    }
    
    // Infinite scroll animation for marquee
    const marqueeElements = document.querySelectorAll('.marquee');
    marqueeElements.forEach(marquee => {
        const content = marquee.innerHTML;
        marquee.innerHTML = content + content + content;
        
        const width = marquee.scrollWidth / 3;
        
        gsap.to(marquee, {
            x: -width,
            duration: 20,
            repeat: -1,
            ease: "none"
        });
    });
    
    // Morphing shapes (advanced)
    const morphShapes = document.querySelectorAll('.morph-shape');
    if (morphShapes.length > 0) {
        morphShapes.forEach(shape => {
            const paths = shape.querySelectorAll('path');
            
            if (paths.length >= 2) {
                gsap.to(paths[0], {
                    duration: 3,
                    morphSVG: paths[1],
                    repeat: -1,
                    yoyo: true,
                    ease: "sine.inOut"
                });
            }
        });
    }
    
    // Initialize ScrollTrigger
    ScrollTrigger.refresh();
}

// Smooth scrolling with GSAP
function smoothScrollTo(target) {
    gsap.to(window, {
        duration: 1.5,
        scrollTo: target,
        ease: "power3.inOut"
    });
}

// Apply smooth scroll to all anchor links
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href !== '#') {
                e.preventDefault();
                smoothScrollTo(href);
            }
        });
    });
});

// Export functions for global use
window.initGSAPAnimations = initGSAPAnimations;
window.smoothScrollTo = smoothScrollTo;