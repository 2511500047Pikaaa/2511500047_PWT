<?php

require_once "config/auth.php";
hanya_admin();
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Skripsi</h1>
            </div>
        </div>
    </div>
</div>
<?php
include "config/koneksi.php";
//kode otomatis
$carikode = mysqli_query($conn, "select max(id_skripsi047) from skripsi047") or die(mysqli_error($conn));
$datakode = mysqli_fetch_array($carikode);
if ($datakode) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
}

if (isset($_POST['tambah'])) {
    $id_skripsi047 = $_POST['id_skripsi047'];
    $judul_skripsi047 = $_POST['judul_skripsi047'];
    $topik047 = $_POST['topik047'];
    $semester047 = $_POST['semester047'];
    $thn_ajaran047 = $_POST['thn_ajaran047'];

    $insert = mysqli_query($conn, "INSERT INTO skripsi_047 values ('$id_skripsi047','$judul_skripsi047','$topik047','$semester047','$thn_ajaran047')");

    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert"
            aria-hidden="true">×</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=skripsi_047">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"
            aria-hidden="true">×</button>
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
                        <label>Semester</label>
                        <select name="semester" class="form-control">
                            <option value="ganjil" <?=['semester081'] == 'ganjil' ? 'selected' : '' ?>>Ganjil</option>
                            <option value="genap" <?= ['semester081'] == 'genap' ? 'selected' : '' ?>>Genap</option>
                        </select>
                        </div>

                        <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <select name="thn_ajaran" class="form-control">
                            <option value="2025/2026" <?= ['thn_ajaran081'] == '2025/2026' ? 'selected' : '' ?>>2025/2026</option>
                            <option value="2026/2027" <?= ['thn_ajaran081'] == '2026/2027' ? 'selected' : '' ?>>2026/2027</option>
                        </select>
                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
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