<?php
include('includes/header.php');
include('dbConnection.php');
if(isset($_REQUEST['counterstrikesubmit']))
//See if the fields are empty
{
    if(($_REQUEST['MatchesPlayed'] == "") || ($_REQUEST['Lost'] == "") || ($_REQUEST['Penalty'] == "") || ($_REQUEST['Score'] == "")
    || ($_REQUEST['TeamName'] == "") || ($_REQUEST['Won'] == "")) 
       
    {
          $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 role="alert">Fill all Fields </div>';
    }
 //if the fields are not empty   
    else
    {
        $matchesplayed = $_REQUEST['MatchesPlayed'];
        $lost = $_REQUEST['Lost'];
        $Penalty = $_REQUEST['Penalty'];
        $Score = $_REQUEST['Score'];
        $TeamName = $_REQUEST['TeamName'];
        $Won = $_REQUEST['Won'];
        
        $sql = "INSERT INTO counterstrike (MatchesPlayed, Lost, Penalty, Score, TeamName, Won) VALUES ('$matchesplayed', '$lost', '$Penalty', '$Score', '$TeamName', '$Won')";
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
  <h3 class="text-center">Add new data</h3>
  <form action="" method="POST">
  <div class="form-group">
  <label for="MatchesPlayed">Enter Matches Played</label>
  <input type="text" class="form-control" id="MatchesPlayed" name="MatchesPlayed">
  </div>
  <div class="form-group">
  <label for="Lost">Lost</label>
  <input type="text" class="form-control" id="Lost" name="Lost">
  </div>
  <div class="form-group">
  <label for="Penalty">Penalty</label>
  <input type="text" class="form-control" id="Penalty" name="Penalty">
  </div>
  <div class="form-group">
  <label for="Score">Score</label>
  <input type="text" class="form-control" id="Score" name="Score">
  </div>
  <div class="form-group">
  <label for="TeamName">Name Of Team</label>
  <input type="text" class="form-control" id="TeamName" name="TeamName">
  </div>
  <div class="form-group">
  <label for="Won">Won</label>
  <input type="text" class="form-control" id="Won" name="Won">
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-danger" id="counterstrikesubmit" name="counterstrikesubmit">Add</button>
    <a href="counterstrike.php" class="btn btn-secondary">Close</a>
  </div>
  <?php if(isset($msg)) {echo $msg;} ?>
 </form>
 </div> 
<?php
include('includes/footer.php');
?>
