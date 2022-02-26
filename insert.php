<?php
	session_start();
	require_once('database/koneksi.php');
	
	if (!isset($_SESSION['username'])) {
			header('location:login.php');
		}else{
			$username =$_SESSION['username'];
		}

		
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Insert</title>
 	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
 </head>
 <body>
 	<form action="insert.php" method="post">
	 		<div class="col-md-6 offset-md-3">
	 			<div class="card mt-5">
	 				<div class="card-header">
	 					<h3 class="card-title"><center>Tambah Data Mahasiswa</center></h3>

	 				</div>
	 				<div class="card-body">
	 					<div class="form-group">
		                  <label for="" class="col-sm-3 control-label">NIM </label>
		                  <div class="col-sm-9">
		                    <input type="text" class="form-control" name="nim" placeholder="nim">
		                  </div><br>
						</div>
		                  <div class="form-group">
			                  <label for="" class="col-sm-3 control-label">Nama Mahasiswa </label>
			                  <div class="col-sm-9">
			                    <input type="nama" class="form-control" name="nama" placeholder="nama">
			                  </div><br>  
	                	  </div>
						<div class="form-group">
		                  <label for="" class="col-sm-3 control-label">Prodi </label>
		                  <div class="col-sm-9">
		                    <input type="text" class="form-control" name="prodi" placeholder="prodi">
		                  </div><br>
						</div>
	                	 <input type="submit" name="simpan" class="btn btn-primary" value="simpan">      	
	 				</div>
	 			</div>
	 		</div>
	 </form>
	<?php 
	//menambah data ke database
		if (isset($_POST['simpan'])) {
        $nim=$_POST['nim'];
        $nama=$_POST['nama'];
       	$prodi = $_POST['prodi'];

        $qinsert = "INSERT INTO mahasiswa VALUES ('$nim','$nama','$prodi')";
        $insert = mysqli_query($openServer,$qinsert);
        //mengarahkan ke index
        header('location:index.php');		 
		}
	 ?>
	
 	
 </body>
 
 </html>