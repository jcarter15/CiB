<?php
session_start();
include('config.php');

$emp_check = $_SESSION['empid'];
 
$sql = mysqli_query($conn, "SELECT * FROM emp_table WHERE EMP_ID = '$emp_check'");
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
 
$emp_name = $row['EMP_NAME'];
$emp_role = $row['EMP_ROLE']; // number - id
		
$sql_query1 = "SELECT * FROM `role_table` WHERE `ROLE_ID` = '$emp_role'";
$result1 = mysqli_query($conn, $sql_query1);
$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

$role_desc = $row1['ROLE_DESC'];
 
if (!isset($emp_check)) {
	header("Location: index.php");
}
?>