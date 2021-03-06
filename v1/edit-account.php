<?php session_start(); ?>
<?php ob_start(); ?>

<?php include 'classes/db.php';  ?>

<?php if(($_SESSION['id'] == 19) && ($_GET['id'])){


$dbConnect = new database;
$dataRecord = $dbConnect->fetchUserByUserId($_GET['id']);
$userData = array();

// print_r($dataRecord);
// exit;

// $records = mysqli_num_rows($dataRecord);

if(!empty($dataRecord)){

    $userData = array(
      'id' => $dataRecord[0]['id'],
      'fname' => $dataRecord[0]['fname'],
      'sname' => $dataRecord[0]['sname'],
      'mname' => $dataRecord[0]['mname'],
      'uname' => $dataRecord[0]['uname'],
      'dob' => $dataRecord[0]['dob'],
      'jtit' => $dataRecord[0]['jtit'],
      'email' => $dataRecord[0]['email'],
      'gender' => $dataRecord[0]['gender'],
      'empStatus' => $dataRecord[0]['empStatus'],
      'phone' => $dataRecord[0]['phone'],
      'mobile' => $dataRecord[0]['mobile']
    );

    if(isset($_POST['submit'])) {
        
/* We MUST sanitize our input fields for SECURITY purposes. */
  $fname = filter_var($f_name, FILTER_SANITIZE_STRING);
  $sname = filter_var($s_name, FILTER_SANITIZE_STRING);
  $mname = filter_var($m_name, FILTER_SANITIZE_STRING);
  $dob = filter_var($dob, FILTER_SANITIZE_STRING);
  $address = filter_var($address, FILTER_SANITIZE_STRING);
  $gender = filter_var($gender, FILTER_SANITIZE_STRING);
  $empStatus = filter_var($e_status, FILTER_SANITIZE_STRING);
  $work = filter_var($work, FILTER_SANITIZE_STRING);  
  $username = filter_var($username, FILTER_SANITIZE_STRING);
  $mobile = filter_var($mobile, FILTER_SANITIZE_STRING);
  $phone = filter_var($phone, FILTER_SANITIZE_STRING);
  $email = filter_var($email, FILTER_VALIDATE_EMAIL);
  $membership = filter_var($membership, FILTER_SANITIZE_STRING);

  $dob = date("Y-m-d", strtotime("$dob"));

/* Call meant to verify if a requested USERNAME already exists. */
$checkUser = $dbConnect->retrieveUsersByUsername($username);

// Code for testing...  
// echo $checkUser[0]['Results']; exit;

         if($checkUser[0]['Results'] != 0){

            $user_error = "error";
        
          } else {

            $userId = $_GET['id'];

            $userData = array(
        
              'fname'     =>  $fname,
              'sname'     =>  $sname,
              'mname'     =>  $mname,
              'DOB'       =>  $dob,
              'POA'       =>  $address,
              'gender'    =>  $gender,
              'empStatus' =>  $empStatus,
              'email'     =>  $email,
              'status'    =>  '1',
              'username'  =>  $username,
              'phone'     =>  $phone,
              'work'      =>  $work,
              'edu'       =>  "College",
              'mobile'    =>  $mobile,
              'membership'=>  $membership
         
          );
               
                $userConfirm = $dbConnect->updateUser($userData, $userId);

                if($userConfirm){
                                
                        header('Location: sysadmin.php');
                        
                    } else {
                    
                        $server_error = "error";
                        
                    }   


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

        <h2>Manage Profile Data</h2>

<div class="row">
        <div class="col-md-6"><!-- start slipsum code -->

      <img src="assets/images/pngs/Favicon/Favicon-Black_on_Transparent.png" />
<p>The Barbados ICT Professionals Association (BIPA) is the island’s foremost professional membership organisation for individuals and corporations whose primary focus is the expansion and development of ICT opportunities in Barbados and the Caribbean region.

<!-- end slipsum code --></div>
        <div class="col-md-6">
            <!-- start slipsum code -->


<form action="" onsubmit="return userRegister()" name="registerForm" method="post">
    <div class="row">
<!-- Row SECTION defined -->
       
            <div class="col-md-12 register-right">
              
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                             
                        <h4 class="register-heading">Update Member Details</h4>
                        <br />
                       
                                <div class="row register-form">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- <label>Username</label> -->
                                        <input type="text" name="username" value="<?php echo (!empty($userData["uname"])) ? $userData["uname"] : " "; ?>" class="form-control" id="username">
                                        <div id="usernameErrorMsg"></div>
                                    </div>
                                        <div class="form-group">
                                            <input type="text" name="f_name" class="form-control" value="<?php echo(!empty($userData["fname"])) ? $userData["fname"] : " "; ?>" />
                                            <div id="fnErrorMsg"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="m_name" class="form-control" placeholder="Middle Name" value="<?php echo(!empty($userData["mname"])) ? $userData["mname"] : " "; ?>" />
                                            <div id="mnErrorMsg"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="s_name" class="form-control" placeholder="Last Name" value="<?php echo(!empty($userData["sname"])) ? $userData["sname"] : " "; ?>" />
                                            <div id="snErrorMsg"></div>
                                        </div>
                                        <div class="form-group">
                                        <small>Please use the FORMAT <b>dd/MM/YYYY</b></small>
                                            <input type="text" name="dob" class="form-control"  placeholder="Date of Birth *" value="<?php echo(!empty($userData["dob"])) ? date('d/m/Y', strtotime($userData["dob"])) : " "; ?>" />
                                            <div id="dobErrorMsg"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="address" class="form-control"  placeholder="Job Title" value="<?php echo(!empty($userData["jtit"])) ? $userData["jtit"] : " "; ?>" />
                                            <div id="addressErrorMsg"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <?php $maleCheck = "checked";  ?>
                                                <?php $femaleCheck = "";  ?>

                                                <?php 
                                                    if(!empty($userData["gender"])){ 
                                                        if($userData["gender"] == 'F'){
                                                            $femaleCheck = "checked";
                                                            $maleCheck = "";
                                                        }
                                                 } ?>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="M" <?php echo $maleCheck; ?>>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="F" <?php echo $femaleCheck; ?>>
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                   
                                <!--	<label>Email Address</label>    -->
                                    <input type="email" name="email" placeholder="Email *" value="<?php echo(!empty($userData["email"])) ? $userData["email"] : " "; ?>" class="form-control" id="email">
                                    <div id="emailErrorMsg"></div>

                                                </div>
                                                <div class="form-group">

                                        <?php
                                            $ftSelected = "";
                                            $ptSelected = "";
                                            $unSelected = "";        

                                            if(!empty($userData["empStatus"])){
                                                switch($userData["empStatus"]){
                                                    case "1":
                                                    $ftSelected = "selected = selected";         
                                                        break;
                                                    case "2":
                                                    $ptSelected = "selected = selected";         
                                                        break;
                                                    case "3":
                                                    $unSelected = "selected = selected";         
                                                        break;    
                                                }
                                            }
                                        
                                        ?>

                                            <select name="e_status" class="form-control">
                                                <option class="hidden">Employment Status</option>
                                                <option value="1" <?php echo $ftSelected; ?>>Full-Time Employment</option>
                                                <option value="2" <?php echo $ptSelected; ?>>Part-Time Employment</option>
                                                <option value="3" <?php echo $unSelected; ?>>Unemployed</option>
                                            </select>
                                            <div id="employmentErrorMsg"></div>
                                        </div>
                                        <div class="form-group">
                                        <small>Please use the FORMAT <b>(xxx)-xxx-xxxx</b></small>
                                            <input type="text" name="mobile" maxlength="15" class="form-control" placeholder="Mobile Contact *" value="<?php echo(!empty($userData["mobile"])) ? $userData["mobile"] : " "; ?>" />
                                            <div id="mobileErrorMsg"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="work" maxlength="15" class="form-control" placeholder="Work Contact" value="<?php echo(!empty($userData["phone"])) ? $userData["phone"] : " "; ?>" />
                                            <div id="mobileErrorMsg"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" maxlength="15" class="form-control" placeholder="Landline Contact" value="<?php echo(!empty($userData["work"])) ? $userData["work"] : " "; ?>" />
                                            <div id="phoneErrorMsg"></div>
                                        </div>
                                        <div class="form-group">
                                            <select name="s_question" class="form-control">
                                                <option class="hidden">Security Question</option>
                                                <option value="1">What is your Favorite Color?</option>
                                                <option value="2">What is Your old Phone Number?</option>
                                                <option value="3">What is Your Mom's Name?</option>
                                                <option value="4">What is your Pet's Name?</option>
                                            </select>

                                             <div id="sqErrorMsg"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="s_answer" class="form-control" placeholder="Enter Your Answer *" value="" />
                                            <div id="srErrorMsg"></div>
                                        </div>
                                         <!--   <input type="submit" class="btnRegister"  value="Register"/>    -->
                                    </div>
                                </div>
                            </div>
                        </div>   


        <!-- Row SECTION defined -->
    </div>

<!--
<div class="row">

<div class="col-md-12">
 <h4 class="dark-grey">Login Details</h4>
   </div>

	<div class="col-md-6">
				
			
                				
				<div class="form-group col-lg-12">
				
					<input type="email" name="email" placeholder="Email *" class="form-control" id="email">
                    <div id="emailErrorMsg"></div>
				</div>
                
				<div class="form-group col-lg-12">
				
					<input type="password" name="pwd_1" placeholder="Password *" class="form-control" id="pwd_1">
                    <div id="pwd1ErrorMsg"></div>
				</div>
				
				<div class="form-group col-lg-12">
				
					<input type="password" name="pwd_2" placeholder="Confirm Password *" class="form-control" id="pwd_2">
                    <div id="pwd2ErrorMsg"></div>
				</div>
				
				
				<div class="form-group col-lg-12">
                    <label>Membership Category</label>
                     <select name="membership" class="form-control">
                            <option class="hidden">Select</option>
                            <option value="1">Student Member</option>
                            <option value="2">Professional Member</option>
                            <option value="3">Corporate Member</option>
                        </select>
                        <div id="catErrorMsg"></div>
				</div>			
				
				<div class="col-sm-12">
					<input type="checkbox" class="checkbox" />Sign up for our newsletter
				</div>

				<div class="col-sm-12">
					<input type="checkbox" class="checkbox" />Send notifications to this email
				</div>		

			
			</div>
		
			
           
</div>
              
-->
<br/>
<br/>
<button name="submit" class="btn btn-primary">Update</button>
<button name="submit" class="btn btn-danger">Cancel</button>
 </form>
            


<script type="text/javascript">

/* Grab the textbox fields of the login form */
var username = document.forms["registerForm"]["username"];
var firstname = document.forms["registerForm"]["f_name"];
var surname = document.forms["registerForm"]["s_name"];
// var surname = document.forms["registerForm"]["m_name"];
var mobile = document.forms["registerForm"]["mobile"];
// var phone = document.forms["registerForm"]["phone"];
var dob = document.forms["registerForm"]["dob"];
var employment = document.forms["registerForm"]["e_status"];
var email = document.forms["registerForm"]["email"];
var membership = document.forms["registerForm"]["membership"];
var s_question = document.forms["registerForm"]["s_question"];
var s_answer = document.forms["registerForm"]["s_answer"];
var password = document.forms["registerForm"]["pwd_1"];
var passwordVerify = document.forms["registerForm"]["pwd_2"];

 /* Grab the hidden/empty DIVs to present error messages  */
var usernameError = document.getElementById("usernameErrorMsg");
var firstnameError = document.getElementById("fnErrorMsg");
var surnameError = document.getElementById("snErrorMsg");
var dobError = document.getElementById("dobErrorMsg");
var employmentError = document.getElementById("employmentErrorMsg");
var mobileError = document.getElementById("mobileErrorMsg");
var emailError = document.getElementById("emailErrorMsg");
var memCatError = document.getElementById("catErrorMsg");
var sqError = document.getElementById("sqErrorMsg");
var srError = document.getElementById("srErrorMsg");
var pwdError = document.getElementById("pwd1ErrorMsg");
var pwdVerifyError = document.getElementById("pwd2ErrorMsg");

/* Initialize EVENT LISTENERS */
username.addEventListener("blur", nameVerify, true);
firstname.addEventListener("blur", fnameVerify, true);
surname.addEventListener("blur", snameVerify, true);

mobile.addEventListener("blur", mobileVerify, true);
dob.addEventListener("blur", dobVerify, true);
employment.addEventListener("blur", employmentVerify, true);
email.addEventListener("blur", emailVerify, true);

membership.addEventListener("blur", memVerify, true);
s_question.addEventListener("blur", qVerify, true);
s_answer.addEventListener("blur", rVerify, true);

password.addEventListener("blur", pwdVerify, true);
passwordVerify.addEventListener("blur", pwdConfirmVerify, true);

   /* This function DEACTIVATES the error messages showcased once  */
    /* the INPUT field IS NOT BLANK! */
    function nameVerify() {
        if(username.value != ""){
            username.style.border = "0px solid #ff0000";
                usernameError.innerHTML = "";
                    return true;
        }
    }

      function fnameVerify() {
        if(firstname.value != ""){
            firstname.style.border = "0px solid #ff0000";
                firstnameError.innerHTML = "";
                    return true;
        }
    }

      function snameVerify() {
        if(surname.value != ""){
            surname.style.border = "0px solid #ff0000";
                surnameError.innerHTML = "";
                    return true;
        }
    }

     function emailVerify() {
        if(email.value != ""){
            email.style.border = "0px solid #ff0000";
              emailError.innerHTML = "";
                    return true;
        }
    }

  function dobVerify() {
        if(dob.value != ""){
            dob.style.border = "0px solid #ff0000";
              dobError.innerHTML = "";
                    return true;
        }
    }

      function mobileVerify() {
        if(mobile.value != ""){
            mobile.style.border = "0px solid #ff0000";
              mobileError.innerHTML = "";
                    return true;
        }
    }

  function employmentVerify() {
        if(employment.value != ""){
            employment.style.border = "0px solid #ff0000";
              employmentError.innerHTML = "";
                    return true;
        }
    }

    function memVerify() {
        if(membership.value != ""){
            membership.style.border = "0px solid #ff0000";
                memCatError.innerHTML = "";
                    return true;
        }
    }

function qVerify() {
        if(s_question.value != ""){
            s_question.style.border = "0px solid #ff0000";
                sqError.innerHTML = "";
                    return true;
        }
    }


function rVerify() {
        if(s_answer.value != ""){
            s_answer.style.border = "0px solid #ff0000";
                srError.innerHTML = "";
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

      function pwdConfirmVerify(){
        if(passwordVerify.value != ""){
          passwordVerify.style.border = "0px solid #ff0000";
            pwdVerifyError.innerHTML = "";
                    return true;
        }
    }


function userRegister(){
        
    if(username.value == ""){
            username.style.border = "1px solid #ff0000";
            usernameError.textContent = "Username is required!";
            usernameError.style.color = "#ff0000";
                        username.focus();
                            return false;
        }   

        if(firstname.value == ""){
            firstname.style.border = "1px solid #ff0000";
                firstnameError.textContent = "Firstname is required!";
                    firstnameError.style.color = "#ff0000";
                        firstname.focus();
                            return false;
        }

         if(surname.value == ""){
            surname.style.border = "1px solid #ff0000";
                surnameError.textContent = "Surname is required!";
                    surnameError.style.color = "#ff0000";
                        surname.focus();
                            return false;
        }

         if(email.value == ""){
            email.style.border = "1px solid #ff0000";
               emailError.textContent = "Valid email address is required!";
                  emailError.style.color = "#ff0000";
                        email.focus();
                            return false;
        }

           if(mobile.value == ""){
            mobile.style.border = "1px solid #ff0000";
               mobileError.textContent = "Valid mobile number is required!";
                  mobileError.style.color = "#ff0000";
                        mobile.focus();
                            return false;
        }

        if(dob.value == ""){
            dob.style.border = "1px solid #ff0000";
               dobError.textContent = "Valid Date of Birth is required!";
                  dobError.style.color = "#ff0000";
                        dob.focus();
                            return false;
        }

        
        if(employment.value == ""){
            employment.style.border = "1px solid #ff0000";
            employmentError.textContent = "Valid Employment status is required!";
            employmentError.style.color = "#ff0000";
            employment.focus();
                            return false;
        }
            
        if(membership.value == ""){
            membership.style.border = "1px solid #ff0000";
            memCatError.textContent = "Valid mobile number is required!";
            memCatError.style.color = "#ff0000";
            membership.focus();
                            return false;
        }


        if(s_question.value == ""){
            s_question.style.border = "1px solid #ff0000";
            sqError.textContent = "Valid mobile number is required!";
            sqError.style.color = "#ff0000";
            s_question.focus();
                            return false;
        }

        if(s_answer.value == ""){
            s_answer.style.border = "1px solid #ff0000";
            srError.textContent = "Valid mobile number is required!";
            srError.style.color = "#ff0000";
            s_answer.focus();
                            return false;
        }

        if(password.value == ""){
            password.style.border = "1px solid #ff0000";
                pwdError.textContent = "Password is required!";
                    pwdError.style.color = "#ff0000";
                        password.focus();
                            return false;
        }

        
        if(passwordVerify.value == ""){
          passwordVerify.style.border = "1px solid #ff0000";
            pwdVerifyError.textContent = "Confirmation Password is required!";
               pwdVerifyError.style.color = "#ff0000";
                   passwordVerify.focus();
                            return false;
        }

         if(passwordVerify.value != password.value){
              passwordVerify.style.border = "1px solid #ff0000";
                pwdVerifyError.textContent = "Passwords DO NOT Match!";
                    pwdVerifyError.style.color = "#ff0000";
                        passwordVerify.focus();
                            return false;
        }


    }


</script>





<!-- end slipsum code -->
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

<?php

   
/* Content rendered once the SESSION viable has been set */  
} else {

    header('Location: index.php');
      exit;

  }

?>
