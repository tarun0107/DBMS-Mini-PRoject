<!DOCTYPE html>
<html>
<head>
	<title>Admin DashBoard</title>
</head>
<body>
		<?php
		session_start();
		include("../include/header.php");
		include("../include/connection.php");
		?>
<div class="container-fluid">
	<div class = "col-md-12">
		<div class="row">
			<div class = "col-md-2 "style="margin-left: -20px; ">
			<?php
			include("sidenavigation.php")?>	
			</div>
		<div class="col-md-10">
			<h4 class="my-2">Admin Dashboard</h4>
			<div class="col-md-12 my-1">
				<div class="row">
					<div class="col-md-3 bg-success mx-2" style="height: 130px;">					<div class="col-md-12">
							<div class="row">
								<div class="col-md-9">
									<?php
									$ad = mysqli_query($connect, "SELECT * FROM admin");
									$num = mysqli_num_rows($ad);
									?>
									<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num?></h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white">Admin</h5>
								</div>
								<div class="col-md-3">
								<a href = "admin.php"><i class="fa fa-users-cog fa-3x my-4" style='color: white;'></i></a>
								</div>
							</div>
						
						</div>
					</div>
					<div class="col-md-3 bg-info mx-2" style="height: 130px;">					<div class="col-md-12">
							<div class="row">
								<div class="col-md-9">
									<?php
									$doctor = mysqli_query($connect, "SELECT * FROM doctors where status = 'Approved'");
									$num2 = mysqli_num_rows($doctor);

									?>
									<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num2;?></h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white">Doctors</h5>
								</div>
								<div class="col-md-3">
								<a href="doctor.php"><i class="fa fa-user-nurse fa-3x my-4" style='color: white;'></i></a>
								</div>
							</div>
						
						</div>
					</div>
					<div class="col-md-3 bg-warning mx-2" style="height: 130px;">					<div class="col-md-12">
							<div class="row">
								<div class="col-md-9">
									<?php
									$p = mysqli_query($connect, "SELECT * FROM patient");
									$pp = mysqli_num_rows($p);

									  ?>
									<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $pp;?></h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white">Patients</h5>
								</div>
								<div class="col-md-3">
								<a href='patient.php'><i class="fa fa-user-injured fa-3x my-4" style='color: white;'></i></a>
								</div>
							</div>
						
						</div>
					</div>
					<div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;">			<div class="col-md-12">
							<div class="row">
								<div class="col-md-9">
									<?php
									$p = mysqli_query($connect, "SELECT * FROM report");
									$pp = mysqli_num_rows($p);

									?>
									<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $pp;?></h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white">Reports</h5>
								</div>
								<div class="col-md-3">
								<a href="report.php"><i class="fa fa-bug fa-3x my-4" style='color: white;'></i></a>
								</div>
							</div>
						
						</div>	
					</div>
					<div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">			<div class="col-md-12">
							<div class="row">
								<div class="col-md-9">
									<?php
									$job = mysqli_query($connect, "SELECT * FROM doctors where status = 'Pending'");
									$num1 = mysqli_num_rows($job);


									?>
									<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num1;?></h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white">Job Requests</h5>
								</div>
								<div class="col-md-3">
								<a href="job_req.php"><i class="fa fa-user-md fa-3x my-4" style='color: white;'></i></a>
								</div>
							</div>
						
						</div>			
					</div>
					<div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;">			<div class="col-md-12">
							<div class="row">
								<div class="col-md-9">
									<?php
									$query = "SELECT sum(amount_paid) as profit from income";
									$in = mysqli_query($connect, $query);
									$row=mysqli_fetch_array($in);
									$inc = $row['profit'];


									?>
									<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo "₹$inc";?></h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white">Income</h5>
								</div>
								<div class="col-md-3">
								<a href="income.php"><i class="fa fa-money-bill-alt fa-3x  mx-0 my-3" style='color: white;'></i></a>
								</div>
							</div>
						
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