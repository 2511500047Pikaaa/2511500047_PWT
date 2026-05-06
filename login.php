<?php
session_start();
include "config/koneksi.php";

if (isset($_POST['login'])) {

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if ($username == "" || $password == "") {
    $error = "Username dan Password wajib diisi!";
  } else {

    // ================= SISWA =================
    $siswa = mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$username' AND password='$password'");
    $dataSiswa = mysqli_fetch_assoc($siswa);

    if ($dataSiswa) {

      $_SESSION['role'] = 'siswa';
      $_SESSION['login_id'] = $dataSiswa['nis'];
      $_SESSION['username'] = $dataSiswa['nm_siswa'];

      if ($dataSiswa['password'] == '12345') {
        $_SESSION['must_change_password'] = true;
        header("Location: index.php?page=ganti_password");
      } else {
        unset($_SESSION['must_change_password']);
        header("Location: index.php");
      }
      exit;
    }

    // ================= ADMIN =================
    $admin = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    $dataAdmin = mysqli_fetch_assoc($admin);

    if ($dataAdmin) {

      $_SESSION['role'] = 'admin';
      $_SESSION['login_id'] = $dataAdmin['username'];
      $_SESSION['username'] = $dataAdmin['username'];

      if ($dataAdmin['password'] == '12345') {
        $_SESSION['must_change_password'] = true;
        header("Location: index.php?page=ganti_password");
      } else {
        unset($_SESSION['must_change_password']);
        header("Location: index.php");
      }
      exit;
    }

    $error = "Username / Password salah!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">

<div class="login-box">

  <div class="login-logo">
    <b>Login</b> System
  </div>

  <div class="card">
    <div class="card-body login-card-body">

      <p class="login-box-msg">Sign in to start your session</p>

      <?php if (isset($error)) { ?>
        <div class="alert alert-danger">
          <?= $error; ?>
        </div>
      <?php } ?>

      <form method="post">

        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username / NIS">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <input type="submit" name="login" value="Login" class="btn btn-primary btn-block">
          </div>
        </div>

      </form>

    </div>
  </div>

</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>