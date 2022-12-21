<?php
  include "../connection.php";
  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['nrp_dosen'])){
      header("location:../view/admin-view-dosen.php");
      exit;
    }
    $nrp_dosen = $_GET['nrp_dosen'];
    $sql = "select * from dosen where nrp_dosen='$nrp_dosen'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location:../view/admin-view-dosen.php");
      exit;
    }
    $nama_dosen = $row['nama_dosen'];

  }
  else{
    $nrp_dosen = $_POST['nrp_dosen'];
    $nama_dosen = $_POST['nama_dosen'];
    

    $sql = "update `dosen` set nama_dosen='$nama_dosen', where nrp_dosen = '$nrp_dosen'";
    $result = $con->query($sql);
    
  }
  
  $kode_matkul = $_GET['nrp_dosen'];
  if(isset($_POST['update-dosen'])){
    $nama_dosen=$_POST['nama_dosen'];
    $sql="update `dosen` set nrp_dosen=$nrp_dosen, nama_dosen='$nama_dosen' where nrp_dosen=$nrp_dosen";
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
 <h1 class="text-white text-center">  Update Nama Dosen</h1>
 </div><br>
 <label> NRP Dosen: </label>
 <input type="text" name="nrp_dosen" value="<?php echo $row['nrp_dosen']; ?>" class="form-control"> <br>

 <label> Nama Dosen: </label>
 <input type="text" name="nama_dosen" value="<?php echo $row['nama_dosen']; ?>" class="form-control"> <br>


 <button class="btn btn-success" type="submit" name="update-dosen"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="../view/admin-view-dosen.php"> Cancel </a><br>

 </div>
 </form>
 </div>
</body>
</html>
