<?php
session_start();
include("config.php"); // Establishing connection with our database

$error1 = -1;

if (isset($_POST["reset_sub"]))
{	
	if (empty($_POST["emailm"])) {
		$error1 = 1;
	} else {
		$emp_email = $_POST['emailm'];
 
		$sqlq = "SELECT * FROM `emp_table` WHERE `EMP_EMAIL` = '$emp_email'";
		$resultq = mysqli_query($conn, $sqlq);
		$roww = mysqli_fetch_array($resultq, MYSQLI_ASSOC);
 
		
		if (mysqli_num_rows($resultq) == 1) {
			$error1 = 0;
			//header("location: forgot.php"); // Redirecting To Other Page
		} else {
			$error1 = 2;
		}
	}
}
?>