<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    $id = $_GET['id'];

    if (isset($id)) {
        $db_delete = db_kendaraan_delete($id);
        redirect($site_url, 'kendaraan.php');
    } else {
        redirect($site_url, 'kendaraan.php');
    }
} else {
    redirect($site_url, 'login.php');
}
?>