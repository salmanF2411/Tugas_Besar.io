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
            <h2 class="modern-title"><i class="fas fa-newspaper"></i>Daftar Artikel</h2>
            <div class="mb-2">
                <a href="#" class="modern-btn"><i class="fa fa-plus"></i>Tambah Artikel</a>
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

                            foreach($artikels as $row){
                            ?>
                                <tr>
                                    <td><?=$nomor++;?></td>
                                    <td><?=$row['tanggal'];?></td>
                                    <td><?=$row['judul'];?></td>
                                    <td><?=$row['penulis'];?></td>
                                    <td><?=$row['deskripsi'];?></td>
                                    <td><?=$row['posting'];?></td>
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
    </div>
</body>
</html>
