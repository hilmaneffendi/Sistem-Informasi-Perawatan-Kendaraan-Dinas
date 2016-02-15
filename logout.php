<?php

// config
include './config/config.php';

if ($ses_login === TRUE){
    session_destroy();
    redirect($site_url,'login.php');
}
else{
    redirect($site_url,'login.php');
}

?>
