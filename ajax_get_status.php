<?php
// config
include './config/config.php';

$id = $_POST['id'];

$db_query = db_kendaraan_get_by_pemegang($id);
$db_num = mysql_num_rows($db_query);

echo $db_num;

?>
