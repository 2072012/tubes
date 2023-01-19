<?php
include_once "../connection.php";
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['username'])){
    die("Anda belum login");//
}

//cek level user
if($_SESSION['level']!="admin")
{
    die("Anda bukan admin");
}
if(isset($_GET['nrp_mahasiswa'])){
  $result = mysqli_query($con, "delete from mahasiswa where nrp_mahasiswa='$_GET[nrp_mahasiswa]'");
  if($result){
    $_SESSION['status'] = "Data deleted successfully";
} else {
    echo "something went wrong";
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Admin View</title>
  </head>
  <style>
      .chartBox {
        width: 600px;
        padding: 0px;
        border-radius: 5px;
        border: solid 3px #2B4257;
        background: white;
        position: absolute;
      }
      #a{
        left: 1%;
        top: 20%;
      }
      #b{
        top: 20%;
        left: 34%;
      }
      #c{
        top: 20%;
        left: 67%;
      }
      .navbar-custom{
        background-color: #2B4257 ;
        height: 55px;
      }
      .navbar-brand
      {
            color:white;
            position: absolute;
            left: 2%;
            font-family: system-ui;
            font-size: 25px;
  
        }
      .nav{
        position: absolute;
        left: 20%;
      }
      .nav-link{
        color: white;
        font-size: small;
        font-family: system-ui;
        padding: 10px;
      }
      body{
        background-color: white;
      }

    </style>
  <body>
  <nav class="navbar navbar-custom">
        <a class="navbar-brand" href="#">Administrasi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav">
        <li class="nav-item">
    <a class="nav-link active" href="../view/admin-view.php">S e m e s t e r</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href=""></a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="../view/admin-view-matkul.php">M a t a K u l i a h</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href=""></a>
  </li>
    <li class="nav-item">
    <a class="nav-link active" href="../view/admin-view-ruangan.php">R u a n g a n</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href=""></a>
  </li>
  </li>
    <li class="nav-item">
    <a class="nav-link active" href="../view/admin-view-dosen.php">D o s e n</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href=""></a>
  </li>
  </li>
    <li class="nav-item">
    <a class="nav-link active" href="../view/admin-view-mahasiswa.php">M a h a s i s w a</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href=""></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../view/admin-view-jadwal.php">J a d w a l</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href=""></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../user/logout.php">L o g  o u t</a>
  </li>
</ul>

      </nav>
      <?php
  if(isset($_SESSION['status']))
  {
    ?><div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hey!</strong> <?php echo $_SESSION['status']?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div><?php
    unset($_SESSION['status']);
  }
  ?>
    <div class="card">
  <table class="table">
    <thead>
      <tr>
        <th>NRP Mahasiswa</th>
        <th>Nama Mahasiswa</th>
        <th><a class='btn btn-primary' href='../admin_function/admin-add-mahasiswa.php'>Add</a></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "select * from mahasiswa";
        $result = $con->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){
          echo "
      <tr>
        <th>$row[nrp_mahasiswa]</th>
        <td>$row[nama_mahasiswa]</td>
    
        <td>
        <a class='btn btn-success' href='../admin_function/admin-update-mahasiswa.php?nrp_mahasiswa=$row[nrp_mahasiswa]'>Update</a>
                  <a class='btn btn-danger' href='?nrp_mahasiswa=$row[nrp_mahasiswa]'onClick=\"return confirm('Do you want to Delete this data ?');\"'>Delete</a>
                </td>
      </tr>
      ";
        }
      ?>
    </tbody>
  </table>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
