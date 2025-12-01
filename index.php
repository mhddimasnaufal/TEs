<?php
session_start();
$page_title = "Happy Birthday Naila Nazla Pohan";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/animations.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/heart.png">
</head>
<body>
    <!-- Background Music Player -->
    <?php include 'components/MusicPlayer.php'; ?>
    
    <!-- Navigation -->
    <?php include 'components/Navigation.php'; ?>
    
    <!-- Main Content -->
    <main id="main-content">
        <!-- Hero Section -->
        <?php include 'sections/Hero.php'; ?>
        
        <!-- About Section -->
        <?php include 'sections/About.php'; ?>
        
        <!-- Gallery Section -->
        <?php include 'sections/Gallery.php'; ?>
        
        <!-- Love Letter Section -->
        <?php include 'sections/LoveLetter.php'; ?>
        
        <!-- Timeline Section -->
        <?php include 'sections/Timeline.php'; ?>
        
        <!-- 3D Love Letter -->
        <?php include 'sections/Envelope3D.php'; ?>
        
        <!-- Galaxy 3D Section -->
        <?php include 'sections/Galaxy3D.php'; ?>
        
        <!-- Video Section -->
        <?php include 'sections/VideoPlayer.php'; ?>
        
        <!-- Voice Message Section -->
        <?php include 'sections/VoiceMessage.php'; ?>
        
        <!-- Wish Wall Section -->
        <?php include 'sections/WishWall.php'; ?>
        
        <!-- Heartbeat Section -->
        <?php include 'sections/Heartbeat.php'; ?>
        
        <!-- What I Love Section -->
        <?php include 'sections/WhatILove.php'; ?>
        
        <!-- Countdown Section -->
        <?php include 'sections/Countdown.php'; ?>
        
        <!-- Zodiac Section -->
        <?php include 'sections/Zodiac.php'; ?>
        
        <!-- Gift Box Section -->
        <?php include 'sections/GiftBox.php'; ?>
        
        <!-- Quiz Section -->
        <?php include 'sections/Quiz.php'; ?>
    </main>
    
    <!-- Footer -->
    <?php include 'components/Footer.php'; ?>
    
    <!-- Canvas for Falling Petals -->
    <canvas id="petals-canvas"></canvas>
    
    <!-- React Root -->
    <div id="react-root"></div>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    
    <!-- React -->
    <script crossorigin src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    
    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/threejs-scene.js"></script>
    <script src="assets/js/gsap-animations.js"></script>
    <script src="assets/js/canvas-effects.js"></script>
    <script src="assets/js/audio-player.js"></script>
    
    <!-- React Components -->
    <script type="text/babel" src="assets/js/components/App.jsx"></script>
    <script type="text/babel" src="assets/js/components/Countdown.jsx"></script>
    <script type="text/babel" src="assets/js/components/Gallery3D.jsx"></script>
    <script type="text/babel" src="assets/js/components/QuizGame.jsx"></script>
    
    <script>
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 1200,
                once: false,
                mirror: true
            });
            
            // Initialize falling petals
            initPetalsAnimation();
            
            // Initialize 3D scene
            initThreeJSScene();
            
            // Initialize GSAP animations
            initGSAPAnimations();
            
            // Start background music
            startBackgroundMusic();
        });
    </script>
</body>
</html>