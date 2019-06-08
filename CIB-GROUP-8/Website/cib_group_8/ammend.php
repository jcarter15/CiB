<?php
include("settings/check.php");

if(!isset($_GET['id'])){
  header("Location: sysadmin.php");
}

$timesheet = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM timesheet_table WHERE TIMESHEET_ID = $timesheet");

$row = mysqli_fetch_assoc($result);

$project = $row['PROJECT_ID'];
$startDate = date('d-m-Y', strtotime($row['START_TIME']));
$startTime = date('H:i', strtotime($row['START_TIME']));
$halfDays = $row['HALF_DAYS'];
$overtime = $row['OVERTIME'];

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
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ammend Timesheet</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="insert.php">
            <div class="form-group date" id="datepick">
              <label for="date">Date:</label>
              <input type="text" class="form-control" id="date" name="date" readonly <?php echo "value='$startDate'"; ?>>
            </div>

            <div class="form-group">
              <label for="type">Type of Activity:</label>
              <select class="form-control" id="type" name="type" readonly>
                <?php
                  if($project > 80000){
                    echo "<option>Cost Centre</option>";
                  } else{
                    echo "<option>Project</option>";
                  }
                ?>

              </select>
            </div>

            <div class="form-group" id="costcode">
              <?php
                if($project > 80000){

                  echo "<label for='others'>Other:</label>";
                  echo "<select class='form-control' id='cost' name='other' readonly>";

                    switch($project){
                      case 99998:
                        echo "<option>Annual Leave (99998)</option>";
                        break;
                      case 99997:
                        echo "<option>Bank Holiday (99997)</option>";
                        break;
                      case 99996:
                        echo "<option>Sickness (99996)</option>";
                        break;
                      case 99995:
                        echo "<option>Maternity Leave (99995)</option>";
                        break;
                      case 80001:
                        echo "<option>Department Meeting (80001)</option>";
                        break;
                      case 80002:
                        echo "<option>Training (80002)</option>";
                        break;
                      case 80003:
                        echo "<option>Management Time (80003)</option>";
                        break;
                    }
                  }
                ?>
              </select>
            </div>

            <div class="form-group" id="projectcode">
                <?php
                  if($project < 80000){

                    echo "<label for='project'>Project:</label>";
                    echo "<select class='form-control' id='project' name='project' readonly>";

                    $result = mysqli_query($conn, "SELECT * FROM project_table WHERE PROJECT_ID = $project");
                    $row = mysqli_fetch_assoc($result);

                    echo "<option> ". $row['PROJECT_NAME']. " (" . $row['PROJECT_ID'] .")</option>";

                    echo "</select> <div class='checkbox'>
                            <label><input type='checkbox' value='1' name='overtime'" . (($overtime == 1) ? "checked" : "") . " disabled>This project was done in overtime</label>
                          </div>";
                    }
                  ?>

            </div>

            <div class="form-group" id="starttimegroup">
              <label for="starttime">Start Time:</label>

              <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                <input type="text" class="form-control" <?php echo "value='".$startTime."'"; ?> id="starttime" name="startTime">

                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-time"></span>
                </span>
              </div>
            </div>

            <div class="form-group" id="halfdaygroup">
              <label for="halfday">Time Worked:</label>

              <div class="input-group">
                <input type="number" class="form-control" <?php echo "value='".$halfDays."'"; ?> id="halfday" name="halfDay">
                <span class="input-group-addon" id="halfday">Half-Days</span>
              </div>
            </div>

            <input type="hidden" value="1" name="ammend">
            <input type="hidden" <?php echo "value='".$timesheet."'"; ?> name="timeID">
            <button id="mew" type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="styles/js/clockpicker.js"></script>
  <script type="text/javascript">$('.clockpicker').clockpicker();</script>

  <script type="text/javascript">
  $(window).on('load',function(){
    $('#myModal').modal('show');
  });

  $('#myModal').on('hidden.bs.modal', function () {
    // Load up a new modal...
    window.location.href = "sysadmin.php";
  })
  </script>

</body>
</html>
