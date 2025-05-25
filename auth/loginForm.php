<?php
require_once 'login.php';
$login = new login();
if (isset($_SESSION['email'])) {
  $redirect = ($_SESSION['role'] === 'admin') ? '../admin/dashboard.php' : '../index.php';
  echo "<script>alert('You are already logged in'); window.location.href='$redirect';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Login Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, rgb(230, 103, 19), rgb(225, 161, 34), rgb(228, 143, 53));
      color: #ffffff;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-box {
      background-color: rgba(0, 0, 0, 0.7);
      padding: 40px 30px;
      border-radius: 12px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.8);
      text-align: center;
    }

    .login-box img {
      max-width: 100px;
      margin-bottom: 25px;
      filter: drop-shadow(2px 2px 4px rgba(255, 255, 255, 0.2));
    }

    h1 {
      font-size: 22px;
      font-weight: 600;
      margin-bottom: 25px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 18px;
      text-align: left;
    }

    label {
      font-size: 14px;
      margin-bottom: 6px;
      display: block;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      font-size: 14px;
      background-color: #1e1e1e;
      border: 1px solid #444;
      border-radius: 8px;
      color: #fff;
      transition: border 0.2s;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
      border-color: #00bcd4;
      outline: none;
    }

    .error {
      color: red;
      font-size: 12px;
      margin-top: 5px;
    }

    button {
      padding: 12px;
      font-size: 14px;
      background: linear-gradient(90deg, #00c6ff, #0072ff);
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background: linear-gradient(90deg, #0072ff, #00c6ff);
    }

    .google-login, .facebook-login{
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 12px 0;
      background-color: #333;
      color: white;
      border-radius: 8px;
      text-decoration: none;
      transition: background 0.3s;
    }

    .google-login:hover, .facebook-login:hover{
      background-color: #555;
    }

    .google-login svg {
      margin-right: 10px;
    }

    .signup {
      font-size: 14px;
      color: #ccc;
      text-align: center;
      margin-top: 20px;
    }

    .signup a {
      color: #00c6ff;
      text-decoration: none;
    }

    .signup a:hover {
      text-decoration: underline;
    }
  </style>
</head>


<body>
  <div class="login-box">
    <img src="../img/logoruparupa.jpg" alt="Login Image" />

    <h1>Sign in to your account</h1>

    <form method="POST">
      <div>
        <label for="email">Your email</label>
        <input type="email" name="email" id="email" placeholder="name@company.com" required />
      </div>

      <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="••••••••" required />
      </div>

      <button type="submit" name="login">Sign in</button>

      <a href="#" class="google-login">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
          <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8
                    c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,
                    3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,
                    24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,
                    20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
          <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,
                    24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,
                    29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
          <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238
                    C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,
                    5.025C9.505,39.556,16.227,44,24,44z"></path>
          <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,
                    4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,
                    5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,
                    43.611,20.083z"></path>
        </svg>
        Continue with Google
      </a>

      <a href="#" class="facebook-login">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" viewBox="0 0 24 24">
          <path d="M22.676 0H1.326C.593 0 0 .593 0 1.326v21.348C0 23.407.593 24 1.326 
             24H12.82v-9.294H9.692V11.01h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 
             1.325 0 2.464.099 2.795.143v3.24l-1.918.001c-1.504 0-1.796.715-1.796 
             1.763v2.313h3.587l-.467 3.696h-3.12V24h6.116C23.407 24 24 23.407 24 
             22.674V1.326C24 .593 23.407 0 22.676 0z" />
        </svg>
         Continue with Facebook
      </a>

      <p class="signup">
        Don’t have an account yet?
        <a href="registerForm.php">Sign up</a>
      </p>
    </form>
  </div>
</body>

</html>