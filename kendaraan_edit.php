<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    $id = $_GET['id'];

    if (isset($id)) {
        $site_title = 'EDIT DATA';
        $site_id = $id;
        $site_error = '';
        $data = db_kendaraan_get_row_by_id($id);

        $update = $_POST['update'];

        if (isset($update)) {
            $nik = $_POST['nik'];
            $nama = $_POST['nama'];
            $nopol = $_POST['nopol'];
            $anggaran = $_POST['anggaran'];
            $pemegang_id = $_POST['pemegang_id'];

            if ($pemegang_id == '') {
                $pemegang_id = 'NULL';
            } else {
                $pemegang_id = "'" . $pemegang_id . "'";
            }

            $db_update = db_kendaraan_update_by_id($id, $nik, $nama, $nopol, $anggaran,$pemegang_id);

            if ($db_update === TRUE) {
                redirect($site_url, 'kendaraan.php');
            } else {
                $site_error = '<div class="alert alert-danger">Pemegang sudah memiliki kendaraan lain !</div>';
            }
        }


        include './view/header.php';
        include './view/kendaraan_edit.php';
        include './view/footer.php';
    } else {
        redirect($site_url, 'kendaraan.php');
    }
} else {
    redirect($site_url, 'login.php');
}
?>