<?php
include("settings/check.php");

if($emp_role != 5){
	header("Location: login.php");
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		<link href="styles/clockpicker.css" rel="stylesheet">
		<link rel="stylesheet" href="styles/style.css" type="text/css" />
		
		<link href="styles/component.css" rel="stylesheet">
		<link href="styles/sweetalert.css" rel="stylesheet">
	
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<script type="text/javascript" src="styles/js/sweetalert.js"></script>
		<script src="js/modernizr.custom.js"></script>
	</head>

	<body>
		<?php
		$mew = $_SESSION['success'];

		if ($mew == 1) {
			$_SESSION['success'] = '';
			echo '<script>swal("Success!", "Timesheet has been approved!", "success");</script>';
		} else if ($mew == 2) {
			$_SESSION['success'] = '';
			echo '<script>swal("Success!", "Timesheet has been declined!", "success");</script>';
		}
		?>

		<div class="container">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Open nav</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a class="navbar-brand" href="index.php">KITS Timesheet system</a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li>
								<a href="#">/</a>
							</li>
							<li>
								<a href="#">(Current Week <?php echo $week; ?>)</a>
							</li>
							<li>
								<a href="#">/</a>
							</li>
							<li>
								<a href="#"><?php echo date("d.m.Y") . " - "; ?> <span id="cc_time">12:52</span></a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Welcome, <?php echo $emp_name; ?></a>
							</li>
							<li>
								<a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Log Out</a>
							</li>
							<li>
								<a href="#" class="md-trigger" data-modal="modal-7"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;Help</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<div class="row">
				<div class="col-xs-12 col-md-8">
					<div class="well well-lg">
						<h3>Employees</h3>
						<hr />

						<div class="table-responsive">
							<form class="navbar-form fBorm" role="search">
								<div class="input-group add-on">
									<input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
								
									<div class="input-group-btn">
										<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
									</div>
								</div>
							</form>
							
							<table class="table">
								<thead>
									<tr>
										<th>Employee Number</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Type of Employee</th>
										<th class="text-center">Options</th>
									</tr>
								</thead>
								<tbody>
									<?php

									/*$result = mysqli_query($conn, "SELECT * FROM emp_table AS et, role_table AS rt WHERE et.EMP_ROLE = rt.ROLE_ID");

									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
											echo "<td>" . $row['EMP_ID'] . "</td>";
											echo "<td>" . $row['EMP_NAME'] . "</td>";
											echo "<td>" . $row['EMP_SURNAME'] . "</td>";
											echo "<td>" . $row['ROLE_DESC'] . "</td>";
											
											echo "<td class='text-center'>";
												echo "<div class='btn-group-vertical btn-block' style='width: 100%;' role='group'>";
													echo "<a class='btn btn-default' type='button' href='#'>Modify</a>";
													echo "<a class='btn btn-primary' type='button' href='#'>Assign Project</a>";
													echo "<a class='btn btn-danger' type='button' href='#'>Deactivate</a>";
												echo "</div>";
											echo "</td>";
										
										echo "</tr>";
									}*/
									
									$result = mysqli_query($conn, "SELECT * FROM emp_table AS et, role_table AS rt WHERE et.EMP_ROLE = rt.ROLE_ID");


									while($row = mysqli_fetch_assoc($result)){

										echo "<tr>";
										echo "<td>" . $row['EMP_ID'] . "</td>";
										echo "<td>" . $row['EMP_NAME'] . "</td>";
										echo "<td>" . $row['EMP_SURNAME'] . "</td>";
										echo "<td>" . $row['ROLE_DESC'] . "</td>";
										echo "<td class='text-center'>";
										echo "<a href='modifymenu.php?id=". $row['EMP_ID'] ."' type='button' class='btn btn-default sspace' id='test'>Modify</a>";
										echo "<a href='assignproject.php?id=". $row['EMP_ID']."' type='button' class='btn btn-primary sspace'>Assign Project</a>";
										echo "<a href='activateemp.php?id=". $row['EMP_ID']. "' type='button'". (($row["ACTIVE"] == 1) ? "class='btn btn-danger' sspace '>Deactivate</a>":"class='btn btn-success sspace'>Reactivate</a>") ;
										echo "</td>";
										echo "</tr>";

									}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
				<div class="col-xs-12 col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title text-center">Logged In As - <?php echo $role_desc; ?></h3>
						</div>

						<div class="panel-body">

							<form class="login" method="">
								<div class="btn-group btn-group-sm btn-group-justified" role="group">
									<div class="btn-group-vertical btn-block" style="width: 100%;" role="group">
										<a class="btn btn-success btn-sm" href="index.php" ><span class="glyphicon glyphicon-home"></span> HOME PAGE</a>
									</div>
									<div class="btn-group-vertical btn-block" style="width: 100%;" role="group">
										<?php
											if($emp_role == 5) {
												echo "<a class='btn btn-primary btn-sm' href='' data-toggle='modal' data-target='#addModal'>Add New Employee</a>";
												echo "<a class='btn btn-primary btn-sm' href='sysadmin.php'>View Employees</a>";
												echo "<a class='btn btn-primary btn-sm' href='manager.php'>View ALL Timesheets</a>";
											}
										?>

									</div>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
			
				<div class="modal fade" id="addModal" role="dialog">
			    <div class="modal-dialog">

			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Add New Employee</h4>
			        </div>

			        <div class="modal-body">
			          <form method="post" action="addemp.php">

			            <div class="form-group">
			              <label for="name">First Name:</label>
			              <input type="text" class="form-control" id="name" name="name">
			            </div>

			            <div class="form-group">
			              <label for="surname">Last Name:</label>
			              <input type="text" class="form-control" id="surname" name="surname">
			            </div>

									<div class="form-group">
			              <label for="password">Password:</label>
			              <input type="password" class="form-control" id="password" name="password">
			            </div>

			            <div class="form-group">
			              <label for="role">Employee Role:</label>
			              <select class="form-control" id="role" name="role">
											<option>Contractor</option>
											<option>Employee</option>
											<option>Team Manager</option>
											<option>Project Manager</option>
											<option>System Administrator</option>
			              </select>
			            </div>

			            <button id="mew" type="submit" class="btn btn-primary">Submit</button>
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
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<script type="text/javascript" src="styles/js/clockpicker.js"></script>
		<script type="text/javascript">$('.clockpicker').clockpicker();</script>
		<script type="text/javascript" src="styles/js/timer.js"></script>
		
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