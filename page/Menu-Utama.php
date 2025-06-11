<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Revolusi Food Industri</title>
</head>

<body>
    <?php
    require_once('model/Banner.php');
    $banner = new Banner();
    $banners = $banner->getAll();
    ?>
    <div class="bagian-utama">
        <!-- Bagian Kiri (Slider) -->
        <div class="bagian-kiri">
            <div class="slider">
                <div class="slide-container">
                    <?php foreach ($banners as $index => $row): ?>
                        <div class="slide" id="slide<?= $index + 1 ?>">
                            <a href="<?= htmlspecialchars($row['link'] ?? '#') ?>">
                                <img src="img/<?= htmlspecialchars($row['cover']) ?>" alt="Slide <?= $index + 1 ?>">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="navigasi-manual">
                    <?php foreach ($banners as $index => $row): ?>
                        <label for="slide<?= $index + 1 ?>" class="titik<?= $index === 0 ? ' active' : '' ?>"></label>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Bagian Kanan (Kartu) -->
        <div class="bagian-kanan">
            <div class="kartu">
                <a href="#">
                    <img src="img/ralali2.jpg" alt="Kartu 1">
                </a>
            </div>
            <div class="kartu">
                <a href="#">
                    <img src="img/ralali3.jpg" alt="Kartu 2">
                </a>
            </div>
        </div>
    </div>

    <?php
    require_once('model/Partner.php');
    $partner = new Partner();
    $partners = $partner->getAll();
    ?>
    <p class="p1">Partners</p>
    <div class="partners-container">
        <button class="nav-btn prev" id="prevBtn">
            <i class="ri-arrow-left-s-line"></i>
        </button>
        <div class="partners-slider-wrapper">
            <div class="partners-slider" id="partners-slider">
                <?php foreach ($partners as $row): ?>
                    <div class="logo-box">
                        <img src="img/<?= htmlspecialchars($row['cover']) ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <button class="nav-btn next" id="nextBtn">
            <i class="ri-arrow-right-s-line"></i>
        </button>
    </div>

    <?php
    require_once('model/Artikel.php');
    $artikel = new Artikel();
    $artikels = $artikel->getAll();
    ?>
    <p class="p2">Artikel Seputar Bisnis</p>
    <div class="artikel-container">
        <!-- Tombol Scroll Kiri -->
        <button class="scroll-kiri" id="scrollKiri">
            <i class="ri-arrow-left-s-line"></i>
        </button>

        <!-- Artikel -->
        <div class="articles" id="artikelScroll">
            <?php foreach ($artikels as $row): ?>
                <div class="article-card">
                    <a href="index.php?module=detail&page=detail-artikel&id=<?= $row['id']; ?>">
                        <img src="img/<?= htmlspecialchars($row['cover']) ?>" alt="<?= htmlspecialchars($row['judul']) ?>">
                        <p><?= htmlspecialchars(substr(strip_tags($row['deskripsi']), 0, 80)); ?>...</p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Tombol Scroll Kanan -->
        <button class="scroll-kanan" id="scrollKanan">
            <i class="ri-arrow-right-s-line"></i>
        </button>
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.slide');
            const dots = document.querySelectorAll('.titik');
            const slideContainer = document.querySelector('.slide-container');

            let current = 0;

            function updateSlider() {
                slideContainer.style.transform = `translateX(-${current * 100}%)`;

                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === current);
                });
            }

            function nextSlide() {
                current = (current + 1) % slides.length;
                updateSlider();
            }

            setInterval(nextSlide, 5000);

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    current = index;
                    updateSlider();
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const slider = document.getElementById("partners-slider");
            const slides = slider.querySelectorAll(".logo-box");
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");

            const itemWidth = slides[0].offsetWidth + 20; // Width + gap
            const visibleArea = slider.parentElement.clientWidth;

            let currentIndex = 0;

            // Hitung maksimal index agar logo terakhir tidak terpotong
            const maxIndex = Math.max(0, Math.ceil((slider.scrollWidth - visibleArea) / itemWidth));

            function updateSlider() {
                const offset = currentIndex * itemWidth;

                slider.style.transform = `translateX(-${offset}px)`;

                // Tombol kiri hilang jika di paling kiri
                if (currentIndex <= 0) {
                    prevBtn.classList.add("hidden");
                } else {
                    prevBtn.classList.remove("hidden");
                }

                // Tombol kanan hilang jika sudah sampai logo paling kanan
                if (currentIndex >= maxIndex) {
                    nextBtn.classList.add("hidden");
                } else {
                    nextBtn.classList.remove("hidden");
                }
            }

            prevBtn.addEventListener("click", () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateSlider();
                }
            });

            nextBtn.addEventListener("click", () => {
                if (currentIndex < maxIndex) {
                    currentIndex++;
                    updateSlider();
                }
            });

            // Inisialisasi awal
            updateSlider();
        });


        const scrollContainer = document.getElementById('artikelScroll');
        const scrollKiri = document.getElementById('scrollKiri');
        const scrollKanan = document.getElementById('scrollKanan');

        // Scroll ke kanan
        scrollKanan.addEventListener('click', () => {
            scrollContainer.scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        });

        // Scroll ke kiri
        scrollKiri.addEventListener('click', () => {
            scrollContainer.scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        });

        // Fungsi cek scroll untuk menyembunyikan tombol
        function cekScroll() {
            const scrollLeft = scrollContainer.scrollLeft;
            const maxScrollLeft = scrollContainer.scrollWidth - scrollContainer.clientWidth;

            // Tampilkan atau sembunyikan tombol kiri
            if (scrollLeft <= 0) {
                scrollKiri.style.display = 'none';
            } else {
                scrollKiri.style.display = 'block';
            }

            // Tampilkan atau sembunyikan tombol kanan
            if (scrollLeft >= maxScrollLeft - 1) {
                scrollKanan.style.display = 'none';
            } else {
                scrollKanan.style.display = 'block';
            }
        }

        // Jalankan saat scroll, load, dan resize
        scrollContainer.addEventListener('scroll', cekScroll);
        window.addEventListener('load', () => {
            setTimeout(cekScroll, 300); // tunggu gambar loading
        });
        window.addEventListener('resize', cekScroll);
    </script>
</body>

</html>