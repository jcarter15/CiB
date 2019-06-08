<?php
include('settings/forgot_func.php'); // Include Login Script

if (isset($_SESSION['empid']) != '') {
	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>Timesheet system</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="CIB 8" />
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="styles/style.css" type="text/css" />
		<link href="styles/component.css" rel="stylesheet">
		<link href="styles/sweetalert.css" rel="stylesheet">
	
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<script type="text/javascript" src="styles/js/sweetalert.js"></script>
		<script src="js/modernizr.custom.js"></script>
	</head>
	
	<body>
		<?php		
			if ($error1 == 0) {
				$error1 = -1;
				echo '<script>swal("Success!", "Your password has been reset and sent to your email address", "success");</script>';
				
				sleep(4);
				echo '<script>window.location="http://albavicius.com/cib_group_8/";</script>';
				
				/*ob_start();
				
				header("location: index.php"); // Redirecting To Other Page
				
				ob_end_flush();*/
			} else if ($error1 == 1) {
				$error1 = -1;
				echo '<script>swal("Oops...", "Please enter email address!", "error");</script>';
				
				sleep(4);
				echo '<script>window.location="http://albavicius.com/cib_group_8/forgot.php";</script>';
			} else if ($error1 == 2) {
				$error1 = -1;
				echo '<script>swal("Oops...", "A user for the given email address does not exist!", "error");</script>';
				
				sleep(4);
				echo '<script>window.location="http://albavicius.com/cib_group_8/forgot.php";</script>';
			} else {
				$error1 = -1;
			}
		?>
		<div class="container">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="index.php">KITS Timesheet system</a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#" class="md-trigger" data-modal="modal-7"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;Help</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
				
			<div class="row">
				<div class="col-xs-12 col-md-4 col-centered">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title" id="pTitle">Password Reset</h3>
						</div>
						
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-12 forgot-pass-content text-center">
									<p>Enter your email to reset your password.</p>
									<br />
								</div>
							</div>
									
							<form class="login" method="post" id="valForm">
							
								<div class="form-group input-group">
									<span class="input-group-addon">
										<i class="glyphicon glyphicon-envelope"></i>
									</span>
								
									<input type="email" class="form-control" name="emailm" placeholder="name@email.com" pattern="[a-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="required"/>
								</div>
								
								<div class="btn-group btn-group-sm btn-group-justified" role="group">
									<div class="btn-group" role="group">
										<button type="submit" name="reset_sub" class="btn btn-success btn-sm" id="#btn-reset">Reset Password</button>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xs-12 forgot-pass-content text-center">
										<a href="index.php">Go back</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
	
			<footer>
				<p>2017 &copy; <span>CiB Group 8</span></p>
			</footer>
			
			<div class="md-modal md-effect-7" id="modal-7">
				<div class="md-content">
					<h3>INFORMATION</h3>
					<div class="bbodyC">
						<p>Welcome to the help menu for the timesheet system.</p>
						<ul>
							<li><strong>First, a key:</strong>
						<br>
						-Common codes: Lunch 999999, Leave 999998, Bank Holiday 999997, Sickness 999996, Compassionate Leave 999995. <br>
						-All cost centre codes begin with 8, eg 800021.<br>
						-Times should be to the nearest 0.1 of an hour (6 minutes).<br>


						<br>

						</li>


						<li>On a weekly basis, an employee will record the time spent across various activities 
						on a timesheet, a mechanism for recording the number of hours worked per day. 
						KITS employees in the UK (these will differ by country) are normally contracted 
						to work Monday to Friday and 7.5 hours a day (plus 1 hour for lunch). This amounts
						 to 37.5 hours a week and is the case for the majority of employees. Some employees
						 may have specific contracts such as working 4 days a week. A permanent employee has
						 a rate of £395/day, while a contractor employees’ day rate can range from 
						 £350-1000/day. KITS employees will generally not work on public holidays and 
						 will have an additional number of holiday 
						 hours that they are entitled to take off throughout the year.</li>



						</ul>
						<button class="md-close awesomee">Close me!</button>
					</div>
				</div>
			</div>

			<div class="md-overlay"></div><!-- the overlay element -->
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<!-- classie.js by @desandro: https://github.com/desandro/classie -->
		<script src="styles/js/classie.js"></script>
		<script src="styles/js/modalEffects.js"></script>

		<!-- for the blur effect -->
		<!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill -->
		<script>
			// this is important for IEs
			var polyfilter_scriptpath = '/js/';
		</script>
		<script src="styles/js/cssParser.js"></script>
		<script src="styles/js/css-filters-polyfill.js"></script>
	</body>
</html>