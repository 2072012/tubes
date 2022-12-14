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
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
        left: 12%;
      }
      .nav-link{
        color: white;
        font-size: medium;
        font-family: system-ui;
        padding: 30px;
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
    <a class="nav-link " href="">|</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="../view/admin-view-matkul.php">M a t a K u l i a h</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="">|</a>
  </li>
    <li class="nav-item">
    <a class="nav-link active" href="../view/admin-view-ruangan.php">R u a n g a n</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="">|</a>
  </li>
  </li>
    <li class="nav-item">
    <a class="nav-link active" href="../view/admin-view-dosen.php">D o s e n</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="">|</a>
  </li>
  </li>
    <li class="nav-item">
    <a class="nav-link active" href="../view/admin-view-mahasiswa.php">M a h a s i s w a</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="">|</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../view/admin-view-jadwal.php">J a d w a l</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="">|</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../user/logout.php">L o g  o u t</a>
  </li>
</ul>

      </nav>
    <div class="card">
    <table class="table">
    <thead>
      <tr>

        <th>Nama Ruangan</th>
        <th><a class='btn btn-primary' href='../admin_function/admin-add-ruangan.php'>Add</a></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "select * from ruangan";
        $result = $con->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){
          echo "
      <tr>
        <td>$row[nama_ruangan]</td>
        <td>
        <a class='btn btn-success' href='../admin_function/admin-update-ruangan.php?nama_ruangan=$row[nama_ruangan]'>Update</a>
        <a class='btn btn-danger' href='../admin_function/admin-delete.php?nama_ruangan=$row[nama_ruangan]'>Delete</a>
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
