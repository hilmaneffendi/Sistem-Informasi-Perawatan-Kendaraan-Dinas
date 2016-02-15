<?php

// config
include './config/config.php';


if ($ses_login === TRUE){
    redirect($site_url,'home.php');
}
else{
    redirect($site_url,'login.php');
}
?>
