<?php
include('includes/header.php');
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
    echo '<th scope="col">Action</th>';
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
        echo '<td>';
        //update/edit
        echo '<form action="prizepoolupdate.php" class="d-inline" method="POST">';
        echo '<input type="hidden"  name="id" value='.$row['NameofGame'].'><button type="submit" class = "btn btn-info mr-3"
         name="edit" value="edit" type="submit"><i class="fas fa-pen"></i></button>';
         echo '</form>';
         //delete
        echo '<form action="" class="d-inline" method="POST">';
        echo '<input type="hidden"  name="id" value='.$row['NameofGame'].'><button class = "btn btn-secondary"
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
$sql = "DELETE FROM prizepool WHERE NameofGame = '{$_REQUEST['id']}'";
if($conn->query($sql) == TRUE){
    echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
}else
{
    echo'Failed';
}
}
?>
<div class="float-right"><a href="prizepooladd.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a></div>

<?php
include('includes/footer.php');
?>


 