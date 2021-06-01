<?php
include('includes/header.php');
include('dbConnection.php');
if(isset($_REQUEST['teams']))
//See if the fields are empty
{
    if(($_REQUEST['TeamName'] == "") || ($_REQUEST['LeaderName'] == "") || ($_REQUEST['NameOfGames'] == "") || ($_REQUEST['UserName'] == "") || ($_REQUEST['Password'] == "")) 
    {
          $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 role="alert">Fill all Fields </div>';
    }
 //if the fields are not empty   
    else
    {
        $id = $_REQUEST['id'];
        $teamname = $_REQUEST['TeamName'];
        $leadername = $_REQUEST['LeaderName'];
        $nameofgame = $_REQUEST['NameOfGames'];
        $username = $_REQUEST['UserName'];
        $password = $_REQUEST['Password'];
        $sql = "UPDATE teams SET TeamName = '$teamname', LeaderName = '$leadername', NameOfGames = '$nameofgame', UserName = '$username' , Password = '$password' WHERE id = $id";  
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
  <h3 class="text-center">Update Team</h3>
  <?php
   if(isset($_REQUEST['edit']))
   {
    $sql = "SELECT * FROM teams WHERE id = '{$_REQUEST['id']}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
   }
  ?>
  <form action="" method="POST">
  <div class="form-group">
  <input type="hidden" class="form-control" id="id" name="id"  value="<?php if(isset($row['id'])) {echo  $row['id']; }?>">
  </div>
  <div class="form-group">
  <label for="TeamName">Team Name</label>
  <input type="text" class="form-control" id="TeamName" name="TeamName" value="<?php if(isset($row['TeamName'])) {echo  $row['TeamName']; }?>">
  </div>
  <div class="form-group">
  <label for="LeaderName">Leader Name</label>
  <input type="text" class="form-control" id="LeaderName" name="LeaderName" value="<?php if(isset($row['LeaderName'])) {echo  $row['LeaderName']; }?>">
  </div>
  <div class="form-group">
  <label for="NameOfGames">Name Of Game</label>
  <input type="text" class="form-control" id="NameOfGames" name="NameOfGames" value="<?php if(isset($row['NameOfGames'])) {echo  $row['NameOfGames']; }?>">
  </div>
  <div class="form-group">
  <label for="UserName">User Name</label>
  <input type="text" class="form-control" id="UserName" name="UserName" value="<?php if(isset($row['UserName'])) {echo  $row['UserName']; }?>">
  </div>
  <div class="form-group">
  <label for="Password">Password</label>
  <input type="text" class="form-control" id="Password" name="Password" value="<?php if(isset($row['Password'])) {echo  $row['Password']; }?>">
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-danger" id="teams" name="teams">Update</button>
    <a href="teams.php" class="btn btn-secondary">Close</a>
  </div>
  <?php if(isset($msg)) {echo $msg;} ?>
 </form>
 </div> 
<?php
include('includes/footer.php');
?>