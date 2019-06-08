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
$role = $row['EMP_ROLE'];

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
  <div class="modal fade" id="modifyModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modify Employee</h4>
        </div>

        <div class="modal-body">
          <form method="post" action="edit.php">
            <div class="form-group">
              <label for="id">Employee Number:</label>
              <input type="text" class="form-control" id="id" name="id" value="<?php echo $emp; ?>" readonly>
            </div>

            <div class="form-group">
              <label for="name">First Name:</label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
            </div>

            <div class="form-group">
              <label for="surname">Last Name:</label>
              <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $surname; ?>">
            </div>

            <div class="form-group">
              <label for="project">Remove Project Access:</label>
              <select class="form-control" id="project" name="project">
                <option>None</option>

                <?php
                $result7 = mysqli_query($conn, "SELECT * FROM project_employee_link AS pel, project_table AS pt WHERE `EMP_ID` = $emp AND pel.PROJECT_ID = pt.PROJECT_ID");

                while ($row7 = mysqli_fetch_array($result7)) {
                  echo "<option>" . $row7['PROJECT_NAME'] . " (" . $row7['PROJECT_ID'] . ")";
                }
                ?>

              </select>
            </div>

            <div class="form-group">
              <label for="project">Employee Role:</label>
              <select class="form-control" id="role" name="role">

                <?php
                $result8 = mysqli_query($conn, "SELECT * FROM role_table AS rt");

                while ($row8 = mysqli_fetch_array($result8)) {
                  echo "<option " . (($row8['ROLE_ID'] == $role) ? 'selected':'') . ">" . $row8['ROLE_DESC'];
                }
                ?>

              </select>
            </div>

            <button id="mew" type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript">
  $(window).on('load',function(){
    $('#modifyModal').modal('show');
  });

  $('#modifyModal').on('hidden.bs.modal', function () {
    // Load up a new modal...
    window.location.href = "sysadmin.php";
  })
  </script>

</body>
</html>
