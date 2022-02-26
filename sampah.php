<?php 
	session_start();
	require_once('database/koneksi.php');
	if (!isset($_SESSION['username'])) {
			header('location:login.php');
		}else{
			$username =$_SESSION['username'];
		}

	//delete data, data akan kembali ke index
	if (isset($_GET['delete'])) {
      $nim = $_GET['delete'];
      $qdelsampah = "DELETE FROM sampah WHERE nim= '$nim' ";
      $delsampah = mysqli_query ($openServer, $qdelsampah);
      header("location:index.php");
    };
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data Dihapus</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.2.1.min.js"></script>
 	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="card-header">
			<h3 class="card-title"><center> Data Dihapus</center></h3>
		</div>
		<div class="card-body">
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
			$qsampah = "SELECT * FROM sampah ORDER BY nama ASC ";
			$opensampah = mysqli_query($openServer, $qsampah);

			$no = 1;
			while ($rsampah = mysqli_fetch_array($opensampah)) {
			
		?>	
		<tr align="center">
				<td><?php echo $no++; ?></td>
				<td><?php echo $rsampah['nim']; ?></td>
				<td><?php echo $rsampah['nama']; ?></td>
				<td><?php echo $rsampah['prodi']; ?></td>
				<td><a href="?delete=<?php echo $rsampah['nim']; ?>" class="btn btn-outline-danger" >Rollback</a></td>
			</tr>
		<?php 
		 }
		?>
		</div>
		
				</tbody>
				</tbody>
		</table>
	</div>
</body>
</html>