<?php
require_once('../../../model/Artikel.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal    = $_POST['tanggal'];
    $judul      = $_POST['judul'];
    $penulis    = $_POST['penulis'];
    $deskripsi  = $_POST['deskripsi'];
    $posting    = $_POST['posting'];

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
                header('Location: ../../dashboard.php?module=artikel&page=daftar-artikel&pesan=gagal_upload');
                exit;
            }
        } else {
            header('Location: ../../dashboard.php?module=artikel&page=daftar-artikel&pesan=format_tidak_valid');
            exit;
        }
    }

    $artikel = new Artikel();
    $result = $artikel->simpan($tanggal, $judul, $penulis, $deskripsi, $posting, $coverName);
    $pesan = $result ? 'sukses' : 'gagal';

    header('Location: ../../dashboard.php?module=artikel&page=daftar-artikel&pesan=' . $pesan);
    exit;
} else {
    header('Location: ../../dashboard.php?module=artikel&page=daftar-artikel');
    exit;
}
