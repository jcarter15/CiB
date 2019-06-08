<?php
include("settings/check.php");

$id = $_POST['id'];
$project = $_POST['project'];

$sql = mysqli_query($conn, "UPDATE emp_table SET EMP_NAME='$name', EMP_SURNAME='$surname', EMP_ROLE=$roleid WHERE EMP_ID=$id");

$projectID = intval(preg_replace('/[^0-9]+/', '', $project), 10);
$sql2 = mysqli_query($conn, "INSERT INTO project_employee_link (EMP_ID, PROJECT_ID) VALUES ($id, $projectID)"); //remove project

header("Location: sysadmin.php");
?>
