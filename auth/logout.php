<?php
session_start();
session_unset(); // Menghapus semua variabel session
session_destroy(); // Mengakhiri session

header("Location: loginForm.php"); // Arahkan ke form login
exit;
