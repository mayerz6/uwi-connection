<?php session_start(); ?>
<?php ob_start(); ?>

<?php include 'classes/db.php'; ?>


<?php

$dbConnect = new database;
$userEncrypt = new encryption;

$response = "default";
$response_error = "default";

$server_error = "default";


if(isset($_POST['submit'])){

  /*
  
      Store INPUT data into unique PHP variables for validating.

      This "EXTRACT" function provides all these details AUTOMATICALLY
          $username = $_POST['username'];
          $pwd = $_POST['password'];

    */   

    extract($_POST);
  
     /* We MUST sanitize our input fields for SECURITY purposes. */
        $filteredUsername = filter_var($username, FILTER_SANITIZE_STRING);

       $userData = $dbConnect->fetchUserByUsername($filteredUsername);

        if(empty($userData)){
                        $response_error = "error";
                     //   echo "User doesn't exist!!!";
                    } else {

            $pwdEncrypt = $userEncrypt->hashPwd($usrPwd);
              $usrSalt = $dbConnect->fetchUserSalt($username);
                 $txt =  $pwdEncrypt . "" . $usrSalt; 
                      $usrPwdHash = $userEncrypt->hashPwd($txt);

          $recordUser = $dbConnect->authorizeUser($filteredUsername, $usrPwdHash);
         
             if(!empty($recordUser)){
                     
                                /* Once the User has been authorized we create a set */
                                /* of SESSION variables to track them during the time */
                                /* they spend using the Calendar App. */

                                $_SESSION['id'] = $recordUser[0]['id'];
                                $_SESSION['firstname'] = $recordUser[0]['fname'];
                                $_SESSION['surname'] = $recordUser[0]['sname'];
                                $_SESSION['role'] = $recordUser[0]['role'];
                                $_SESSION['username'] = $recordUser[0]['uname'];
                                $_SESSION['role'] = $recordUser[0]['role'];

                                header('Location: dashboard.php');
                                    exit;
                            } else {
                                $response_error = "error";
                              
                            }
              } 


        }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="theme-color" content="#000000">

                    <link rel="icon" href="favicon.png">

        <title>BIPA Registry</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/styles.css" >
    </head>

    <body>
        <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
            
       <?php if($_SESSION) { ?>
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="user-profile.php">Profile</a>
      </li>
      <?php } else { ?>
       <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
      
      <?php if($_SESSION) { ?>
       <li class="nav-item">
        <a class="nav-link" href="scheduler.php">Schedule</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sign-out.php">Sign Out</a>
      </li>
      <?php } else { ?>
      <li class="nav-item">
        <a class="nav-link" href="registration.php">Registration</a>
      </li>
      <?php } ?>
      
      </ul>
  </div>
</nav>
        </header>

<div class="screen"> 
  <div class="row">
  <div class="col-md-6">
      <img src="assets/images/pngs/Favicon/Favicon-Default_Reverse_on_Ttransparent.png" />
        <h2>Welcome To the Team</h2>
        
  </div>
  <div class="col-md-6">

        <h4 class="<?php echo $response_error; ?>">Issues - Username and Password are incorrect.</h4>
        
       <h2 class="text-center">Login Now</h2>
		    <form action="" onsubmit="return userLogin()" class="login-form" name="loginForm" method="post">
  <div class="form-group">
    <label for="usr_name" class="text-uppercase">Username</label>
    <input type="text" id="usr_name" name="username" class="form-control" placeholder="">
        <div id="usernameErrorMsg"></div>
  </div>
  <div class="form-group">
    <label for="usr_pwd" class="text-uppercase">Password</label>
    <input type="password" id="usr_pwd" name="usrPwd" class="form-control" placeholder="">
          <div id="pwdErrorMsg"></div>
  </div>
  
  
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      <small>Remember Me</small>
    </label>
    <button name="submit" class="btn btn-login float-right">Submit</button>
  </div>
  
</form>
<br />
<br />
	

<small>You <b>MUST</b> Log In if you wish to view exclusive BIPA content...</small>
<br />
<br />
<hr />
<h4><a href="registration.php">Register</a/> now!</h4>

<script type="text/javascript">

/* Grab the textbox fields of the login form */

var username = document.forms["loginForm"]["username"];
var password = document.forms["loginForm"]["usrPwd"];

/* Grab the hidden/empty DIVs to present error messages */
var usernameError = document.getElementById("usernameErrorMsg");
var pwdError = document.getElementById("pwdErrorMsg");

/* Initialize EVENT LISTENERS */
username.addEventListener("blur", nameVerify, true);
password.addEventListener("blur", pwdVerify, true);

/* This function DEACTIVATES the error messages showcased once  */
    /* the INPUT field IS NOT BLANK! */
    function nameVerify() {
        if(username.value != ""){
            username.style.border = "0px solid #ff0000";
                usernameError.innerHTML = "";
                    return true;
        }
    }

      function pwdVerify(){
        if(password.value != ""){
            password.style.border = "0px solid #ff0000";
                pwdError.innerHTML = "";
                    return true;
        }
    }

function userLogin(){

    if(username.value == ""){
            username.style.border = "1px solid #ff0000";
            usernameError.textContent = "Username is required!";
            usernameError.style.color = "#ff0000";
                        username.focus();
                            return false;
        }


         if(password.value == ""){
            password.style.border = "1px solid #ff0000";
                pwdError.textContent = "Password is required!";
                    pwdError.style.color = "#ff0000";
                        password.focus();
                            return false;
        }
    

}



</script>

  </div>
      
</div>

</div>
<div class="container">
        <footer>&copy; Copyright Larry Mayers | All Rights Reservered</footer>
</div>
    </body>

 

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



</html>