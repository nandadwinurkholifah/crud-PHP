<?php 
	session_start();
	require_once('../database/koneksi.php');
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Login</title>
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
 	<script src="../js/jquery-3.2.1.min.js"></script>
 	<script src="../js/bootstrap.min.js"></script>
 </head>
 <body>
 	<div class="container">
 		<form action="login.php" method="post">
	 		<div class="col-md-6 offset-md-3">
	 			<div class="card mt-5">
	 				<div class="card-header">
	 					<h3 class="card-title"><center> Login</center></h3>
	 				</div>
	 				<div class="card-body">
	 					<div class="form-group">
		                  <label for="" class="col-sm-3 control-label">Username </label>
		                  <div class="col-sm-9">
		                    <input type="text" class="form-control" name="username" placeholder="username">
		                  </div><br>

		                  <div class="form-group">
			                  <label for="" class="col-sm-3 control-label">Password </label>
			                  <div class="col-sm-9">
			                    <input type="password" class="form-control" name="password" placeholder="password">
			                  </div><br>
			        
				                  <input type="submit" name="simpan" class="btn btn-success" style="margin-left: 150px">
				                  <a href="register.php" class="btn btn-primary">Register</a>
				              
	                	  </div>
	                	  
	                	</div>
	 				</div>
	 			</div>
	 		</div>
	 	</form>
 	</div>
 	<?php 
 		if (isset($_POST['simpan'])) {

 		$username = $_POST['username'];
		$password = $_POST['password'];

		$cekpengguna = mysqli_query($openServer, "SELECT  * FROM user WHERE username='$username' ");

		$hasil = mysqli_fetch_array($cekpengguna);
		
		if (mysqli_num_rows($cekpengguna) == 0) {
			echo "username belum terdaftar";
		}else{
			if ($password <> $hasil['password']) {
				echo "password salah";
			}else{
				$_SESSION['username'] = $hasil['username'];
					header('location:../index.php');
			}
		}
 	}
 	?>
</body>
</html> 

