<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>My Invoice</title>
</head>
<body>
	<?php
		include("../include/header.php");
		include("../include/connection.php");
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -20px">
					<?php
						include 'sidenavigation.php';
					?>

				</div>
				<div class="col-md-10">
					<h5 class="text-center my-2">My Invoice</h5>
					<?php
						$pat = $_SESSION['patient'];
						$query = "SELECT * FROM patient where username = '$pat'";
						$res = mysqli_query($connect, $query);
						$row = mysqli_fetch_array($res);
						$fname = $row['firstname'];
						$querys = mysqli_query($connect, "SELECT * FROM income where patient = '$fname'");
						$output = "";
						$output .= "
							<table class='table table-bordered'>
							<tr>
							<th>ID</th>
							<th>Doctor</th>
							<th>Patient</th>
							<th>Date Discharge</th>
							<th>Amount Paid</th>
							<th>Description</th>
							<th>Action</th>
							</tr>


				";
				if(mysqli_num_rows($res) < 1) {
				$output .= "
				<tr>
				<td colspan = '6' class='text-center'>No Invoices Yet</td>

				</tr>
				";
				}

				while($row = mysqli_fetch_array($querys)) {
					$output .= "
					<tr>
					<td>".$row['id']."</td>
					<td>".$row['doctor']."</td>
					<td>".$row['patient']."</td>
					<td>".$row['date_discharged']."</td>
					<td>".$row['amount_paid']."</td>
					<td>".$row['description']."</td>
					<td>
					<a href='check.php?id=".$row['id']."'>
						<button class='btn btn-info'>View</button>
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