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

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Import</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<div class="col-md-4 offset-md-4" style="margin-top: 100px"> 
		<div class="card">
			<div class="card-header">
				<h2 class="card-title">Import</h2>
			</div>
			<div class="card-body">
				<a href="format1.xls" class="btn btn-primary mb-3">Download Format</a>
				<form action="proses.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>File Xls</label>
						<input type="file" name="file" class="form-control">
					</div>
					<input type="submit" name="import" value="import" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>
</body>
</html>
