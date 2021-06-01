<?php
include('includes/header.php');
include('dbConnection.php');
if(isset($_REQUEST['scheduleupdate']))
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
        $id = $_REQUEST['id'];
        $team1 = $_REQUEST['Team1'];
        $team2 = $_REQUEST['Team2'];
        $gamename = $_REQUEST['NameofGame'];
        $week = $_REQUEST['Week'];
        $day = $_REQUEST['sday'];
        $date = $_REQUEST['sdate'];
        $time = $_REQUEST['stime'];
        $sql = "UPDATE schedule SET Team2 = '$team2', NameofGame = '$gamename', Week = '$week', sday = '$day', 
        sdate = '$date', stime = '$time',Team1 = '$team1' WHERE id = $id ";  
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
  <h3 class="text-center">Update Schedule</h3>
  <?php
   if(isset($_REQUEST['edit']))
   {
    $sql = "SELECT * FROM schedule WHERE id = '{$_REQUEST['id']}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
   }
  ?>
  <form action="" method="POST">
  <div class="form-group">
  <input type="hidden" class="form-control" id="id" name="id"  value="<?php if(isset($row['id'])) {echo  $row['id']; }?>">
  <form action="" method="POST">
  <div class="form-group">
  <label for="Team1">Name of Team 1</label>
  <input type="text" class="form-control" id="Team1" name="Team1" value="<?php if(isset($row['Team1'])) {$x=$row['Team1']; echo  $row['Team1']; }?>">
  </div>
  <div class="form-group">
  <label for="Team2">Name of Team 2</label>
  <input type="text" class="form-control" id="Team2" name="Team2" value="<?php if(isset($row['Team2'])) {echo  $row['Team2']; }?>">
  </div>
  <div class="form-group">
  <label for="NameofGame">Name of Game</label>
  <input type="text" class="form-control" id="NameofGame" name="NameofGame" value="<?php if(isset($row['NameofGame'])) {echo  $row['NameofGame']; }?>">
  </div>
  <div class="form-group">
  <label for="Week">Week</label>
  <input type="text" class="form-control" id="Week" name="Week" value="<?php if(isset($row['Week'])) {echo  $row['Week']; }?>">
  </div>
  <div class="form-group">
  <label for="sday">Day</label>
  <input type="text" class="form-control" id="sday" name="sday" value="<?php if(isset($row['sday'])) {echo  $row['sday']; }?>">
  </div>
  <div class="form-group">
  <label for="sdate">Date</label>
  <input type="text" class="form-control" id="sdate" name="sdate" value="<?php if(isset($row['sdate'])) {echo  $row['sdate']; }?>">
  </div>
  <div class="form-group">
  <label for="stime">Time</label>
  <input type="text" class="form-control" id="stime" name="stime" value="<?php if(isset($row['stime'])) {echo  $row['stime']; }?>">
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-danger" id="scheduleupdate" name="scheduleupdate">Update</button>
    <a href="schedule.php" class="btn btn-secondary">Close</a>
  </div>
  <?php if(isset($msg)) {echo $msg;} ?>
 </form>
 </div> 
<?php
include('includes/footer.php');
?>
