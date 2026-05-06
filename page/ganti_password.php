<?php
include "middleware.php";
include "config/koneksi.php";

$role = $_SESSION['role'];
$id = $_SESSION['login_id'];

if (isset($_POST['simpan'])) {

    $password_baru = $_POST['password_baru'];

    if ($role == 'admin') {

        $update = mysqli_query($conn, "
            UPDATE admin 
            SET password='$password_baru'
            WHERE username='$id'
        ");

    } else if ($role == 'siswa') {

        $update = mysqli_query($conn, "
            UPDATE siswa 
            SET password='$password_baru'
            WHERE nis='$id'
        ");
    }

    if ($update) {
        unset($_SESSION['must_change_password']);

        echo "<script>
            alert('Password berhasil diganti');
            window.location='index.php';
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Ganti Password</title>
</head>
<body>

<form method="POST">
    <h2>Ganti Password</h2>
    <input type="password" name="password_baru" placeholder="Password Baru" required>
    <button type="submit" name="simpan">Simpan</button>
</form>

</body>
</html> 