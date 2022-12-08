<?php
include "../connection.php";
if(isset($_GET['dosen_nrp_dosen'])){
    $dosen_nrp_dosen = $_GET['dosen_nrp_dosen'];
    $sql = "DELETE from `jadwal` where dosen_nrp_dosen=$dosen_nrp_dosen";
    $con->query($sql);
}
header('location:../view/admin-view-jadwal.php');
exit;
?>
