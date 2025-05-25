<?php
require_once('../../../model/Layanan.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama    = $_POST['nama_layanan'];
    $deskripsi  = $_POST['deskripsi'];

    $layanan = new Layanan();
    $result = $layanan->simpan($nama,  $deskripsi);
    $pesan = $result ? 'sukses' : 'gagal';

    header('Location: ../../dashboard.php?module=layanan&page=daftar-layanan&pesan=' . $pesan);
    exit;
} else {
    header('Location: ../../dashboard.php?module=layanan&page=daftar-layanan');
    exit;
}
