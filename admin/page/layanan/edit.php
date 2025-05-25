<?php
require_once('../../../model/Layanan.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id         = $_POST['id_layanan'];
    $nama       = $_POST['nama_layanan'];
    $deskripsi  = $_POST['deskripsi'];

    $layanan = new Layanan();
    $result = $layanan->edit($id, $nama, $deskripsi);

    $pesan = $result ? "berhasil_edit" : "gagal_edit"; // ✅ Tambahan penting
    header('Location: ../../dashboard.php?module=layanan&page=daftar-layanan&pesan=' . $pesan);
    exit;
} else {
    header('Location: ../../dashboard.php?module=layanan&page=daftar-layanan');
    exit;
}
