<?php
include('includes/header.php');
include('dbConnection.php');
?>

<div class="col-sm-4 col-md-10 mt-5 text-center">
<p class="bg-dark text-white p-2">E-SPORTS</p>
<?php 
$sql ="SELECT * FROM esports";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
    echo '<table class ="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">E-sports Id</th>';
    echo '<th scope="col">Name of Games</th>';
    echo '<th scope="col">Matches Dates</th>';
    echo '<th scope="col">Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch_assoc())
    {
        echo '<tr>';
        echo '<td>'.$row['Esports_id'].'</td>';
        echo '<td>'.$row['NameOfGames'].'</td>';
        echo '<td>'.$row['MatchDate'].'</td>';
        echo '<td>';
        //update/edit
        echo '<form action="E-sportsupdate.php" class="d-inline" method="POST">';
        echo '<input type="hidden"  name="id" value='.$row['Esports_id'].'><button type="submit" class = "btn btn-info mr-3"
         name="edit" value="edit" type="submit"><i class="fas fa-pen"></i></button>';
         echo '</form>';
        //delete 
        echo '<form action="" class="d-inline" method="POST">';
        echo '<input type="hidden"  name="id" value='.$row['Esports_id'].'><button class = "btn btn-secondary"
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
$sql = "DELETE FROM esports WHERE Esports_id = '{$_REQUEST['id']}'";
if($conn->query($sql) == TRUE){
    echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
}else
{
    echo'Failed';
}
}
?>
<div class="float-right"><a href="E-sportsadd.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a></div>
<?php
include('includes/footer.php');
?>


 