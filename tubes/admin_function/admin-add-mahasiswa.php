<?php
include_once "../connection.php";
if (isset($_POST['addmahasiswa'])) {
    $nrp_mahasiswa = $_POST['nrp_mahasiswa'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $a = " INSERT INTO `mahasiswa`(`nrp_mahasiswa`, `nama_mahasiswa`) VALUES ('$nrp_mahasiswa', '$nama_mahasiswa' )";
    $query = mysqli_query($con, $a);
    if($query){
        $_SESSION['status'] = "Data inserted successfully";
    } else {
        echo "something went wrong";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Add Mahasiswa</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../view/admin-view.php">Admin Operation</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../view/admin-view.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin_function/admin-add.php"><span style="font-size:larger;">Add New</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-lg-6 m-auto">
        <form method="post">
            <br><br>
            <div class="card">
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
                <div class="card-header bg-primary">
                    <h1 class="text-white text-center"> Asisten Dosen Baru </h1>
                </div><br>

                <label> NRP Mahasiswa : </label>
                <input type="text" name="nrp_mahasiswa" class="form-control"> <br>

                <label> Nama Mahasiswa : </label>
                <input type="text" name="nama_mahasiswa" class="form-control"> <br>

                <button class="btn btn-success" type="submit" name="addmahasiswa"> Submit </button><br>
                <a class="btn btn-info" type="submit" name="cancel" href="../view/admin-view-mahasiswa.php"> Cancel </a><br>

            </div>
        </form>
    </div>
</body>

</html>