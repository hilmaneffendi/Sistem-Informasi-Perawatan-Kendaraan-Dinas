<?php
// config
include './config/config.php';

$id = $_POST['id'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];

$db_query = db_biaya_get_all_add($id,$bulan,$tahun);
$db_num = mysql_num_rows($db_query);
$no = 0;

if ($db_num == 0){
    echo '<tr>';
    echo '<td colspan="6">Data untuk bulan : '.$bulan.' dan tahun : '.$tahun.' kosong !</td>';
    echo '</tr>';
}

while ($data = mysql_fetch_array($db_query)){
    echo '<tr>';
    echo '<td>'.++$no.'</td>';
    echo '<td>'.$data['tanggal'].'</td>';
    echo '<td>'.$data['jenis'].'</td>';
    echo '<td>'.$data['biaya'].'</td>';
    echo '<td>'.$data['jumlah'].'</td>';
    echo '<td><a href="./biaya_delete.php?id='.$data['id'].'"><button class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button></a></td>';
    echo '</tr>';
}

?>
