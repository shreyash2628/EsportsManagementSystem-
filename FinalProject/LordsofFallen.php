<?php
include('includes/header.php');
include('dbConnection.php');
?>
    <script type="text/javascript">
        function goToNewPage() {
            var url = document.getElementById('list').value;
            if (url != 'none') {
                window.location = url;
            }
        }
    </script>
    <div class="col-md-10 mt-5 text-left">
        <form>
        <select name="list" id="list" accesskey="target">
                <option value='none' selected>Choose a Game</option>
                <option value="pubg.php">Pub-G</option>
                <option value="gta5.php">Gta-5</option>
                <option value="nfs.php">NFS</option>
                <option value="leagueoflegends.php">League Of Legends</option>
                <option value="LordsofFallen.php">Lords of Fallen</option>
                <option value="counterstrike.php">Counter Strike</option>
                <option value="AssassinCreed.php">Assassin's Creed</option>
            </select>
            <input type=button value="Go" onclick="goToNewPage()" /> </form>
        <div class="col-sm-4 col-md-10 mt-5 text-center">
            <p class="bg-dark text-white p-2">LORDS OF FALLEN SCOREBOARD</p>
            <?php            
$sql ="SELECT * FROM lordsoffallen";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
    echo '<table class ="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Team Name</th>';
    echo '<th scope="col">Matches Played</th>';
    echo '<th scope="col">Score</th>';
    echo '<th scope="col">Penalty</th>';
    echo '<th scope="col">Won</th>';
    echo '<th scope="col">Lost</th>';
    echo '<th scope="col">Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch_assoc())
    {
        echo '<tr>';
        echo '<td>'.$row['TeamName'].'</td>';
        echo '<td>'.$row['MatchesPlayed'].'</td>';
        echo '<td>'.$row['Score'].'</td>';
        echo '<td>'.$row['Penalty'].'</td>';
        echo '<td>'.$row['Won'].'</td>';
        echo '<td>'.$row['Lost'].'</td>';
        echo '<td>';
         //update/edit
         echo '<form action="lordsoffallenupdate.php" class="d-inline" method="POST">';
         echo '<input type="hidden"  name="id" value='.$row['TeamName'].'><button type="submit" class = "btn btn-info mr-3"
          name="edit" value="edit" type="submit"><i class="fas fa-pen"></i></button>';
          echo '</form>';
        //delete  
        echo '<form action="" class="d-inline" method="POST">';
        echo '<input type="hidden"  name="id" value='.$row['TeamName'].'><button class = "btn btn-secondary"
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
$sql = "DELETE FROM lordsoffallen WHERE TeamName = '{$_REQUEST['id']}'";
if($conn->query($sql) == TRUE){
    echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
}else
{
    echo'Failed';
}
}
?> 
<div class="float-right"><a href="lordsoffallenadd.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a></div>  
           
<?php
include('includes/footer.php');
?>