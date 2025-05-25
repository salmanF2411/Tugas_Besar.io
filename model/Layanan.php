<?php 
    require_once('koneksi.php');
    class Layanan extends koneksi{
        private $conn;

        public function __construct(){
            parent:: __construct();
            $this->conn = $this->getConnection();
        }

        public function getAll(){
            $query = "SELECT * FROM layanan ORDER BY id_layanan DESC";
            $result = $this->conn->query($query);

            $data = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function simpan($nama,  $deskripsi){
        $sql = ("INSERT INTO layanan(nama_layanan,deskripsi) 
                   VALUES(?,?)");
        $query = $this->conn->prepare($sql);

        $query->bind_param("ss", $nama,$deskripsi);
        $result = $query->execute();

        return $result;
    }

    public function edit($id, $nama,  $deskripsi) {
        $sql = "UPDATE layanan 
                SET nama_layanan = ?, deskripsi = ?
                WHERE id_layanan = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("ssi", $nama,$deskripsi, $id);
        $result = $query->execute();

        return $result;
    }

    public function delete($id) {
        $sql = "DELETE FROM layanan WHERE id_layanan = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("i", $id);
        $result = $query->execute();

        return $result;
    }


    public function get_by_id($id){

        $sql = ("SELECT * FROM layanan WHERE id_layanan = ?");
        $query = $this->conn->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
        $result =  $query->get_result();

        return $result;
    }
    }