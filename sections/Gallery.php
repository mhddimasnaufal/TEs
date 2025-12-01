<section id="gallery" class="py-5">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Galeri Kenangan</h2>
            <p class="text-muted">Momen-momen indah yang abadi</p>
        </div>
        
        <!-- Gallery Tabs -->
        <ul class="nav nav-pills justify-content-center mb-5" id="galleryTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="grid-tab" data-bs-toggle="pill" data-bs-target="#grid" type="button">
                    <i class="fas fa-th-large me-2"></i>Grid View
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="carousel-tab" data-bs-toggle="pill" data-bs-target="#carousel" type="button">
                    <i class="fas fa-images me-2"></i>3D Carousel
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="cube-tab" data-bs-toggle="pill" data-bs-target="#cube" type="button">
                    <i class="fas fa-cube me-2"></i>Photo Cube
                </button>
            </li>
        </ul>
        
        <!-- Gallery Content -->
        <div class="tab-content" id="galleryTabsContent">
            <!-- Grid View -->
            <div class="tab-pane fade show active" id="grid" role="tabpanel">
                <div class="gallery-grid">
                    <?php
                    // Sample images - in real implementation, these would be actual images
                    $images = [
                        ['src' => 'assets/images/naila-1.jpg', 'alt' => 'Naila 1'],
                        ['src' => 'assets/images/naila-2.jpg', 'alt' => 'Naila 2'],
                        ['src' => 'assets/images/naila-3.jpg', 'alt' => 'Naila 3'],
                        ['src' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?w=400&h=400&fit=crop', 'alt' => 'Portrait 1'],
                        ['src' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?w-400&h=400&fit=crop', 'alt' => 'Portrait 2'],
                        ['src' => 'https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?w=400&h=400&fit=crop', 'alt' => 'Portrait 3'],
                    ];
                    
                    foreach ($images as $index => $image) {
                        echo '
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="' . ($index * 100) . '">
                            <img src="' . $image['src'] . '" alt="' . $image['alt'] . '" class="img-fluid">
                            <div class="gallery-overlay">
                                <div class="text-center text-white">
                                    <i class="fas fa-search-plus fa-2x mb-2"></i>
                                    <p>Lihat Detail</p>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                </div>
            </div>
            
            <!-- 3D Carousel -->
            <div class="tab-pane fade" id="carousel" role="tabpanel">
                <div class="text-center py-5">
                    <div id="carousel3D" style="height: 400px;"></div>
                    <p class="mt-3">3D Carousel akan muncul di sini</p>
                </div>
            </div>
            
            <!-- Photo Cube -->
            <div class="tab-pane fade" id="cube" role="tabpanel">
                <div class="text-center py-5">
                    <div id="photoCube" style="height: 400px;"></div>
                    <p class="mt-3">3D Photo Cube akan muncul di sini</p>
                </div>
            </div>
        </div>
        
        <!-- Photo Modal -->
        <div class="modal fade" id="galleryModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content glass-card border-0">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-0">
                        <img id="modalImage" src="" class="img-fluid w-100 rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>