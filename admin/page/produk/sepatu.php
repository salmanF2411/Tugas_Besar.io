   <div class="modern-container">
       <div class="modern-header">
           <div>
               <h2 class="modern-title"><i class="ri-footprint-line"></i>Sepatu</h2>
           </div>
           <div class="mb-2">
               <a href="#" class="modern-btn"><i class="fa fa-plus"></i>Tambah Sepatu</a>
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
                        require_once('../model/Sepatu.php');
                        $sepatu = new Sepatu();
                        $sepatus = $sepatu->getAll();
                        $nomor = 1;

                        foreach ($sepatus as $row) {
                        ?>
                           <tr>
                               <td><?= $nomor++; ?></td>
                               <td><?= $row['nama_sepatu']; ?></td>
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
                                       <a href="#" class="modern-action edit" data-toggle="tooltip" data-placement="top" title="edit"><i class="fa fa-edit"></i></a>
                                       <a href="#" class="modern-action delete" data-toggle="tooltip" data-placement="top" title="hapus"><i class="fa fa-trash"></i></a>
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