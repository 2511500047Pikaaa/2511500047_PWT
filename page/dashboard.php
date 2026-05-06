<?php
include "config/koneksi.php";

$jml_siswa = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM siswa"))['total'];
$jml_kelas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM kelas"))['total'];
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
.icon-circle{
width:60px;height:60px;border-radius:50%;
display:flex;align-items:center;justify-content:center;
color:#fff;font-size:20px;
}
.bg-blue{background:#3b82f6}
.bg-green{background:#22c55e}

.avatar{
width:90px;height:90px;border-radius:50%;
background:#f97316;color:#fff;
display:flex;align-items:center;justify-content:center;
font-size:35px;margin:auto;
}
</style>

<div class="row">

<div class="col-md-4">
<div class="card">
<div class="card-body d-flex justify-content-between">
<div>
<small>Total Siswa</small>
<h2><?= $jml_siswa ?></h2>
</div>
<div class="icon-circle bg-blue"><i class="fas fa-users"></i></div>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card">
<div class="card-body d-flex justify-content-between">
<div>
<small>Total Kelas</small>
<h2><?= $jml_kelas ?></h2>
</div>
<div class="icon-circle bg-green"><i class="fas fa-school"></i></div>
</div>
</div>
</div>

</div>

<div class="card mt-3 p-3">
<h4>👋 Selamat Datang, <?= $_SESSION['username'] ?></h4>
<p class="text-muted">Semoga harimu menyenangkan 🚀</p>
</div>

<div class="row mt-3">

<div class="col-md-6">
<div class="card p-3">
<canvas id="chart"></canvas>
</div>
</div>

<div class="col-md-6">
<div class="card p-4 text-center">
<div class="avatar">
<?= strtoupper(substr($_SESSION['username'],0,1)) ?>
</div>
<h4 class="mt-3"><?= $_SESSION['username'] ?></h4>
<p class="text-muted"><?= $_SESSION['role'] ?></p>
<hr>
Login: <?= date("d M Y H:i") ?>
</div>
</div>

</div>

<script>
new Chart(document.getElementById('chart'),{
type:'bar',
data:{
labels:['Siswa','Kelas'],
datasets:[{
data:[<?= $jml_siswa ?>,<?= $jml_kelas ?>],
backgroundColor:['#3b82f6','#22c55e']
}]
}
});
</script>