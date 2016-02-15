<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    // web view
    $site_title = 'DATA BIAYA';
    $site_error = '';
    $data_kendaraan = db_biaya_get_all();
    
    $create = $_POST['create'];

    if (isset($create)) {

        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $nopol = $_POST['nopol'];
        $anggaran = $_POST['anggaran'];
        $pemegang_id = $_POST['pemegang_id'];
        
        if ($pemegang_id == ''){
            $pemegang_id = 'NULL';
        }
        else{
            $pemegang_id = "'".$pemegang_id."'";            
        }
        
        $db_insert = db_kendaraan_insert_new($nik, $nama, $nopol, $anggaran,$pemegang_id);

        if ($db_insert === TRUE) {
            $site_error = '<div class="alert alert-success">Data berhasil ditambahkan !</div>';            
            // refresh query
            $data_kendaraan = db_kendaraan_get_all();
        } else {
            $site_error = '<div class="alert alert-danger">Pemegang sudah memiliki kendaraan lain !</div>';
        }
    }

    include './view/header.php';
    include './view/biaya.php';
    include './view/footer.php';
} else {
    redirect($site_url, 'login.php');
}
?>