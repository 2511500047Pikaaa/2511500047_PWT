<?php
session_start();

require_once "config/auth.php";
cek_login();

include "page/middleware.php";

$page = $_GET['page'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard</title>

<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="dist/css/adminlte.min.css">

<style>
body{background:#f1f5f9}

/* SIDEBAR */
.main-sidebar{
background:linear-gradient(180deg,#1e3a8a,#0f172a);
}

.brand-link{
background:linear-gradient(90deg,#3b82f6,#6366f1);
color:#fff !important;
text-align:center;
font-weight:bold;
}

.nav-sidebar .nav-link{
margin:6px 10px;
border-radius:10px;
color:#cbd5e1;
}

.nav-sidebar .nav-link.active{
background:linear-gradient(90deg,#3b82f6,#6366f1);
color:#fff !important;
}

.nav-sidebar .nav-link:hover{
background:rgba(255,255,255,0.1);
}

/* BADGE */
.badge-custom{
float:right;
background:#22c55e;
padding:3px 8px;
border-radius:50px;
font-size:11px;
color:#fff;
}

/* CARD */
.card{
border-radius:18px;
box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

/* NAVBAR */
.main-header{
background:rgba(255,255,255,0.7);
backdrop-filter:blur(10px);
}
</style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- NAVBAR -->
<nav class="main-header navbar navbar-expand">
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
</li>
<li class="nav-item">
<a class="nav-link">Home</a>
</li>
</ul>

<ul class="navbar-nav ml-auto">
<li class="nav-item">
<span id="clock" class="font-weight-bold text-primary"></span>
</li>
</ul>
</nav>

<!-- SIDEBAR -->
<aside class="main-sidebar elevation-4">
<a href="#" class="brand-link">🚀 FR</a>

<div class="sidebar">

<div class="user-panel mt-3 text-center text-white">
<b><?= $_SESSION['username']; ?></b>
</div>

<nav>
<ul class="nav nav-pills nav-sidebar flex-column"
data-widget="treeview"
data-accordion="false">

<!-- HOME -->
<li class="nav-item">
<a href="index.php" class="nav-link <?= ($page==''?'active':'') ?>">
<i class="fas fa-home nav-icon"></i>
<p>Home</p>
</a>
</li>

<?php
$menuOpen = in_array($page, ['guru','kelas','siswa','mapel','jadwal_kelas','detail_jadwal']);
?>

<!-- DATA MASTER -->
<li class="nav-item <?= $menuOpen ? 'menu-open' : '' ?>">

<a href="#" class="nav-link <?= $menuOpen ? 'active' : '' ?>">
<i class="nav-icon fas fa-layer-group"></i>
<p>
Data Master
<i class="right fas fa-angle-left"></i>
</p>
</a>

<ul class="nav nav-treeview">

<li class="nav-item">
<a href="?page=guru" class="nav-link <?=($page=='guru'?'active':'')?>">
<i class="far fa-circle nav-icon"></i>
<p>Guru <span class="badge-custom">2</span></p>
</a>
</li>

<li class="nav-item">
<a href="?page=kelas" class="nav-link <?=($page=='kelas'?'active':'')?>">
<i class="far fa-circle nav-icon"></i>
<p>Kelas <span class="badge-custom">6</span></p>
</a>
</li>

<li class="nav-item">
<a href="?page=siswa" class="nav-link <?=($page=='siswa'?'active':'')?>">
<i class="far fa-circle nav-icon"></i>
<p>Siswa <span class="badge-custom">5</span></p>
</a>
</li>

<li class="nav-item">
<a href="?page=mapel" class="nav-link <?=($page=='mapel'?'active':'')?>">
<i class="far fa-circle nav-icon"></i>
<p>Mapel</p>
</a>
</li>

<li class="nav-item">
<a href="?page=jadwal_kelas" class="nav-link <?=($page=='jadwal_kelas'?'active':'')?>">
<i class="far fa-circle nav-icon"></i>
<p>Jadwal Kelas</p>
</a>
</li>

<li class="nav-item">
<a href="?page=detail_jadwal" class="nav-link <?=($page=='detail_jadwal'?'active':'')?>">
<i class="far fa-circle nav-icon"></i>
<p>Detail Jadwal</p>
</a>
</li>

<li class="nav-item">
<a href="?page=detail_jadwal" class="nav-link <?=($page=='detail_jadwal'?'active':'')?>">
<i class="far fa-circle nav-icon"></i>
<p>Skripsi</p>
</a>
</li>

</ul>
</li>

<!-- LOGOUT -->
<li class="nav-item">
<a href="logout.php" class="nav-link text-danger">
<i class="fas fa-sign-out-alt nav-icon"></i>
<p>Logout</p>
</a>
</li>

</ul>
</nav>

</div>
</aside>

<!-- CONTENT -->
<div class="content-wrapper p-3">

<?php
if($page=="") include "page/dashboard.php";
elseif(file_exists("page/$page.php")) include "page/$page.php";
else echo "File tidak ditemukan";
?>

</div>

</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

<!-- JAM REALTIME -->
<script>
setInterval(()=>{
document.getElementById("clock").innerHTML=
new Date().toLocaleTimeString();
},1000);
</script>
<script>
$(document).ready(function () {
  $('[data-widget="treeview"]').Treeview('init');
});
</script>

</body>
</html> 