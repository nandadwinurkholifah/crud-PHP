<?php 
  require_once("../database/koneksi.php");
 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">
    <form action="register.php" method="post">
      <div class="col-md-6 offset-md-3">
        <div class="card mt-5">

          <div class="card-header">
            <h3 class="card-title"><center> Register</center></h3>
          </div>

          <div class="card-body">
            <div class="form-group"> 
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="username">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="password">
            </div><br>

            <input type="submit" name="simpan" value="submit" class="btn btn-primary">
          </div>

        </div>
      </div>   
    </form>

  </div>  
</body>
</html> 

 <?php 
    if (isset($_POST['simpan'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cekpengguna = mysqli_query($openServer, "SELECT * FROM user WHERE username = '$username' ");

    if (mysqli_num_rows($cekpengguna) > 0) {
      echo "User sudah terdaftar";
    } else{
      if (!$username || !$password) {
        echo "Masih ada data yang kosong";
      }else{
        $simpan = mysqli_query($openServer, "INSERT INTO user (username, password) VALUES ('$username','$password')");
        if ($simpan) {
          header('location:login.php');
          
        }else{
          echo "Register gagal";
          }
        }
      }
    }
?>
