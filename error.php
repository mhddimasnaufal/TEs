<?php
/**
 * Error Page
 * Handles 404 and other error pages with a birthday-themed design
 */

// Get error details from query string or default to 404
$error_code = $_GET['code'] ?? '404';
$error_title = $_GET['title'] ?? 'Page Not Found';
$error_message = $_GET['message'] ?? 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.';

// Define error types with custom messages
$error_types = [
    '404' => [
        'title' => 'Page Not Found',
        'message' => 'The birthday page you are looking for seems to have floated away like a balloon!',
        'icon' => 'fas fa-map-signs'
    ],
    '403' => [
        'title' => 'Access Denied',
        'message' => 'This birthday surprise is for invited guests only!',
        'icon' => 'fas fa-lock'
    ],
    '500' => [
        'title' => 'Server Error',
        'message' => 'Our birthday cake server is having a meltdown! We are working on it.',
        'icon' => 'fas fa-exclamation-triangle'
    ],
    '503' => [
        'title' => 'Service Unavailable',
        'message' => 'The birthday celebration is taking a short break!',
        'icon' => 'fas fa-tools'
    ]
];

// Use predefined error type or custom values
if (isset($error_types[$error_code])) {
    $error_title = $error_types[$error_code]['title'];
    $error_message = $error_types[$error_code]['message'];
    $error_icon = $error_types[$error_code]['icon'];
} else {
    $error_icon = 'fas fa-exclamation-circle';
}

// Set HTTP response code
http_response_code(intval($error_code));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎂 Oops! Error <?php echo $error_code; ?> - Naila's Birthday</title>
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
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow-x: hidden;
            position: relative;
        }

        .error-container {
            max-width: 900px;
            width: 100%;
            text-align: center;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 60px 40px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 2;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .error-header {
            margin-bottom: 40px;
        }

        .error-code {
            font-family: 'Dancing Script', cursive;
            font-size: 120px;
            font-weight: bold;
            background: linear-gradient(135deg, #ffd700 0%, #ffaa00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
            text-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .error-icon {
            font-size: 80px;
            margin-bottom: 30px;
            color: #ff6b6b;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .error-title {
            font-size: 36px;
            margin-bottom: 20px;
            color: white;
            font-weight: 600;
        }

        .error-message {
            font-size: 20px;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .error-content {
            background: rgba(255, 255, 255, 0.07);
            border-radius: 20px;
            padding: 40px;
            margin: 40px 0;
            border-left: 4px solid #ff6b6b;
        }

        .suggestion-box {
            text-align: left;
            margin-bottom: 30px;
        }

        .suggestion-box h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #4d96ff;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .suggestions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .suggestion-item {
            background: rgba(255, 255, 255, 0.05);
            padding: 25px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .suggestion-item:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.08);
        }

        .suggestion-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #4d96ff 0%, #6a11cb 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 24px;
        }

        .suggestion-item h4 {
            font-size: 18px;
            margin-bottom: 10px;
            color: white;
        }

        .suggestion-item p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.5;
        }

        .error-actions {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 40px 0;
            flex-wrap: wrap;
        }

        .error-btn {
            padding: 18px 40px;
            border: none;
            border-radius: 15px;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .error-btn.primary {
            background: linear-gradient(135deg, #4d96ff 0%, #6a11cb 100%);
            color: white;
        }

        .error-btn.secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .error-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .search-box {
            margin: 40px 0;
            position: relative;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .search-input {
            width: 100%;
            padding: 20px 60px 20px 30px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            color: white;
            font-size: 18px;
            outline: none;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .search-btn {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #4d96ff 0%, #6a11cb 100%);
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .birthday-theme {
            margin: 40px 0;
            padding: 30px;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1) 0%, rgba(77, 150, 255, 0.1) 100%);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .birthday-theme h3 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #ffd700;
            font-family: 'Dancing Script', cursive;
        }

        .theme-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .theme-item {
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
        }

        .theme-icon {
            font-size: 40px;
            margin-bottom: 15px;
            display: block;
        }

        .theme-text {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.9);
        }

        .error-details {
            margin-top: 40px;
            padding: 25px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            text-align: left;
            font-family: monospace;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
            max-height: 200px;
            overflow-y: auto;
        }

        .error-details summary {
            cursor: pointer;
            color: #4d96ff;
            font-weight: 500;
            margin-bottom: 10px;
            font-family: 'Poppins', sans-serif;
        }

        .error-details pre {
            white-space: pre-wrap;
            word-wrap: break-word;
            margin-top: 10px;
        }

        .floating-balloons {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            z-index: 1;
            pointer-events: none;
        }

        .balloon {
            position: absolute;
            width: 60px;
            height: 80px;
            background: linear-gradient(135deg, var(--color1), var(--color2));
            border-radius: 50%;
            animation: floatBalloon var(--duration) linear infinite;
            opacity: 0.7;
        }

        .balloon::before {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 30px;
            background: rgba(255, 255, 255, 0.5);
        }

        @keyframes floatBalloon {
            0% {
                transform: translateY(100vh) translateX(var(--start-x)) rotate(0deg);
            }
            100% {
                transform: translateY(-100px) translateX(calc(var(--start-x) + var(--drift))) rotate(var(--rotation));
            }
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background: var(--color);
            animation: fallConfetti var(--duration) linear infinite;
            opacity: 0.8;
        }

        @keyframes fallConfetti {
            0% {
                transform: translateY(-100px) translateX(var(--start-x)) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) translateX(calc(var(--start-x) + var(--drift))) rotate(720deg);
                opacity: 0;
            }
        }

        .report-section {
            margin-top: 40px;
            padding: 25px;
            background: rgba(255, 107, 107, 0.1);
            border-radius: 15px;
            border: 1px solid rgba(255, 107, 107, 0.3);
        }

        .report-section h4 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #ff6b6b;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .report-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 30px;
            background: rgba(255, 107, 107, 0.2);
            border: 1px solid rgba(255, 107, 107, 0.4);
            border-radius: 10px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .report-btn:hover {
            background: rgba(255, 107, 107, 0.3);
            transform: translateY(-2px);
        }

        footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
        }

        @media (max-width: 768px) {
            .error-container {
                padding: 40px 20px;
            }

            .error-code {
                font-size: 80px;
            }

            .error-icon {
                font-size: 60px;
            }

            .error-title {
                font-size: 28px;
            }

            .error-message {
                font-size: 18px;
            }

            .error-content {
                padding: 30px 20px;
            }

            .error-actions {
                flex-direction: column;
                align-items: center;
            }

            .error-btn {
                width: 100%;
                justify-content: center;
            }

            .suggestions {
                grid-template-columns: 1fr;
            }

            .theme-content {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .error-code {
                font-size: 60px;
            }

            .error-title {
                font-size: 24px;
            }

            .error-message {
                font-size: 16px;
            }

            .search-input {
                padding: 15px 50px 15px 20px;
                font-size: 16px;
            }

            .search-btn {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Floating balloons and confetti -->
    <div class="floating-balloons" id="balloonsContainer"></div>

    <div class="error-container">
        <div class="error-header">
            <div class="error-code"><?php echo $error_code; ?></div>
            <div class="error-icon">
                <i class="<?php echo $error_icon; ?>"></i>
            </div>
            <h1 class="error-title"><?php echo htmlspecialchars($error_title); ?></h1>
            <p class="error-message"><?php echo htmlspecialchars($error_message); ?></p>
        </div>

        <div class="error-content">
            <div class="suggestion-box">
                <h3><i class="fas fa-lightbulb"></i> Here are some things you can try:</h3>
                <div class="suggestions">
                    <div class="suggestion-item" onclick="window.location.href='index.php'">
                        <div class="suggestion-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h4>Go to Homepage</h4>
                        <p>Return to the main birthday celebration page</p>
                    </div>
                    
                    <div class="suggestion-item" onclick="window.history.back()">
                        <div class="suggestion-icon">
                            <i class="fas fa-arrow-left"></i>
                        </div>
                        <h4>Go Back</h4>
                        <p>Return to the previous page you visited</p>
                    </div>
                    
                    <div class="suggestion-item" onclick="window.location.reload()">
                        <div class="suggestion-icon">
                            <i class="fas fa-redo"></i>
                        </div>
                        <h4>Refresh Page</h4>
                        <p>Try reloading the current page</p>
                    </div>
                    
                    <div class="suggestion-item" onclick="document.getElementById('searchInput').focus()">
                        <div class="suggestion-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h4>Search</h4>
                        <p>Search for birthday content</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="search-box">
            <input type="text" id="searchInput" class="search-input" placeholder="Search for birthday wishes, photos, or messages...">
            <button class="search-btn" onclick="performSearch()">
                <i class="fas fa-search"></i>
            </button>
        </div>

        <div class="error-actions">
            <a href="index.php" class="error-btn primary">
                <i class="fas fa-home"></i> Homepage
            </a>
            <a href="#" class="error-btn secondary" onclick="window.history.back(); return false;">
                <i class="fas fa-arrow-left"></i> Go Back
            </a>
            <a href="contact.php" class="error-btn secondary">
                <i class="fas fa-envelope"></i> Contact Us
            </a>
        </div>

        <div class="birthday-theme">
            <h3>🎂 Don't Miss the Birthday Fun!</h3>
            <p>While we fix this issue, check out these amazing birthday features:</p>
            <div class="theme-content">
                <div class="theme-item">
                    <span class="theme-icon">🎁</span>
                    <div class="theme-text">Virtual Gifts</div>
                </div>
                <div class="theme-item">
                    <span class="theme-icon">🎨</span>
                    <div class="theme-text">3D Gallery</div>
                </div>
                <div class="theme-item">
                    <span class="theme-icon">🎮</span>
                    <div class="theme-text">Birthday Quiz</div>
                </div>
                <div class="theme-item">
                    <span class="theme-icon">🎵</span>
                    <div class="theme-text">Music Player</div>
                </div>
            </div>
        </div>

        <div class="report-section">
            <h4><i class="fas fa-bug"></i> Found a bug?</h4>
            <p>If you believe this is an error that needs attention, please report it.</p>
            <a href="mailto:admin@nailabirthday.com?subject=Error%20<?php echo $error_code; ?>%20Report&body=Error%20Code:%20<?php echo $error_code; ?>%0AURL:%20<?php echo urlencode($_SERVER['REQUEST_URI']); ?>%0ABrowser:%20<?php echo urlencode($_SERVER['HTTP_USER_AGENT']); ?>" class="report-btn">
                <i class="fas fa-flag"></i> Report This Error
            </a>
        </div>

        <details class="error-details">
            <summary>Technical Details</summary>
            <pre><?php
                echo "Error Code: " . $error_code . "\n";
                echo "Error Title: " . $error_title . "\n";
                echo "URL: " . $_SERVER['REQUEST_URI'] . "\n";
                echo "Timestamp: " . date('Y-m-d H:i:s') . "\n";
                echo "IP Address: " . $_SERVER['REMOTE_ADDR'] . "\n";
                echo "User Agent: " . $_SERVER['HTTP_USER_AGENT'] . "\n";
                
                // Additional debug info in development mode
                if (isset($_GET['debug']) && $_GET['debug'] === 'true') {
                    echo "\n--- Debug Information ---\n";
                    echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "\n";
                    echo "Referrer: " . ($_SERVER['HTTP_REFERER'] ?? 'None') . "\n";
                    echo "Session ID: " . session_id() . "\n";
                }
            ?></pre>
        </details>

        <footer>
            <p>🎉 Celebrating Naila's Birthday • Error <?php echo $error_code; ?></p>
            <p>© <?php echo date('Y'); ?> Naila's Birthday Website. All rights reserved.</p>
            <p style="margin-top: 10px; font-size: 12px; opacity: 0.6;">
                Even errors can't stop the birthday celebration! 🎂
            </p>
        </footer>
    </div>

    <script>
        // Create floating balloons
        function createBalloons() {
            const colors = [
                ['#ff6b6b', '#ff8e8e'],
                ['#4d96ff', '#6a11cb'],
                ['#ffd166', '#ffaa00'],
                ['#06d6a0', '#11998e'],
                ['#9d4edd', '#560bad']
            ];
            
            const container = document.getElementById('balloonsContainer');
            
            for (let i = 0; i < 8; i++) {
                const balloon = document.createElement('div');
                balloon.className = 'balloon';
                
                const colorSet = colors[Math.floor(Math.random() * colors.length)];
                const duration = Math.random() * 20 + 20;
                const startX = Math.random() * 100;
                const drift = Math.random() * 100 - 50;
                const rotation = Math.random() * 360;
                
                balloon.style.cssText = `
                    --color1: ${colorSet[0]};
                    --color2: ${colorSet[1]};
                    --duration: ${duration}s;
                    --start-x: ${startX}vw;
                    --drift: ${drift}px;
                    --rotation: ${rotation}deg;
                    left: ${Math.random() * 100}%;
                    animation-delay: ${Math.random() * 10}s;
                `;
                
                container.appendChild(balloon);
            }
            
            // Create confetti
            for (let i = 0; i < 30; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                
                const colors = ['#ff6b6b', '#4d96ff', '#ffd166', '#06d6a0', '#9d4edd'];
                const duration = Math.random() * 5 + 3;
                const startX = Math.random() * 100;
                const drift = Math.random() * 200 - 100;
                
                confetti.style.cssText = `
                    --color: ${colors[Math.floor(Math.random() * colors.length)]};
                    --duration: ${duration}s;
                    --start-x: ${startX}vw;
                    --drift: ${drift}px;
                    top: ${Math.random() * 100}%;
                    left: ${Math.random() * 100}%;
                    animation-delay: ${Math.random() * 5}s;
                    width: ${Math.random() * 10 + 5}px;
                    height: ${Math.random() * 10 + 5}px;
                    border-radius: ${Math.random() > 0.5 ? '50%' : '0'};
                `;
                
                container.appendChild(confetti);
            }
        }
        
        // Search functionality
        function performSearch() {
            const searchTerm = document.getElementById('searchInput').value.trim();
            if (searchTerm) {
                window.location.href = `search.php?q=${encodeURIComponent(searchTerm)}`;
            }
        }
        
        // Handle Enter key in search
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
        
        // Auto-focus search input
        setTimeout(() => {
            document.getElementById('searchInput').focus();
        }, 1000);
        
        // Add click effect to suggestion items
        document.querySelectorAll('.suggestion-item').forEach(item => {
            item.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'translateY(-5px)';
                }, 150);
            });
        });
        
        // Error code animation
        const errorCode = document.querySelector('.error-code');
        let scale = 1;
        let direction = 0.001;
        
        function animateErrorCode() {
            scale += direction;
            if (scale > 1.05 || scale < 0.95) {
                direction *= -1;
            }
            errorCode.style.transform = `scale(${scale})`;
            requestAnimationFrame(animateErrorCode);
        }
        
        // Initialize everything
        document.addEventListener('DOMContentLoaded', function() {
            createBalloons();
            animateErrorCode();
            
            // Add error sound effect (optional)
            const errorSound = new Audio('data:audio/wav;base64,UklGRigAAABXQVZFZm10IBIAAAABAAEAQB8AAEAfAAABAAgAZGF0YQ');
            errorSound.volume = 0.1;
            
            // Play error sound on page load
            setTimeout(() => {
                try {
                    errorSound.play().catch(() => {
                        // Sound playback failed, ignore
                    });
                } catch (e) {
                    // Ignore sound errors
                }
            }, 500);
            
            // Log error to console (for debugging)
            console.error(`Error ${<?php echo $error_code; ?>}: <?php echo addslashes($error_title); ?>`);
            console.log('🎂 Even errors can be fun on a birthday website! 🎉');
            
            // Easter egg: secret code
            let konamiCode = [];
            const secretCode = [
                'ArrowUp', 'ArrowUp',
                'ArrowDown', 'ArrowDown',
                'ArrowLeft', 'ArrowRight',
                'ArrowLeft', 'ArrowRight',
                'b', 'a'
            ];
            
            document.addEventListener('keydown', (e) => {
                konamiCode.push(e.key);
                konamiCode = konamiCode.slice(-secretCode.length);
                
                if (konamiCode.join(',') === secretCode.join(',')) {
                    // Konami code activated!
                    alert('🎉 Secret Birthday Mode Activated! 🎂\n\nEnjoy the celebration!');
                    document.body.style.background = 'linear-gradient(135deg, #ff6b6b, #4d96ff, #ffd166, #06d6a0, #9d4edd)';
                    document.body.style.backgroundSize = '400% 400%';
                    document.body.style.animation = 'rainbow 5s ease infinite';
                    
                    const style = document.createElement('style');
                    style.textContent = `
                        @keyframes rainbow {
                            0% { background-position: 0% 50%; }
                            50% { background-position: 100% 50%; }
                            100% { background-position: 0% 50%; }
                        }
                    `;
                    document.head.appendChild(style);
                }
            });
        });
        
        // Auto-refresh after 30 seconds (optional)
        setTimeout(() => {
            // Try to refresh only if it's a 503 error
            if (<?php echo $error_code; ?> === '503') {
                window.location.reload();
            }
        }, 30000);
    </script>
</body>
</html>