<?php

require_once "config/auth.php";
hanya_admin();
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Skripsi</h1>
            </div>
        </div>
    </div>
</div>

<?php
include "config/koneksi.php";
$kd = $_GET['kd'];
$edit = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM skripsi_047 WHERE id_skripsi047='$kd'"));

if (isset($_POST['tambah'])) {
    $id_skripsi047 = $_POST['id_skripsi047'];
    $judul_skripsi047 = $_POST['judul_skripsi047'];
    $topik047 = $_POST['topik047'];
    $semester047 = $_POST['semester047'];
    $thn_ajaran047 = $_POST['thn_ajaran047'];

    $insert = mysqli_query($conn, "UPDATE skripsi_047 SET judul_skripsi047='$judul_skripsi047', topik047='$topik047', semester047='$semester047', thn_ajaran047='$thn_ajaran047' WHERE id_skripsi047='$id_skripsi047'");

    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=skripsi_047">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Gagal Disimpan</h4></div>';
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body p-2">
                    <form method="POST" action="">
                       <div class="form-group">
                            <label for="id_skripsi047">ID Skripsi</label>
                            <input type="text" name="id_skripsi047" placeholder="ID Skripsi" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="judul_skripsi047">Judul Skripsi</label>
                            <input type="text" name="judul_skripsi047" id="judul_skripsi047" placeholder="Judul Skripsi" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="topik047">Topik</label>
                            <input type="text" name="topik047" id="topik047" placeholder="Topik" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="semester047">Semester</label>
                            <select name="semester047" class="form-control">
                            <option value="ganjil" <?=['semester047'] == 'ganjil' ? 'selected' : '' ?>>Ganjil</option>
                            <option value="genap" <?= ['semester047'] == 'genap' ? 'selected' : '' ?>>Genap</option>
                            </select>                        
                        </div>

                        <div class="form-group">
                            <label for="thn_ajaran047">Tahun Ajaran</label>
                            <select name="thn_ajaran047" class="form-control">
                            <option value="2025/2026" <?= ['thn_ajaran047'] == '2025/2026' ? 'selected' : '' ?>>2025/2026</option>
                            <option value="2026/2027" <?= ['thn_ajaran047'] == '2026/2027' ? 'selected' : '' ?>>2026/2027</option>
                        </select>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="tambah" value="Update">
                            <a href="index.php?page=skripsi_047" class="btn btn-secondary">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>