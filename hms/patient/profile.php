<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Profile</title>
</head>
<body>
<?php
include '../include/header.php';
include '../include/connection.php';
?>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left: -20px;">
				<?php
				include('sidenavigation.php');
				$patient = $_SESSION['patient'];
				$query = "SELECT * FROM patient where username = '$patient'";
				$res = mysqli_query($connect, $query);
				$row=mysqli_fetch_array($res);


				?>
				
			</div>
			<div class="col-md-10">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<?php
						
									if (isset($_POST['upload'])) {

										$img = $_FILES['img']['name'];
										if(empty($img)){

										}else{
											$query = "UPDATE patient SET profile = '$img' where username = '$patient'";
											$res = mysqli_query($connect, $query);
											if($res) {
													move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
												}
											}
										}


									?>


							<h5>My Profile</h5>
							<form method="post" enctype="multipart/form-data">
								<?php
									echo "<img src='img/".$row['profile']."' class='col-md-12'  style='height: 250px;'>";
								?>
								<input type="file" name="img" class="form-control my-2">
								<input type="submit" name="upload" class="btn btn-success" vale="Update Profile">
							</form>
							<table class="table table-bordered">
								<tr>
									<th colspan="2" class="text-center">My Details</th>

								</tr>
								<tr>
									<td>Firstname</td>
									<td><?php echo $row['firstname'];?></td>
								</tr>
								<tr>
									<td>Lastname</td>
									<td><?php echo $row['lastname'];?></td>
								</tr>
								<tr>
									<td>Username</td>
									<td><?php echo $row['username'];?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><?php echo $row['email'];?></td>
								</tr>
								<tr>
									<td>Mobile Number</td>
									<td><?php echo $row['phone'];?></td>
								</tr>
								<tr>
									<td>Gender</td>
									<td><?php echo $row['gender'];?></td>
								</tr>
								<tr>
									<td>Country</td>
									<td><?php echo $row['country'];?></td>
								</tr>
							</table>

						</div>
						<div class="col-md-6">
							<h5 class="text-center">Update Username</h5>
							<?php
							if (isset($_POST['uname'])) {
								$uname = $_POST['uname'];
								if(empty($uname)) {

								}else{
									$query = "UPDATE patient SET username='$uname' where username = '$patient'";
										$res = mysqli_query($connect, $query);
										if($res) {
											$_SESSION['doctor'] = $uname;
								}
							}}

							?>

							<form method="post">
										<label>Change Username</label>
										<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
										<input type="submit" name="update" class="btn btn-success my-2" value="Change Username">
							</form>
							<h5 class="my-4 text-center">Change Password</h5>

							<?php
									if(isset($_POST['change'])) {
										$oldp = $_POST['opass'];
										$new = $_POST['npass'];
										$con = $_POST['cpass'];
										$ol = "SELECT * FROM patient where username = '$patient'";
										$old = mysqli_query($connect, $ol);
										$row = mysqli_fetch_array($old);
										if(empty($oldp)) {
											echo "<script>alert('Password cant't be empty)</script>";
										}
										else if($oldp!=$row['password']){
											echo "<script>alert('Wrong Password')</script>";

										}else if(empty($new)) {
											echo "<script>alert('Password can't be empty)</script>";
										}else if($con != $new) {
											echo "<script>alert('Passwords doen not match')</script>";
										}else{
											$query = "UPDATE patient set password = '$new' where username = '$patient'";
											mysqli_query($connect, $query);
											echo "<script>alert('Password changed successfully')</script>";
										}
									}



									?>



							<form method="post">
								<div class="form-group">
								<label>Old Password</label>
								<input type="password" name="opass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
								</div>
								<div class="form-group">
								<label>New Password</label>
								<input type="password" name="npass" class="form-control" autocomplete="off" placeholder="Enter New Password">
								</div>
								<div class="form-group">
								<label>Confirm Password</label>
								<input type="password" name="cpass" class="form-control" autocomplete="off" placeholder="Confirm Password">
								</div>
								<input type="submit" name="change" class = "btn btn-info my-2" value="Change Password">
							</form>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
		
	</div>
</div>

</body>
</html>