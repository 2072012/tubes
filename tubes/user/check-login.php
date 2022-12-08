<?php

$error=''; 

include "../connection.php";
if(isset($_POST['submit']))
{               
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $level      = $_POST['level'];
                    
    $query = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    if (empty($username)) {
		header("Location: ../user/login.php?error=User Name is Required");
	}else if (empty($password)) {
		header("Location: ../user/login.php?error=Password is Required");
	}
    else
    {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['username']=$row['username'];
        $_SESSION['level'] = $row['level'];
        
        if($row['level'] == "admin" && $level=="1")
        {
            
            header("Location: ../view/admin-view.php");
        }
        else if($row['level'] =="dosen" && $level=="2")
        {
            header("Location: ../index.php");
        }
        else if($row['level'] == "tu" && $level=="3")
        {
            
            header("Location: ../view/tu-view.php");
        }
        else
        {
            $error = "Failed Login";
        }
    }
}
            
?>