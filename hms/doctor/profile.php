<?php session_start();
error_reporting(0);?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor's Profile</title>
</head>
<body>
	<?php
	include("../include/header.php");
	include("../include/connection.php");

	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
					<?php
					include("sidenavigation.php");
					//include("../include/connection.php");
					?>
					
				</div>
				<div class="col-md-10">
					<div class="container-fluid">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<?php
										$doc=$_SESSION['doctor'];
										$query = "SELECT * FROM doctors where username = '$doc' ";
										$res = mysqli_query($connect, $query);
										$row = mysqli_fetch_array($res);
										if (isset($_POST['upload'])) {
											$img = $_FILES['img']['name'];
											if(empty($img)){

											}else{
												$query = "UPDATE doctors SET profile = '$img' where username = '$doc'";
												$res = mysqli_query($connect, $query);
												if($res) {
													move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
												}
											}
										}


									?>
									<form method="post" enctype="multipart/form-data">
										<?php
											echo "<img src='img/".$row['profile']."'style = 'height: 250px;' class='col-md-12 m-3'>";

										?>
										<input type="file" name="img" class="form-control my-6">
										<input type="submit" name="upload" class="btn btn-success my-3" value="Update Profile">
									</form>
									<div class="my-3">
										<table class="table table-bordered">
											<tr>
												<th colspan='2' class="text-center">Details</th>

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
											<tr>
												<td>Salary </td>
												<td><?php echo "₹", $row['salary'];?></td>
											</tr>
										</table>
										

									</div>


								</div>
								<div class="col-md-6">
									<h5 class="text-center my 2">Update Username</h5>
									<?php
									if (isset($_POST['change_uname'])) {
										$uname = $_POST['uname'];
										if(empty($uname)) {

										}
										else{
											$query = "UPDATE doctors SET username='$uname' where username = '$doc'";
											$res = mysqli_query($connect, $query);
											if($res) {
												$_SESSION['doctor'] = $uname;
											}
										}


									}


									?>
									<form method="post">
										<label>Change Username</label>
										<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
										<input type="submit" name="change_uname" class="btn btn-success" value="Change Username">
									</form>
									<br><br>
									<h5 class="text-center my-2">Change Password</h5>
									<?php
									if(isset($_POST['change_pass'])) {
										$old = $_POST['opass'];
										$new = $_POST['npass'];
										$con = $_POST['cpass'];
										$ol = "SELECT * FROM doctors where username = '$doc'";
										$old = mysqli_query($connect, $ol);
										$row = mysqli_fetch_array($old);
										if($old!=$row['password']){

										}else if(empty($new)) {

										}else if($con != $new) {

										}else{
											$query = "UPDATE doctors set password = '$new' where username = '$doc'";
											mysqli_query($connect, $query);
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
										<input type="submit" name="change_pass" class = "btn btn-info" value="Change Password">
									</form>
								</div>
								
							</div>
							
						</div>
						
					</div>
				</div>
				
			</div>
			
		</div>
		
	</div>
</body>
</html>