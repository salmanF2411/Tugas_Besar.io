<div class="main-section">
    <div class="left-section">
        <a href=""></a>
        <!-- <h2>Revolusi Food Industri dengan Food Technology!</h2>
        <ul>
            <li>Bantuan permodalan</li>
            <li>Produksi skala besar dan kualitas terjamin</li>
            <li>Distribusi luas di berbagai saluran penjualan</li>
        </ul>
        <button>Gabung Sekarang</button> -->
    </div>
    <div class="right-section">
        <div class="card">
            <a href=""></a>
            <!-- <p>100% Efektif & Efisien Perluas Bisnis Kamu</p>
            <p>100% Efektif & Efisien Perluas Bisnis Kamu</p>
            <button>Gabung Sekarang</button> -->
        </div>
        <div class="card">
            <a href=""></a>
            <!-- <p>Permudah Bayar Bulanan Perusahaan Anda</p>
            <p>Permudah Bayar Bulanan Perusahaan Anda</p>
            <button>Gabung Sekarang</button> -->
        </div>
    </div>
</div>
<?php
require_once('model/Partner.php');
$partner = new Partner();
$partners = $partner->getAll();
?>
<p class="p1">Partners</p>
<div class="partners">
    <?php foreach ($partners as $row): ?>
        <img src="img/<?= "$row[cover] " ?>" alt="Partner 1">
    <?php endforeach; ?>
</div>


<?php
require_once('model/Artikel.php');
$artikel = new Artikel();
$artikels = $artikel->getAll();
?>
<p class="p2">Artikel Seputar Bisnis</p>
<div class="articles">
    <?php foreach ($artikels as $row): ?>
        <div class="article-card">
            <a href="index.php?module=detail&page=detail-artikel&id=<?= $row['id']; ?>">
                <img src="img/<?= htmlspecialchars($row['cover']) ?>" alt="<?= htmlspecialchars($row['judul']) ?>" style="width:100%; height:200px; object-fit:cover;">
                <p><?= htmlspecialchars(substr(strip_tags($row['deskripsi']), 0, 80)); ?>...</p>
            </a>
        </div>
    <?php endforeach; ?>
</div>
