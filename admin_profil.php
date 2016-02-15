<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    // web view
    $site_title = 'EDIT PROFIL';
    $site_alert = '';
    $data = db_admin_get_profil($ses_username);

    $update = $_POST['update'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];

    if (isset($update)) {
        $sql_update = db_admin_update_profile($username, $password, $nama, $telepon);

        if ($sql_update === TRUE) {
            $data = db_admin_get_profil($ses_username);
            $site_alert = '<div class="alert alert-success">Data berhasil di update !</div>';
            include './view/header.php';
            include './view/admin_profil.php';
            include './view/footer.php';
        } else {
            $site_alert = '<div class="alert alert-danger">Kesalahan dalam menyimpan data !</div>';
            include './view/header.php';
            include './view/admin_profil.php';
            include './view/footer.php';
        }
    } else {
        include './view/header.php';
        include './view/admin_profil.php';
        include './view/footer.php';
    }
} else {
    redirect($site_url, 'login.php');
}
?>