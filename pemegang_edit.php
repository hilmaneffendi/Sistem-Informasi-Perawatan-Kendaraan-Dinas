<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    $id = $_GET['id'];

    if (isset($id)) {
        $site_title = 'EDIT DATA';
        $site_id = $id;
        $site_error = '';
        $data = db_pemegang_get_row_by_id($id);

        $update = $_POST['update'];

        if (isset($update)) {
            $nip = $_POST['nip'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $telepon = $_POST['telepon'];

            $db_update = db_pemegang_update_by_id($id, $nip, $nama, $alamat, $telepon);

            if ($db_update === TRUE) {
                redirect($site_url, 'pemegang.php');
            } else {
                $site_error = '<div class="alert alert-danger">Kesalahan dalam database !</div>';
            }
        }


        include './view/header.php';
        include './view/pemegang_edit.php';
        include './view/footer.php';
    } else {
        redirect($site_url, 'pemegang.php');
    }
} else {
    redirect($site_url, 'login.php');
}
?>