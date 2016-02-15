<?php
include './config/config.php';
session_start();
$bln = $_POST['txtbln'];
$thn = $_POST['txtthn'];
$id = $_POST['txtid'];
$thn_thn = $_POST['txtthn_thn'];
$cnip = $_POST['cnip'];
$thn_bbm = $_POST['txtthn_bbm'];
if($id=="" && $bln!="" && $thn!="" && $thn_thn=="" && $cnip == "" && $thn_bbm == ""){
	$data_cek = db_cek_data($bln, $thn);
	$hsl= mysql_num_rows($data_cek);
	if($hsl>0){
		$_SESSION['sasih'] = $bln;
		$_SESSION['tahun'] = $thn;
		$data['say'] = "ok";
	}else{
		$data['say'] = "NotOk";	
	}
}elseif($id !="" && $bln!="" && $thn!="" && $thn_thn == "" && $cnip == "" && $thn_bbm == ""){
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
}elseif ($id=="" && $bln=="" && $thn=="" && $thn_thn != ""  && $cnip == "" && $thn_bbm == "") {
	$data_cek = db_cek_data_pertahun($thn_thn);
	$hsl= mysql_num_rows($data_cek);
	if($hsl>0){
		$_SESSION['tahun'] = $thn_thn;
		$data['say'] = "ok";
	}else{
		$data['say'] = "NotOk";	
	}
}elseif ($thn_thn != ""  && $cnip != "") {
	$pecah = explode("-", $cnip);
	$idna = $pecah[1];
	$data_cek = db_cek_data_pegawai_thn($idna,$thn_thn);
	$hsl= mysql_num_rows($data_cek);
	if($hsl>0){
		$nami = $pecah[0];
		$_SESSION['nami_karyawan'] = $nami;
		$_SESSION['tahun'] = $thn_thn;
		$_SESSION['id'] = $idna;
		$data_kendaraan = db_cek_kendaraan($idna);
	    while ($data = mysql_fetch_array($data_kendaraan)) {
			$_SESSION['nopol'] = $data['nopol'];
			$_SESSION['nama_kendaraan'] = $data['nama'];
		}	
		$data['say'] = "ok";
	}else{
		$data['say'] = "NotOk";
	}
}elseif ($id=="" && $bln=="" && $thn=="" && $thn_thn == ""  && $cnip == "" && $thn_bbm != "") {
	$data_cek = db_cek_bbm($thn_bbm);
	$hsl= mysql_num_rows($data_cek);
	if($hsl>0){
		$_SESSION['tahun'] = $thn_bbm;
		$data['say'] = "ok";
	}else{
		$data['say'] = "NotOk";
	}	
}
echo json_encode($data);
?>