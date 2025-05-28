<?php 
    require_once('koneksi.php');
    class Artikel extends koneksi{
        private $conn;

        public function __construct(){
            parent:: __construct();
            $this->conn = $this->getConnection();
        }

        public function getAll(){
            $query = "SELECT * FROM artikel ORDER BY id DESC";
            $result = $this->conn->query($query);

            $data = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function simpan($tanggal, $judul, $penulis,  $deskripsi, $posting, $cover){
        $sql = ("INSERT INTO artikel(tanggal, judul, penulis, deskripsi, posting, cover) 
                   VALUES(?,?,?,?,?,?)");
        $query = $this->conn->prepare($sql);

        $query->bind_param("ssssss", $tanggal, $judul, $penulis, $deskripsi, $posting, $cover);
        $result = $query->execute();

        return $result;
    }

    public function edit($id, $tanggal, $judul, $penulis,  $deskripsi, $posting, $cover) {
        $sql = "UPDATE artikel 
                SET tanggal = ?, judul = ?, penulis = ?, deskripsi = ?, posting = ?, cover = ?
                WHERE id = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("ssssssi", $tanggal,$judul,  $penulis, $deskripsi, $posting,$cover, $id);
        $result = $query->execute();

        return $result;
    }

    public function delete($id) {
        $sql = "DELETE FROM artikel WHERE id = ?";
        $query = $this->conn->prepare($sql);

        $query->bind_param("i", $id);
        $result = $query->execute();

        return $result;
    }


    public function get_by_id($id){

        $sql = ("SELECT * FROM artikel WHERE id = ?");
        $query = $this->conn->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
        $result =  $query->get_result();
        return $result->fetch_assoc(); 

    }
    }

// $artikel = new Artikel();
// print_r($artikel->getAll());