<?php 
require_once('model/Reward.php'); // Sesuaikan path jika diperlukan
$reward = new Reward();
$dataRewards = $reward->getAll(); 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reward</title>
    <style>
        /* .nav-right {
            display: flex;
            align-items: center;
        } */

        /* .rewards {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #ffcc00;
            font-weight: bold;
        } */

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #333;
        }

        .reward-container {
            max-width: 800px;
            margin: 40px auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            padding: 0 20px;
        }

        .reward-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.2s ease;
        }

        .reward-card:hover {
            transform: translateY(-5px);
        }

        .reward-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .reward-content {
            padding: 15px;
        }

        .reward-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin: 0 0 10px;
        }

        .reward-points {
            font-size: 14px;
            color: #777;
        }

        .btn-redeem {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #ffc107;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-redeem:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>
    <!-- Main Content -->
    <!-- <h1>REWARD</h1> -->

    <div class="reward-container">
        <?php if (!empty($dataRewards)) : ?>
            <?php foreach ($dataRewards as $row) : ?>
                <div class="reward-card">
                    <img src="<?= !empty($row['cover']) ? 'img/' . $row['cover'] : 'https://via.placeholder.com/300x150.png?text=No+Image' ?>" alt="<?= htmlspecialchars($row['nama_reward']) ?>" class="reward-image">
                    <div class="reward-content">
                        <p class="reward-title"><?= htmlspecialchars($row['nama_reward']) ?></p>
                        <p class="reward-points">Deskripsi: <?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>
                        <a href="#" class="btn-redeem">Tukarkan</a> 
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p style="text-align:center; grid-column: span 3;">Belum ada reward tersedia.</p>
        <?php endif; ?>
    </div>

</body>
</html>