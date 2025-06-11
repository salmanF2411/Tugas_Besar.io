<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
        }

        .modern-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px 20px;
        }

        .modern-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .modern-title {
            font-size: 26px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modern-title i {
            font-size: 28px;
        }

        .modern-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .modern-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.05);
            overflow: hidden;
            transition: 0.3s ease;
        }

        .modern-card:hover {
            transform: translateY(-4px);
        }

        .modern-card-image img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .no-image {
            width: 100%;
            height: 180px;
            background-color: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
            font-size: 14px;
            font-style: italic;
        }

        .modern-card-body {
            padding: 16px;
        }

        .modern-card-title {
            font-size: 1.1rem;
            margin: 0 0 5px;
            font-weight: 600;
        }

        .modern-card-price {
            color: #e63946;
            font-weight: bold;
            margin: 6px 0;
        }

        .modern-card-date {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .modern-actions {
            display: flex;
            gap: 12px;
        }

        .modern-action {
            color: #555;
            font-size: 18px;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .modern-action:hover {
            color: #007bff;
        }

        .modern-action.delete:hover {
            color: #dc3545;
        }

        .modern-summary {
            margin-top: 40px;
            text-align: right;
        }

        .total-price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #212529;
        }

        .checkout-btn {
            background-color: #28a745;
            color: white;
            padding: 12px 22px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            margin-top: 10px;
        }

        .checkout-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="modern-container">
    <!-- <div class="modern-header">
        <h2 class="modern-title"><i class="ri-shopping-cart-line"></i>Keranjang Belanja</h2>
    </div> -->

    <div class="modern-grid">
        <?php
        require_once('model/Keranjang.php');
        $keranjang = new Keranjang();
        $keranjangs = $keranjang->getAll();

        $totalHarga = 0;

        foreach ($keranjangs as $row):
            $totalHarga += $row['harga'];
        ?>
            <div class="modern-card">
                <div class="modern-card-image">
                    <?php if (!empty($row['cover'])): ?>
                        <img src="img/<?= $row['cover']; ?>" alt="<?= htmlspecialchars($row['nama_barang']); ?>">
                    <?php else: ?>
                        <div class="no-image">Tidak Ada Gambar</div>
                    <?php endif; ?>
                </div>
                <div class="modern-card-body">
                    <h4 class="modern-card-title"><?= htmlspecialchars($row['nama_barang']); ?></h4>
                    <p class="modern-card-price">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></p>
                    <p class="modern-card-date"><?= $row['tanggal']; ?></p>
                    <div class="modern-actions">
                        <a href="?module=keranjang&page=keranjang&id_keranjang=<?= $row['id_keranjang']; ?>" 
                           class="modern-action delete" title="Hapus" 
                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                           <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="modern-summary">
        <p class="total-price">Total: Rp <?= number_format($totalHarga, 0, ',', '.'); ?></p>
        <button class="checkout-btn">Checkout</button>
    </div>
</div>

<?php
if (isset($_GET['id_keranjang'])) {
    $id = $_GET['id_keranjang'];
    $data = $keranjang->get_by_id($id);

    if ($data && !empty($data['cover'])) {
        $filePath = 'img/' . $data['cover'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    $deleteResult = $keranjang->delete($id);

    echo "<script>alert('" . ($deleteResult ? "Data berhasil dihapus" : "Gagal menghapus data") . "');</script>";
    echo '<meta http-equiv="refresh" content="0; url=index.php?module=keranjang&page=keranjang">';
}
?>
</body>
</html>
