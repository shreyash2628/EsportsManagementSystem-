<?php
include('includes/header.php');
include('dbConnection.php');
if(isset($_REQUEST['participantsupdate']))
//See if the fields are empty
{
    if(($_REQUEST['TeamName'] == "") || ($_REQUEST['Name'] == "") || ($_REQUEST['PhoneNumber'] == "") || ($_REQUEST['Age'] == "")) 
    {
          $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 role="alert">Fill all Fields </div>';
    }
 //if the fields are not empty   
    else
    {
        $id = $_REQUEST['id'];
        $teamname = $_REQUEST['TeamName'];
        $name = $_REQUEST['Name'];
        $phonenumber = $_REQUEST['PhoneNumber'];
        $age = $_REQUEST['Age'];
        $sql = "UPDATE participants SET TeamName = '$teamname', Name = '$name' , PhoneNumber = '$phonenumber', Age = '$age' WHERE id = $id";  
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
  <h3 class="text-center">Update Entries</h3>
  <?php
   if(isset($_REQUEST['edit']))
   {
    $sql = "SELECT * FROM participants WHERE id = '{$_REQUEST['id']}'";
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
  <label for="Name">Name</label>
  <input type="text" class="form-control" id="Name" name="Name" value="<?php if(isset($row['Name'])) {echo  $row['Name']; }?>">
  </div>
  <div class="form-group">
  <label for="PhoneNumber">Phone Number</label>
  <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" value="<?php if(isset($row['PhoneNumber'])) {echo  $row['PhoneNumber']; }?>">
  </div>
  <div class="form-group">
  <label for="Age">Age</label>
  <input type="text" class="form-control" id="Age" name="Age" value="<?php if(isset($row['Age'])) {echo  $row['Age']; }?>">
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-danger" id="participantsupdate" name="participantsupdate">Update</button>
    <a href="participants.php" class="btn btn-secondary">Close</a>
  </div>
  <?php if(isset($msg)) {echo $msg;} ?>
 </form>
 </div> 
<?php
include('includes/footer.php');
?>
