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
            <h2 class="modern-title"><i class="ri-car-washing-line"></i>Metode Pengiriman</h2>
        </div>
        <div class="mb-2">
            <a href="<?= 'dashboard.php?module=metode-pengiriman&page=form-simpan'; ?>" title="Tambah data" class="modern-btn"><i class="fa fa-plus"></i>Tambah Metode Pengiriman</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA METODE PENGIRIMAN</th>
                        <th>DESKRIPSI</th>
                        <th>COVER</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('../model/Mpengiriman.php');
                    $pengiriman = new Mpengiriman();
                    $pengirimans = $pengiriman->getAll();
                    $nomor = 1;

                    foreach ($pengirimans as $row) {
                    ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $row['nama_pengiriman']; ?></td>
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
                                    <a href="<?= 'dashboard.php?module=metode-pengiriman&page=form-edit&id_pengiriman=' . $row['id_pengiriman']; ?>" class="modern-action edit" title="edit"><i class="fa fa-edit"></i></a>
                                    <a href="<?= 'dashboard.php?module=metode-pengiriman&page=daftar-mpengiriman&id_pengiriman=' . $row['id_pengiriman']; ?>" onclick="return confirm('yakin ?');" class="modern-action delete" title="hapus"><i class="fa fa-trash"></i></a>
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
if (isset($_GET['id_pengiriman'])) {
    $id = $_GET['id_pengiriman'];

    // Ambil data artikel berdasarkan ID
    $data = $pengiriman->get_by_id($id);

    if ($data && !empty($data['cover'])) {
        $filePath = '../img/' . $data['cover'];
        if (file_exists($filePath)) {
            unlink($filePath); // hapus file dari folder
        }
    }

    // Hapus data dari database
    $deleteResult = $pengiriman->delete($id);

    if ($deleteResult) {
        echo "<script>alert('Data berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Data tidak berhasil dihapus');</script>";
    }

    echo '<meta http-equiv="refresh" content="0; url=dashboard.php?module=metode-pengiriman&page=daftar-mpengiriman">';
}
?>
<!-- </body>
</html> -->