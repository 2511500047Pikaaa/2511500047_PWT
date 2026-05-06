<?php
include "config/koneksi.php";
require_once "config/auth.php";
cek_login();

// PROTEKSI HAPUS
if (isset($_GET['action']) && $_GET['action'] == "hapus") {

  if (!is_admin()) {
    echo "Akses ditolak!";
    exit;
  }

  $kd = $_GET['kd'];
  $query = mysqli_query($conn, "DELETE FROM skripsi_047 WHERE id_skripsi047='$kd'");

  if ($query) {
    echo "<div class='alert alert-warning'>Berhasil Di Hapus</div>";
    echo '<meta http-equiv="refresh" content="1;url=index.php?page=skripsi_047">';
  }
}
?>

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">

        <?php if (is_admin()) { ?>
          <a href="index.php?page=tambah_skripsi047" class="btn btn-primary btn-sm mb-3">
            Tambah Skripsi
          </a>
        <?php } ?>

        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>NO</th>
              <th>Id Skripsi</th>
              <th>Judul Skripsi</th>
              <th>Topik</th>
              <th>Semester</th>
              <th>Tahun Ajaran</th>
              <?php if (is_admin()) { ?>
                <th>Aksi</th>
              <?php } ?>
            </tr>
          </thead>

          <tbody>
            <?php
            $no = 0;
            $query = mysqli_query($conn, "SELECT * FROM skripsi_047");
            while ($result = mysqli_fetch_array($query)) {
              $no++;
            ?>
              <tr>
                <td><?= $no; ?></td>
                <td><?= $result['id_skripsi047']; ?></td>
                <td><?= $result['judul_skripsi047']; ?></td>
                <td><?= $result['topik047']; ?></td>
                <td><?= $result['semester047']; ?></td>
                <td><?= $result['thn_ajaran047']; ?></td>



                <?php if (is_admin()) { ?>
                  <td>
                    <a href="index.php?page=skripsi_047&action=hapus&kd=<?= $result['id_skripsi047'] ?>"
                      onclick="return confirm('Yakin ingin hapus?')">
                      <span class="badge badge-danger">Hapus</span>
                    </a>

                    <a href="index.php?page=edit_skripsi047&kd=<?= $result['judul_skripsi047'] ?>">
                      <span class="badge badge-warning">Edit</span>
                    </a>

                   
                  </td>
                <?php } ?>
              </tr>
            <?php } ?>
          </tbody>

        </table>

      </div>
    </div>
  </div>
</div>