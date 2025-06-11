<div class="modern-container">
    <div class="modern-header">
        <div>
            <h2 class="modern-title"><i class="ri-vip-crown-line"></i>Reward</h2>
        </div>
        <div class="mb-2">
            <a href="<?= 'dashboard.php?module=reward&page=form-simpan'; ?>" title="Tambah data" class="modern-btn"><i class="ri-vip-crown-line"></i>Tambah Reward</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>DESKRIPSI</th>
                        <th>COVER</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('../model/Reward.php');
                    $reward = new Reward();
                    $rewards = $reward->getAll();
                    $nomor = 1;

                    foreach ($rewards as $row) {
                    ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $row['nama_reward']; ?></td>
                            <td><?= $row['deskripsi']; ?></td>
                            <td>
                                <?php if (!empty($row['cover'])): ?>
                                    <img src="../img/<?= $row['cover']; ?>" alt="Cover Buku" style="max-width: 100px; max-height: 100px;">
                                <?php else: ?>
                                    <span>Tidak ada gambar</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <div class="modern-actions">
                                    <a href="#" class="modern-action view" data-toggle="tooltip" data-placement="top" title="detail"><i class="fa fa-eye"></i></a>
                                    <a href="<?= 'dashboard.php?module=reward&page=form-edit&id_reward=' . $row['id_reward']; ?>" class="modern-action edit" title="edit"><i class="fa fa-edit"></i></a>
                                    <a href="<?= 'dashboard.php?module=reward&page=daftar-reward&id_reward=' . $row['id_reward']; ?>" onclick="return confirm('yakin ?');" class="modern-action delete" title="hapus"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
if (isset($_GET['id_reward'])) {
    $id = $_GET['id_reward'];

    // Ambil data baju (langsung dapat array, tidak perlu fetch lagi)
    $data = $reward->get_by_id($id);

    // Hapus file cover jika ada
    if ($data && !empty($data['cover'])) {
        $filePath = '../img/' . $data['cover'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // Hapus dari database
    $deleteResult = $reward->delete($id);

    if ($deleteResult) {
        echo "<script>alert('Data berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Gagal menghapus data');</script>";
    }

    // Redirect
    echo '<meta http-equiv="refresh" content="0; url=dashboard.php?module=reward&page=daftar-reward">';
}
?>
<!-- </body>
</html> -->