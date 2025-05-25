<?php 
    require_once('koneksi.php');
    class Mpengiriman extends koneksi{
        private $conn;

        public function __construct(){
            parent:: __construct();
            $this->conn = $this->getConnection();
        }

        public function getAll(){
            $query = "SELECT * FROM tmetode_pengiriman ORDER BY id_pengiriman DESC";
            $result = $this->conn->query($query);

            $data = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function simpan($nama, $deskripsi, $cover){
        $sql = ("INSERT INTO tmetode_pengiriman(nama_pengiriman, deskripsi, cover) 
                   VALUES(?,?,?)");
        $query = $this->conn->prepare($sql);

        $query->bind_param("sss", $nama, $deskripsi, $cover);
        $result = $query->execute();

        return $result;
    }

    public function edit($id, $nama, $deskripsi, $cover) {
        $sql = "UPDATE tmetode_pengiriman 
                SET nama_pengiriman = ?, deskripsi = ?, cover = ?
                WHERE id_pengiriman = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("sssi", $nama,$deskripsi, $cover, $id);
        $result = $query->execute();

        return $result;
    }

    public function delete($id) {
        $sql = "DELETE FROM tmetode_pengiriman WHERE id_pengiriman = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("i", $id);
        $result = $query->execute();

        return $result;
    }


    public function get_by_id($id){

        $sql = ("SELECT * FROM tmetode_pengiriman WHERE id_pengiriman = ?");
        $query = $this->conn->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
        $result =  $query->get_result();

        return $result;
    }
    }
// $artikel = new Artikel();
// print_r($artikel->getAll());