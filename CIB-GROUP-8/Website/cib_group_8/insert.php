<?php

include("settings/check.php");

$record_type = $_POST['type'];
$record_date = $_POST['date'];

if($record_type == "Cost Centre"){
	$record_costCode = $_POST['cost'];
} else{
	$record_project = $_POST['project'];
}

$record_halfDay = $_POST['halfDay'];
$record_startTime = $_POST['startTime'];
$record_empID = $emp_check;

if(isset($_POST['overtime']){
$record_overtime = $_POST['overtime'];
}

$record_overtime = $_POST['overtime'];

if(isset($_POST['ammend']){
$ammend = $_POST['ammend'];
}

if(isset($_POST['timeID']){
$timeID = $_POST['timeID'];
}


$record_date = date("Y-m-d H:i:s", strtotime("$record_date $record_startTime"));

if ($record_type == "Cost Centre"){
	
	$record_costID = intval(preg_replace('/[^0-9]+/', '', $record_costCode), 10);

	if ($record_costID != 80001 && $record_costID != 80003){
		$record_halfDay = 2;
	}
	
	if ($ammend == 0) {
		$sql = "INSERT INTO `timesheet_table` (TIMESHEET_ID, EMP_ID, PROJECT_ID, START_TIME, HALF_DAYS, APPROVAL) VALUES (DEFAULT, $record_empID, $record_costID, '$record_date', $record_halfDay, DEFAULT)";
	} else {
		$sql = "UPDATE timesheet_table SET START_TIME = '$record_date', HALF_DAYS = $record_halfDay, APPROVAL = 0 WHERE timesheet_id = $timeID";
	}
} else {
	
	$record_projectID = intval(preg_replace('/[^0-9]+/', '', $record_project), 10);

	if ($ammend == 0) {
		$sql = "INSERT INTO `timesheet_table` (TIMESHEET_ID, EMP_ID, PROJECT_ID, START_TIME, HALF_DAYS, OVERTIME, APPROVAL) VALUES (DEFAULT, $record_empID, $record_projectID, '$record_date', $record_halfDay, $record_overtime, DEFAULT)";
	} else {
		$sql = "UPDATE timesheet_table SET START_TIME = '$record_date', HALF_DAYS = $record_halfDay, APPROVAL = 0 WHERE timesheet_id = $timeID";
	}
}

$result = mysqli_query($conn, $sql);

$_SESSION['success'] = 1;

header("Location: login.php");
?>