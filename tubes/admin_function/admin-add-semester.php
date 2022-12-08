<?php
include_once "../connection.php";
if (isset($_POST['addsemester'])) {
    $semester_ke = $_POST['semester_ke'];
    $a = " INSERT INTO `semester`(`semester_ke`) VALUES ( '$semester_ke')";
    $query = mysqli_query($con, $a);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Add Semester</title>

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

                <div class="card-header bg-primary">
                    <h1 class="text-white text-center"> Semester Baru </h1>
                </div><br>

                <label> Semester : </label>
                <input type="text" name="semester_ke" class="form-control"> <br>

                <button class="btn btn-success" type="submit" name="addsemester"> Submit </button><br>
                <a class="btn btn-info" type="submit" name="cancel" href="../view/admin-view.php"> Cancel </a><br>

            </div>
        </form>
    </div>
</body>

</html>