<?php
  include "../connection.php";
  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['nrp_mahasiswa'])){
      header("location:../view/admin-view-mahasiswa.php");
      exit;
    }
    $nrp_mahasiswa = $_GET['nrp_mahasiswa'];
    $sql = "select * from mahasiswa where nrp_mahasiswa='$nrp_mahasiswa'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location:../view/admin-view-mahasiswa.php");
      exit;
    }
    $nama_mahasiswa = $row['nama_mahasiswa'];

  }
  else{
    $nrp_mahasiswa = $_POST['nrp_mahasiswa'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    

    $sql = "update `mahasiswa` set nama_mahasiswa='$nama_mahasiswa', where nrp_mahasiswa = '$nrp_mahasiswa'";
    $result = $con->query($sql);
    
  }
  
  $kode_matkul = $_GET['nrp_mahasiswa'];
  if(isset($_POST['update-mahasiswa'])){
    $nama_mahasiswa=$_POST['nama_mahasiswa'];
    $sql="update `mahasiswa` set nrp_mahasiswa=$nrp_mahasiswa, nama_mahasiswa='$nama_mahasiswa' where nrp_mahasiswa=$nrp_mahasiswa";
    $result=mysqli_query($con,$sql);
    if($result){
      $_SESSION['status'] = "Data updated successfully";
  } else {
      echo "something went wrong";
  }
  };
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
 <?php
  if(isset($_SESSION['status']))
  {
    ?> <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hey!</strong> <?php echo $_SESSION['status']?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div><?php
    unset($_SESSION['status']);
  }
  ?>
 <div class="card-header bg-warning">
 <h1 class="text-white text-center">  Update Nama Mahasiswa </h1>
 </div><br>
 <label> NRP Mahasiswa: </label>
 <input type="text" name="nrp_mahasiswa" value="<?php echo $row['nrp_mahasiswa']; ?>" class="form-control"> <br>

 <label> Nama Mahasiswa: </label>
 <input type="text" name="nama_mahasiswa" value="<?php echo $row['nama_mahasiswa']; ?>" class="form-control"> <br>


 <button class="btn btn-success" type="submit" name="update-mahasiswa"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="../view/admin-view-mahasiswa.php"> Cancel </a><br>

 </div>
 </form>
 </div>
</body>
</html>
