<?php
session_start();
include("include/connection.php");

if (isset($_POST['login'])) {
	$uname = $_POST['uname'];
	$password = $_POST['pass'];


	$error = array();

	$q = "SELECT * FROM doctors where username = '$uname' and password = '$password'";
	$qq = mysqli_query($connect, $q);
	$row = mysqli_fetch_array($qq); 

	if(empty($uname))
		$error['login'] = "Enter Username";
	else if(empty($password))
		$error['login'] = "Enter Password";
	else if($row['status'] == 'Pending')
		$error['login'] = "Please wait for admin to enable your account!";
	else if($row['status'] == 'Rejected')
		$error['login'] = "Try after some time!";

	if(count($error) == 0) {
		$query = "SELECT * FROM doctors where username = '$uname' and password = '$password'";
		$res = mysqli_query($connect, $query);
		if(mysqli_num_rows($res)) {
			echo "<script>alert('Done')</script>";
			$_SESSION['doctor'] = $uname;
			header("Location:doctor/index.php");
		}else {
			echo "<script>alert('Failed')</script>";
		}
	}
}
if (isset($error['login'])) {
	# code...
	$l = $error['login'];
	$show = "<h5 class='text-center alert alert-danger'>$l</h5>";
}else
	$show = ""; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor Login Page</title>
</head>
<body>
	<?php
	include("include/header.php");
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 jumbotron my-3">
				<h5 class="text-center my-2">Doctor's Login</h5>
				<div>
					<?php
					echo $show;
					?>
				</div>
				<form method="post">
					<div class=form-group>
						<label>Username</label>
						<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="pass" class="form-control" autocomplete="off">
					</div>
					<input type="submit" name="login" class="btn btn-success" value="Login">
					<p>Don't have an account! <a href="apply.php">Apply Now! </a></p>
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>

</body>
</html>