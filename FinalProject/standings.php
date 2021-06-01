<?php
include('includes/header2.php');
include('dbConnection.php');
?>
<div class="col-sm-5 col-md-10 mt-5 text-center">
<p class="bg-dark text-white p-2">PRIZEPOOL</p>
<?php 
$sql ="SELECT * FROM prizepool";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
    echo '<table class ="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Name of Game</th>';
    echo '<th scope="col">Winner</th>';
    echo '<th scope="col">Runner Up</th>';
    echo '<th scope="col">2nd Runner</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch_assoc())
    {
        echo '<tr>';
        echo '<td>'.$row['NameofGame'].'</td>';
        echo '<td>'.$row['Winner'].'</td>';
        echo '<td>'.$row['RunnerUp'].'</td>';
        echo '<td>'.$row['2ndRunner'].'</td>';
        echo '</tr>';
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


 