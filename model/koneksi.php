<?php 
class Koneksi{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'Tubes_PWD';
    private $conn;

    public function __construct(){
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        // if($this->conn->connect_error){
        //     die('tidak terhubung ke data base'.$this->conn->connect_error);
        // }else {
        //     echo 'terhubung ke data base';
        // }
    }

    public function getConnection(){
        return $this->conn;
    }
}
// $Koneksi = new Koneksi();
?>