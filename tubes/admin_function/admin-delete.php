<?php
    include "../connection.php";
    if(isset($_GET['semester_ke'])){
        $semester_ke = $_GET['semester_ke'];
        $sql = "DELETE from `semester` where semester_ke=$semester_ke";
        $con->query($sql);
    }
    if(isset($_GET['kode_matkul'])){
        $kode_matkul = $_GET['kode_matkul'];
        $sql = "DELETE from `matkul` where kode_matkul=$kode_matkul";
        $con->query($sql);
    }
    if(isset($_GET['nama_ruangan'])){
        $nama_ruangan = $_GET['nama_ruangan'];
        $sql = "DELETE from `ruangan` where nama_ruangan=$nama_ruangan";
        $con->query($sql);
    }
    if(isset($_GET['nrp_dosen'])){
        $nrp_dosen = $_GET['nrp_dosen'];
        $sql = "DELETE from `dosen` where nrp_dosen=$nrp_dosen";
        $con->query($sql);
    }
    if(isset($_GET['nrp_mahasiswa'])){
        $nrp_mahasiswa = $_GET['nrp_mahasiswa'];
        $sql = "DELETE from `mahasiswa` where nrp_mahasiswa=$nrp_mahasiswa";
        $con->query($sql);
    }
    header('location:../view/admin-view.php');
    exit;
?>