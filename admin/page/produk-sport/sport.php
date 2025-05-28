   <div class="modern-container">
       <div class="modern-header">
           <div>
               <h2 class="modern-title"><i  class="ri-football-fill"></i>Sport</h2>
           </div>
           <div class="mb-2">
               <a href="<?= 'dashboard.php?module=produk-sport&page=form-simpan';?>" class="modern-btn"><i class="fa fa-plus"></i>Tambah Produk Sport</a>
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
                        require_once('../model/Sport.php');
                        $sport = new Sport();
                        $sports = $sport->getAll();
                        $nomor = 1;

                        foreach ($sports as $row) {
                        ?>
                           <tr>
                               <td><?= $nomor++; ?></td>
                               <td><?= $row['nama_sport']; ?></td>
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
                                       <a href="<?= 'dashboard.php?module=produk-sport&page=form-edit&id_sport=' . $row['id_sport']; ?>" class="modern-action edit" data-toggle="tooltip" data-placement="top" title="edit"><i class="fa fa-edit"></i></a>
                                       <a href="<?= 'dashboard.php?module=produk-sport&page=sport&id_sport=' . $row['id_sport']; ?>" onclick="return confirm('yakin ?');" class="modern-action delete" data-toggle="tooltip" data-placement="top" title="hapus"><i class="fa fa-trash"></i></a>
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
        if (isset($_GET['id_sepatu'])) {
            $id = $_GET['id_sepatu'];

            // Ambil data artikel berdasarkan ID
            $data = $sepatu->get_by_id($id);

            if ($data && !empty($data['cover'])) {
                $filePath = '../img/' . $data['cover'];
                if (file_exists($filePath)) {
                    unlink($filePath); // hapus file dari folder
                }
            }

            // Hapus data dari database
            $deleteResult = $sepatu->delete($id);

            if ($deleteResult) {
                echo "<script>alert('Data berhasil dihapus');</script>";
            } else {
                echo "<script>alert('Data tidak berhasil dihapus');</script>";
            }

            echo '<meta http-equiv="refresh" content="0; url=dashboard.php?module=produk-sepatu&page=sepatu">';
        }
        ?>