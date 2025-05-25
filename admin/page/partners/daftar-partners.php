    <div class="modern-container">
        <div class="modern-header">
            <div>
                <h2 class="modern-title"><i class="ri-group-2-fill"></i> Partners</h2>
            </div>
            <div class="mb-2">
                <a href="<?= 'dashboard.php?module=partners&page=form-simpan'; ?>" title="Tambah data" class="modern-btn"><i class="fa fa-plus"></i>Tambah Partners</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA PARTNER</th>
                            <th>HARGA</th>
                            <th>DESKRIPSI</th>
                            <th>COVER</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once('../model/Partner.php');
                        $partner = new Partner();
                        $partners = $partner->getAll();
                        $nomor = 1;

                        foreach ($partners as $row) {
                        ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $row['nama_partner']; ?></td>
                                <td><?= $row['harga']; ?></td>
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
                                        <a href="<?= 'dashboard.php?module=partners&page=form-edit&id_partner=' . $row['id_partner']; ?>" class="modern-action edit" title="edit"><i class="fa fa-edit"></i></a>
                                        <a href="<?= 'dashboard.php?module=partners&page=daftar-partners&id_partner=' . $row['id_partner']; ?>" onclick="return confirm('yakin ?');" class="modern-action delete" title="hapus"><i class="fa fa-trash"></i></a>
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
    if (isset($_GET['id_partner'])) {
        $id = $_GET['id_partner'];

        // Ambil data artikel berdasarkan ID
        $result = $partner->get_by_id($id);
        $data = $result->fetch_assoc();

        if ($data && !empty($data['cover'])) {
            $filePath = '../img/' . $data['cover'];
            if (file_exists($filePath)) {
                unlink($filePath); // hapus file dari folder
            }
        }

        // Hapus data dari database
        $deleteResult = $partner->delete($id);

        if ($deleteResult) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        } else {
            echo "<script>alert('Data tidak berhasil dihapus');</script>";
        }

        echo '<meta http-equiv="refresh" content="0; url=dashboard.php?module=partners&page=daftar-partners">';
    }
    ?>