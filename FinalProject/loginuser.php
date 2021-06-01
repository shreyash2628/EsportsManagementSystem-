<!DOCTYPE html>
       
       <?php
           include('dbConnection.php');

           if(isset($_REQUEST['loginbutton']))
           {
           $loginEmail = $_REQUEST['loginUN'];
           $logInPassword = $_REQUEST['loginPW'];

           $LogInsql = "SELECT usermail,userpw FROM user_accounts WHERE  usermail= '".$loginEmail."' AND userpw = '".$logInPassword."'  limit 1  ";

           $loginResult = $conn->query($LogInsql);


           if($loginResult->num_rows == 1)
           {
             //echo"Logged in Successfully";
             header("Location:http://localhost/FinalProject/website.php");
             exit;
           }
           else{
            // echo"User not found";
           }
         }
     ?>





       <?php 
           if(isset($_REQUEST['signupbutton']))
           {
             if(($_REQUEST['signUpEID' ]== "") || ( $_REQUEST['signUpPass'] == "") || ($_REQUEST['confirmPass'] == ""))
             {
               // validation to be done @rajat
               echo '<script>alert("Password Did not matched")</script>' ;

             }else{
                       $SignUpEmail = $_REQUEST['signUpEID'];
                       $SignUpPassword = $_REQUEST['signUpPass'];
                       $ConfirmPassword = $_REQUEST['confirmPass'];
                     
                     
                       if($SignUpPassword == $ConfirmPassword)
                       {
                         $sql ="INSERT into user_accounts(usermail,userpw) VALUES ('$SignUpEmail','$SignUpPassword')";               
                         if($conn->query($sql) == TRUE)
                         {
                           //echo '<script>alert("Succesfull")</script>' ;
                           header("Location:http://localhost/FinalProject/website.php");
                           exit;
                         }
                         else
                         {
                           echo '<script>alert("Failed")</script>' ;
                         }                         
                       }
                       else{
                       // exit();
                       //  alert("hello");
                         //  alertmsg();
                          echo '<script>alert("Password Did not matched)</script>' ;
                       }
               
               }
       
           }
       ?>                            

<html lang="en" dir="ltr">
<head>
 <meta charset="utf-8">
 <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
 <!-- <title>Login & Signup Form | CodingNepal</title> -->
 <link rel="stylesheet" href="css1/loginuser.css">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
 <div class="wrapper">
   <div class="title-text">
   
   
   
<div class="title login">User Login</div>
<div class="title signup">Signup Form</div>
</div>
<div class="form-container">
     <div class="slide-controls">
       <input type="radio" name="slide" id="login" checked>
       <input type="radio" name="slide" id="signup">
       <label for="login" class="slide login">Login</label>
       <label for="signup" class="slide signup">Signup</label>
       <div class="slider-tab">
</div>
</div>

<!-- //login starts here -->
<div class="form-inner">
       <form action="<?php $_SERVER['PHP_SELF'];?>" class="login">
         <div class="field">  <input type="text" name="loginUN" placeholder="Email Address" required> </div>
<div class="field">
           <input type="password" name="loginPW" placeholder="Password" required>
         </div>
<div class="pass-link">
<a href="#"> </a></div>
<div class="field btn">
           <div class="btn-layer">


         </div>  <input type="submit" name="loginbutton" value="Login">  </div>

<!-- login ends here -->

<?php 
if(isset($_REQUEST['loginbutton']))
{
include('dbConnection.php');
$LoginUsername = $_REQUEST['loginUN'];
$LoginPassword = md5($_REQUEST['loginPW']);

$sql = "SELECT * FROM user_accounts WHERE usermail={'$LoginUsername'} AND userpw={'$LoginPassword'}";
 $result = mysqli_query($conn,$sql) or die("User not Found");
}
?>
<!-- signup starts here -->

<div class="signup-link">
Not a member? <a href="">Signup now</a></div>
</form>
<form action="#" class="signup">
         <div class="field">
           <input type="email" placeholder="Email Address" name="signUpEID" required>
         </div>
<div class="field">
           <input type="password" placeholder="Password" name="signUpPass" required>
         </div>
<div class="field">
           <input type="password" placeholder="Confirm password" name="confirmPass" required>
         </div>
<div class="field btn">
           <div class="btn-layer">
</div>
<input type="submit" value="Signup" name="signupbutton">
         </div>
         <!-- signup ends here -->
</form>
</div>
</div>
</div>
<script>

   const loginText = document.querySelector(".title-text .login");
   const loginForm = document.querySelector("form.login");
   const loginBtn = document.querySelector("label.login");
   const signupBtn = document.querySelector("label.signup");
   const signupLink = document.querySelector("form .signup-link a");
   signupBtn.onclick = (()=>{
     loginForm.style.marginLeft = "-50%";
     loginText.style.marginLeft = "-50%";
   });
   loginBtn.onclick = (()=>{
     loginForm.style.marginLeft = "0%";
     loginText.style.marginLeft = "0%";
   });
   signupLink.onclick = (()=>{
     signupBtn.click();
     return false;
   });
 </script>

</body>
</html>
