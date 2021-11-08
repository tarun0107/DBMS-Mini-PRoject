<?php
include("include/connection.php");
if (isset($_POST['apply'])) {
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$username = $_POST['uname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$country = $_POST['country'];
	$password = $_POST['pass'];
	$confirm_pass = $_POST['cpass'];
	$qualification = $_POST['qual'];

	$error = array();
	if(empty($firstname))
		$error['apply'] = "Enter Firstname";
	else if(empty($lastname))
		$error['apply'] = "Enter Lastname";
	else if(empty($username))
		$error['apply'] = "Enter Username";
	else if(empty($email))
		$error['apply'] = "Enter Email Address";
	else if($gender=="")
		$error['apply'] = "Select Your Gender";
	else if(empty($phone))
		$error['apply'] = "Enter Mobile Number";
	else if($country=="")
		$error['apply'] = "Select Your Country";
	else if(empty($password))
		$error['apply'] = "Enter Password";
	else if($confirm_pass!=$password)
		$error['apply'] = "Wrong Password";
	else if(empty($qualification))
		$error['apply'] = "Enter Qualification";

 
 if(count($error) == 0) {
 	$query = "INSERT INTO doctors(firstname,lastname,username,email,gender,phone, country,password,salary,data_reg,status,profile,qualification) VALUES('$firstname','$lastname','$username','$email','$gender','$phone','$country','$password','0', NOW(),'Pending','doctor.jpg','$qualification')";
 	$result = mysqli_query($connect, $query);
 	if($result) {
 		echo "<script>alert('You have successfully applied')</script>";
 		header("Location: doctor.php");
 	}
 	else{
 		echo "<script>alert('Failed')</script>";
 	}

 }
}
 if(isset($error['apply'])) {
 	$s = $error['apply'];
 	$show = "<h5 class = 'text-center alert alert-danger'>$s</h5>";

 }
 else
 	$show = "";

?>


<!DOCTYPE html>
<html>
<head>
	<title>Apply Now!</title>
</head>
<body>
	<?php
	include("include/header.php");
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 my-3 jumbotron">
					<h5 class="text-center">Apply Now!</h5>
					<div>
						<?php
						echo $show;
						?>
					</div>


					<form method="post">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter First Name" value="<?php if(isset($_POST['fname']))echo $_POST['fname'];?>">
							
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" name="lname" class="form-control" autocomplete="off" placeholder="Enter Last Name" value="<?php if(isset($_POST['lname']))echo $_POST['lname'];?>">
						
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname']))echo $_POST['uname'];?>">
							
						</div>
						<div class="form-group">
							<label>Qualification</label>
							<input type="text" name="qual" class="form-control" autocomplete="off" placeholder="Enter Last Name" value="<?php if(isset($_POST['qual']))echo $_POST['qual'];?>">
						
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
						
						<input type="submit" name="apply" value="Apply" class="btn btn-success">
						<p>Already Have an Account!<a href="doctor.php"> Click Here</a></p>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>			
		</div>
	</div>
</body>

</html>