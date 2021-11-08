<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Discharge Patient</title>
</head>
<body>
	<?php
	include("../include/header.php");
	include("../include/connection.php");

	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -20px;">
					<?php
						include("sidenavigation.php");
					?>
					
				</div>
				<div class="col-md-10">
					<h5 class="text-center my-2">Total Appointmets</h5>
					<?php
					if (isset($_GET['id'])) {
						# code...
						$id=$_GET['id'];
						$query = "SELECT * FROM appointment where id ='$id'";
						$res = mysqli_query($connect, $query);
						$row=mysqli_fetch_array($res);
					}

					?>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<table class="table table-bordered">
									<tr>
										<td colspan="2" class="text-center">Appointment Details</td>
									</tr>
									<tr>
										<td>Firstname</td>
										<td><?php echo $row['firstname']; ?></td>
									</tr>
									<tr>
										<td>Lastname</td>
										<td><?php echo $row['lastname']; ?></td>
									</tr>
									<tr>
										<td>Gender</td>
										<td><?php echo $row['gender']; ?></td>
									</tr>
									<tr>
										<td>Mobile Number</td>
										<td><?php echo $row['phone']; ?></td>
									</tr>
									<tr>
										<td>Appointment date</td>
										<td><?php echo $row['appointment_date']; ?></td>
									</tr>
									<tr>
										<td>Symptoms</td>
										<td><?php echo $row['symptoms']; ?></td>
									</tr>

								</table>		
							</div>
							<div class="col-md-6">
								<h5 class="text-center my-2">Invoice</h5>

								<?php
									if (isset($_POST['send'])) {
									$fee = $_POST['fee'];
									$des = $_POST['des'];
									if(empty($fee)){

									}else if(empty($des)){

									}else{
										$doc = $_SESSION['doctor'];
										$fname = $row['firstname'];
										$query = "INSERT INTO income(doctor,patient,date_discharged,amount_paid,description) values('$doc', '$fname', NOW(),'$fee', '$des')";
										$res = mysqli_query($connect, $query);
										if($res) {
											echo "<script>alert('You have sent Invoice')</script>";
										mysqli_query($connect, "UPDATE appointment set status = 'Discharge' where id = '$id'");
										}
									}
									}

								?>
								<form method="post">
									<label>Fee</label>
									<input type="number" name="fee" class="form-control" autocomplete="off" placeholder="Enter Patient Fee">
									<label>Description</label>
									<input type="text" name="des" class="form-control" autocomplete="off" placeholder="Enter Description">
									<input type="submit" name="send" class="btn btn-info my-2" value = "Send">
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