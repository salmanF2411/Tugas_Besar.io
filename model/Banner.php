<?php 
    require_once('koneksi.php');
    class Banner extends koneksi{
        private $conn;

        public function __construct(){
            parent:: __construct();
            $this->conn = $this->getConnection();
        }

        public function getAll(){
            $query = "SELECT * FROM banner ORDER BY id_banner DESC";
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
        $sql = ("INSERT INTO banner(nama_banner, deskripsi, cover) 
                   VALUES(?,?,?)");
        $query = $this->conn->prepare($sql);

        $query->bind_param("sss", $nama,$deskripsi, $cover);
        $result = $query->execute();

        return $result;
    }

    public function edit($id, $nama, $deskripsi, $cover) {
        $sql = "UPDATE banner 
                SET nama_banner = ?, deskripsi = ?, cover = ?
                WHERE id_banner = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("sssi", $nama, $deskripsi, $cover, $id);
        $result = $query->execute();

        return $result;
    }

    public function delete($id) {
        $sql = "DELETE FROM banner WHERE id_banner = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("i", $id);
        $result = $query->execute();

        return $result;
    }


    public function get_by_id($id){

        $sql = ("SELECT * FROM banner WHERE id_banner = ?");
        $query = $this->conn->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
        $result =  $query->get_result();
        return $result->fetch_assoc(); 
    }
    }