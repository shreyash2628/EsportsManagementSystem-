<?php
include('includes/header.php');
include('dbConnection.php');
?>
            
<div class="col-sm-6 col-md-10 mt-5 text-center">
<p class="bg-dark text-white p-2">TEAMS</p>
<?php 
$sql ="SELECT * FROM teams";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
    echo '<table class ="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Id</th>';
    echo '<th scope="col">Team Name</th>';
    echo '<th scope="col">Leader Name</th>';
    echo '<th scope="col">Name Of Game</th>';
    echo '<th scope="col">Username</th>';
    echo '<th scope="col">Password</th>';
    echo '<th scope="col">Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch_assoc())
    {
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['TeamName'].'</td>';
        echo '<td>'.$row['LeaderName'].'</td>';
        echo '<td>'.$row['NameOfGames'].'</td>';
        echo '<td>'.$row['UserName'].'</td>';
        echo '<td>'.$row['Password'].'</td>';
        echo '<td>';
        //update/edit
        echo '<form action="teamsupdate.php" class="d-inline" method="POST">';
        echo '<input type="hidden"  name="id" value='.$row['id'].'><button type="submit" class = "btn btn-info mr-3"
         name="edit" value="edit" type="submit"><i class="fas fa-pen"></i></button>';
         echo '</form>';
        //delete 
        echo '<form action="" class="d-inline" method="POST">';
        echo '<input type="hidden"  name="TeamName" value='.$row['TeamName'].'><button class = "btn btn-secondary"
         name="delete" value="Delete" type="submit"><i class="fas fa-trash-alt"></i></button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>'; 
}
else
{
    echo '0 Result';
}
if(isset($_REQUEST['delete'])){
    $teamname = $_REQUEST['TeamName'];
$sql = "DELETE FROM teams WHERE TeamName = '$teamname'";
$sqlb = "DELETE FROM participants WHERE TeamName = '$teamname'";
if($conn->query($sql) == TRUE  && $conn->query($sqlb) == TRUE){
    $sqlc = "DELETE FROM schedule WHERE Team1 = '$teamname'";
    $sqld = "DELETE FROM schedule WHERE Team2 = '$teamname'";
    $sqle = "DELETE FROM pubg WHERE TeamName = '$teamname'";
    $sqlf = "DELETE FROM assassincreed WHERE TeamName = '$teamname'";
    $sqlg = "DELETE FROM counterstrike WHERE TeamName = '$teamname'";
    $sqlh = "DELETE FROM gta WHERE TeamName = '$teamname'";
    $sqli = "DELETE FROM leagueoflegends WHERE TeamName = '$teamname'";
    $sqlj = "DELETE FROM lordsoffallen WHERE TeamName = '$teamname'";
    $sqlk = "DELETE FROM nfs WHERE TeamName = '$teamname'";

    $conn->query($sqle);
    $conn->query($sqlf);
    $conn->query($sqlg);
    $conn->query($sqlh);
    $conn->query($sqli);
    $conn->query($sqlj);
    $conn->query($sqlk);
    $conn->query($sqlc);
    $conn->query($sqld);
    echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
}else
{
    echo'Failed';
}
}
?>
<div class="float-right"><a href="teamsadd.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a></div>
<?php
include('includes/footer.php');
?>




 