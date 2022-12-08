<?php
session_start();
if ($_SESSION) {
	if ($_SESSION['level'] == "admin") {
		header("Location: ../view/admin-view.php");
	}
	if ($_SESSION['level'] == "dosen") {
		header("Location: ../index.php");
	}
	if ($_SESSION['level'] == "tu") {
		header("Location: ../view/tu-view.php");
	}
}

include('../user/check-login.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>

	<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
			<form role="form" action="" method="post" class="border shadow p-3 rounded" style="width: 450px;">
			<h1 class="text-center p-3">LOGIN</h1>
			<?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>	
			<div class="mb-3">
					<label class="form-label" for="form-username">Username</label>
					<input type="text" name="username"  class="form-control" id="form-username">
				</div>
				<div class="mb-3">
					<label class="form-label" for="form-password">Password</label>
					<input type="password" name="password"  class="form-control" id="form-password">
				</div>
				<div class="mb-1">
				<label class="form-label">Select User Type:</label>
				</div>
					<select name="level" class="form-select mb-3" required>
						<option value="1">Administrator</option>
						<option value="2">Dosen</option>
						<option value="3">Tata Usaha</option>
					</select>
				<button type="submit" name="submit"  class="btn btn-primary">Login</button>
			</form>
		</div>
</body>

</html>