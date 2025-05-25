    <div class="modern-container">
        <div class="modern-header">
            <div>
                <h2 class="modern-title"><i class="ri-smartphone-line"></i>Elektronik</h2>
            </div>
            <div class="mb-2">
                <a href="<?= 'dashboard.php?module=produk-elektronik&page=form-simpan'; ?>" title="Tambah data" class="modern-btn"><i class="fa fa-plus"></i>Tambah Elektronik</a>
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
                        require_once('../model/Elektronik.php');
                        $elektronik = new Elektronik();
                        $elektroniks = $elektronik->getAll();
                        $nomor = 1;

                        foreach ($elektroniks as $row) {
                        ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $row['nama_elektronik']; ?></td>
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
                                        <a href="<?= 'dashboard.php?module=produk-elektronik&page=form-edit&id_elektronik=' . $row['id_elektronik']; ?>" class="modern-action edit" title="edit"><i class="fa fa-edit"></i></a>
                                        <a href="<?= 'dashboard.php?module=produk-elektronik&page=elektronik&id_elektronik=' . $row['id_elektronik']; ?>" onclick="return confirm('yakin ?');" class="modern-action delete" title="hapus"><i class="fa fa-trash"></i></a>
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
if (isset($_GET['id_elektronik'])) {
    $id = $_GET['id_elektronik'];

    // Ambil data artikel berdasarkan ID
    $result = $elektronik->get_by_id($id);
    $data = $result->fetch_assoc();

    if ($data && !empty($data['cover'])) {
        $filePath = '../img/' . $data['cover'];
        if (file_exists($filePath)) {
            unlink($filePath); // hapus file dari folder
        }
    }

    // Hapus data dari database
    $deleteResult = $elektronik->delete($id);

    if ($deleteResult) {
        echo "<script>alert('Data berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Data tidak berhasil dihapus');</script>";
    }

    echo '<meta http-equiv="refresh" content="0; url=dashboard.php?module=produk-elektronik&page=elektronik">';
}
?>