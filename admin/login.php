<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">

    <title>::. Login Administrator .::</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-wrapper {
            min-height: 100vh;
        }
        .login-left {
            margin-top:50px;
            background: url('../img/admin.jpg') no-repeat center center;
            background-size: cover;
            min-height: 85vh;
        }
        .login-form {
            padding: 40px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .login-title {
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
  </head>
  <body>
    <div class="container-fluid login-wrapper">
        <div class="row no-gutters">
            <div class="col-md-6 login-left d-none d-md-block">
                <!-- Gambar akan muncul dari background CSS -->
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="login-form w-75">
                <?php 
                    // $password = '12345';
                    // echo password_hash($password, PASSWORD_DEFAULT);
                ?>
                    <h4 class="login-title text-center">Masuk Administrator</h4>
                    <form action="proses-login.php" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukan Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-block">
                            <i class="ri-admin-fill"></i> Login
                        </button>
                        <button type="button" onclick="window.location.href='../index.php'" class="btn btn-secondary btn-block">
                             <i class="ri-arrow-left-circle-line"></i> Batal
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="../assets/js/jquery-3.4.1.slim.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>