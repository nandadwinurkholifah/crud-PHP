<?php
	session_start();
if (!isset($_SESSION['username'])) {
		header('location:login.php');
	}else{
		$username =$_SESSION['username'];
	}
	
	include "database/koneksi.php";
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Edit </title>
 	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 </head>
 <body>
 	<?php 
   	//update data
    if (isset($_POST['simpan'])) {
      $nim = $_POST['nim'];
      $nama = $_POST['nama'];
      $prodi = $_POST['prodi'];

      $qeditmahasiswa = "UPDATE mahasiswa SET nama='$nama', prodi = '$prodi' WHERE nim = '$nim' ";

      $editmahasiswa = mysqli_query($openServer, $qeditmahasiswa);

      header("location:index.php");
    } 
    
    	// edit data
   	   if (isset($_GET['edit'])) {
       $nim=$_GET['edit'];
       
       $qselectmahasiswa = "SELECT * FROM mahasiswa WHERE nim='$nim' ";
       $openmahasiswa = mysqli_query($openServer,$qselectmahasiswa);

       while ($rmahasiswa = mysqli_fetch_array($openmahasiswa)) {
    
   	   
 	 ?>
 	 <form action="edit.php" method="post">
	 		<div class="col-md-6 offset-md-3">
	 			<div class="card mt-5">
	 				<div class="card-header">
	 					<h3 class="card-title"><center>Edit Data</center></h3>

	 				</div>
	 				<div class="card-body">
	 					<div class="form-group">
		                  <label for="" class="col-sm-3 control-label">NIM </label>
		                  <div class="col-sm-9">
		                    <input type="text" class="form-control" name="nim" value="<?php echo $rmahasiswa['nim']; ?> " >
		                  </div><br>
						</div>
		                  <div class="form-group">
			                  <label for="" class="col-sm-3 control-label">Nama Mahasiswa </label>
			                  <div class="col-sm-9">
			                    <input type="nama" class="form-control" name="nama" value="<?php echo $rmahasiswa['nama']; ?> " >
			                  </div><br>  
	                	  </div>
						<div class="form-group">
		                  <label for="" class="col-sm-3 control-label">Prodi </label>
		                  <div class="col-sm-9">
		                    <input type="text" class="form-control" name="prodi" value="<?php echo $rmahasiswa['prodi']; ?> " >
		                  </div><br>
						</div>
	                	 <input type="submit" name="simpan" class="btn btn-primary" value="simpan">      	
	 				</div>
	 			</div>
	 		</div>
	 </form>
	 <?php 
	}
	}
	  ?>
 </body>
 </html>