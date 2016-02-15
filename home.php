<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    // web view
    $site_title = 'ADMIN HOME';

    include './view/header.php';
    include './view/home.php';
    include './view/footer.php';
    
} else {
    redirect($site_url, 'login.php');
}
?>