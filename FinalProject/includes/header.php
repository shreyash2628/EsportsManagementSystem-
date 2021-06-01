
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-----Bootstrap CSS---->
    <link rel="stylesheet" href="css1/bootstrap.min.css">
     <!-----Font Awesome CSS---->
     <link rel="stylesheet" href="css1/all.min.css">
     <!-----Admin CSS---->
     <link rel="stylesheet" href="css1/admin.css">
    
    <title>Admin</title>
</head>
<body>
<!-----Top Navbar--->
<nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#" >ADMIN PANEL</a></nav>
<!----------Start container---------->
<div class="container-fluid" style="margin-top:40px;">
<!----------Start row----->
    <div class="row">
    
<!-----side bar 1st coloumn---->
       <nav class="col-sm-2 bg-light sidebar py-5">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                  <li class="nav-item"><a class="nav-link <?php if(PAGE == 'E-sports.php'){echo 'active';}?>" href="E-sports.php"><i class="fas fa-mobile-alt"></i>E-Sports</a></li>
                  <li class="nav-item"><a class="nav-link <?php if(PAGE == 'teams.php'){echo 'active';}?>" href="teams.php"><i class="fas fa-users"></i>Teams</a></li>
                  <li class="nav-item"><a class="nav-link <?php if(PAGE == 'participants.php'){echo 'active';}?>" href="participants.php"><i class="fas fa-users"></i>Participants</a></li>
                  <li class="nav-item"><a class="nav-link <?php if(PAGE == 'schedule.php'){echo 'active';}?>" href="schedule.php"><i class="fas fa-table"></i>Schedule</a></li>
                  <li class="nav-item"><a class="nav-link <?php if(PAGE == 'scoreboard.php'){echo 'active';}?>" href="scoreboard.php"><i class="fas fa-table"></i>Scoreboard</a></li>
                  <li class="nav-item"><a class="nav-link <?php if(PAGE == 'prizepool.php'){echo 'active';}?>" href="prizepool.php"><i class="fas fa-trophy"></i>Prizepool</a></li>
                  <li class="nav-item"><a class="nav-link <?php if(PAGE == 'history.php'){echo 'active';}?>" href="history.php"><i class="fas fa-history"></i>Team History</a></li>
                  <li class="nav-item"><a class="nav-link <?php if(PAGE == 'logout.php'){echo 'active';}?>" href="index.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                  
                 </ul>
            </div>
        </nav>
 <!------End side bar 1st column----->