<?php

require_once '../model/koneksi.php';

class Register
{
    public $db;

    public function __construct()
    {
        $this->db = new Koneksi();
    }

    public function register()
    {
        $username = $_POST['username'];
        $pass     = $_POST['password'];
        $email    = $_POST['email'];

        if (empty($username) || empty($pass) || empty($email)) {
            echo "<script>alert('Username, Password, atau Email tidak boleh kosong');</script>";
            return;
        }

        $conn = $this->db->getConnection();

        // Cek apakah email sudah digunakan
        $checkStmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            echo "<script>alert('Email sudah terdaftar');</script>";
            return;
        }

        // Simpan user baru dengan role default "user"
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
        $role = "user";
        $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $email, $hashedPass, $role);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            echo "<script>alert('Registrasi berhasil'); window.location.href='loginForm.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal');</script>";
        }

        $stmt->close();
        $checkStmt->close();
    }
}
