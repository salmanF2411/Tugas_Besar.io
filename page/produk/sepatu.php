<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Katalog Produk</title>
  <style>
    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .card-link {
      text-decoration: none;
      color: inherit;
    }

    .card {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      width: 250px;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: scale(1.03);
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .card-content {
      padding: 15px;
    }

    .product-name {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .price {
      color: #e67e22;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .rating {
      color: #f1c40f;
      margin-bottom: 10px;
    }

    .description {
      font-size: 14px;
      color: #555;
    }
  </style>
</head>

<body>
  <?php
  require_once('model/Sepatu.php');
  $sepatu = new Sepatu();
  $sepatus = $sepatu->getAll();
  ?>

  <div class="container">
    <?php foreach ($sepatus as $row): ?>
      <a href="index.php?module=detail&page=detail-sepatu&id=<?= $row['id_sepatu'] ?>" class="card-link">
        <div class="card">
          <img src="img/<?= htmlspecialchars($row['cover']) ?>" alt="<?= htmlspecialchars($row['nama_sepatu']) ?>">
          <div class="card-content">
            <div class="product-name"><?= htmlspecialchars($row['nama_sepatu']) ?></div>
            <div class="price">Rp <?= number_format($row['harga'], 0, ',', '.') ?></div>
            <div class="rating">
              <?php
              $fullStars = floor($row['rating']);
              $halfStar = ($row['rating'] - $fullStars) >= 0.5 ? 1 : 0;
              echo str_repeat('★', $fullStars) . ($halfStar ? '½' : '') . str_repeat('☆', 5 - $fullStars - $halfStar);
              ?>
            </div>
            <div class="description">
              <?= htmlspecialchars(mb_strimwidth($row['deskripsi'], 0, 25, '...')) ?>
            </div>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</body>

</html>
