<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    // web view
    $site_title = 'CETAK LAPORAN';

    include './view/header.php';
    include './view/cetak.php';
    include './view/footer.php';
    
} else {
    redirect($site_url, 'login.php');
}
?>