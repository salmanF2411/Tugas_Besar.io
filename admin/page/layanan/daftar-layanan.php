    <div class="modern-container">
        <div class="modern-header">
            <div>
                <h2 class="modern-title"><i class="fas fa-layer-group"></i> Layanan</h2>
            </div>
            <div class="mb-2">
                <a href="<?= 'dashboard.php?module=layanan&page=form-simpan'; ?>" title="Tambah data" class="modern-btn"><i class="fa fa-plus"></i>Tambah Layanan</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA LAYANAN</th>
                            <th>DESKRIPSI</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once('../model/Layanan.php');
                        $layanan = new Layanan();
                        $layanans = $layanan->getAll();
                        $nomor = 1;

                        foreach ($layanans as $row) {
                        ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $row['nama_layanan']; ?></td>
                                <td><?= $row['deskripsi']; ?></td>
                                <!-- <td>
                                        <span class="status-badge <?= $row['posting'] == 'Y' ? 'status-published' : 'status-draft' ?>">
                                            <?= $row['posting'] == 'Y' ? 'Published' : 'Draft' ?>
                                        </span>
                                    </td> -->
                                <td class="text-center">
                                    <div class="modern-actions">
                                        <a href="#" class="modern-action view" data-toggle="tooltip" data-placement="top" title="detail"><i class="fa fa-eye"></i></a>
                                        <a href="<?= 'dashboard.php?module=layanan&page=form-edit&id_layanan=' . $row['id_layanan']; ?>" class="modern-action edit" title="edit"><i class="fa fa-edit"></i></a>
                                        <a href="<?= 'dashboard.php?module=layanan&page=daftar-layanan&id_layanan=' . $row['id_layanan']; ?>" onclick="return confirm('yakin ?');" class="modern-action delete" title="hapus"><i class="fa fa-trash"></i></a>
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
    if (isset($_GET['id_layanan'])) {
        $id = $_GET['id_layanan'];

        // Ambil data artikel berdasarkan ID
        $data = $layanan->get_by_id($id);

        if ($data && !empty($data['cover'])) {
            $filePath = '../img/' . $data['cover'];
            if (file_exists($filePath)) {
                unlink($filePath); // hapus file dari folder
            }
        }

        // Hapus data dari database
        $deleteResult = $layanan->delete($id);

        if ($deleteResult) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        } else {
            echo "<script>alert('Data tidak berhasil dihapus');</script>";
        }

        echo '<meta http-equiv="refresh" content="0; url=dashboard.php?module=layanan&page=daftar-layanan">';
    }
    ?>