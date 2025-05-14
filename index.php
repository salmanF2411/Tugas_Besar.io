<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Ruparupa</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Headerrr -->
    <header>
        <div class="top-bar">
            <div class="top-bar-container">
                <div class="top-bar-left">
                    <span><i class="ri-smartphone-line"></i> <strong>Download</strong> aplikasi ruparupa</span>
                    <span><i class="ri-question-line"></i> Pusat Bantuan</span>
                    <span class="highlight">ruparupa.com</span>
                </div>
                <div class="top-bar-right">
                    <span class="highlight">ruparupa bisnis <span class="new-badge">NEW</span></span>
                    <span><i class="ri-paint-line"></i> Jasa Desain Interior</span>
                    <span><i class="ri-truck-line"></i> Gratis Ongkir</span>
                </div>
            </div>
        </div>
        
        <nav class="main-nav">
            <div class="nav-container">
                <a href="#" class="logo">
                    <img src="img/ruparupa.png" alt="Ruparupa">ruparupa
                </a>
                
                <div class="kategori-container">
                    <button class="kategori-btn" id="kategoriBtn">
                        <i class="ri-menu-line"></i> Kategori
                    </button>
                </div>
                
                <a href="#" class="inspirasi-link">Inspirasi</a>
                
                <div class="search-container">
                    <input type="text" placeholder="Cari Meja makan, kasur, kursi, dll">
                    <button class="search-btn">
                        <i class="ri-search-line"></i>
                    </button>
                </div>
                
                <div class="nav-right">
                    <div class="rewards">
                        <i class="ri-vip-crown-line rewards-crown"></i>
                        <span>rewards</span>
                    </div>
                    
                    <i class="ri-notification-3-line nav-icon">
                        <span class="badge">3</span>
                    </i>
                    
                    <i class="ri-shopping-cart-2-line nav-icon">
                        <span class="badge">5</span>
                    </i>
                    
                    <div class="auth-buttons">
                        <a href="admin/login.php"><button class="masuk-btn">Masuk</button></a>
                        <a href="admin/login.php"><button class="daftar-btn">Daftar</button></a>
                    </div>
                </div>
            </div>
        </nav>
        
        <div class="category-menu">
            <div class="menu-container">
                <a href="#" class="menu-link">Best Deals</a>
                <a href="#" class="menu-link category-trigger" data-category="furniture">Furnitur</a>
                <a href="#" class="menu-link category-trigger" data-category="storage">Rak dan Penyimpanan</a>
                <a href="#" class="menu-link category-trigger" data-category="kitchen">Dapur Minimalis</a>
                <a href="#" class="menu-link category-trigger" data-category="electronics">Elektronik & Gadget</a>
                <a href="#" class="menu-link category-trigger" data-category="household">Rumah Tangga</a>
                <a href="#" class="menu-link category-trigger" data-category="improvement">Home Improvement</a>
                <a href="#" class="menu-link category-trigger" data-category="bath">Bed & Bath</a>
                <a href="#" class="menu-link category-trigger" data-category="hobby">Hobi & Gaya Hits</a>
            </div>
            
            <div class="mega-dropdown" id="megaDropdown">
                <div class="dropdown-container">
                    <!--javascript -->
                </div>
            </div>
        </div>
    </header>

    <!-- Mainnn -->
    <div class="container">
        <div class="main-section">
            <div class="left-section">
                <h2>Revolusi Food Industri dengan Food Technology!</h2>
                <ul>
                    <li>Bantuan permodalan</li>
                    <li>Produksi skala besar dan kualitas terjamin</li>
                    <li>Distribusi luas di berbagai saluran penjualan</li>
                </ul>
                <button >Gabung Sekarang</button>
            </div>
            <div class="right-section">
                <div class="card"><p>100% Efektif & Efisien Perluas Bisnis Kamu</p> 
                    <button >Gabung Sekarang</button>
                </div>
                <div class="card"><p>Permudah Bayar Bulanan Perusahaan Anda</p> 
                    <button >Gabung Sekarang</button>
                </div>
                
            </div>
        </div>
        <p class="p1">partners</p>
        <div class="partners">
            <img src="img/aqua.jpg" alt="Partner 1">
            <img src="img/aqua.jpg" alt="Partner 2">
            <img src="img/mayor.jpg" alt="Partner 3">
            <img src="img/mayor.jpg" alt="Partner 4">
            <img src="img/aqua.jpg" alt="Partner 1">
            <img src="img/aqua.jpg" alt="Partner 2">
            <img src="img/mayor.jpg" alt="Partner 3">
        </div>

        <p class="p2">Artikel Seputar Bisnis</p>
        <div class="articles">
            <div class="article-card">
                <img src="img/chef.jpg" alt="Teknologi Ritel">
                <p>Mengupas Teknologi Ritel...</p>
            </div>
            <div class="article-card">
                <img src="img/chef.jpg" alt="Penipuan Bisnis">
                <p>Waspada Penipuan Bisnis...</p>
            </div>
            <div class="article-card">
                <img src="img/chef.jpg" alt="Tren Bisnis">
                <p>Mengungkap Tren Bisnis...</p>
            </div>
            <div class="article-card">
                <img src="img/chef.jpg" alt="Inovasi Robotik">
                <p>Inovasi Robotik dalam Industri...</p>
            </div>
        </div>
        </div>

        <footer>
            <div class="footer-container">
                <div class="footer-section">
                    <h3>BERGABUNG SEBAGAI TENANT</h3>
                    <button class="join-btn">Join Now!</button>
                    <h3>AKUN</h3>
                    <p>Masuk Akun</p>
                    <p>Register</p>
                </div>
                <div class="footer-section">
                    <h3>BUTUH BANTUAN?</h3>
                    <p>Senin - Jumat: 08:00 - 20:00 WIB</p>
                    <p>Sabtu - Minggu / Libur Nasional: 11:00 - 20:00 WIB</p>
                    <p>✉ customer@hijup.com</p>
                    <p>📍 Pejaten Barat Raya No. 2B Pasar Minggu, Jakarta Selatan, 12510</p>
                    <button>HUBUNGI KAMI</button>
                    <button class="wa">WHATSAPP</button>
                </div>
                <div class="footer-section">
                    <h3>TELUSURI KAMI</h3>
                    <p>Tentang HIJUP</p>
                    <p>Press</p>
                    <p>Kebijakan</p>
                    <p>Syarat dan Ketentuan</p>
                    <p>Karir</p>
                    <p>Indeks Produk</p>
                    <p>HIJUP Warehouse Store</p>
                    <p>HIJUP Partnership Store</p>
                </div>
                <div class="footer-section">
                    <h3>BANTUAN</h3>
                    <p>Panduan Pembayaran</p>
                    <p>HIJUP Point</p>
                    <p>Pengembalian dan Penukaran</p>
                    <p>Cash on Delivery</p>
                    <p>Pengiriman Internasional</p>
                    <p>FAQ</p>
                    <p>Size Guide</p>
                    <p>Panduan Material</p>
                </div>
                <div class="footer-section">
                    <h3>TETAP TERHUBUNG DENGAN KAMI</h3>
                    <p>📷 📘 🐦 🎥 🔗</p>
                    <h3>DAPATKAN APLIKASI KAMI</h3>
                    <p>Download Aplikasi HIJUP Sekarang Juga!</p>
                    <img class="go" src="img/goplay.jpg" alt="Google Play">
                    <img class="app" src="img/appstore.jpg" alt="App Store">
                </div>
            </div>
            <div class="payment-shipping">
                <h3>METODE PEMBAYARAN</h3>
                <div class="logos">
                    <img src="img/mandiri.jpg" alt="Mandiri">
                    <img src="img/bca.jpg" alt="BCA">
                    <img src="img/visa.jpg" alt="Visa">
                    <img src="img/masrter.jpg" alt="MasterCard">
                    <img src="img/paypal.jpg" alt="PayPal">
                    <img src="img/ovo.jpg" alt="OVO">
                    <img src="img/america.jpg" alt="American Express">
                    <img src="img/dana.jpg" alt="JCB">
                    <img src="img/brimo.jpg" alt="BRImo">
                    <img src="img/gopay.jpg" alt="GoPay">
                </div>
            
                <h3>LAYANAN PENGIRIMAN</h3>
                <div class="logos">
                    <img src="img/jnt.jpg" alt="JNE">
                    <img src="img/anter.jpg" alt="Anteraja">
                    <img src="img/sicepat.jpg" alt="SiCepat">
                    <img src="img/janio.jpg" alt="Janio">
                    <img src="img/dhl.jpg" alt="DHL">
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2011 - 2025 PT. HIJUP.COM. All Rights Reserved.</p>
            </div>
        </footer>

        <script src="script.js"></script>
</body>
</html>
