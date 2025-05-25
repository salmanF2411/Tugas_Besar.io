<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Layanan Kami</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 25px auto;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 40px;
        }

        .layanan-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .layanan-card {
            background-color: #fff;
            border-left: 6px solid rgb(208, 116, 25);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s ease;
            height: 100%;
        }

        .layanan-card:hover {
            box-shadow: 0 4px 16px rgba(0,0,0,0.15);
        }

        .layanan-title {
            font-size: 1.2rem;
            color: rgb(212, 117, 29);
            margin-bottom: 10px;
        }

        .layanan-desc {
            font-size: 0.95rem;
            color: #555;
            line-height: 1.5;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 style="color: #c62828;">Layanan Kami</h1>
    <div class="layanan-list">
        <?php
        require_once('model/Layanan.php'); 
        $layanan = new Layanan(); 
        $listLayanan = $layanan->getAll(); 

        foreach ($listLayanan as $item) {
        ?>
            <div class="layanan-card">
                <div class="layanan-title"><?= htmlspecialchars($item['nama_layanan']) ?></div>
                <div class="layanan-desc"><?= nl2br(htmlspecialchars($item['deskripsi'])) ?></div>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
