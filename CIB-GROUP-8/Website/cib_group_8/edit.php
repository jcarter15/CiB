<?php
  include("settings/check.php");

  $id = $_POST['id'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $removeProject = $_POST['project'];
  $role = $_POST['role'];

  $result = mysqli_query($conn, "SELECT * FROM role_table WHERE ROLE_DESC = '$role'");
  $row = mysqli_fetch_assoc($result);
  $roleid = $row['ROLE_ID'];


  $sql = mysqli_query($conn, "UPDATE emp_table SET EMP_NAME='$name', EMP_SURNAME='$surname', EMP_ROLE=$roleid WHERE EMP_ID=$id");

  if($removeProject != "None"){
      $projectID = intval(preg_replace('/[^0-9]+/', '', $removeProject), 10);
      $sql2 = mysqli_query($conn, "DELETE FROM project_employee_link WHERE EMP_ID=$id AND PROJECT_ID=$projectID"); //remove project
  }

header("Location: sysadmin.php");
?>
