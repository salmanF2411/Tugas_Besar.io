<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Artikel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body> -->
<div class="modern-container">
    <div class="modern-header">
        <div>
            <h2 class="modern-title"><i class="ri-t-shirt-line"></i>Baju</h2>
        </div>
        <div class="mb-2">
            <a href="<?= 'dashboard.php?module=produk-baju&page=form-simpan'; ?>" title="Tambah data" class="modern-btn"><i class="fa fa-plus"></i>Tambah Baju</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>HARGA</th>
                        <th>RATING</th>
                        <th>DESKRIPSI</th>
                        <th>COVER</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('../model/Baju.php');
                    $baju = new Baju();
                    $bajus = $baju->getAll();
                    $nomor = 1;

                    foreach ($bajus as $row) {
                    ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $row['nama_baju']; ?></td>
                            <td><?= $row['harga']; ?></td>
                            <td><?= $row['rating']; ?></td>
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
                                    <a href="<?= 'dashboard.php?module=produk-baju&page=form-edit&id_baju=' . $row['id_baju']; ?>" class="modern-action edit" title="edit"><i class="fa fa-edit"></i></a>
                                    <a href="<?= 'dashboard.php?module=produk-baju&page=baju&id_baju=' . $row['id_baju']; ?>" onclick="return confirm('yakin ?');" class="modern-action delete" title="hapus"><i class="fa fa-trash"></i></a>
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
    <br>
    <a href="<?= 'dashboard.php?module=produk&page=daftar-produk' ?>" class="back-btn"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>
<?php
if (isset($_GET['id_baju'])) {
    $id = $_GET['id_baju'];

    // Ambil data baju (langsung dapat array, tidak perlu fetch lagi)
    $data = $baju->get_by_id($id);

    // Hapus file cover jika ada
    if ($data && !empty($data['cover'])) {
        $filePath = '../img/' . $data['cover'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // Hapus dari database
    $deleteResult = $baju->delete($id);

    if ($deleteResult) {
        echo "<script>alert('Data berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Gagal menghapus data');</script>";
    }

    // Redirect
    echo '<meta http-equiv="refresh" content="0; url=dashboard.php?module=produk-baju&page=baju">';
}
?>
<!-- </body>
</html> -->