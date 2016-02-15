<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    redirect($site_url, 'home.php');
} else {
// code
    $login = $_POST['login'];
    $login_username = $_POST['username'];
    $login_password =md5($_POST['password']);
    $login_check = db_login_check($login_username, $login_password);
    $login_error = '';

    if (isset($login)) {
        if ($login_check === TRUE) {
            // login sukses
            $_SESSION['login'] = TRUE;
            $_SESSION['username'] = $login_username;
            $_SESSION['nama'] = db_login_get_nama($login_username);

            redirect($site_url, 'home.php');
        } else {
            $login_error = '<div class="alert alert-danger">Data yang anda masukan salah !</div>';
        }
    }

// web view
    $site_title = 'LOGIN SISTEM';

    include './view/header.php';
    include './view/login.php';
    include './view/footer.php';
}
?>
