<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Artikel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="modern-container">
        <div class="modern-header">
            <div>
                <h2 class="modern-title"><i class="fas fa-layer-group"></i> Layanan</h2>
            </div>
            <div class="mb-2">
                <a href="#" class="modern-btn"><i class="fa fa-plus"></i>Tambah Layanan</a>
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

                            foreach($layanans as $row){
                            ?>
                                <tr>
                                    <td><?=$nomor++;?></td>
                                    <td><?=$row['nama_layanan'];?></td>
                                    <td><?=$row['deskripsi'];?></td>
                                    <!-- <td>
                                        <span class="status-badge <?=$row['posting'] == 'Y' ? 'status-published' : 'status-draft'?>">
                                            <?=$row['posting'] == 'Y' ? 'Published' : 'Draft'?>
                                        </span>
                                    </td> -->
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
        <a href="<?='dashboard.php?module=produk&page=daftar-produk'?>" class="back-btn"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
</body>
</html>