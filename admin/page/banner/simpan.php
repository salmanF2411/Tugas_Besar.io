<?php
require_once('../../../model/Banner.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama    = $_POST['nama_banner'];
    $deskripsi  = $_POST['deskripsi'];

    $coverName = null;

    if (isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../../img/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $originalName = basename($_FILES['cover']['name']);
        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($extension, $allowedExtensions)) {
            $coverName = $originalName; // pakai nama asli, bukan uniqid
            $coverPath = $uploadDir . $coverName;

            // Optional: tambahkan jika ingin mencegah overwrite
            // if (file_exists($coverPath)) {
            //     $coverName = time() . '_' . $originalName;
            //     $coverPath = $uploadDir . $coverName;
            // }

            if (!move_uploaded_file($_FILES['cover']['tmp_name'], $coverPath)) {
                header('Location: ../../dashboard.php?module=banner&page=daftar-banner&pesan=gagal_upload');
                exit;
            }
        } else {
            header('Location: ../../dashboard.php?module=banner&page=daftar-banner&pesan=format_tidak_valid');
            exit;
        }
    }

    $banner = new Banner();
    $result = $banner->simpan($nama, $deskripsi, $coverName);
    $pesan = $result ? 'sukses' : 'gagal';

    header('Location: ../../dashboard.php?module=banner&page=daftar-banner&pesan=' . $pesan);
    exit;
} else {
    header('Location: ../../dashboard.php?module=banner&page=daftar-banner');
    exit;
}
