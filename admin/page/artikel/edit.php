<?php
require_once('../../../model/Artikel.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id         = $_POST['id'];
    $tanggal    = $_POST['tanggal'];
    $judul      = $_POST['judul'];
    $penulis    = $_POST['penulis'];
    $deskripsi  = $_POST['deskripsi'];
    $posting    = $_POST['posting'];
    $coverLama  = $_POST['cover_lama'];
    $coverBaru  = $coverLama;

    if (isset($_FILES['cover']) && $_FILES['cover']['error'] == 0) {
        $uploadDir = '../../../img/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $coverBaru = basename($_FILES['cover']['name']);
        // $coverBaru = uniqid() . '_' . basename($_FILES['cover']['name']);
        $coverPath = $uploadDir . $coverBaru;

        if (move_uploaded_file($_FILES['cover']['tmp_name'], $coverPath)) {
            // Delete old file if exists and not default
            if (!empty($coverLama) && file_exists($uploadDir . $coverLama)) {
                unlink($uploadDir . $coverLama);
            }
        } else {
            $coverBaru = $coverLama; // if upload fails, keep old one
        }
    }

    $artikel = new Artikel();
    $result = $artikel->edit($id, $tanggal, $judul, $penulis, $deskripsi, $posting, $coverBaru);

    // Redirect to articles page after successful update
    header('Location: ../../dashboard.php?module=artikel&page=daftar-artikel');
    exit;
} else {
    header('Location: ../../dashboard.php?module=artikel&page=daftar-artikel');
    exit;
}