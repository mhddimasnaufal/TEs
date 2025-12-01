<?php
session_start();

// Check if password is submitted
$password = isset($_POST['password']) ? $_POST['password'] : '';
$correct_password = 'naila19';

if ($password === $correct_password || isset($_SESSION['authenticated'])) {
    $_SESSION['authenticated'] = true;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Rahasia - Untuk Naila</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fff5f9 0%, #f3e8ff 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        
        .secret-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .secret-letter {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(255, 107, 139, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .secret-letter::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #ff6b8b, #a855f7);
        }
        
        .poetic-text {
            font-family: 'Dancing Script', cursive;
            font-size: 1.8rem;
            line-height: 1.6;
            color: #333;
        }
        
        .secret-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .secret-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        
        .secret-img:hover {
            transform: scale(1.05);
        }
        
        .back-btn {
            background: linear-gradient(135deg, #ff6b8b, #a855f7);
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 25px;
            color: white;
            text-decoration: none;
            display: inline-block;
            margin-top: 2rem;
        }
        
        .heart-animation {
            animation: heartbeat 1.5s ease-in-out infinite;
            display: inline-block;
        }
        
        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
    </style>
</head>
<body>
    <div class="secret-container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4" style="color: #ff6b8b;">💝 Halaman Rahasia 💝</h1>
            <p class="lead">Hanya untukmu, Naila Nazla Pohan</p>
        </div>
        
        <div class="secret-letter mb-5">
            <div class="poetic-text">
                <p class="mb-4">Naila yang tersayang,</p>
                
                <p class="mb-4">
                    Ini adalah halaman rahasia yang hanya bisa diakses olehmu. 
                    Seperti cintaku yang tersembunyi di balik setiap kata dan setiap pandangan, 
                    halaman ini adalah tempat rahasia di mana semua perasaanku yang terdalam tersimpan.
                </p>
                
                <p class="mb-4">
                    Kamu adalah rahasia terindah dalam hidupku. Senyummu yang tulus, 
                    tawamu yang menular, dan hatimu yang penuh kasih adalah harta karun 
                    yang tak ternilai harganya. Setiap hari bersamamu adalah halaman baru 
                    dalam buku kehidupan yang ingin kubaca berulang-ulang.
                </p>
                
                <p class="mb-4">
                    Di halaman rahasia ini, aku ingin mengatakan sesuatu yang mungkin 
                    tidak sering kukatakan: <strong>aku sangat mencintaimu</strong>. 
                    Cinta yang tumbuh setiap hari, seperti bunga yang mekar di musim semi, 
                    semakin indah dengan setiap detik yang berlalu.
                </p>
                
                <p class="mb-4">
                    Selamat ulang tahun untuk wanita yang membuat hatiku berdetak lebih kencang, 
                    yang membuat dunianya lebih berwarna, dan yang membuat hidupku lebih berarti. 
                    Semoga halaman rahasia ini mengingatkanmu betapa spesialnya dirimu.
                </p>
                
                <div class="text-end">
                    <p class="mb-0">Dengan cinta yang tak terkatakan,</p>
                    <p class="h4" style="color: #ff6b8b;">Untuk Naila, selamanya ❤️</p>
                </div>
            </div>
        </div>
        
        <div class="text-center mb-5">
            <h3 class="mb-4">Galeri Rahasia Kita</h3>
            <div class="secret-gallery">
                <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?w=400&h=400&fit=crop" class="secret-img" alt="Memory 1">
                <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=400&h=400&fit=crop" class="secret-img" alt="Memory 2">
                <img src="https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?w=400&h=400&fit=crop" class="secret-img" alt="Memory 3">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=400&h=400&fit=crop" class="secret-img" alt="Memory 4">
            </div>
        </div>
        
        <div class="text-center">
            <p class="mb-4">
                <span class="heart-animation">❤️</span> 
                Ingatlah bahwa kamu selalu dicintai 
                <span class="heart-animation">❤️</span>
            </p>
            
            <a href="index.php" class="back-btn">
                <i class="fas fa-home me-2"></i>Kembali ke Halaman Utama
            </a>
        </div>
    </div>
    
    <script>
        // Add floating hearts
        document.addEventListener('DOMContentLoaded', function() {
            for (let i = 0; i < 20; i++) {
                createFloatingHeart();
            }
        });
        
        function createFloatingHeart() {
            const heart = document.createElement('div');
            heart.innerHTML = '❤️';
            heart.style.position = 'fixed';
            heart.style.fontSize = Math.random() * 20 + 10 + 'px';
            heart.style.left = Math.random() * 100 + 'vw';
            heart.style.top = '-50px';
            heart.style.opacity = Math.random() * 0.5 + 0.3;
            heart.style.zIndex = '9999';
            heart.style.pointerEvents = 'none';
            heart.style.animation = `float ${Math.random() * 3 + 5}s linear infinite`;
            
            document.body.appendChild(heart);
            
            // Remove after animation
            setTimeout(() => heart.remove(), 8000);
        }
        
        // Add CSS for floating animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes float {
                0% {
                    transform: translateY(0) rotate(0deg);
                    opacity: 0.7;
                }
                100% {
                    transform: translateY(100vh) rotate(360deg);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
<?php
} else {
    // Show password form
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Dibatasi - Halaman Rahasia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ff6b8b 0%, #a855f7 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }
        
        .password-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 3rem;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        
        .heart-icon {
            font-size: 4rem;
            color: #ff6b8b;
            animation: heartbeat 1.5s ease-in-out infinite;
            margin-bottom: 1rem;
        }
        
        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .form-control {
            border: 2px solid #ff6b8b;
            border-radius: 10px;
            padding: 0.8rem 1rem;
            font-size: 1.1rem;
        }
        
        .btn-submit {
            background: linear-gradient(135deg, #ff6b8b, #a855f7);
            border: none;
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 10px;
            font-size: 1.1rem;
            width: 100%;
            margin-top: 1rem;
            transition: transform 0.3s;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
        }
        
        .hint {
            margin-top: 1rem;
            color: #666;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="password-container">
        <div class="heart-icon">❤️</div>
        <h2 class="mb-4" style="color: #ff6b8b;">Halaman Rahasia</h2>
        <p class="mb-4">Halaman ini hanya dapat diakses oleh Naila Nazla Pohan.</p>
        
        <?php if ($password && $password !== $correct_password): ?>
            <div class="alert alert-danger mb-3">
                Password salah! Coba lagi.
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="mb-3">
                <input type="password" 
                       name="password" 
                       class="form-control" 
                       placeholder="Masukkan password rahasia" 
                       required>
            </div>
            
            <button type="submit" class="btn-submit">
                <i class="fas fa-lock me-2"></i>Masuk ke Halaman Rahasia
            </button>
        </form>
        
        <div class="hint">
            <p>Hint: Password adalah nama + umur (huruf kecil, tanpa spasi)</p>
        </div>
        
        <a href="index.php" class="btn btn-outline-secondary mt-3">
            <i class="fas fa-arrow-left me-2"></i>Kembali ke Halaman Utama
        </a>
    </div>
    
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</body>
</html>
<?php
}
?>