<?php
include_once "../tubes/connection.php";
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['username'])){
    die("Anda belum login");//
}

//cek level user
if($_SESSION['level']!="dosen")
{
    die("Anda bukan dosen");
}
if (isset($_POST['addabsensi'])) {
    $jadwal_dosen = $_POST['jadwal'];
    $pertemuan = $_POST['pertemuan'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $jumlah_asisten = $_POST['jumlah'];
    $pbm = $_POST['pbm'];
    $a = " INSERT INTO `det_jadwal`(`pertemuan_ke`, `tanggal`,`waktu`,`jumlah`,`pbm`,`jadwal_dosen_nrp_dosen`) VALUES ('$pertemuan', '$tanggal','$waktu','$jumlah_asisten','$pbm','$$jadwal_dosen')";
    $query = mysqli_query($con, $a);
}
// if (isset($_POST['jadwal'])) {
//     $jadwal_dosen = $_POST['jadwal'];
//     $a = " INSERT INTO `det_jadwal`(`jadwal_dosen_nrp_dosen`) VALUES ('$jadwal_dosen')";
//     $query = mysqli_query($con, $a);
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>User</title>
</head>
<style>
      .chartBox {
        width: 1200px;
        padding: 20px;
        border-radius: 5px;
        border: solid 3px #2B4257;
        background: white;
        position: absolute;
        left: 10%;
        top: 12% ;
      }
      .navbar-custom{
        background-color: #2B4257 ;
        height: 55px;
      }
      .navbar-brand
      {
            color:white;
            position: absolute;
            left: 4%;
            font-family: system-ui;
            font-size: 25px;
  
        }
      .nav{
        position: absolute;
        left: 40%;
      }
      .nav-link{
        color: white;
        font-size: small;
        font-family: system-ui;
        padding: 30px;
      }
      body{
        background-color: white;
      }

    </style>
<nav class="navbar navbar-custom">
        <a class="navbar-brand" href="#">Berita Acara Perkuliahan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="../tubes/index.php">H o m e</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="">|</a>
  </li>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../tubes/user/logout.php">L o g  o u t</a>
  </li>
</ul>

      </nav>
    <div class="chartBox">
            <form method="POST">
                <div class="form-group">
                    <label for="">Jadwal Dosen</label>
                    <select name="jadwal" id="jadwal" class="form-control" required>
                        <option value="">Pilih</option>
                            <?php
                            $sql = "select * from jadwal";
                            $result = $con->query($sql);
                            if (!$result) {
                                die("Invalid query!");
                            }
                            while ($row = mysqli_fetch_array ($result)) {
                            ?>
                                <option value=""><?php echo $row['dosen_nrp_dosen']," ",$row['matkul_kode_matkul']," ", $row['ruangan_nama_ruangan'];?></option> <?php } ?>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="">Pertemuan ke</label>
                    <input type="text" name="pertemuan" id="pertemuan" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="">Waktu Mulai</label>
                    <input type="time" name="waktu" id="waktu" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="">Materi Pokok Bahasan</label>
                    <input type="materi" name="materi" id="materi" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="">Dibantu Asisten</label><br>
                    <div class="d-flex">
                        <input type="radio" id="asisten_ya" name="asisten" value="IYA">
                        <label for="asisten_ya">IYA</label><br>
                        <input type="radio" id="asisten_tidak" class="ms-3" name="asisten" value="TIDAK">
                        <label for="asisten_tidak">TIDAK</label><br>
                    </div>
                </div>
                <div id="form-asisten">
                    <div class="form-group mt-3">
                        <label for="">Jumlah Asisten</label>
                        <input type="number" name="jumlah" id="jumlah" onkeyup="countAsisten()" class="form-control">
                    </div>
                    <div id="form-nama-asisten">

                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="">Keterangan PBM (Mohon isi dengan 2 info penting, yaitu cara kuliah dan mahasiswa tidak hadir)</label>
                    <textarea name="pbm" id="pbm" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <input type="submit" name="addabsensi" id="addabsensi" class="btn btn-success mt-3" value="submit">
            </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="jquery.min.js"></script>
    <script>
        $("#form-asisten").hide();
        $('input[type=radio][name=asisten]').on('change', function() {
            switch ($(this).val()) {
                case '':
                    $("#form-asisten").hide();
                    break;
                case 'IYA':
                    $("#form-asisten").show();
                    break;
                case 'TIDAK':
                    $("#form-asisten").hide();
                    break;
            }
        });

        function countAsisten() {
            var jumlah = $("#jumlah").val();
            var asistenHTML = "";
            for (let i = 1; i <= jumlah; i++) {
                asistenHTML +=
                    '<div class="form-group mt-3">' +
                    '<label>(Asisten ' + i + ') NRP, Nama</label>' +
                    '<input type="text" class="form-control" id="' + i + '" name="' + i + '" >' +
                    '</div>';
            }
            $("#form-nama-asisten").html(asistenHTML);
        }
    </script>
</body>

</html>
<!-- <script>
    $(document).ready(function(){
        $('#nrp_dosen').change(function(){
            var nrp_dosen = $(this).val();

            $.ajax({
                url : "index2.php",
                method: "post",
                data : {nrp_dosen:nrp_dosen},
                success:function(data){
                    $('#nrp_dosen').html(data);
                }
            })
        })
    })
</script> -->