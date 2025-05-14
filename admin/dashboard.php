<?php 
  session_start();
  if(!isset($_SESSION['id_pengguna'])){
    header("location:login.php"); 
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Ruparupa</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3>
                <img src="../img/ruparupa.png" alt="Ruparupa">
                Admin Panel
            </h3>
        </div>
        <div class="sidebar-menu">
            <a href="dashboard.php" class="active">
                <i class="ri-dashboard-line"></i> Dashboard
            </a>
            <a href="artikel.php">
                <i class="ri-article-line"></i> Artikel
            </a>
            <a href="produk.php">
                <i class="ri-store-2-line"></i> Produk
            </a>
            <a href="layanan.php">
                <i class="ri-customer-service-2-line"></i> Layanan
            </a>
            <a href="pelanggan.php">
                <i class="ri-team-line"></i> Pelanggan
            </a>
            <a href="laporan.php">
                <i class="ri-file-chart-line"></i> Laporan
            </a>
            <a href="pengaturan.php">
                <i class="ri-settings-3-line"></i> Pengaturan
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <!-- Enhanced Navbar -->
        <nav class="admin-navbar">
            <div class="nav-left">
                <button class="toggle-btn" id="toggle-btn">
                    <i class="ri-menu-line"></i>
                </button>
                
                <div class="search-container">
                    <i class="ri-search-line"></i>
                    <input type="text" placeholder="Cari produk, pelanggan, pesanan...">
                </div>
            </div>
            
            <div class="admin-nav-right">
                <div class="notification-icon nav-icon" id="notification-icon">
                    <i class="ri-notification-3-line"></i>
                    <span class="badge">3</span>
                    <div class="notification-dropdown" id="notification-dropdown">
                        <div class="notification-header">
                            <h4>Notifikasi</h4>
                            <a href="#">Lihat Semua</a>
                        </div>
                        <div class="notification-item unread">
                            <div class="notification-content">
                                <strong>Pesanan Baru</strong> - #ORD-2023-0567
                            </div>
                            <div class="notification-time">5 menit yang lalu</div>
                        </div>
                        <div class="notification-item">
                            <div class="notification-content">
                                <strong>Ulasan Baru</strong> - 5 bintang untuk Meja Makan Minimalis
                            </div>
                            <div class="notification-time">3 jam yang lalu</div>
                        </div>
                        <div class="notification-item">
                            <div class="notification-content">
                                <strong>Pembayaran Diterima</strong> - Rp 1.250.000
                            </div>
                            <div class="notification-time">Kemarin, 14:32</div>
                        </div>
                    </div>
                </div>
                
                <div class="nav-icon">
                    <i class="ri-mail-line"></i>
                    <span class="badge">2</span>
                </div>
                
                <div class="admin-profile" id="profile-dropdown">
                    <img src="../img/ruparupa.png" alt="Admin">
                    <div class="profile-info">
                        <span class="profile-name">Admin Ruparupa</span>
                        <span class="profile-role">Super Admin</span>
                    </div>
                    <i class="ri-arrow-down-s-line dropdown-arrow"></i>
                    
                    <div class="dropdown-menu" id="dropdown-menu">
                        <a href="profil.php">
                            <i class="ri-user-line"></i> Profil Saya
                        </a>
                        <a href="pengaturan-akun.php">
                            <i class="ri-settings-3-line"></i> Pengaturan Akun
                        </a>
                        <a href="aktivitas.php">
                            <i class="ri-history-line"></i> Aktivitas
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="logout.php">
                            <i class="ri-logout-box-r-line"></i> Keluar
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <div>
                    <h2>Selamat Datang, Admin!</h2>
                    <p>Anda memiliki 5 notifikasi baru dan 3 tugas yang perlu diselesaikan.</p>
                </div>
                <button class="close-btn">
                    <i class="ri-close-line"></i>
                </button>
            </div>

            <!-- Stats Cards -->
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-title">Total Pengunjung</span>
                        <div class="stat-icon" style="background: var(--primary-color);">
                            <i class="ri-user-line"></i>
                        </div>
                    </div>
                    <div class="stat-value">1,248</div>
                    <div class="stat-change up">
                        <i class="ri-arrow-up-line"></i> 12% dari bulan lalu
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-title">Total Produk</span>
                        <div class="stat-icon" style="background: var(--success-color);">
                            <i class="ri-shopping-bag-line"></i>
                        </div>
                    </div>
                    <div class="stat-value">356</div>
                    <div class="stat-change up">
                        <i class="ri-arrow-up-line"></i> 5 produk baru
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-title">Total Pesanan</span>
                        <div class="stat-icon" style="background: var(--warning-color);">
                            <i class="ri-shopping-cart-2-line"></i>
                        </div>
                    </div>
                    <div class="stat-value">189</div>
                    <div class="stat-change down">
                        <i class="ri-arrow-down-line"></i> 3% dari bulan lalu
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-title">Pendapatan</span>
                        <div class="stat-icon" style="background: var(--accent-color);">
                            <i class="ri-money-dollar-circle-line"></i>
                        </div>
                    </div>
                    <div class="stat-value">Rp 28,7jt</div>
                    <div class="stat-change up">
                        <i class="ri-arrow-up-line"></i> 8% dari bulan lalu
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <div class="quick-action">
                    <i class="ri-add-circle-line"></i>
                    <span>Tambah Produk</span>
                </div>
                <div class="quick-action">
                    <i class="ri-article-line"></i>
                    <span>Tulis Artikel</span>
                </div>
                <div class="quick-action">
                    <i class="ri-bar-chart-2-line"></i>
                    <span>Lihat Laporan</span>
                </div>
                <div class="quick-action">
                    <i class="ri-mail-line"></i>
                    <span>Pesan Baru</span>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="activity-section">
                <div class="section-header">
                    <h3>Aktivitas Terkini</h3>
                    <a href="#">Lihat Semua</a>
                </div>
                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="ri-shopping-cart-2-line"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Pesanan Baru</div>
                            <div class="activity-desc">Pesanan #ORD-2023-0567 telah dibuat</div>
                            <div class="activity-time">5 menit yang lalu</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="ri-user-add-line"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Pelanggan Baru</div>
                            <div class="activity-desc">Budi Santoso mendaftar sebagai pelanggan</div>
                            <div class="activity-time">1 jam yang lalu</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="ri-chat-3-line"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Ulasan Baru</div>
                            <div class="activity-desc">Ani memberikan rating 5 bintang untuk produk Meja Makan Minimalis</div>
                            <div class="activity-time">3 jam yang lalu</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="ri-price-tag-3-line"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Produk Baru</div>
                            <div class="activity-desc">Kursi Ergonomis telah ditambahkan ke katalog</div>
                            <div class="activity-time">Kemarin, 14:32</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="dashboard.js"></script>

</body>
</html>