<!DOCTYPE html>
       
       <?php
           include('dbConnection.php');

           if(isset($_REQUEST['loginbutton']))
           {
           $loginEmail = $_REQUEST['loginUN'];
           $logInPassword = $_REQUEST['loginPW'];

           $LogInsql = "SELECT adusername,adpassword FROM admin_acc WHERE  adusername = '".$loginEmail."' AND adpassword = '".$logInPassword."'  limit 1  ";

           $loginResult = $conn->query($LogInsql);


           if($loginResult->num_rows == 1)
           {
             //echo"Logged in Successfully";
             header("Location:http://localhost/FinalProject/E-sports.php");
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
             if(($_REQUEST['signUpEID' ]== "") || ( $_REQUEST['signUpPass'] == ""))
             {
               // validation to be done @rajat
               echo '<script>alert("Password Did not matched")</script>' ;

             }
             else{
                       $SignUpEmail = $_REQUEST['signUpEID'];
                       $SignUpPassword = $_REQUEST['signUpPass'];
                       
                     
                     
                    
                       {
                         $sql ="INSERT into admin_acc(adusername,adpassword) VALUES ('$SignUpEmail','$SignUpPassword')";               
                         if($conn->query($sql) == TRUE)
                         {
                           //echo '<script>alert("Succesfull")</script>' ;
                           header("Location:http://localhost/FinalProject/E-sports.php");
                           exit;
                         }
                           else
                            {
                              echo '<script>alert("Failed")</script>' ;
                            }                         
                       }
                       //else{
                       // exit();
                       //  alert("hello");
                         //  alertmsg();
                          //echo '<script>alert("Password Did not matched)</script>' ;
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
   
   
   
<div class="title login">Admin Login</div>
<div class="title signup">Signup Form</div>
</div>
<div class="form-container">
     <div class="field">
       <input type="radio" name="slide" id="login" checked>

       <label for="login" class="field login"></label>

    
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

$sql = "SELECT * FROM user_accounts WHERE adusername={'$LoginUsername'} AND adpassword={'$LoginPassword'}";
 $result = mysqli_query($conn,$sql) or die("User not Found");
}
?>
<!-- signup starts here -->


         <!-- signup ends here -->
</form>
</div>
</div>
</div>
<!--<script>

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
 </script>-->

</body>
</html>
