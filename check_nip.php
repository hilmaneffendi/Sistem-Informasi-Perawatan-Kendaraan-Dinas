<?php

// config
include './config/config.php';

if ($ses_login === TRUE){
    $data = $_POST['nip'];
    
    
    if (isset($data)){
        $num_nip = db_pemegang_check_nip($data);
        if ($num_nip > 0){
            echo 'false';
        }
        else{
            echo 'true';
        }
    }
    else{
        echo 'false';
    }
}
else{
    redirect($site_url,'login.php');
}

?>