<?php
include('includes/header.php');
include('dbConnection.php');
if(isset($_REQUEST['schedulesubmit']))
//See if the fields are empty
{
    if(($_REQUEST['Team1'] == "") || ($_REQUEST['Team2'] == "") || ($_REQUEST['NameofGame'] == "") 
       || ($_REQUEST['Week'] == "") || ($_REQUEST['sday'] == "") || ($_REQUEST['sdate'] == "") || ($_REQUEST['stime'] == ""))
    {
          $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 role="alert">Fill all Fields </div>';
    }
 //if the fields are not empty   
    else
    {
        $team1 = $_REQUEST['Team1'];
        $team2 = $_REQUEST['Team2'];
        $gamename = $_REQUEST['NameofGame'];
        $week = $_REQUEST['Week'];
        $day = $_REQUEST['sday'];
        $date = $_REQUEST['sdate'];
        $time = $_REQUEST['stime'];
        $sql = "INSERT INTO schedule (Team1, Team2, NameofGame, Week, sday, sdate, stime) VALUES ('$team1', '$team2', '$gamename', 
        '$week','$day', '$date', '$time')";
        if($conn->query($sql) == TRUE)
        {
            $msg = '<div class="alert alert-sucess col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
        }
        else
        {
            $msg = '<div class="alert alert-sucess col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
    
        }
    }
}
?>
<!----Form for schedule---->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
  <h3 class="text-center">Add New Schedule</h3>
  <form action="" method="POST">
  <div class="form-group">
  <label for="Team1">Name of Team 1</label>
  <input type="text" class="form-control" id="Team1" name="Team1">
  </div>
  <div class="form-group">
  <label for="Team1">Name of Team 2</label>
  <input type="text" class="form-control" id="Team2" name="Team2">
  </div>
  <div class="form-group">
  <label for="NameofGame">Name of Game</label>
  <input type="text" class="form-control" id="NameofGame" name="NameofGame">
  </div>
  <div class="form-group">
  <label for="Week">Week</label>
  <input type="text" class="form-control" id="Week" name="Week">
  </div>
  <div class="form-group">
  <label for="sday">Day</label>
  <input type="text" class="form-control" id="sday" name="sday">
  </div>
  <div class="form-group">
  <label for="sdate">Date</label>
  <input type="text" class="form-control" id="sdate" name="sdate">
  </div>
  <div class="form-group">
  <label for="stime">Time</label>
  <input type="text" class="form-control" id="stime" name="stime">
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-danger" id="schedulesubmit" name="schedulesubmit">Add</button>
    <a href="schedule.php" class="btn btn-secondary">Close</a>
  </div>
  <?php if(isset($msg)) {echo $msg;} ?>
 </form>
 </div> 
<?php
include('includes/footer.php');
?>
