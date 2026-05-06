<?php

if (!isset($_SESSION['login_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_SESSION['must_change_password']) && $_SESSION['must_change_password'] == true) {

    $page = $_GET['page'] ?? '';

    if ($page != "ganti_password") {
        header("Location: index.php?page=ganti_password");
        exit;
    }
}
?>