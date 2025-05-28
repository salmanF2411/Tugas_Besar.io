<?php
require_once '../model/koneksi.php';
$db = new Koneksi();
$conn = $db->getConnection();

$sql = "SELECT id, username, email, role, created_at FROM users ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!-- Halaman Daftar Pengguna Modern -->
<style>
    .modern-container {
        max-width: 100%;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    .modern-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .modern-title {
        font-size: 24px;
        color: #333;
    }
    .modern-table {
        width: 100%;
        border-collapse: collapse;
    }
    .modern-table th,
    .modern-table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #007BFF; /* Garis biru */
    }
    .modern-table th {
        background-color: #e7f1ff;
        color: #333;
    }
    .modern-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>

<div class="modern-container">
    <div class="modern-header">
        <div>
            <h2 class="modern-title"><i class="fa fa-users"></i> Daftar Pengguna</h2>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Daftar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['username']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= ucfirst($row['role']); ?></td>
                                <td><?= $row['created_at']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="5">Tidak ada data pengguna.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
