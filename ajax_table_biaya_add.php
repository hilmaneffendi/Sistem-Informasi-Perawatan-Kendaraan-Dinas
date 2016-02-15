<?php
// config
include './config/config.php';

$tanggal = $_POST['tanggal'];
$jenis = $_POST['jenis'];
$biaya = $_POST['biaya'];
$jumlah = $_POST['jumlah'];
$keterangan = $_POST['keterangan'];
$pemegang_id = $_POST['id'];
$kendaraan_id = db_kendaraan_get_id_by_pemegang_id($pemegang_id);
$db_query = db_biaya_add($tanggal,$jenis,$biaya,$jumlah,$keterangan,$pemegang_id,$kendaraan_id);

echo '<br/>';

if ($db_query){
    echo '<div class="alert alert-success">Data berhasil disimpan</div>';
}
else{
    // echo '<div class="alert alert-danger">Data gagal disimpan "'.$tanggal . "<br/>" . $biaya . "<br/>" . $jumlah . "<br/>" . $keterangan . "<br/>" . "Pemegang : " .  $pemegang_id . "<br/>" . "Kendaraan_id : " .  $kendaraan_id . "<br/>".'"</div>';
}

?>
