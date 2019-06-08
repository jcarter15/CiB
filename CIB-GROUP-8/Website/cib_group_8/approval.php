<?php
	include("settings/check.php");

	$timesheet_id = $_POST['timesheet'];

	if (isset($_POST['approve'])){
		$approval = true;
	} else if(isset($_POST['decline'])){
		$approval = false;
	}

	if ($approval == false){
		mysqli_query($conn, "UPDATE timesheet_table SET APPROVAL = 2 WHERE TIMESHEET_ID = $timesheet_id");
		$_SESSION['success'] = 2;
	} else if($approval == true){
		mysqli_query($conn, "UPDATE timesheet_table SET APPROVAL = 1 WHERE TIMESHEET_ID = $timesheet_id");
		$_SESSION['success'] = 1;
	}

	header("Location: manager.php");
?>
