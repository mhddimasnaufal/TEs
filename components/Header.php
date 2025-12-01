<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Birthday Naila Nazla Pohan 🎉</title>
    
    <!-- Meta tags -->
    <meta name="description" content="Ulang tahun spesial untuk Naila Nazla Pohan. Website penuh cinta dan kejutan!">
    <meta name="keywords" content="Ulang Tahun, Birthday, Naila Nazla Pohan, Cinta, Kejutan">
    <meta name="author" content="Dari yang tersayang">
    <meta property="og:title" content="Happy Birthday Naila Nazla Pohan 🎉">
    <meta property="og:description" content="Ulang tahun spesial penuh kejutan dan cinta">
    <meta property="og:image" content="assets/images/thumbnail.jpg">
    <meta property="og:url" content="https://birthday-naila.com">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    
    <!-- Three.js for 3D effects -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.min.js"></script>
</head>
<body>
    <!-- Loading Screen -->
    <div id="loading-screen">
        <div class="loader">
            <div class="spinner"></div>
            <p>Memuat kejutan untuk Naila...</p>
            <div class="progress-bar">
                <div class="progress"></div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="main-nav">
        <div class="nav-container">
            <div class="nav-brand">
                <i class="fas fa-birthday-cake"></i>
                <span>Naila's Birthday</span>
            </div>
            
            <button class="nav-toggle" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            
            <ul class="nav-menu">
                <li><a href="#home" class="nav-link active"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="#envelope" class="nav-link"><i class="fas fa-envelope"></i> Surat</a></li>
                <li><a href="#gallery" class="nav-link"><i class="fas fa-images"></i> Galeri</a></li>
                <li><a href="#video" class="nav-link"><i class="fas fa-video"></i> Video</a></li>
                <li><a href="#love" class="nav-link"><i class="fas fa-heart"></i> Cinta</a></li>
                <li><a href="#quiz" class="nav-link"><i class="fas fa-gamepad"></i> Quiz</a></li>
                <li><a href="#zodiac" class="nav-link"><i class="fas fa-star"></i> Zodiac</a></li>
            </ul>
            
            <div class="music-control">
                <button id="music-toggle" class="music-btn">
                    <i class="fas fa-play"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Background Canvas -->
    <canvas id="background-canvas"></canvas>

    <!-- Main Container -->
    <main class="main-container">