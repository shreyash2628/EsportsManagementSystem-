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
            <input type=button value="Go" onclick="goToNewPage()" /> 
        </form>
        <div class="col-md-10 mt-5 text-center">
        <p class="bg-dark text-white p-2">SCOREBOARD</p>


<?php
include('includes/footer.php');
?>