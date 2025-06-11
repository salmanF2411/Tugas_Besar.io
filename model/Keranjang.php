<?php 
    require_once('koneksi.php');
    class Keranjang extends koneksi{
        private $conn;

        public function __construct(){
            parent:: __construct();
            $this->conn = $this->getConnection();
        }

        public function getAll(){
            $query = "SELECT * FROM keranjang ORDER BY id_keranjang DESC";
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
        $sql = ("INSERT INTO furniture(nama_furniture, harga, rating, deskripsi, cover) 
                   VALUES(?,?,?,?,?)");
        $query = $this->conn->prepare($sql);

        $query->bind_param("sdiss", $nama, $harga, $rating, $deskripsi, $cover);
        $result = $query->execute();

        return $result;
    }

    public function edit($id, $nama, $harga, $rating,  $deskripsi, $cover) {
        $sql = "UPDATE furniture 
                SET nama_furniture = ?, harga = ?, rating = ?, deskripsi = ?, cover = ?
                WHERE id_furniture = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("sdissi", $nama,$harga,  $rating, $deskripsi, $cover, $id);
        $result = $query->execute();

        return $result;
    }

    public function delete($id) {
        $sql = "DELETE FROM keranjang WHERE id_keranjang = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("i", $id);
        $result = $query->execute();

        return $result;
    }


    public function get_by_id($id){

        $sql = ("SELECT * FROM keranjang WHERE id_keranjang = ?");
        $query = $this->conn->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
        $result =  $query->get_result();
        return $result->fetch_assoc(); 
    }
    }
// $furniture = new Furniture();
// print_r($furniture->getAll());