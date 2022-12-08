<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "mydb";

$con = mysqli_connect($servername,$username,$password,$db_name);
if(!$con){
    die("connection failed: " . mysqli_connect_error());
}
