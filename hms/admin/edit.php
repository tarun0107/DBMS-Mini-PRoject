<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Doctors</title>
</head>
<body>
	<?php
	include("../include/header.php");
	include '../include/connection.php';
	  ?>

	  <div class = "container-fluid">
	  	<div class="col-md-12">
	  		<div class="row">
	  			<div class="col-md-2" style="margin-left: -20px;">
	  				<?php
	  					include("sidenavigation.php");
	  				?>
	  			</div>
	  			<div class="col-md-10">
	  				<h5 class="text-center">Edit</h5>
	  				<?php
						if (isset($_GET['id'])) {
							$id = $_GET['id'];
							$query="SELECT * FROM doctors where id = '$id'";
							$res = mysqli_query($connect, $query);
							$row=mysqli_fetch_array($res);
								  					# code...
						}	  				

	  				?>
	  				<div class="row">
	  				<div class="col-md-8">
	  					<h5 class="text-center">Doctor Details</h5>
	  					<h5 class="my-3">ID: <?php echo $row['id'];?></h5>
	  					<h5 class="my-3">Firstname: <?php echo $row['firstname'];?></h5>
	  					<h5 class="my-3">Lastname: <?php echo $row['lastname'];?></h5>
	  					<h5 class="my-3">Username: <?php echo $row['username'];?></h5>
	  					<h5 class="my-3">Email: <?php echo $row['email'];?></h5>
	  					<h5 class="my-3">Mobile Number: +91 <?php echo $row['phone'];?></h5>
	  					<h5 class="my-3">Gender: <?php echo $row['gender'];?></h5>
	  					<h5 class="my-3">Country: <?php echo $row['country'];?></h5>
	  					<h5 class="my-3">Date Registered: <?php echo $row['data_reg'];?></h5>
	  					<h5 class="my-3">Salary: ₹<?php echo $row['salary'];?></h5>
	  				</div> 
	  				<div class="col-md-4">
	  					<h5 class="text-center">Update Salary</h5>	
	  					<?php
	  						if (isset($_POST['update'])) {
	  							
	  							$salary = $_POST['salary'];
	  							
	  							$q = "UPDATE doctors set salary='$salary' where id='$id'" ;
	  							mysqli_query($connect,$q);
	  						}
	  					?>
	  					<form method = "POST">
	  						<label>Enter Salary</label>
	  						<input type="number" name="salary" class="form-control" autocomplete="off" placeholder="Enter Salary" value="<?php echo $row['salary'] ?>">
	  						<input type="submit" name="update" class="btn btn-info my-3" value = "Update Salary">
	  						
	  					</form>
	  				</div>
	  			</div>
	  			</div>
	  			
	  		</div>
	  		
	  	</div>

	  </div>
</body>
</html>