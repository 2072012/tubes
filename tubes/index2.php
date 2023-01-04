<?php
include "../tubes/connection.php";
$nrp_dosen=$_POST['nrp_dosen'];

$sql = mysqli_query($con,"SELECT*FROM jadwal WHERE dosen_nrp_dosen = '$nrp_dosen'")
while($data=mysqli_fetch_array($sql)){
    $kode_matkul=$data['matkul_kode_matkul'];
    echo "<option>" .$kode_matkul."</option>";
}   