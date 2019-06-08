<?php
	include("settings/check.php");

	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$pass = $_POST['password'];
	$role= $_POST['role'];

	$result = mysqli_query($conn, "SELECT * FROM role_table WHERE ROLE_DESC = '$role'");
	$row = mysqli_fetch_assoc($result);
	$roleid = $row['ROLE_ID'];

	$sql = "INSERT INTO `emp_table` (EMP_ID, EMP_NAME, EMP_SURNAME, EMP_PASS, EMP_ROLE, ACTIVE) VALUES (DEFAULT, '$name', '$surname', '".md5($pass)."', '$roleid', DEFAULT)";

	$result = mysqli_query($conn, $sql);

	$_SESSION['success'] = 1;

	header("Location: sysadmin.php");
 ?>
