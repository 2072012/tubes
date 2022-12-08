<?php
  include "../connection.php";
  // $kode_matkul="";
  // $nama_matkul="";

  // $error="";
  // $success="";

  // if($_SERVER["REQUEST_METHOD"]=='GET'){
  //   if(!isset($_GET['kode_matkul'])){
  //     header("location:../view/admin-view.php");
  //     exit;
  //   }
  //   $kode_matkul = $_GET['kode_matkul'];
  //   $sql = "select * from matkul where kode_matkul=$kode_matkul";
  //   $result = $con->query($sql);
  //   $row = $result->fetch_assoc();
  //   while(!$row){
  //     header("location:../view/admin-view.php");
  //     exit;
  //   }
  //   $nama_matkul = $row['nama_matkul'];

  // }
  // else{
  //   $kode_matkul = $_POST['kode_matkul'];
  //   $nama_matkul = $_POST['nama_matkul'];
    

  //   $sql = "update matkul set nama_matkul='$nama_matkul', where kode_matkul = '$kode_matkul'";
  //   $result = $con->query($sql);
    
  // }
  
  $kode_matkul = $_GET['kode_matkul'];
  $sql = "select * from matkul where kode_matkul='$kode_matkul'";
  $result = mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $nama_matkul=$row['nama_matkul'];

  if(isset($_POST['submit'])){
    $nama_matkul = $_POST['nama_matkul'];

    $sql="update 'matkul' set nama_matkul='$nama_matkul', where kode_matkul='$kode_matkul'";
    $result = mysqli_query($con,$sql);
    if($result){
      echo "Update successfully";
    }else{
      die(mysqli_error($con));
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
 <title>Admin Update Matkul</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" class="fw-bold">
      <div class="container-fluid">
        <a class="navbar-brand" href="../view/admin-view.php">ADMIN OPERATION</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="..view/admin-view.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../admin_function/admin-add.php">Add New</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-warning">
 <h1 class="text-white text-center">  Update Mata Kuliah </h1>
 </div><br>
 <label> Kode Mata Kuliah: </label>
 <input type="text" name="kode_matkul" value="<?php echo $row['kode_matkul']; ?>" class="form-control"> <br>

 <label> Nama Mata Kuliah: </label>
 <input type="text" name="nama_matkul" value="<?php echo $row['nama_matkul']; ?>" class="form-control"> <br>


 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="../view/admin-view.php"> Cancel </a><br>

 </div>
 </form>
 </div>
</body>
</html>
