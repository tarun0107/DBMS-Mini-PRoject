<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Profile</title>
</head>
<body>
	<?php
	include("../include/header.php");
	include("../include/connection.php");
	$ad=$_SESSION['admin'];
	$query="SELECT * FROM admin where username='$ad'";
	$result=mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result)) {
		$username=$row['username'];
		$Profiles=$row['profile'];
	}

	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -20px">
					<?php
					include("sidenavigation.php");
					?>
				</div>
				<div class="col-md-10">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<h4><?php echo $username;?> Profile</h4>
								<?php
								if (isset($_POST['update'])) {
									$Profile = $_FILES['profile'];
									if(empty($Profile)) {

									}else{
										$query = "UPDATE admin SET profile = '$profile' where username = '$ad'";
										$result = mysqli_query($connect, $query);
										if($result) {move_uploaded_file($_FILES['profile']['tmp_name'], "img/$Profile");}
									}
									
								}


								?>
								<form method="post", enctype="multipart/form-data">
								<?php
								echo "<img src = 'img/$Profiles' class='col-md-12' style='height: 250px;'";
								?>
								<div class="form-group">
									<label>Update Profile</label>
									<input type="file" name="profile" class="form-control">
									<input type= "submit" name="update" value="UPDATE", class="btn btn-success">

								</div>
								</form>
								
							</div>
							<div class="col-md-6">
								<?php
								if (isset($_POST['change'])) {
									$uname = $_POST['uname'];
									if(empty($uname)) {

									}else{
										$query = "UPDATE admin SET username = '$uname' where username = '$ad'";
										$res = mysqli_query($connect, $query);
										if($res) {
											$_SESSION['admin'] = $uname;
										}
									}

								}							
								?>
								<form method = "post" >
									<label>Change Username</label>
									<input type="text" name="uname" class="form-control" autocomplete="off">
									<input type="submit" name="change" class="btn btn-success" value="Change">
								</form>
								<?php
								if(isset($_POST['update_pass'])) {
									$old_pass = $_POST['old_pass'];
									$new_pass = $_POST['new_pass'];
									$con_pass=$_POST['con_pass'];
									$error = array();
									$old = mysqli_query($connect, "SELECT * FROM admin where username = '$ad'");
									$row = mysqli_fetch_array($old);
									$pass=$row['password'];

									if(empty($old_pass)) {
										$error['p'] = "Enter Old Password";

									}else if(empty($new_pass)) {
										$error['p'] = "Enter New Password"; 
									}else if(empty($con_pass)) {
										$error['p'] = "Confirm Password "; 
									}else if($old != $old_pass) {
										$error['p'] = "Invalid Old Password";
									}else if($new_pass!=$con_pass){
										$error['p'] = "Password Does not Match";
									}
									if(count($error) == 0) {
										$query = "UPDATE admin set password = '$new_pass' where username = '$ad' ";
										mysqli_query($connect.$query);
									}
									
								}
								if(isset($error['p'])) {
										$e = $error['p'];
										$show = "<h5 class='text-center alert alert-danger'>$e</h5>";
										
									}
									else{
										$show = "";
									}


								?>


								<form method="post" class="col-md-12" style="margin-left: 150px height: 150vh;">
									<h5 class="text-center my-4">Change Password</h5>
									<div>
										<?php
										echo $show;
										?>
									</div>

									<div class="form-group">
										<label>Old Password</label>
										<input type="password" name="old_pass" class="form-control"><br>
									</div>
									<div class="form-group">
										<label>New Password</label>
										<input type="password" name="new_pass" class="form-control">

										
									</div>
									<div class="form-group">
										<label>Confirm Password</label>
										<input type="password" name="con_pass" class="form-control">
									</div>
									<input type="submit" name="update_pass" value="Update Password" class="btn btn-info">
								</form>
								<br>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
		
	</div>
</body>
</html>