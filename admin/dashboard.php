<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
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
            <a href="<?= 'dashboard.php'; ?>">
                <i class="ri-dashboard-line"></i> Dashboard
            </a>
            <a href="<?= 'dashboard.php?module=artikel&page=daftar-artikel' ?>">
                <i class="ri-article-line"></i> Artikel
            </a>
            <a href="<?= 'dashboard.php?module=produk&page=daftar-produk' ?>">
                <i class="ri-store-2-line"></i> Produk
            </a>
            <a href="<?= 'dashboard.php?module=layanan&page=daftar-layanan' ?>">
                <i class="ri-customer-service-2-line"></i> Layanan
            </a>
            <a href="<?= 'dashboard.php?module=pelanggan&page=daftar-pelanggan' ?>">
                <i class="ri-team-line"></i> Pelanggan
            </a>
            <a href="<?= 'dashboard.php?module=partners&page=daftar-partners' ?>">
                <i class="ri-group-2-fill"></i> Partners
            </a>
            <a href="<?= 'dashboard.php?module=metode-pembayaran&page=daftar-mpembayaran' ?>">
                <i class="ri-money-dollar-box-line"></i> Metode Pembayaran
            </a>
            <a href="<?= 'dashboard.php?module=metode-pengiriman&page=daftar-mpengiriman' ?>">
                <i class="ri-car-washing-line"></i> Metode Pengiriman
            </a>
            <a href="<?= 'dashboard.php?module=laporan&page=laporan' ?>">
                <i class="ri-file-chart-line"></i> Laporan
            </a>
            <a class="kembali" href="../index.php">
                <i class="ri-arrow-left-line"></i> Halaman Utama
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
                        <a href="../auth/logout.php">
                            <i class="ri-logout-box-r-line"></i> Keluar
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <?php
            $page = 'page/dashboard-main.php';
            if (isset($_GET['module'])) {
                $page = 'page/' . $_GET['module'] . '/' . $_GET['page'] . '.php';
            }
            require($page);
            ?>

        </div>
    </div>

    <script src="dashboard.js"></script>

</body>

</html>