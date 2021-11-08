<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>View Invoice</title>
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
					include("sidenavigation.php");?>

				</div>
				<div class="col-md-10">
					<h5 class="text-center">My Voices</h5>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3">
								
							</div>
							<div class="col-md-6">
								<?php
								if(isset($_GET['id'])) {
									$id = $_GET['id'];
									$query = "SELECT * FROM income where id = '$id' ";
									$res = mysqli_query($connect, $query);
									$row = mysqli_fetch_array($res);
								}
								?>
								<table class="table table-bordered">
									<tr>
										<td colspan="2" class="text-center">Invoice Details</td>
									</tr>
									<tr>
										<td>Doctor</td>
										<td><?php echo $row['doctor'];?></td>
									</tr>
									<tr>
										<td>Patient</td>
										<td><?php echo $row['patient'];?></td>
									</tr>
									<tr>
										<td>Discharge Date</td>
										<td><?php echo $row['date_discharged'];?></td>
									</tr>
									<tr>
										<td>Amount Paid</td>
										<td><?php echo $row['amount_paid'];?></td>
									</tr>
									<tr>
										<td>Description</td>
										<td><?php echo $row['description'];?></td>
									</tr>

								</table>
							</div>
							<div class="col-md-3">
								
							</div>

							
						</div>
						
					</div>
				</div>
				
			</div>
			
		</div>
		
	</div>
</body>
</html>