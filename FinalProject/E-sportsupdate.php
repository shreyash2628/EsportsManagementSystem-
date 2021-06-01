<?php
include('includes/header.php');
include('dbConnection.php');
if(isset($_REQUEST['esportsupdate']))
//See if the fields are empty
{
    if(($_REQUEST['Esports_id'] == "") || ($_REQUEST['NameOfGames'] == "") || ($_REQUEST['MatchDate'] == "")) 
    {
          $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 role="alert">Fill all Fields </div>';
    }
 //if the fields are not empty   
    else
    {
        $id = $_REQUEST['id'];
        $esports = $_REQUEST['Esports_id'];
        $name = $_REQUEST['NameOfGames'];
        $mdates = $_REQUEST['MatchDate'];
        $sql = "UPDATE esports SET NameOfGames = '$name', MatchDate = '$mdates', Esports_id = '$esports' WHERE id = $id";  
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
  <h3 class="text-center">Update E-Sports</h3>
  <?php
   if(isset($_REQUEST['edit']))
   {
    $sql = "SELECT * FROM esports WHERE Esports_id = '{$_REQUEST['id']}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
   }
  ?>
  <form action="" method="POST">
  <div class="form-group">
  <input type="hidden" class="form-control" id="id" name="id"  value="<?php if(isset($row['id'])) {echo  $row['id']; }?>">
  </div>
  <div class="form-group">
  <label for="Esports_id">E-Sports ID</label>
  <input type="text" class="form-control" id="Esports_id" name="Esports_id" value="<?php if(isset($row['Esports_id'])) {echo  $row['Esports_id']; }?>">
  </div>
  <div class="form-group">
  <label for="NameOfGames">Name Of Game</label>
  <input type="text" class="form-control" id="NameOfGames" name="NameOfGames" value="<?php if(isset($row['NameOfGames'])) {echo  $row['NameOfGames']; }?>">
  </div>
  <div class="form-group">
  <label for="MatchDate">Match Date</label>
  <input type="text" class="form-control" id="MatchDate" name="MatchDate" value="<?php if(isset($row['MatchDate'])) {echo  $row['MatchDate']; }?>">
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-danger" id="esportsupdate" name="esportsupdate">Update</button>
    <a href="E-sports.php" class="btn btn-secondary">Close</a>
  </div>
  <?php if(isset($msg)) {echo $msg;} ?>
 </form>
 </div> 
<?php
include('includes/footer.php');
?>
