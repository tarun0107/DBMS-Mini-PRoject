<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel = "stylesheet" type = "text/css" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel = "stylesheet" type = "text/css" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/js/all.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
</head>
<body>
	<nav class = "navbar navbar-expand-lg navbar-info bg-info">
		<h5 class = "text-white mx-2">Hospital Management System</h5>

		<div class = "mr-auto"></div>
		
		<ul class = "navbar-nav">
		
		<?php
			//session_start();
			if(isset($_SESSION['admin'])) {
				$user = $_SESSION['admin'];
				echo'
			<li class="nav-item"><a href="" class="nav-link text-white mx-5">'.$user.'</a></li>
			<li class="nav-item"><a href="logout.php" class="nav-link text-white mx-5">Logout</a></li>';
			
			}
			else if (isset($_SESSION['doctor'])) {
				$user = $_SESSION['doctor'];
				echo '<li class="nav-item"><a href="" class="nav-link text-white mx-5">'.$user.'</a></li>
			<li class="nav-item"><a href="logout.php" class="nav-link text-white mx-5">Logout</a></li>';
				# code...
			}
			else if (isset($_SESSION['patient'])) {
				$user = $_SESSION['patient'];
				echo '<li class="nav-item"><a href="" class="nav-link text-white mx-5">'.$user.'</a></li>
			<li class="nav-item"><a href="logout.php" class="nav-link text-white mx-5">Logout</a></li>';
				# code...
			}
			else {
				echo '
				<li class="nav-item"><a href="index.php" class="nav-link text-white mx-5">Home</a></li>
				<li class="nav-item"><a href="admin.php" class="nav-link text-white mx-5">Admin</a></li>
			<li class="nav-item"><a href="doctor.php" class="nav-link text-white mx-5">Doctor</a></li>
			<li class="nav-item"><a href="patient.php" class="nav-link text-white mx-5">Patient</a></li>';
						
			}
		?>
			
		</ul>
	</nav>
</body>
</html>