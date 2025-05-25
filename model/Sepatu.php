<?php
require_once('koneksi.php');
class Sepatu extends koneksi
{
    private $conn;

    public function __construct()
    {
        parent::__construct();
        $this->conn = $this->getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM sepatu ORDER BY id_sepatu DESC";
        $result = $this->conn->query($query);

        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function simpan($nama, $harga, $rating,  $deskripsi, $cover)
    {
        $sql = ("INSERT INTO sepatu(nama_sepatu, harga, rating, deskripsi, cover) 
                   VALUES(?,?,?,?,?)");
        $query = $this->conn->prepare($sql);

        $query->bind_param("sdiss", $nama, $harga, $rating, $deskripsi, $cover);
        $result = $query->execute();

        return $result;
    }

    public function edit($id, $nama, $harga, $rating,  $deskripsi, $cover)
    {
        $sql = "UPDATE sepatu 
                SET nama_sepatu = ?, harga = ?, rating = ?, deskripsi = ?, cover = ?
                WHERE id_sepatu = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("sdissi", $nama, $harga,  $rating, $deskripsi, $cover, $id);
        $result = $query->execute();

        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM sepatu WHERE id_sepatu = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("i", $id);
        $result = $query->execute();

        return $result;
    }


    public function get_by_id($id)
    {
        $sql = "SELECT * FROM sepatu WHERE id_sepatu = ?";
        $query = $this->conn->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        return $result->fetch_assoc(); // ambil hasil sebagai array asosiatif
    }
}
