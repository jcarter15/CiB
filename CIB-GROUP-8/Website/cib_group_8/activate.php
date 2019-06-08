<?php
  include("settings/check.php");

  $id = $_POST['id'];

  $result = mysqli_query($conn, "SELECT ACTIVE FROM emp_table WHERE EMP_ID=$id");


  $row = mysqli_fetch_assoc($result);
  $active = $row['ACTIVE'];

  if($active == 0){
    $active = 1;
  } else if($active == 1){
    $active = 0;
  }

  $sql = mysqli_query($conn, "UPDATE emp_table SET ACTIVE=$active WHERE EMP_ID=$id");

header("Location: sysadmin.php");
?>
