<?php
session_start();
include 'koneksi.php';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $queryLogin =  mysqli_query($koneksi, "SELECT * FROM user WHERE  email = '$email'");
    if (mysqli_num_rows($queryLogin) > 0) {
        $rowLogin = mysqli_fetch_assoc($queryLogin);
        if ($password == $rowLogin['password']) {
            $_SESSION['nama'] = $rowLogin['nama'];
            $_SESSION['id'] = $rowLogin['id'];
            header('location:index.php');
        } else {
            header('location:login.php?login=gagal');
        }
    } else {
        header('location:login.php?login=gagal');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Aplikasi</title>
  <link rel="stylesheet" href="style.css" />
  <!-- Font Awesome CDN link for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body>
  <div class="wrapper">
    <form action="actionLogin.php" method="POST">
      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Email" required />
      </div>
      <div class="row">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Password" required />
      </div>
      <div class="row button">
        <input type="submit" value="Login" />
      </div>
      <div><a href="#">Login</a></div>
    </form>
  </div>
</body>
</html>