        <div class="modern-container">
            <div class="modern-header">
                <h2 class="modern-title"><i class="ri-sofa-line"></i>Daftar Furniture</h2>
                <div class="mb-2">
                    <a href="<?= 'dashboard.php?module=produk-furniture&page=form-simpan'; ?>" title="Tambah data" class="modern-btn"><i class="fa fa-plus"></i>Tambah Furniture</a>
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
                            require_once('../model/Furniture.php');
                            $furniture = new Furniture();
                            $furnitures = $furniture->getAll();
                            $nomor = 1;

                            foreach ($furnitures as $row) {
                            ?>
                                <tr>
                                    <td><?= $nomor++; ?></td>
                                    <td><?= $row['nama_furniture']; ?></td>
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
                                            <a href="#" class="modern-action view" title="detail"><i class="fa fa-eye"></i></a>
                                            <a href="<?= 'dashboard.php?module=produk-furniture&page=form-edit&id_furniture=' . $row['id_furniture']; ?>" class="modern-action edit" title="edit"><i class="fa fa-edit"></i></a>
                                            <a href="<?= 'dashboard.php?module=produk-furniture&page=furniture&id_furniture=' . $row['id_furniture']; ?>" onclick="return confirm('yakin ?');" class="modern-action delete" title="hapus"><i class="fa fa-trash"></i></a>
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
        if (isset($_GET['id_furniture'])) {
            $id = $_GET['id_furniture'];

            // Ambil data artikel berdasarkan ID
            $result = $furniture->get_by_id($id);
            $data = $result->fetch_assoc();

            if ($data && !empty($data['cover'])) {
                $filePath = '../img/' . $data['cover'];
                if (file_exists($filePath)) {
                    unlink($filePath); // hapus file dari folder
                }
            }

            // Hapus data dari database
            $deleteResult = $furniture->delete($id);

            if ($deleteResult) {
                echo "<script>alert('Data berhasil dihapus');</script>";
            } else {
                echo "<script>alert('Data tidak berhasil dihapus');</script>";
            }

            echo '<meta http-equiv="refresh" content="0; url=dashboard.php?module=produk-furniture&page=furniture">';
        }
        ?>