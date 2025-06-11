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
                    <a href="<?='dashboard.php?module=produk&page=daftar-produk'?>"><i class="ri-add-circle-line"></i>
                    <span>Tambah Produk</span></a>
                </div>
                <div class="quick-action">
                    <a href="<?='dashboard.php?module=artikel&page=daftar-artikel'?>"><i class="ri-article-line"></i>
                    <span>Tulis Artikel</span></a>
                </div>
                <div class="quick-action">
                    <a href="<?='dashboard.php?module=laporan&page=laporan'?>"><i class="ri-bar-chart-2-line"></i>
                    <span>Lihat Laporan</span></a>
                </div>
                <div class="quick-action">
                    <a href="<?='dashboard.php?module=banner&page=daftar-banner'?>"><i class="ri-flag-line"></i>
                    <span>Banner</span></a>
                </div>
                <div class="quick-action">
                    <a href="<?='dashboard.php?module=reward&page=daftar-reward'?>"><i class="ri-vip-crown-line"></i>
                    <span>Reward</span></a>
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