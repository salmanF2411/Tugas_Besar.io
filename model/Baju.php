<?php 
    require_once('koneksi.php');
    class Baju extends koneksi{
        private $conn;

        public function __construct(){
            parent:: __construct();
            $this->conn = $this->getConnection();
        }

        public function getAll(){
            $query = "SELECT * FROM baju ORDER BY id_baju DESC";
            $result = $this->conn->query($query);

            $data = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function simpan($nama, $harga, $rating,  $deskripsi, $cover){
        $sql = ("INSERT INTO baju(nama_baju, harga, rating, deskripsi, cover) 
                   VALUES(?,?,?,?,?)");
        $query = $this->conn->prepare($sql);

        $query->bind_param("sdiss", $nama, $harga, $rating, $deskripsi, $cover);
        $result = $query->execute();

        return $result;
    }

    public function edit($id, $nama, $harga, $rating,  $deskripsi, $cover) {
        $sql = "UPDATE baju 
                SET nama_baju = ?, harga = ?, rating = ?, deskripsi = ?, cover = ?
                WHERE id_baju = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("sdissi", $nama,$harga,  $rating, $deskripsi, $cover, $id);
        $result = $query->execute();

        return $result;
    }

    public function delete($id) {
        $sql = "DELETE FROM baju WHERE id_baju = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("i", $id);
        $result = $query->execute();

        return $result;
    }


    public function get_by_id($id){

        $sql = ("SELECT * FROM baju WHERE id_baju = ?");
        $query = $this->conn->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
        $result =  $query->get_result();
        return $result->fetch_assoc(); 
    }
    }