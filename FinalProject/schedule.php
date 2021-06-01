<?php
include('includes/header.php');
include('dbConnection.php');
?>
<div class="col-sm-8 col-md-10 mt-5 text-center">
<p class="bg-dark text-white p-2">SCHEDULE</p> 
<?php 
$sql ="SELECT * FROM schedule";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
    echo '<table class ="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Name of Team 1</th>';
    echo '<th scope="col">Name of Team 2</th>';
    echo '<th scope="col">Name of Game</th>';
    echo '<th scope="col">Week</th>';
    echo '<th scope="col">Day</th>';
    echo '<th scope="col">Date</th>';
    echo '<th scope="col">Time</th>';
    echo '<th scope="col">Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch_assoc())
    {
        echo '<tr>';
        echo '<td>'.$row['Team1'].'</td>';
        echo '<td>'.$row['Team2'].'</td>';
        echo '<td>'.$row['NameofGame'].'</td>';
        echo '<td>'.$row['Week'].'</td>';
        echo '<td>'.$row['sday'].'</td>';
        echo '<td>'.$row['sdate'].'</td>';
        echo '<td>'.$row['stime'].'</td>';
        echo '<td>';
        //update/edit
        echo '<form action="scheduleupdate.php" class="d-inline" method="POST">';
        echo '<input type="hidden"  name="id" value='.$row['id'].'><button type="submit" class = "btn btn-info mr-3"
         name="edit" value="edit" type="submit"><i class="fas fa-pen"></i></button>';
         echo '</form>';
        //delete
        echo '<form action="" method="POST" class="d-inline">';
        echo '<input type="hidden"  name="id" value='.$row['Team1'].'><button class = "btn btn-secondary"
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
$sql = "DELETE FROM schedule WHERE Team1 = '{$_REQUEST['id']}'";
if($conn->query($sql) == TRUE){
    echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
}else
{
    echo'Failed';
}
}
?>
<div class="float-right"><a href="scheduleadd.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a></div>
<?php
include('includes/footer.php');
?>




 
