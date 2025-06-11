<?php
require_once('../../../model/Reward.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id         = $_POST['id_reward'];
    $nama       = $_POST['nama_reward'];
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

    $reward = new Reward();
    $result = $reward->edit($id, $nama,$deskripsi, $coverBaru);

    $pesan = $result ? "berhasil_edit" : "gagal_edit"; // ✅ Tambahan penting
    header('Location: ../../dashboard.php?module=reward&page=daftar-reward&pesan=' . $pesan);
    exit;
} else {
    header('Location: ../../dashboard.php?module=reward&page=daftar-reward');
    exit;
}
