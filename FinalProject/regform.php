<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-----Bootstrap CSS---->
    <link rel="stylesheet" href="css1/bootstrap.min.css">
     <!-----Font Awesome CSS---->
     <link rel="stylesheet" href="css1/all.min.css">
     <!-----Admin CSS---->
     <link rel="stylesheet" href="css1/admin.css">
     <!--<link rel="stylesheet" href="css1/regform.css" type="text/css">-->
    <title>Registration Form</title>
</head>
<body>
<!-----Top Navbar--->
<nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#" >REGISTRATION FORM</a></nav>
<!----------Start container---------->


<?php
include('dbConnection.php');
if(isset($_REQUEST['teamssubmit']))
//See if the fields are empty
{
    if(($_REQUEST['TeamName'] == "") || ($_REQUEST['UserName'] == "") || ($_REQUEST['Password'] == "") 
    || ($_REQUEST['Participantname1'] == "") || ($_REQUEST['Participantnumber1'] == "") || ($_REQUEST['Participantage1'] == "") 
    || ($_REQUEST['Participantname2'] == "") || ($_REQUEST['Participantnumber2'] == "") || ($_REQUEST['Participantage2'] == "") 
    || ($_REQUEST['Participantname3'] == "") || ($_REQUEST['Participantnumber3'] == "") || ($_REQUEST['Participantage3'] == "") 
    || ($_REQUEST['NameOfGames'] == "") ) 
       
    {
          $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 role="alert">Fill all Fields </div>';
    }
 //if the fields are not empty   
    else
    {
        $teamname = $_REQUEST['TeamName'];
        $username = $_REQUEST['UserName'];
        $password = $_REQUEST['Password'];

        $leadername = $_REQUEST['Participantname1'];
        $leadernumber = $_REQUEST['Participantnumber1'];
        $leaderage = $_REQUEST['Participantage1'];

        $Participantname2 = $_REQUEST['Participantname2'];
        $Participantnumber2 = $_REQUEST['Participantnumber2'];
        $Participantage2 = $_REQUEST['Participantage2'];

        $Participantname3 = $_REQUEST['Participantname3'];
        $Participantnumber3 = $_REQUEST['Participantnumber3'];
        $Participantage3 = $_REQUEST['Participantage3'];

        $nameofgame = $_REQUEST['NameOfGames'];
        
        $sql = "INSERT INTO teams (`id`, `NameOfGames`, `TeamName`, `LeaderName`, `UserName`, `Password`) VALUES (NULL, '$nameofgame', '$teamname', '$leadername', '$username', '$password')";
        if($conn->query($sql) == TRUE)
        {
            $sqla = "INSERT INTO participants (`id`, `Age`, `Name`, `PhoneNumber`, `TeamName`) VALUES (NULL, '$leaderage', '$leadername', '$leadernumber', '$teamname')";
            if($conn->query($sqla) == TRUE)
            {
                $sqlb = "INSERT INTO participants (`id`, `Age`, `Name`, `PhoneNumber`, `TeamName`) VALUES (NULL, '$Participantage2', '$Participantname2', '$Participantnumber2', '$teamname')";
                if($conn->query($sqlb) == TRUE)
            {
                $sqlc = "INSERT INTO participants (`id`, `Age`, `Name`, `PhoneNumber`, `TeamName`) VALUES (NULL, '$Participantage3', '$Participantname3', '$Participantnumber3', '$teamname')";
                if($conn->query($sqlc) == TRUE)
            {
                $msg = '<div class="alert alert-sucess col-sm-6 ml-5 mt-2" role="alert"> Registered Successfully </div>';
            }
            else
            {
                $msg = '<div class="alert alert-sucess col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
            }
            }
            else
            {
                $msg = '<div class="alert alert-sucess col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
            }
            }
            else
            {
                $msg = '<div class="alert alert-sucess col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
            }
           
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
  <h3 class="text-center">Registration Form</h3>
  <form action="" method="POST">

  <div class="form-group">
  <label for="TeamName">Enter Team Name:</label>
  <input type="text" class="form-control" id="TeamName" name="TeamName" pattern="[A-Za-z]+" autofocus required>
  </div>
  <div class="form-group">
  <label for="UserName">Enter Email:</label>
  <input type="email" class="form-control" id="UserName" name="UserName" placeholder="abc@gmail.com" size="30" required>
  </div>
  <div class="form-group">
  <label for="Password">Enter Password:</label><br>
  <input type="password" class="form-control" id="Password" name="Password" required>
  </div>

  <div class="form-group">
  <label for="Participant1">Participant 1(Team Leader):</label>
  </div>
  <div class="form-group">
  <label for="Participantname1">Enter Name</label>
  <input type="text" class="form-control" id="Participantname1" name="Participantname1" pattern="[A-Za-z]+" required>
  </div>
  <div class="form-group">
  <label for="Participantnumber1">Phone Number</label>
  <input type="text" class="form-control" id="Participantnumber1" name="Participantnumber1" pattern="[7-9]{1}[0-9]{9}" placeholder="10-digit Contact Number" required maxlength="10">
  </div>
  <div class="form-group">
  <label for="Participantage1">Age</label>
  <input type="number" class="form-control" id="Participantage1" name="Participantage1" required min="8" max="24">
  </div>

  <div class="form-group">
  <label for="Participant2">Participant 2:</label>
  </div>
  <div class="form-group">
  <label for="Participantname2">Enter Name</label>
  <input type="text" class="form-control" id="Participantname2" name="Participantname2" pattern="[A-Za-z]+" required>
  </div>
  <div class="form-group">
  <label for="Participantnumber2">Phone Number</label>
  <input type="text" class="form-control" id="Participantnumber2" name="Participantnumber2" pattern="[7-9]{1}[0-9]{9}" placeholder="10-digit Contact Number" required maxlength="10">
  </div>
  <div class="form-group">
  <label for="Participantage2">Age</label>
  <input type="number" class="form-control" id="Participantage2" name="Participantage2" min="8" max="24" required>
  </div>

  <div class="form-group">
  <label for="Participant3">Participant 3:</label>
  </div>
  <div class="form-group">
  <label for="Participantname3">Enter Name</label>
  <input type="text" class="form-control" id="Participantname3" name="Participantname3" pattern="[A-Za-z]+" required>
  </div>
  <div class="form-group">
  <label for="Participantnumber3">Phone Number</label>
  <input type="text" class="form-control" id="Participantnumber3" name="Participantnumber3" pattern="[7-9]{1}[0-9]{9}" placeholder="10-digit Contact Number" required maxlength="10">
  </div>
  <div class="form-group">
  <label for="Participantage3">Age</label>
  <input type="number" class="form-control" id="Participantage3" name="Participantage3" required min="8" max="24">
  </div>

  <div class="form-group">
  <label for="NameOfGames">Enter Name of Game</label>
  <input type="text" class="form-control" id="NameOfGames" name="NameOfGames" placeholder="Select Game" list="e-games" required>
          <datalist id="e-games">
            <option value="PUBG">
                <option value="GTA 5">
                    <option value="COUNTER STRIKE">
                        <option value="DOTA 2">
                            <option value="NFS">
                                <option value="LEAGUE OF LEGENDS">
        </datalist>
  </div>

  <div class="text-center">
  <button type="submit" class="btn btn-danger" id="teamssubmit" name="teamssubmit">Register</button>
    <a href="website.php" class="btn btn-secondary">Back</a>
  </div>
  <?php if(isset($msg)) {echo $msg;} ?>
 </form>
 </div> 
<?php
include('includes/footer.php');
?>
