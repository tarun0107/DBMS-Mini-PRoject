<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Job Request</title>
</head>
<body>
	<?php
	include("../include/header.php");
	?>

	<div class = "container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
					<?php
					include("sidenavigation.php");
					?>

				</div>
				<div class="col-md-10">
					<h5 class = "text-center">Job Requests</h5>
					<div id="show">
						
					</div>
				</div>
			</div>
			
		</div>
		
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			alert("done");
				show();
			function show() {
				$.ajax({
					url:"ajax_jobs.php",
					method:"POST",
					success:function(data){
						$("#show").html(data);
					}
				});
			}

			$(document).on('click', '.approve', function() {alert("Added");
				var id = $(this).attr("id");

				$.ajax({
					url:"ajax_approve.php",
					method:"POST",
					data:{id:id},
					success:function(data) {
						show();
					}

				});

			});
			$(document).on('click', '.reject', function() {alert("Added");
				var id = $(this).attr("id");

				$.ajax({
					url:"ajax_reject.php",
					method:"POST",
					data:{id:id},
					success:function(data) {
						show();
					}

				});

			});
		});
		
	</script>
</body>
</html>