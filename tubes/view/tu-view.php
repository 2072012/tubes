<?php
include_once "../connection.php";
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['username'])){
    die("Anda belum login");//
}

//cek level user
if($_SESSION['level']!="tu")
{
    die("Anda bukan tata usaha");
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

    <title>Tata Usaha View</title>
  </head>
  <style>
      .chartBox {
        width: 1300px;
        padding: 0px;
        border-radius: 5px;
        border: solid 3px #2B4257;
        background: white;
        position: absolute;
        left: 20%;
        top: 20% ;
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
        left: 44%;
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
 <nav class="navbar navbar-custom">
        <a class="navbar-brand" href="#">Tata Usaha</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="../view/tu-view.php">H o m e</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="">|</a>
  </li>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../user/logout.php">L o g  o u t</a>
  </li>
</ul>

      </nav>
    <div class="card">
  <table class="table">
    <thead><b>Berita Acara Perkuliahan</b></thead>
    <thead>
      <tr>
        <th>NRP Dosen</th>
        <th>Kode Matkul</th>
        <th>Nama Matkul</th>
        <th>Ruangan</th>
        <th>Semester</th>
        <th>Kelas</th>
        <th>Tanggal</th>
        <th>Pertemuan ke-</th>
        <th>Waktu</th>
        <th>Materi</th>
        <th>Keterangan PBM</th>
        <th>Jumlah Asisten</th>
        <th>NRP Asisten</th>
        <th>Nama Asisten</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "select * from jadwal INNER JOIN matkul ON jadwal.matkul_kode_matkul = matkul.kode_matkul INNER JOIN asisten ON matkul.kode_matkul = asisten.jadwal_matkul_kode_matkul INNER JOIN mahasiswa ON asisten.mahasiswa_nrp_mahasiswa = mahasiswa.nrp_mahasiswa INNER JOIN det_jadwal ON jadwal.matkul_kode_matkul = det_jadwal.jadwal_matkul_kode_matkul";
        $result = $con->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){
          echo "
      <tr>
        <td>$row[dosen_nrp_dosen]</td>
        <td>$row[matkul_kode_matkul]</td>
        <td>$row[nama_matkul]</td>
        <td>$row[ruangan_nama_ruangan]</td>
        <td>$row[semester_semester_ke]</td>
        <td>$row[kelas]</td>
        <td>$row[tanggal]</td>
        <td>$row[pertemuan_ke]</td>
        <td>$row[waktu]</td>
        <td>$row[materi]</td>
        <td>$row[ket_pbm]</td>
        <td>$row[jumlah_asisten]</td>
        <td>$row[mahasiswa_nrp_mahasiswa]</td>
        <td>$row[nama_mahasiswa]</td>

    
        <td>
                  <a class='btn btn-danger' href='../admin_function/admin-delete.php?dosen_nrp_dosen=$row[dosen_nrp_dosen]'onClick=\"return confirm('Do you want to Delete this data ?');\"'>Delete</a>
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
