<?php
include_once "../connection.php";
if (isset($_POST['addjadwal'])) {
    $dosen = $_POST['dosen'];
    $matkul = $_POST['matkul'];
    $ruangan = $_POST['ruangan'];
    $semester = $_POST['semester'];
    $kelas = $_POST['kelas'];
    $a = " INSERT INTO `jadwal`(`dosen_nrp_dosen`, `matkul_kode_matkul`, `ruangan_nama_ruangan`, `semester_semester_ke`, `kelas`) VALUES ('$dosen', '$matkul' , '$ruangan', '$semester' , '$kelas')";
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
    <title>Admin Add Jadwal</title>

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
                    <h1 class="text-white text-center"> Jadwal Baru </h1>
                </div><br>

                <label> NRP Dosen: </label>
                <select name="dosen" id="dosen" class="form-control" required>
                        <option value="">Pilih</option>
                            <?php
                            $sql = "select * from dosen";
                            $result = $con->query($sql);
                            if (!$result) {
                                die("Invalid query!");
                            }
                            while ($row = $result->fetch_assoc()) {
                                echo "
      <option>
        <td>$row[nrp_dosen]</td>
      </option>
      ";
                            }
                            ?>
                    </select> <br>


                <label> Kode Mata Kuliah : </label>
                <select name="matkul" id="matkul" class="form-control" required>
                        <option value="">Pilih</option>
                            <?php
                            $sql = "select * from matkul";
                            $result = $con->query($sql);
                            if (!$result) {
                                die("Invalid query!");
                            }
                            while ($row = $result->fetch_assoc()) {
                                echo "
      <option>
        <td>$row[kode_matkul]</td>
      </option>
      ";
                            }
                            ?>
                    </select> <br>
                <label> Ruangan : </label>
                <select name="ruangan" id="ruangan" class="form-control" required>
                        <option value="">Pilih</option>
                            <?php
                            $sql = "select * from ruangan";
                            $result = $con->query($sql);
                            if (!$result) {
                                die("Invalid query!");
                            }
                            while ($row = $result->fetch_assoc()) {
                                echo "
      <option>
        <td>$row[nama_ruangan]</td>
      </option>
      ";
                            }
                            ?>
                    </select> <br>
                <label> Semester : </label>
                <select name="semester" id="semester" class="form-control" required>
                        <option value="">Pilih</option>
                            <?php
                            $sql = "select * from semester";
                            $result = $con->query($sql);
                            if (!$result) {
                                die("Invalid query!");
                            }
                            while ($row = $result->fetch_assoc()) {
                                echo "
      <option>
        <td>$row[semester_ke]</td>
      </option>
      ";
                            }
                            ?>
                    </select> <br>

                <label> Kelas : </label>
                <input type="text" name="kelas" class="form-control"> <br>

                <button class="btn btn-success" type="submit" name="addjadwal"> Submit </button><br>
                <a class="btn btn-info" type="submit" name="cancel" href="../view/admin-view-jadwal.php"> Cancel </a><br>

            </div>
        </form>
    </div>
</body>

</html>