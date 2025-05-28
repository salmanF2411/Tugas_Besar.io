    <div class="modern-container">
        <div class="modern-header">
            <h2 class="modern-title"><i class="fas fa-newspaper"></i>Daftar Artikel</h2>
            <div class="mb-2">
                <a href="<?= 'dashboard.php?module=artikel&page=form-artikel'; ?>" title="Tambah data" class="modern-btn"><i class="fa fa-plus"></i>Tambah Artikel</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>TANGGAL</th>
                            <th>JUDUL</th>
                            <th>PENULIS</th>
                            <th>DESKRIPSI</th>
                            <th>COVER</th>
                            <th>POSTING</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once('../model/Artikel.php');
                        $artikel = new Artikel();
                        $artikels = $artikel->getAll();
                        $nomor = 1;

                        foreach ($artikels as $row) {
                        ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $row['tanggal']; ?></td>
                                <td><?= $row['judul']; ?></td>
                                <td><?= $row['penulis']; ?></td>
                                <td><?= $row['deskripsi']; ?></td>
                                <td>
                                    <?php if (!empty($row['cover'])): ?>
                                        <img src="../img/<?= $row['cover']; ?>" alt="Cover Buku" style="max-width: 100px; max-height: 100px;">
                                    <?php else: ?>
                                        <span>Tidak ada gambar</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= $row['posting']; ?></td>
                                <td class="text-center">
                                    <div class="modern-actions">
                                        <a href="#" class="modern-action view" title="detail"><i class="fa fa-eye"></i></a>
                                        <a href="<?= 'dashboard.php?module=artikel&page=form-artikel-edit&id=' . $row['id']; ?>" class="modern-action edit" title="edit"><i class="fa fa-edit"></i></a>
                                        <a href="<?= 'dashboard.php?module=artikel&page=daftar-artikel&id=' . $row['id']; ?>" onclick="return confirm('yakin ?');" class="modern-action delete" title="hapus"><i class="fa fa-trash"></i></a>
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
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data artikel berdasarkan ID
    $data = $artikel->get_by_id($id);

    if ($data && !empty($data['cover'])) {
        $filePath = '../img/' . $data['cover'];
        if (file_exists($filePath)) {
            unlink($filePath); // hapus file dari folder
        }
    }

    // Hapus data dari database
    $deleteResult = $artikel->delete($id);

    if ($deleteResult) {
        echo "<script>alert('Data berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Data tidak berhasil dihapus');</script>";
    }

    echo '<meta http-equiv="refresh" content="0; url=dashboard.php?module=artikel&page=daftar-artikel">';
}
?>

