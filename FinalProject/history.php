<?php
include('includes/header.php');
include('dbConnection.php');
?>
<div class="col-md-10 mt-5 text-center">
<p class="bg-dark text-white p-2">TEAM HISTORY</p>
<?php 
$sql ="SELECT * FROM log_table";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
    echo '<table class ="table">';
    echo '<thead>';
    echo '<tr>';

    echo '<th scope="col">Team Name</th>';
    echo '<th scope="col">Leader Name</th>';
    echo '<th scope="col">Name Of Game</th>';
    echo '<th scope="col">Action</th>';
    echo '<th scope="col">Date and Time</th>';
   
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
   
    while($row = $result->fetch_assoc())
    {
        echo '<tr>';
    
        echo '<td>'.$row['TeamName'].'</td>';
        echo '<td>'.$row['LeaderName'].'</td>';
        echo '<td>'.$row['NameOfTheGames'].'</td>';
        echo '<td>'.$row['Action'].'</td>';
        echo '<td>'.$row['Date'].'</td>';
        echo '<td>';
    }
    echo '</tbody>';
    echo '</table>'; 
}
else
{
    echo '0 Result';
}

?>
<?php
include('includes/footer.php');
?>
