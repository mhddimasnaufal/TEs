<?php
// Main entry point for the backend API
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// API Documentation Page
if ($_SERVER['REQUEST_METHOD'] === 'GET' && empty($_GET)) {
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation - Birthday Website for Naila</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f0b1e 0%, #2d1b69 100%);
            color: white;
            min-height: 100vh;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        header {
            text-align: center;
            margin-bottom: 3rem;
            padding: 2rem;
            background: rgba(255, 126, 185, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 126, 185, 0.2);
        }
        
        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            background: linear-gradient(45deg, #ff7eb9, #9d4edd, #ffd166);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }
        
        .subtitle {
            color: #ffd166;
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }
        
        .info-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s ease;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
            border-color: #ff7eb9;
        }
        
        .info-card h3 {
            color: #9d4edd;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }
        
        .info-card p {
            color: #ccc;
            line-height: 1.6;
        }
        
        .api-section {
            margin-bottom: 3rem;
        }
        
        .endpoint {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-left: 4px solid #ff7eb9;
        }
        
        .method {
            display: inline-block;
            padding: 0.3rem 1rem;
            background: #ff7eb9;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            margin-right: 1rem;
        }
        
        .url {
            font-family: monospace;
            color: #ffd166;
            word-break: break-all;
        }
        
        .description {
            margin: 1rem 0;
            color: #ccc;
        }
        
        .response {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 5px;
            padding: 1rem;
            margin-top: 1rem;
            overflow-x: auto;
        }
        
        .response pre {
            color: #9d4edd;
            font-family: monospace;
            white-space: pre-wrap;
        }
        
        .birthday-info {
            text-align: center;
            padding: 2rem;
            background: linear-gradient(45deg, rgba(255, 126, 185, 0.1), rgba(157, 78, 221, 0.1));
            border-radius: 20px;
            margin-bottom: 3rem;
        }
        
        .birthday-info h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #ff7eb9;
        }
        
        .birthday-details {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            margin-top: 1.5rem;
        }
        
        .detail {
            text-align: center;
        }
        
        .detail-value {
            font-size: 2rem;
            font-weight: bold;
            color: #ffd166;
            display: block;
        }
        
        .detail-label {
            color: #9d4edd;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .birthday-details {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>🎉 Birthday API Documentation</h1>
            <p class="subtitle">Backend API untuk Website Ulang Tahun Naila Nazla Pohan</p>
            <p>API ini menyediakan data untuk website hadiah ulang tahun ke-19</p>
        </header>
        
        <div class="birthday-info">
            <h2>📅 Informasi Ulang Tahun</h2>
            <p>Website ini dibuat khusus untuk merayakan ulang tahun:</p>
            <div class="birthday-details">
                <div class="detail">
                    <span class="detail-value">Naila Nazla Pohan</span>
                    <span class="detail-label">Nama Lengkap</span>
                </div>
                <div class="detail">
                    <span class="detail-value">19 Tahun</span>
                    <span class="detail-label">Usia (2025)</span>
                </div>
                <div class="detail">
                    <span class="detail-value">Medan</span>
                    <span class="detail-label">Tempat Lahir</span>
                </div>
                <div class="detail">
                    <span class="detail-value">02 Des 2006</span>
                    <span class="detail-label">Tanggal Lahir</span>
                </div>
            </div>
        </div>
        
        <div class="info-grid">
            <div class="info-card">
                <h3>🎯 Tujuan API</h3>
                <p>Menyediakan data dinamis untuk website hadiah ulang tahun, termasuk ucapan, galeri, dan informasi spesial.</p>
            </div>
            <div class="info-card">
                <h3>🔒 Keamanan</h3>
                <p>Menggunakan token authentication dengan enkripsi AES-256-CBC. Setiap request memerlukan token valid.</p>
            </div>
            <div class="info-card">
                <h3>📊 Format Data</h3>
                <p>Semua response dalam format JSON dengan struktur yang konsisten dan dokumentasi yang jelas.</p>
            </div>
            <div class="info-card">
                <h3>⚡ Performa</h3>
                <p>Optimized dengan caching, response time cepat, dan struktur yang scalable untuk berbagai request.</p>
            </div>
        </div>
        
        <div class="api-section">
            <h2>📡 Endpoints Tersedia</h2>
            
            <div class="endpoint">
                <div>
                    <span class="method">GET</span>
                    <span class="url">/api/getMessage.php</span>
                </div>
                <div class="description">
                    Mendapatkan data ucapan ulang tahun dan informasi dasar tentang Naila.
                </div>
                <div class="response">
                    <pre>{
    "status": "success",
    "token": "encrypted_token_here",
    "data": {
        "birthday_person": {
            "name": "Naila Nazla Pohan",
            "age": 19,
            "birthplace": "Medan",
            "birthdate": "02 Desember 2006",
            "current_year": 2025
        },
        "messages": [...]
    }
}</pre>
                </div>
            </div>
            
            <div class="endpoint">
                <div>
                    <span class="method">GET</span>
                    <span class="url">/api/getGallery.php</span>
                </div>
                <div class="description">
                    Mendapatkan data galeri foto kenangan yang akan ditampilkan di website.
                </div>
                <div class="response">
                    <pre>{
    "status": "success",
    "token": "encrypted_token_here",
    "data": [
        {
            "id": 1,
            "title": "Momen Spesial",
            "description": "Kenangan indah bersama",
            "image": "images/gallery1.jpg",
            "date": "2024-06-15",
            "category": "special"
        },
        ...
    ]
}</pre>
                </div>
            </div>
        </div>
        
        <div class="api-section">
            <h2>🔑 Authentication</h2>
            <div class="info-card">
                <h3>Token Header</h3>
                <p>Semua request harus menyertakan header Authorization dengan format:</p>
                <pre style="background: rgba(0,0,0,0.3); padding: 1rem; border-radius: 5px; margin-top: 1rem;">
Authorization: Bearer encrypted_token_here</pre>
                <p style="margin-top: 1rem;">Token akan diperbarui otomatis pada setiap response untuk keamanan maksimal.</p>
            </div>
        </div>
        
        <footer style="text-align: center; padding: 2rem; color: #9d4edd; border-top: 1px solid rgba(255,255,255,0.1); margin-top: 2rem;">
            <p>💝 Dibuat dengan penuh cinta untuk ulang tahun Naila Nazla Pohan</p>
            <p style="margin-top: 0.5rem; font-size: 0.9rem;">© 2025 Birthday Gift Website - All rights reserved</p>
        </footer>
    </div>
</body>
</html>
<?php
} else {
    // Jika bukan request GET atau ada parameter, arahkan ke 404
    header("HTTP/1.0 404 Not Found");
    echo json_encode([
        'status' => 'error',
        'message' => 'Endpoint not found'
    ]);
}
?>