<?php

	session_start();
	require_once('../database/koneksi.php');
	require 'excelreader.php';
	require 'SpreadsheetReader.php';

	if (!isset($_SESSION['username'])) {
		header('location:../auth/login.php');
	}else{
		$username = $_SESSION['username'];
	}


	if(isset($_POST['import'])){
	$data = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name']);
	$hasildata = $data->rowcount($sheet_index=0);

	

	for ($i=2; $i<=$hasildata; $i++){
		$data1 = $data->val($i,1);
		$data2 = $data->val($i,2);
		$data3 = $data->val($i,3);
			

		$hasil = $openServer->query("INSERT INTO mahasiswa VALUES('$data1','$data2','$data3')");		
		
	}
	header("location:../index.php");	
	}
?>
  