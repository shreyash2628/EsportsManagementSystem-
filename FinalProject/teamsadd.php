<?php
include('includes/header.php');
include('dbConnection.php');

$count = 0;

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

        //function
        function addParticipants($name, $number, $age, $teamname){
            $conn = new mysqli("localhost", "root", "", "esportsgames", 3306);
            $sql = "INSERT INTO participants (`id`, `Age`, `Name`, `PhoneNumber`, `TeamName`) VALUES (NULL, '$age', '$name', '$number', '$teamname')";
            if($conn->query($sql) == TRUE)
        {
            $GLOBALS['count'] =  $GLOBALS['count'] + 1;
        }
        else
        {
            $msg = '<div class="alert alert-sucess col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
        }

        if($GLOBALS['count'] == 3)
        {
             $msg = '<div class="alert alert-sucess col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
        }

      }


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
            //calling function
            addParticipants($leadername,$leadernumber,$leaderage,$teamname);
            addParticipants($Participantname2,$Participantnumber2,$Participantage2,$teamname);
            addParticipants($Participantname3,$Participantnumber3,$Participantage3,$teamname);

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
  <label for="TeamName">Enter Team Name</label>
  <input type="text" class="form-control" id="TeamName" name="TeamName">
  </div>
  <div class="form-group">
  <label for="UserName">Enter User Name</label>
  <input type="text" class="form-control" id="UserName" name="UserName">
  </div>
  <div class="form-group">
  <label for="Password">Enter Password</label>
  <input type="text" class="form-control" id="Password" name="Password">
  </div>

  <div class="form-group">
  <label for="Participant1">Participant 1(Team Leader):</label>
  </div>
  <div class="form-group">
  <label for="Participantname1">Enter Name</label>
  <input type="text" class="form-control" id="Participantname1" name="Participantname1">
  </div>
  <div class="form-group">
  <label for="Participantnumber1">Phone Number</label>
  <input type="text" class="form-control" id="Participantnumber1" name="Participantnumber1">
  </div>
  <div class="form-group">
  <label for="Participantage1">Age</label>
  <input type="text" class="form-control" id="Participantage1" name="Participantage1">
  </div>

  <div class="form-group">
  <label for="Participant2">Participant 2:</label>
  </div>
  <div class="form-group">
  <label for="Participantname2">Enter Name</label>
  <input type="text" class="form-control" id="Participantname2" name="Participantname2">
  </div>
  <div class="form-group">
  <label for="Participantnumber2">Phone Number</label>
  <input type="text" class="form-control" id="Participantnumber2" name="Participantnumber2">
  </div>
  <div class="form-group">
  <label for="Participantage2">Age</label>
  <input type="text" class="form-control" id="Participantage2" name="Participantage2">
  </div>

  <div class="form-group">
  <label for="Participant3">Participant 3:</label>
  </div>
  <div class="form-group">
  <label for="Participantname3">Enter Name</label>
  <input type="text" class="form-control" id="Participantname3" name="Participantname3">
  </div>
  <div class="form-group">
  <label for="Participantnumber3">Phone Number</label>
  <input type="text" class="form-control" id="Participantnumber3" name="Participantnumber3">
  </div>
  <div class="form-group">
  <label for="Participantage3">Age</label>
  <input type="text" class="form-control" id="Participantage3" name="Participantage3">
  </div>

  <div class="form-group">
  <label for="NameOfGames">Enter Name of Game</label>
  <input type="text" class="form-control" id="NameOfGames" name="NameOfGames">
  </div>

  <div class="text-center">
  <button type="submit" class="btn btn-danger" id="teamssubmit" name="teamssubmit">Add</button>
    <a href="teams.php" class="btn btn-secondary">Close</a>
  </div>
  <?php if(isset($msg)) {echo $msg;} ?>
 </form>
 </div> 
<?php
include('includes/footer.php');
?>