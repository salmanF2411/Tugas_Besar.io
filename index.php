<?php
require_once 'auth/session.php';
$session = new Session();
?>
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
                    <?php if (isset($_SESSION['email']) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <a class="admin" href="admin/dashboard.php">Admin Panel</a>
                    <?php endif; ?>
                    <span class="highlight">ruparupa bisnis <span class="new-badge">NEW</span></span>
                    <span><i class="ri-paint-line"></i> Jasa Desain Interior</span>
                    <span><i class="ri-truck-line"></i> Gratis Ongkir</span>
                </div>
            </div>
        </div>

        <nav class="main-nav">
            <div class="nav-container">
                <a href="<?= 'index.php'; ?>" class="logo">
                    <img src="img/ruparupa.png" alt="Ruparupa">ruparupa
                </a>

                <!-- <div class="kategori-container">
                    <button class="kategori-btn" id="kategoriBtn">
                        <i ></i> Kategori
                    </button>
                </div> -->

                <a href="#" class="kategori-link">Kategori</a>
                <a href="<?= 'index.php?module=layanan&page=layanan' ?>" class="inspirasi-link">Layanan</a>

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

                    <a style="text-decoration: none;" href="<?= 'index.php?module=keranjang&page=keranjang' ?>" alt="keranjang"><i class="ri-shopping-cart-2-line nav-icon">
                            <span class="badge">5</span>
                        </i></a>

                    <div class="auth-buttons">
                        <?php if (!isset($_SESSION['email'])) { ?>
                            <a href="auth/loginForm.php"><button class="masuk-btn">Masuk</button></a>
                            <a href="auth/registerForm.php"><button class="daftar-btn">Daftar</button></a>
                        <?php } else { ?>
                            <form action="" method="post">
                                <input type="submit" name="logout" value="Logout" class="keluar-btn" />
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>

        <div class="category-menu">
            <div class="menu-container">
                <a href="<?= 'index.php?module=produk&page=furniture' ?>" class="menu-link category-trigger" data-category="furnitur">Furnitur</a>
                <a href="<?= 'index.php?module=produk&page=rak-penyimpanan' ?>" class="menu-link category-trigger" data-category="storage">Rak dan Penyimpanan</a>
                <a href="<?= 'index.php?module=produk&page=sepatu' ?>" class="menu-link category-trigger" data-category="kitchen">Sepatu</a>
                <a href="<?= 'index.php?module=produk&page=elektronik' ?>" class="menu-link category-trigger" data-category="electronics">Elektronik & Gadget</a>
                <a href="<?= 'index.php?module=produk&page=baju' ?>" class="menu-link category-trigger" data-category="household">Baju</a>
                <a href="<?= 'index.php?module=produk&page=buku' ?>" class="menu-link category-trigger" data-category="bath">Buku</a>
                <a href="<?= 'index.php?module=produk&page=kendaraan' ?>" class="menu-link category-trigger" data-category="hobby">Kendaraan</a>
            </div>

            <div class="mega-dropdown" id="megaDropdown">
                <div class="dropdown-container">
                    <!-- Furniture Category -->
                    <div class="dropdown-column furniture-column" style="display:none">
                        <ul>
                            <li><a href="<?= 'index.php?module=furniture&page=meja-makan' ?>">Meja Makan</a></li>
                            <li><a href="<?= 'index.php?module=furniture&page=sofa' ?>">Sofa</a></li>
                        </ul>
                    </div>
                    <div class="dropdown-column furniture-column">
                        <ul>
                            <li><a href="<?= 'index.php?module=furniture&page=tempat-tidur' ?>">Tempat Tidur</a></li>
                            <li><a href="<?= 'index.php?module=furniture&page=meja-kerja' ?>">Meja Kerja</a></li>
                        </ul>
                    </div>
                    <div class="dropdown-column furniture-column">
                        <ul>
                            <li><a href="<?= 'index.php?module=furniture&page=kabinet' ?>">Kabinet</a></li>
                            <li><a href="<?= 'index.php?module=furniture&page=rak-tv' ?>">Rak TV</a></li>
                        </ul>
                    </div>

                    <!-- Storage Category (hidden by default) -->
                    <div class="dropdown-column storage-column" style="display:none">
                        <ul>
                            <li><a href="<?= 'index.php?module=Rak-Penyimpanan&page=rak-buku' ?>">Rak Buku</a></li>
                            <li><a href="<?= 'index.php?module=Rak-Penyimpanan&page=rak-sepatu' ?>">Rak Sepatu</a></li>
                        </ul>
                    </div>
                    <div class="dropdown-column storage-column" style="display:none">
                        <ul>
                            <li><a href="<?= 'index.php?module=Rak-Penyimpanan&page=rak-dinding' ?>">Rak Dinding</a></li>
                            <li><a href="<?= 'index.php?module=Rak-Penyimpanan&page=lemari-penyimpanan' ?>">Lemari Penyimpanan</a></li>
                        </ul>
                    </div>

                    <!-- Kitchen Category (hidden by default) -->
                    <div class="dropdown-column kitchen-column" style="display:none">
                        <ul>
                            <li><a href="<?= 'index.php?module=dapur&page=kompor' ?>">Kompor</a></li>
                            <li><a href="<?= 'index.php?module=dapur&page=blender' ?>">Blender</a></li>
                        </ul>
                    </div>
                    <div class="dropdown-column kitchen-column" style="display:none">
                        <ul>
                            <li><a href="<?= 'index.php?module=dapur&page=meja-dapur' ?>">Meja Dapur</a></li>
                            <li><a href="<?= 'index.php?module=dapur&page=rice-cooker' ?>">Rice Cooker</a></li>
                        </ul>
                    </div>

                    <!-- Electronics Category (hidden by default) -->
                    <div class="dropdown-column electronics-column" style="display:none">
                        <ul>
                            <li><a href="<?= 'index.php?module=electronics&page=tv' ?>">TV</a></li>
                            <li><a href="<?= 'index.php?module=electronics&page=kulkas' ?>">Kulkas</a></li>
                        </ul>
                    </div>
                    <div class="dropdown-column electronics-column" style="display:none">
                        <ul>
                            <li><a href="<?= 'index.php?module=electronics&page=ac' ?>">AC</a></li>
                            <li><a href="<?= 'index.php?module=electronics&page=mesin-cuci' ?>">Mesin Cuci</a></li>
                        </ul>
                    </div>

                    <!-- Household Category (hidden by default) -->
                    <div class="dropdown-column household-column" style="display:none">
                        <ul>
                            <li><a href="<?= 'index.php?module=rumah-tangga&page=vacum-cleaner' ?>">Vacuum Cleaner</a></li>
                            <li><a href="<?= 'index.php?module=rumah-tangga&page=setrika' ?>">Setrika</a></li>
                        </ul>
                    </div>
                    <div class="dropdown-column household-column" style="display:none">
                        <ul>
                            <li><a href="<?= 'index.php?module=rumah-tangga&page=kipas-angin' ?>">Kipas Angin</a></li>
                            <li><a href="<?= 'index.php?module=rumah-tangga&page=pembersih-udara' ?>">Pembersih Udara</a></li>
                        </ul>
                    </div>


                    <!-- Bath Category (hidden by default) -->
                    <div class="dropdown-column bath-column" style="display:none">
                        <ul>
                            <li><a href="<?= 'index.php?module=kamar&page=tempat-tidur' ?>">Tempat Tidur</a></li>
                            <li><a href="<?= 'index.php?module=kamar&page=kasur' ?>">Kasur</a></li>
                        </ul>
                    </div>
                    <div class="dropdown-column bath-column" style="display:none">
                        <ul>
                            <li><a href="<?= 'index.php?module=kamar&page=bantal' ?>">Bantal</a></li>
                            <li><a href="<?= 'index.php?module=kamar&page=selimut' ?>">Selimut</a></li>
                        </ul>
                    </div>

                    <!-- Hobby Category (hidden by default) -->
                    <div class="dropdown-column hobby-column" style="display:none">
                        <ul>
                            <li><a href="<?= 'index.php?module=hobi-gaya&page=alat-musik' ?>">Alat Musik</a></li>
                            <li><a href="<?= 'index.php?module=hobi-gaya&page=alat-olahraga' ?>">Alat Olahraga</a></li>
                        </ul>
                    </div>

                    <div class="dropdown-column hobby-column" style="display:none">
                        <ul>
                            <li><a href="<?= 'index.php?module=hobi-gaya&page=alat-traveling' ?>">Alat Traveling</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Mainnn -->
    <div class="container">
        <?php
        $page = 'page/Menu-Utama.php';
        if (isset($_GET['module'])) {
            $page = 'page/' . $_GET['module'] . '/' . $_GET['page'] . '.php';
        }
        require($page);
        ?>
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
                <img class="go" src="img/playStore.jpg" alt="Google Play">
                <img class="app" src="img/AppStore.jpg" alt="App Store">
            </div>
        </div>

        <?php
        require_once('model/Mpembayaran.php');
        $pembayaran = new Mpembayaran();
        $pembayarans = $pembayaran->getAll();
        ?>
        <div class="payment-shipping">
            <h3>METODE PEMBAYARAN</h3>
            <div class="logos">
                <?php foreach ($pembayarans as $row): ?>
                    <img src="img/<?= "$row[cover] " ?>" alt="Mandiri">
                    <!-- <img src="img/bca.jpg" alt="BCA">
                <img src="img/visa.jpg" alt="Visa">
                <img src="img/masrter.jpg" alt="MasterCard">
                <img src="img/paypal.jpg" alt="PayPal">
                <img src="img/ovo.jpg" alt="OVO">
                <img src="img/america.jpg" alt="American Express">
                <img src="img/dana.jpg" alt="JCB">
                <img src="img/brimo.jpg" alt="BRImo">
                <img src="img/gopay.jpg" alt="GoPay"> -->
                <?php endforeach; ?>
            </div>
            <br><br>


            <?php
            require_once('model/Mpengiriman.php');
            $pengiriman = new Mpengiriman();
            $pengirimans = $pengiriman->getAll();
            ?>
            <h3>LAYANAN PENGIRIMAN</h3>
            <div class="logos">
                <?php foreach ($pengirimans as $row): ?>
                    <img src="img/<?= "$row[cover] " ?>" alt="JNE">
                    <!-- <img src="img/anter.jpg" alt="Anteraja">
                <img src="img/sicepat.jpg" alt="SiCepat">
                <img src="img/janio.jpg" alt="Janio">
                <img src="img/dhl.jpg" alt="DHL"> -->
                <?php endforeach; ?>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2011 - 2025 PT. HIJUP.COM. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>