<?php
session_start();
include("config.php"); // Establishing connection with our database

$error = 0;

if (isset($_POST["submit"]))
{
	if (empty($_POST["empid"]) || empty($_POST["emppass"])) {
		$error = 1;
		//echo '<script>swal("Oops...", "Both fields are required.", "error");</script>';
	} else {
		// Define $emp_id and $emp_pass
		$emp_id = $_POST['empid'];
		$emp_pass = $_POST['emppass'];
 
		// To protect from MySQL injection
		$emp_id = stripslashes($emp_id);
		$emp_pass = stripslashes($emp_pass);
		$emp_id = mysqli_real_escape_string($conn, $emp_id);
		$emp_pass = mysqli_real_escape_string($conn, $emp_pass);
		$emp_pass = md5($emp_pass);
 
		// Check Employee ID and password from database
		$sql = "SELECT * FROM `emp_table` WHERE `EMP_ID` = '$emp_id' and EMP_PASS = '$emp_pass'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 
		// If Employee ID and password exist in our database then create a session.
		// Otherwise echo error.
		
		if (mysqli_num_rows($result) == 1) {
			$_SESSION['empid'] = $emp_id; // Initializing Session
			$error = 0;
			header("location: login.php"); // Redirecting To Other Page
		} else {
			$error = 2;
			//echo '<script>swal("Oops...", "Incorrect Employee ID or Password.", "error");</script>';
		}
	}
}
?>