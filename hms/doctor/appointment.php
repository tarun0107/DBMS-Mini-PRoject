<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Appointment's</title>
</head>
<body>
	<?php
	include("../include/connection.php");
	include("../include/header.php");
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
					<h5 class="text-center my-2">Total Appointments</h5>
					<?php
						$query = "SELECT * FROM appointment where status='Pending'";
						$res = mysqli_query($connect, $query);
						$output = "";
						$output .= "
						<table class='table table-bordered'>
						<tr>
							<th>ID</th>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Gender</th>
							<th>Mobile Number</th>
							<th>Appointment Date</th>
							<th>Symptoms</th>
							<th>Date Booked</th>
							<th>Action</th>
							</tr>


						";
						if (mysqli_num_rows($res) < 1) {
							# code...
							$output .= "
							<tr>
							<td colspan = '8' class='text-center'>No Appointments Yet</td>

							</tr>";
						}

						while($row = mysqli_fetch_array($res)) {
							$output .= "
							<tr>
							<td>".$row['id']."</td>
							<td>".$row['firstname']."</td>
							<td>".$row['lastname']."</td>
							<td>".$row['gender']."</td>
							<td>".$row['phone']."</td>
							<td>".$row['appointment_date']."</td>
							<td>".$row['symptoms']."</td>
							<td>".$row['date_booked']."</td>
							<td>
							<a href='disharge.php?id=".$row['id']."'>
						<button class='btn btn-info'>Check</button>
					</a>
					</td>
							";
						}
						$output .= "
							</tr>
							</table>
							";


						echo $output;

						?>	
				</div>
			</div>
			
		</div>
		
	</div>
</body>
</html>