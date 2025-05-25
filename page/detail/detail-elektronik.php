<?php
require_once('model/Elektronik.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID produk tidak valid.";
    exit;
}

$elektronik = new Elektronik();
$row = $elektronik->get_by_id($_GET['id']);

if (!$row) {
    echo "Produk tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Produk</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f1f1f1;
      margin: 0;
    }

    .container {
      max-width: 800px;
      margin:20px auto;
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.08);
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .img-container {
      flex: 1 1 300px;
    }

    .img-detail {
      width: 100%;
      height: auto;
      max-height: 400px;
      object-fit: cover;
      border-radius: 8px;
    }

    .info-container {
      flex: 1 1 400px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    h1 {
      margin: 0 0 10px;
      font-size: 22px;
      color: #333;
    }

    .price {
      color: #e67e22;
      font-size: 20px;
      font-weight: bold;
      margin: 10px 0;
    }

    .rating {
      color: #f1c40f;
      font-size: 16px;
      margin-bottom: 10px;
    }

    .deskripsi {
      font-size: 14px;
      color: #555;
      line-height: 1.5;
      margin-bottom: 20px;
    }

    .actions {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }

    .btn {
      padding: 10px 20px;
      font-size: 14px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
      text-decoration: none;
      text-align: center;
    }

    .btn-beli {
      background-color: #27ae60;
      color: white;
    }

    .btn-beli:hover {
      background-color: #219150;
    }

    .btn-back {
      background-color: #bdc3c7;
      color: black;
    }

    .btn-back:hover {
      background-color: #aeb6bf;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="img-container">
      <img class="img-detail" src="img/<?= htmlspecialchars($row['cover']) ?>" alt="<?= htmlspecialchars($row['nama_elektronik']) ?>">
    </div>
    <div class="info-container">
      <div>
        <h1><?= htmlspecialchars($row['nama_elektronik']) ?></h1>
        <div class="price">Rp <?= number_format($row['harga'], 0, ',', '.') ?></div>
        <div class="rating">
          <?php
            $fullStars = floor($row['rating']);
            $halfStar = ($row['rating'] - $fullStars) >= 0.5 ? 1 : 0;
            echo str_repeat('★', $fullStars) . ($halfStar ? '½' : '') . str_repeat('☆', 5 - $fullStars - $halfStar);
          ?>
        </div>
        <div class="deskripsi"><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></div>
      </div>
      <div class="actions">
        <a href="<?= 'index.php?module=produk&page=elektronik' ?>" class="btn btn-back">← Kembali</a>
        <a href="#" class="btn btn-beli">🛒 Beli Sekarang</a>
      </div>
    </div>
  </div>
</body>
</html>
