<?php 
session_start();
require_once('database/koneksi.php');
if (!isset($_SESSION['username'])) {
		header('location:auth/login.php');
	}else{
		$username =$_SESSION['username'];
	};

	//proses delete data
	if (isset($_GET['delete'])) {
      $nim = $_GET['delete'];
      $qdelmahasiswa = "DELETE FROM mahasiswa WHERE nim= '$nim' ";
      $delmahasiswa = mysqli_query ($openServer,$qdelmahasiswa);
    };
   
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.2.1.min.js"></script>
 	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="card-header">
			<h3 class="card-title">Data Mahasiswa
			<a href="auth/logout.php" class="btn btn-danger" style="margin-left: 700px">Logout</a>
			</h3>
		</div>
		<div class="card-body">
			<div class="btn btn-group">
				<a href="insert.php" class="btn btn-secondary">Tambah Data</a>
				
				<a href="export.php" class="btn btn-success" style="margin-left: 20px">Export Excel</a>
				<a href="import/import.php" class="btn btn-success" style="margin-left: 20px">Import Excel</a>
				<a href="sampah.php" class="btn btn-outline-danger" style="margin-left: 20px">Data Dihapus</a>

				<form  method="post" action="search.php" class="form-inline my-2 my-lg-0">

				<input class="form-control" type="search" placeholder="Search" aria-label="Search" style="margin-left: 230px" name="kunci">

  				<input type="submit" class="btn btn-success" name="search">

				</form>
			</div>

			<table class="table table-striped">
				<thead>
					<tr align="center">
						<th>NO</th>
						<th>NIM</th>
						<th>Nama Mahasiswa</th>
						<th>Prodi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
			
		<?php 

			$qmahasiswa = "SELECT * FROM mahasiswa ORDER BY nim ASC ";
			$openmahasiswa = mysqli_query($openServer, $qmahasiswa);

			$no = 1;
			
			while ($rmahasiswa = mysqli_fetch_array($openmahasiswa)) {
			
		?>	
		<tr align="center">
				<td><?php echo $no++; ?></td>
				<td><?php echo $rmahasiswa['nim']; ?></td>
				<td><?php echo $rmahasiswa['nama']; ?></td>
				<td><?php echo $rmahasiswa['prodi']; ?></td>
				<td>
					<a href="edit.php?edit=<?php echo $rmahasiswa['nim']; ?>" class="btn btn-primary" >Edit</a>
					<a href="?delete=<?php echo $rmahasiswa['nim']; ?>" class="btn btn-danger" >Delete</a>
				</td>
			</tr>
		<?php 
		 }
		?>

		
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>