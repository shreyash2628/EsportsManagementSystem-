<?php
include('includes/header.php');
include('dbConnection.php');
if(isset($_REQUEST['prizepoolupdate']))
//See if the fields are empty
{
    if(($_REQUEST['NameofGame'] == "") || ($_REQUEST['Winner'] == "") || ($_REQUEST['RunnerUp'] == "") || 
    ($_REQUEST['2ndRunner'] == ""))
    {
          $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 role="alert">Fill all Fields </div>';
    }
 //if the fields are not empty   
    else
    {
        $id = $_REQUEST['id'];
        $namegame = $_REQUEST['NameofGame'];
        $winner = $_REQUEST['Winner'];
        $runner = $_REQUEST['RunnerUp'];
        $srunner = $_REQUEST['2ndRunner'];
        $sql = "UPDATE prizepool SET Winner = '$winner', RunnerUp = '$runner', 2ndRunner = '$srunner', NameofGame = '$namegame' WHERE id = $id";  
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
  <h3 class="text-center">Update prizepool</h3>
  <?php
   if(isset($_REQUEST['edit']))
   {
    $sql = "SELECT * FROM prizepool WHERE NameofGame = '{$_REQUEST['id']}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
   }
  ?>
   <form action="" method="POST">
  <div class="form-group">
  <input type="hidden" class="form-control" id="id" name="id"  value="<?php if(isset($row['id'])) {echo  $row['id']; }?>">
  <form action="" method="POST">
  <div class="form-group">
  <label for="NameofGame">Name Of Game</label>
  <input type="text" class="form-control" id="NameofGame" name="NameofGame" value="<?php if(isset($row['NameofGame'])) {echo  $row['NameofGame']; }?>">
  </div>
  <div class="form-group">
  <label for="Winner">Winner</label>
  <input type="text" class="form-control" id="Winner" name="Winner" value="<?php if(isset($row['Winner'])) {echo  $row['Winner']; }?>">
  </div>
  <div class="form-group">
  <label for="RunnerUp">Runner Up</label>
  <input type="text" class="form-control" id="RunnerUp" name="RunnerUp" value="<?php if(isset($row['RunnerUp'])) {echo  $row['RunnerUp']; }?>">
  </div>
  <div class="form-group">
  <label for="2ndRunner">2nd Runner</label>
  <input type="text" class="form-control" id="2ndRunner" name="2ndRunner" value="<?php if(isset($row['2ndRunner'])) {echo  $row['2ndRunner']; }?>">
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-danger" id="prizepoolupdate" name="prizepoolupdate">Update</button>
    <a href="prizepool.php" class="btn btn-secondary">Close</a>
  </div>
  <?php if(isset($msg)) {echo $msg;} ?>
 </form>
 </div> 
<?php
include('includes/footer.php');
?>
