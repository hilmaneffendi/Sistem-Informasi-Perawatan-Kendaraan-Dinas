<?php
include './config/config.php';
session_start();
$bln = $_POST['txtbln'];
$thn = $_POST['txtthn'];
$id = $_POST['txtid'];
if($bln!="" && $thn!=""){
	$data_cek = db_cek_data($bln, $thn);
	$hsl= mysql_num_rows($data_cek);
	if($hsl>0){
		$_SESSION['sasih'] = $bln;
		$_SESSION['tahun'] = $thn;
		$data['say'] = "ok";
		if('IS_AJAX'){
					echo json_encode($data);
				}
	}else{
		unset($_SESSION['sasih']);
		unset($_SESSION['tahun']);
		$data['say'] = "NotOk";	
		if('IS_AJAX'){
			echo json_encode($data);
		}
	}
}else{
	$pecah = explode("-", $id);
	$idna = $pecah[1];
	$data_cek = db_cek_data_pegawai($idna,$bln,$thn);
	$hsl= mysql_num_rows($data_cek);
	if($hsl>0){
		$data_kendaraan = db_cek_kendaraan($idna);
	    while ($data = mysql_fetch_array($data_kendaraan)) {
			$_SESSION['nopol'] = $data['nopol'];
			$_SESSION['nama_kendaraan'] = $data['nama'];
		}	
		$nami = $pecah[0];
		$_SESSION['nami_karyawan'] = $nami;
		$_SESSION['sasih'] = $bln;
		$_SESSION['tahun'] = $thn;
		$_SESSION['id'] = $idna;
		$data['say'] = "ok";
	}else{
		$data['say'] = "NotOk";
	}
	if('IS_AJAX'){
		echo json_encode($data);
	}
}
?>