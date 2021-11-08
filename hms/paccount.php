<?php 
include("include/connection.php");
if(isset($_POST['apply'])) {
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$username = $_POST['uname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$country = $_POST['country'];
	$password = $_POST['pass'];
	$confirm_pass = $_POST['cpass'];

	$error = array();
	if(empty($firstname))
		$error['ac'] = "Enter Firstname";
	else if(empty($lastname))
		$error['ac'] = "Enter Lastname";
	else if(empty($username))
		$error['ac'] = "Enter Username";
	else if(empty($email))
		$error['ac'] = "Enter Email Address";
	else if($gender=="")
		$error['ac'] = "Select Your Gender";
	else if(empty($phone))
		$error['ac'] = "Enter Mobile Number";
	else if($country=="")
		$error['ac'] = "Select Your Country";
	else if(empty($password))
		$error['ac'] = "Enter Password";
	else if($confirm_pass!=$password)
		$error['ac'] = "Wrong Password";

	if(count($error) == 0) {
 	$query = "INSERT INTO patient(firstname,lastname,username,email,gender,phone,country,password,date_reg,profile)VALUES('$firstname','$lastname','$username','$email','$gender','$phone','$country','$password', NOW(),'patient.png')";
 	$result = mysqli_query($connect, $query);
 	if($result) {
 		echo "<script>alert('You have successfully applied')</script>";
 		header("Location: patient.php");
 	}
 	else{
 		echo "<script>alert('Failed')</script>";
 	}

 }


}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Your Account</title>
</head>
<body>
	<?php
	include 'include/header.php';

	?>
	<div class="container-fluid">
		<div class='col-md-12'>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 my-2 .jumbotron">
					<h5 class="text-center text-info">Create Your Account</h5>
					<form method="post">
						<div class="form-group">
							<label>Firstname</label>
							<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname']))echo $_POST['fname'];?>">
						</div>
						<div class="form-group">
							<label>Lastname</label>
							<input type="text" name="lname" class="form-control" autocomplete="off" placeholder="Enter Lastname" value="<?php if(isset($_POST['lname']))echo $_POST['lname'];?>">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Lastname" value="<?php if(isset($_POST['uname']))echo $_POST['uname'];?>">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" value="<?php if(isset($_POST['email']))echo $_POST['email'];?>">
							
						</div>
						<div class="form-group">
							<label>Gender</label>
							<select name="gender" class="form-control">
								<option value="">Select Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Others">Others</option>
							</select>
							
						</div>
						<div class="form-group">
							<label>Mobile Number</label>
							<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Mobile Number" value="<?php if(isset($_POST['phone']))echo $_POST['phone'];?>">
							
						</div>
						<div class="form-group">
							<label>Country</label>
							<select name="country" class="form-control">
								<option value="">Select Country</option>
								<option value="Russia">Russia</option>
								<option value="India">India</option>
								<option value="Nepal">Nepal</option>
								<option value="Australia">Australia</option>
								<option value="USA">USA</option>
								<option value="UK">UK</option>
							</select>
							
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
							
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="cpass" class="form-control" autocomplete="off" placeholder="Confirm Password">
							
						</div>
						<input type="submit" name="apply" value="Create Account" class="btn btn-success">
						<p>Already Have an Account!<a href="patient.php"> Click Here</a></p>
					</form>
				</div>
				<div class="col-md-3"></div>
				
			</div>
			
		</div>
		
	</div>
</body>
</html>