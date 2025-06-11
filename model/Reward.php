<?php 
    require_once('koneksi.php');
    class Reward extends koneksi{
        private $conn;

        public function __construct(){
            parent:: __construct();
            $this->conn = $this->getConnection();
        }

        public function getAll(){
            $query = "SELECT * FROM reward ORDER BY id_reward DESC";
            $result = $this->conn->query($query);

            $data = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function simpan($nama,  $deskripsi, $cover){
        $sql = ("INSERT INTO reward(nama_reward, deskripsi, cover) 
                   VALUES(?,?,?)");
        $query = $this->conn->prepare($sql);

        $query->bind_param("sss", $nama,$deskripsi, $cover);
        $result = $query->execute();

        return $result;
    }

    public function edit($id, $nama,  $deskripsi, $cover) {
        $sql = "UPDATE reward 
                SET nama_reward = ?, deskripsi = ?, cover = ?
                WHERE id_reward = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("sssi", $nama,$deskripsi, $cover, $id);
        $result = $query->execute();

        return $result;
    }

    public function delete($id) {
        $sql = "DELETE FROM reward WHERE id_reward = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("i", $id);
        $result = $query->execute();

        return $result;
    }


    public function get_by_id($id){

        $sql = ("SELECT * FROM reward WHERE id_reward = ?");
        $query = $this->conn->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
        $result =  $query->get_result();
        return $result->fetch_assoc(); 
    }
    }