<?php
include('includes/header.php');
include('dbConnection.php');
?>
<div class="col-sm-5 col-md-10 mt-5 text-center">
<p class="bg-dark text-white p-2">PARTICIPANTS</p>
<?php 
$sql ="SELECT * FROM participants";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
    echo '<table class ="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">ID</th>';
    echo '<th scope="col">Team Name</th>';
    echo '<th scope="col">Name of the Participant</th>';
    echo '<th scope="col">Contact No</th>';
    echo '<th scope="col">Age</th>';
    echo '<th scope="col">Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch_assoc())
    {
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['TeamName'].'</td>';
        echo '<td>'.$row['Name'].'</td>';
        echo '<td>'.$row['PhoneNumber'].'</td>';
        echo '<td>'.$row['Age'].'</td>';
        echo '<td>';
        //update/edit
        echo '<form action="participantsupdate.php" class="d-inline" method="POST">';
        echo '<input type="hidden"  name="id" value='.$row['id'].'><button type="submit" class = "btn btn-info mr-3"
         name="edit" value="edit" type="submit"><i class="fas fa-pen"></i></button>';
         echo '</form>';
        //delete 
        echo '<form action="" class="d-inline" method="POST">';
        echo '<input type="hidden"  name="id" value='.$row['id'].'><button class = "btn btn-secondary"
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
$sql = "DELETE FROM participants WHERE id = '{$_REQUEST['id']}'";
if($conn->query($sql) == TRUE){
    echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
}else
{
    echo'Failed';
}
}
?>
<?php
include('includes/footer.php');
?>


 
                

 