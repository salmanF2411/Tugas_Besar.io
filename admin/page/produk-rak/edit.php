<?php
require_once('../../../model/Rak.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id         = $_POST['id_rak'];
    $nama       = $_POST['nama_rak'];
    $harga      = $_POST['harga'];
    $rating     = $_POST['rating'];
    $deskripsi  = $_POST['deskripsi'];
    $coverLama  = $_POST['cover_lama'];
    $coverBaru  = $coverLama;

    if (isset($_FILES['cover']) && $_FILES['cover']['error'] == 0) {
        $uploadDir = '../../../img/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $coverBaru = basename($_FILES['cover']['name']);
        $coverPath = $uploadDir . $coverBaru;

        if (move_uploaded_file($_FILES['cover']['tmp_name'], $coverPath)) {
            if (!empty($coverLama) && file_exists($uploadDir . $coverLama)) {
                unlink($uploadDir . $coverLama);
            }
        } else {
            $coverBaru = $coverLama;
        }
    }

    $rak = new Rak();
    $result = $rak->edit($id, $nama, $harga, $rating, $deskripsi, $coverBaru);

    $pesan = $result ? "berhasil_edit" : "gagal_edit"; // ✅ Tambahan penting
    header('Location: ../../dashboard.php?module=produk-rak&page=rak-penyimpanan&pesan=' . $pesan);
    exit;
} else {
    header('Location: ../../dashboard.php?module=produk-rak&page=rak-penyimpanan');
    exit;
}
