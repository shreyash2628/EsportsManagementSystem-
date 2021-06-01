<?php
include('includes/header.php');
include('dbConnection.php');
if(isset($_REQUEST['lordsoffallen']))
//See if the fields are empty
{
    if(($_REQUEST['MatchesPlayed'] == "") || ($_REQUEST['Lost'] == "") || ($_REQUEST['Penalty'] == "") || ($_REQUEST['Score'] == "") || ($_REQUEST['Won'] == "") || ($_REQUEST['TeamName'] == "")) 
    {
          $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 role="alert">Fill all Fields </div>';
    }
 //if the fields are not empty   
    else
    {
        $id = $_REQUEST['id'];
        $MatchesPlayed = $_REQUEST['MatchesPlayed'];
        $Lost = $_REQUEST['Lost'];
        $Penalty = $_REQUEST['Penalty'];
        $Score = $_REQUEST['Score'];
        $Won = $_REQUEST['Won'];
        $TeamName = $_REQUEST['TeamName'];
        $sql = "UPDATE lordsoffallen SET MatchesPlayed = '$MatchesPlayed', Lost = '$Lost', Penalty = '$Penalty', Score = '$Score' , Won = '$Won' , TeamName = '$TeamName' WHERE id = $id";  
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
  <h3 class="text-center">Update Scoreboard</h3>
  <?php
   if(isset($_REQUEST['edit']))
   {
    $sql = "SELECT * FROM lordsoffallen WHERE id = '{$_REQUEST['id']}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
   }
  ?>
  <form action="" method="POST">
  <div class="form-group">
  <input type="hidden" class="form-control" id="id" name="id"  value="<?php if(isset($row['id'])) {echo  $row['id']; }?>">
  </div>
  <div class="form-group">
  <label for="MatchesPlayed">No of Matches Played</label>
  <input type="text" class="form-control" id="MatchesPlayed" name="MatchesPlayed" value="<?php if(isset($row['MatchesPlayed'])) {echo  $row['MatchesPlayed']; }?>">
  </div>
  <div class="form-group">
  <label for="Lost">Lost</label>
  <input type="text" class="form-control" id="Lost" name="Lost" value="<?php if(isset($row['Lost'])) {echo  $row['Lost']; }?>">
  </div>
  <div class="form-group">
  <label for="Penalty">Penalty</label>
  <input type="text" class="form-control" id="Penalty" name="Penalty" value="<?php if(isset($row['Penalty'])) {echo  $row['Penalty']; }?>">
  </div>
  <div class="form-group">
  <label for="Score">Score</label>
  <input type="text" class="form-control" id="Score" name="Score" value="<?php if(isset($row['Score'])) {echo  $row['Score']; }?>">
  </div>
  <div class="form-group">
  <label for="Won">Won</label>
  <input type="text" class="form-control" id="Won" name="Won" value="<?php if(isset($row['Won'])) {echo  $row['Won']; }?>">
  </div>
  <div class="form-group">
  <label for="TeamName">Name of team</label>
  <input type="text" class="form-control" id="TeamName" name="TeamName" value="<?php if(isset($row['TeamName'])) {echo  $row['TeamName']; }?>">
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-danger" id="lordsoffallen" name="lordsoffallen">Update</button>
    <a href="lordsoffallen.php" class="btn btn-secondary">Close</a>
  </div>
  <?php if(isset($msg)) {echo $msg;} ?>
 </form>
 </div> 
<?php
include('includes/footer.php');
?>