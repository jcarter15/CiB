<?php
include("settings/check.php");

if(!isset($_GET['id'])){
  header("Location: sysadmin.php");
}

$emp = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM emp_table WHERE EMP_ID = $emp");

$row = mysqli_fetch_assoc($result);

$name = $row['EMP_NAME'];
$surname = $row['EMP_SURNAME'];
$active = $row['ACTIVE'];

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css"/>
  <link href="styles/clockpicker.css" rel="stylesheet">
  <link href="styles/style.css" rel="stylesheet">
  <link href="styles/sweetalert.css" rel="stylesheet">

  <link rel="stylesheet" href="styles/style.css" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <script type="text/javascript" src="styles/js/sweetalert.js"></script>
</head>

<body>
  <div class="modal fade" id="confirmModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo (($active == 1) ? "De" : "Re");?>activate Employee</h4>
        </div>

        <div class="modal-body">
          <form method="post" action="activate.php">
            <p>Are you sure you want to <?php echo (($active == 1) ? "De" : "Re");?>activate <?php echo "$name"?>'s profile?</p>
          </div>

          <div class="modal-footer">
            <input type='hidden' name='id' value='<?php echo $row['EMP_ID'];?>'/>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button id="deactivate" type="submit" <?php echo "class='btn btn-" . (($active == 1) ? "danger'>De" : "success'>Re") . "activate</button>" ;?>
          </form>
        </div>
        </div>
      </div>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript">
  $(window).on('load',function(){
    $('#confirmModal').modal('show');
  });

  $('#confirmModal').on('hidden.bs.modal', function () {
    // Load up a new modal...
    window.location.href = "sysadmin.php";
  })
  </script>

</body>
</html>
