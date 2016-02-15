<?php

// menyembunyikan error warning
error_reporting(0);

// site config
$site_url   = 'http://bps.com';
$site_title = '';

// include config
include './config/database.php';
include './config/session.php';

// function site
function redirect($site_url,$link){
    header("Location: $site_url/$link"); 
}

?>