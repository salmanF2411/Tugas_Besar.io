<?php
require_once('model/Artikel.php');
$artikel = new Artikel();

// Ambil ID dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$row = $artikel->get_by_id($id);

// Cek jika data kosong
if (!$row) {
    echo "<div style='padding: 50px; text-align:center; font-size: 20px;'>Artikel tidak ditemukan.</div>";
    return;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($row['judul']) ?></title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 10px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .article-title {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #222;
        }

        .article-meta {
            font-size: 14px;
            color: #888;
            margin-bottom: 20px;
        }

        .article-image {
            width: 100%;
            max-height: 450px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .article-content {
            font-size: 17px;
            line-height: 1.8;
            color: #444;
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 16px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s;
        }

        .back-link:hover {
            background-color: #2980b9;
        }

        @media (max-width: 600px) {
            .article-title {
                font-size: 24px;
            }
            .article-content {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="article-title"><?= htmlspecialchars($row['judul']) ?></h1>
    <div class="article-meta">Dipublikasikan pada <?= date('d M Y', strtotime($row['tanggal'])) ?></div>
    <img src="img/<?= htmlspecialchars($row['cover']) ?>" alt="Gambar Artikel" class="article-image">
    
    <div class="article-content">
        <?= nl2br($row['deskripsi']) ?>
    </div>

    <a href="<?='index.php?page=Menu-Utama'?>" class="back-link">← Kembali ke Beranda</a>
</div>

</body>
</html>
