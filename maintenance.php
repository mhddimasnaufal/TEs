<?php
/**
 * Maintenance Mode Page
 * This page is displayed when the website is under maintenance
 */

// Maintenance mode configuration
$maintenance_mode = true; // Set to false to disable maintenance mode
$allowed_ips = ['127.0.0.1', '::1']; // IP addresses that can bypass maintenance
$estimated_downtime = '2 hours';
$contact_email = 'admin@nailabirthday.com';
$social_links = [
    'instagram' => 'https://instagram.com/naila',
    'facebook' => 'https://facebook.com/naila',
    'twitter' => 'https://twitter.com/naila'
];

// Check if current IP is allowed
$current_ip = $_SERVER['REMOTE_ADDR'];
$bypass_maintenance = in_array($current_ip, $allowed_ips);

// If maintenance mode is off or IP is allowed, redirect to homepage
if (!$maintenance_mode || $bypass_maintenance) {
    header('Location: index.php');
    exit;
}

// Set maintenance headers
header('HTTP/1.1 503 Service Unavailable');
header('Retry-After: 3600'); // Retry after 1 hour
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🚧 Maintenance Mode - Naila's Birthday Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow-x: hidden;
            position: relative;
        }

        .maintenance-container {
            max-width: 800px;
            width: 100%;
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 60px 40px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            z-index: 2;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .maintenance-icon {
            font-size: 80px;
            margin-bottom: 30px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        h1 {
            font-family: 'Dancing Script', cursive;
            font-size: 48px;
            margin-bottom: 20px;
            color: #ffd700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .birthday-text {
            font-size: 24px;
            margin-bottom: 40px;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
        }

        .message-box {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            padding: 40px;
            margin: 40px 0;
            border-left: 5px solid #ffd700;
        }

        .message-box h2 {
            font-size: 32px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .message-box p {
            font-size: 18px;
            line-height: 1.8;
            margin-bottom: 15px;
            color: rgba(255, 255, 255, 0.9);
        }

        .countdown-container {
            margin: 40px 0;
            padding: 30px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 20px;
        }

        .countdown-title {
            font-size: 20px;
            margin-bottom: 20px;
            color: #ffd700;
        }

        .countdown {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .countdown-item {
            background: rgba(255, 255, 255, 0.15);
            padding: 20px;
            border-radius: 15px;
            min-width: 100px;
        }

        .countdown-value {
            font-size: 36px;
            font-weight: bold;
            color: #ffd700;
            font-family: monospace;
        }

        .countdown-label {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 5px;
        }

        .progress-container {
            margin: 40px 0;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .progress-bar {
            height: 10px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #ffd700, #ffaa00);
            border-radius: 5px;
            width: 65%;
            animation: progressAnimation 3s ease-in-out infinite alternate;
        }

        @keyframes progressAnimation {
            0% { width: 65%; }
            100% { width: 70%; }
        }

        .contact-info {
            margin: 40px 0;
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
        }

        .contact-info h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #ffd700;
        }

        .contact-email {
            font-size: 20px;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 30px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .contact-email:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-3px);
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }

        .social-link {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-5px) rotate(10deg);
        }

        .maintenance-details {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .detail-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 15px;
            text-align: left;
        }

        .detail-item h4 {
            color: #ffd700;
            margin-bottom: 10px;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .detail-item p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
        }

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            z-index: 1;
        }

        .floating-element {
            position: absolute;
            opacity: 0.1;
            animation: float 15s infinite linear;
        }

        .floating-element:nth-child(1) {
            top: 10%;
            left: 5%;
            font-size: 40px;
            animation-delay: 0s;
            animation-duration: 20s;
        }

        .floating-element:nth-child(2) {
            top: 20%;
            right: 10%;
            font-size: 60px;
            animation-delay: 2s;
            animation-duration: 25s;
        }

        .floating-element:nth-child(3) {
            bottom: 30%;
            left: 15%;
            font-size: 50px;
            animation-delay: 4s;
            animation-duration: 18s;
        }

        .floating-element:nth-child(4) {
            bottom: 20%;
            right: 5%;
            font-size: 30px;
            animation-delay: 6s;
            animation-duration: 22s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .refresh-button {
            margin-top: 40px;
        }

        .refresh-btn {
            padding: 18px 40px;
            background: linear-gradient(135deg, #ffd700 0%, #ffaa00 100%);
            border: none;
            border-radius: 50px;
            color: #333;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
        }

        .refresh-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 215, 0, 0.3);
        }

        .admin-note {
            margin-top: 30px;
            padding: 20px;
            background: rgba(255, 215, 0, 0.1);
            border-radius: 15px;
            border-left: 4px solid #ffd700;
            font-size: 14px;
            text-align: left;
        }

        .admin-note h4 {
            color: #ffd700;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
        }

        @media (max-width: 768px) {
            .maintenance-container {
                padding: 40px 20px;
            }

            h1 {
                font-size: 36px;
            }

            .birthday-text {
                font-size: 20px;
            }

            .message-box {
                padding: 30px 20px;
            }

            .message-box h2 {
                font-size: 24px;
                flex-direction: column;
                gap: 10px;
            }

            .countdown {
                gap: 10px;
            }

            .countdown-item {
                min-width: 80px;
                padding: 15px;
            }

            .countdown-value {
                font-size: 28px;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

            .social-links {
                gap: 15px;
            }

            .social-link {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            .maintenance-container {
                padding: 30px 15px;
            }

            h1 {
                font-size: 28px;
            }

            .maintenance-icon {
                font-size: 60px;
            }

            .countdown {
                gap: 5px;
            }

            .countdown-item {
                min-width: 70px;
                padding: 10px;
            }

            .countdown-value {
                font-size: 24px;
            }

            .contact-email {
                font-size: 16px;
                padding: 12px 24px;
            }
        }
    </style>
</head>
<body>
    <!-- Floating decorative elements -->
    <div class="floating-elements">
        <div class="floating-element">🎂</div>
        <div class="floating-element">🎈</div>
        <div class="floating-element">🎁</div>
        <div class="floating-element">✨</div>
    </div>

    <div class="maintenance-container">
        <div class="maintenance-icon">
            <i class="fas fa-tools"></i>
        </div>

        <h1>Naila's Birthday Website</h1>
        <div class="birthday-text">
            🎉 Celebrating the most amazing person! 🎉
        </div>

        <div class="message-box">
            <h2>
                <i class="fas fa-exclamation-triangle"></i>
                Website Under Maintenance
            </h2>
            <p>
                We're currently performing scheduled maintenance to make Naila's birthday website 
                even more amazing! We're adding new features, improving performance, and making 
                everything sparkle for the celebration.
            </p>
            <p>
                Estimated downtime: <strong><?php echo $estimated_downtime; ?></strong>
            </p>
            <p>
                We apologize for any inconvenience and appreciate your patience. 
                The website will be back better than ever!
            </p>
        </div>

        <div class="countdown-container">
            <div class="countdown-title">
                <i class="far fa-clock"></i> Estimated Time Remaining
            </div>
            <div class="countdown" id="countdown">
                <div class="countdown-item">
                    <div class="countdown-value" id="hours">02</div>
                    <div class="countdown-label">Hours</div>
                </div>
                <div class="countdown-item">
                    <div class="countdown-value" id="minutes">00</div>
                    <div class="countdown-label">Minutes</div>
                </div>
                <div class="countdown-item">
                    <div class="countdown-value" id="seconds">00</div>
                    <div class="countdown-label">Seconds</div>
                </div>
            </div>
        </div>

        <div class="progress-container">
            <div class="progress-label">
                <span>Maintenance Progress</span>
                <span>65%</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
        </div>

        <div class="contact-info">
            <h3><i class="fas fa-envelope"></i> Need to reach us?</h3>
            <a href="mailto:<?php echo $contact_email; ?>" class="contact-email">
                <i class="fas fa-paper-plane"></i>
                <?php echo $contact_email; ?>
            </a>
        </div>

        <div class="social-links">
            <?php foreach ($social_links as $platform => $url): ?>
                <a href="<?php echo $url; ?>" class="social-link" target="_blank">
                    <i class="fab fa-<?php echo $platform; ?>"></i>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="maintenance-details">
            <h3><i class="fas fa-info-circle"></i> What we're working on:</h3>
            <div class="details-grid">
                <div class="detail-item">
                    <h4><i class="fas fa-star"></i> New Features</h4>
                    <p>Adding interactive 3D elements, improved animations, and surprise birthday features.</p>
                </div>
                <div class="detail-item">
                    <h4><i class="fas fa-bolt"></i> Performance</h4>
                    <p>Optimizing loading times and improving overall website performance.</p>
                </div>
                <div class="detail-item">
                    <h4><i class="fas fa-shield-alt"></i> Security</h4>
                    <p>Implementing enhanced security features to protect birthday messages and data.</p>
                </div>
                <div class="detail-item">
                    <h4><i class="fas fa-mobile-alt"></i> Mobile Experience</h4>
                    <p>Improving the mobile experience for birthday wishes on-the-go.</p>
                </div>
            </div>
        </div>

        <div class="refresh-button">
            <button class="refresh-btn" onclick="window.location.reload()">
                <i class="fas fa-sync-alt"></i> Refresh Page
            </button>
        </div>

        <?php if ($bypass_maintenance): ?>
            <div class="admin-note">
                <h4><i class="fas fa-user-shield"></i> Admin Access Granted</h4>
                <p>You are viewing the maintenance page with administrative privileges. 
                <a href="index.php" style="color: #ffd700; text-decoration: underline;">Click here</a> to access the website.</p>
            </div>
        <?php endif; ?>

        <footer>
            <p>© <?php echo date('Y'); ?> Naila's Birthday Celebration. All rights reserved.</p>
            <p>Made with ❤️ for the best birthday ever!</p>
        </footer>
    </div>

    <script>
        // Countdown timer
        function updateCountdown() {
            // Set target time (2 hours from now for demo)
            const targetTime = new Date();
            targetTime.setHours(targetTime.getHours() + 2);
            
            const now = new Date();
            const diff = targetTime - now;
            
            if (diff <= 0) {
                // Maintenance complete - try to redirect
                window.location.reload();
                return;
            }
            
            const hours = Math.floor(diff / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);
            
            document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
            document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
        }
        
        // Update countdown every second
        updateCountdown();
        setInterval(updateCountdown, 1000);
        
        // Check for maintenance mode removal
        function checkMaintenanceMode() {
            fetch('check-maintenance.php')
                .then(response => response.json())
                .then(data => {
                    if (!data.maintenance_mode) {
                        window.location.href = 'index.php';
                    }
                })
                .catch(error => console.error('Error checking maintenance mode:', error));
        }
        
        // Check every 30 seconds
        setInterval(checkMaintenanceMode, 30000);
        
        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Add floating effect to countdown items
            const countdownItems = document.querySelectorAll('.countdown-item');
            countdownItems.forEach((item, index) => {
                item.style.animationDelay = `${index * 0.2}s`;
                item.classList.add('floating');
            });
            
            // Add confetti on click
            document.addEventListener('click', function(e) {
                if (e.target.closest('.refresh-btn')) {
                    createConfetti();
                }
            });
            
            function createConfetti() {
                for (let i = 0; i < 50; i++) {
                    const confetti = document.createElement('div');
                    confetti.innerHTML = ['🎉', '🎊', '✨', '🎈', '🎁'][Math.floor(Math.random() * 5)];
                    confetti.style.position = 'fixed';
                    confetti.style.fontSize = '20px';
                    confetti.style.zIndex = '9999';
                    confetti.style.left = Math.random() * 100 + 'vw';
                    confetti.style.top = '-50px';
                    confetti.style.pointerEvents = 'none';
                    confetti.style.animation = `confettiFall ${Math.random() * 3 + 2}s linear forwards`;
                    
                    document.body.appendChild(confetti);
                    
                    setTimeout(() => confetti.remove(), 5000);
                }
            }
            
            // Add CSS for confetti animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes confettiFall {
                    to {
                        transform: translateY(100vh) rotate(360deg);
                        opacity: 0;
                    }
                }
                .floating {
                    animation: floatUpDown 3s ease-in-out infinite;
                }
                @keyframes floatUpDown {
                    0%, 100% { transform: translateY(0); }
                    50% { transform: translateY(-10px); }
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</body>
</html>