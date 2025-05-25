<?php

require_once '../model/koneksi.php';

class login
{
    public $db;

    public function __construct()
    {
        session_start();
        $this->db = new Koneksi();
        $this->check_login();
    }

    public function check_login()
    {
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $pass = $_POST['password'];

            if (empty($email) || empty($pass)) {
                echo "<script>alert('Email atau Password tidak boleh kosong');</script>";
                return;
            }

            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                if (password_verify($pass, $row['password'])) {
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['role'] = $row['role']; // Simpan role

                    // Redirect berdasarkan role
                    if ($row['role'] === 'admin') {
                        echo "<script>window.location.href='../admin/dashboard.php';</script>";
                    } else {
                        echo "<script>window.location.href='../index.php';</script>";
                    }
                } else {
                    echo "<script>alert('Email atau Password salah');</script>";
                }
            } else {
                echo "<script>alert('Email tidak terdaftar');</script>";
            }
        }
    }
}
