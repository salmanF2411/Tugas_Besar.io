<?php 
    require_once('koneksi.php');
    class Partner extends koneksi{
        private $conn;

        public function __construct(){
            parent:: __construct();
            $this->conn = $this->getConnection();
        }

        public function getAll(){
            $query = "SELECT * FROM tpartner ORDER BY id_partner DESC";
            $result = $this->conn->query($query);

            $data = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function simpan($nama, $harga,  $deskripsi, $cover){
        $sql = ("INSERT INTO tpartner(nama_partner, harga, deskripsi, cover) 
                   VALUES(?,?,?,?)");
        $query = $this->conn->prepare($sql);

        $query->bind_param("sdss", $nama, $harga, $deskripsi, $cover);
        $result = $query->execute();

        return $result;
    }

    public function edit($id, $nama, $harga,  $deskripsi, $cover) {
        $sql = "UPDATE tpartner 
                SET nama_partner = ?, harga = ?, deskripsi = ?, cover = ?
                WHERE id_partner = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("sdssi", $nama,$harga, $deskripsi, $cover, $id);
        $result = $query->execute();

        return $result;
    }

    public function delete($id) {
        $sql = "DELETE FROM tpartner WHERE id_partner = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("i", $id);
        $result = $query->execute();

        return $result;
    }


    public function get_by_id($id){

        $sql = ("SELECT * FROM tpartner WHERE id_partner = ?");
        $query = $this->conn->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
        $result =  $query->get_result();
        return $result->fetch_assoc(); 
    }
    }

// $artikel = new Artikel();
// print_r($artikel->getAll());