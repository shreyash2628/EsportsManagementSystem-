<?php
include('includes/header.php');
include('dbConnection.php');
if(isset($_REQUEST['esportssubmit']))
//See if the fields are empty
{
    if(($_REQUEST['Esports_id'] == "") || ($_REQUEST['NameOfGames'] == "") || ($_REQUEST['MatchDate'] == "")) 
       
    {
          $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 role="alert">Fill all Fields </div>';
    }
 //if the fields are not empty   
    else
    {
        $esports = $_REQUEST['Esports_id'];
        $name = $_REQUEST['NameOfGames'];
        $mdates = $_REQUEST['MatchDate'];
        
        $sql = "INSERT INTO esports (Esports_id, NameOfGames, MatchDate) VALUES ('$esports', '$name', '$mdates')";
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
  <h3 class="text-center">Add Entries</h3>
  <form action="" method="POST">
  <div class="form-group">
  <label for="Esports_id">Enter E-Sports Id</label>
  <input type="text" class="form-control" id="Esports_id" name="Esports_id">
  </div>
  <div class="form-group">
  <label for="NameOfGames">Enter Name of Game</label>
  <input type="text" class="form-control" id="NameOfGames" name="NameOfGames">
  </div>
  <div class="form-group">
  <label for="MatchDate">Enter Match Date</label>
  <input type="text" class="form-control" id="MatchDate" name="MatchDate">
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-danger" id="esportssubmit" name="esportssubmit">Add</button>
    <a href="E-sports.php" class="btn btn-secondary">Close</a>
  </div>
  <?php if(isset($msg)) {echo $msg;} ?>
 </form>
 </div> 
<?php
include('includes/footer.php');
?>
