<?php session_start(); ?>
<?php ob_start(); ?>

<?php include 'classes/db.php'; ?>


<?php


$serverError = "default";

if($_SESSION['id']) {

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
      <?php } else { ?>
       <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="user-profile.php">Profile</a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
       <?php if($_SESSION['role'] == "Administrator") { ?>
       <li class="nav-item">
        <a class="nav-link" href="sysadmin.php">Manage Accounts</a>
	  </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
	  </li>
	  <li class="nav-item">
        <a class="nav-link" href="scheduler.php">Schedule</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sign-out.php">Sign Out</a>
      </li> 
    </ul>
  </div>
</nav>
        </header>

<?php


   
$userConnect = new database;
$userEncrypt = new encryption;

$userData = $userConnect->fetchUserByUsername($_SESSION['username']);

if(isset($_POST['cancel'])) {  
    header('Location: user-profile.php');
    exit; }


if(isset($_POST['submit'])) {
/* Once the user SUMBITS the form, perform the following tasks. */
            

/* Extract all the elements within the $_POST super GLOBAL. */
    extract($_POST);

      /* We MUST sanitize our input fields for SECURITY purposes. */
  $fname = filter_var($tbFirstname, FILTER_SANITIZE_STRING);
  $sname = filter_var($tbSurname, FILTER_SANITIZE_STRING);
  $username = filter_var($tbUsername, FILTER_SANITIZE_STRING);
  $email = filter_var($tbEmail, FILTER_VALIDATE_EMAIL);
  $phone = filter_var($tbPhone, FILTER_SANITIZE_STRING);
  $mobile = filter_var($tbMobile, FILTER_SANITIZE_STRING);
//  $role = filter_var($ddRole, FILTER_SANITIZE_STRING);
  
$recordId = $userData[0]['id'];
  $userInput = array(
    'fname'     => $fname,
    'sname'     => $sname,
    'username'  => $username,
    'email'     => $email,
    'phone'     => $phone,
    'mobile'    => $mobile
  );
        /*    Example of a PREPARED Statements   */
            /* Improved Security */
            if(!empty($recordId)){
/*
           $query = "UPDATE members SET ";
           $query .= "f_name = '$fname', ";
           $query .= "s_name = '$sname', ";
           $query .= "username = '$username', ";
           $query .= "email = '$email', ";
           $query .= "phone = '$phone', ";
           $query .= "mobile = '$mobile' ";
           $query .= "WHERE  userid = '$recordId' ";
*/      
          $results = $userConnect->updateUserProfile($userInput, $recordId);
            // Code for testing...  
              //  print_r($query); exit;

        //   $results = mysqli_query($connection, $query);

           if($results) {
  
              header('Location: user-profile.php');
                    exit;

                } else {
                    $serverError = "error";
                }
            
    } else {
        $serverError = "error";
       }

}


} else {

  header('Location: index.php');
          exit;

}
  
?>

<div class="screen">    

<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">...secure access ONLY!</h1>
                <small>Have fun in your unique profile account <b><?php echo $_SESSION['firstname']; ?></b>...</small>
            </div>
        </div>
    </div>
</div>

 
      <div class="row">

                <div class="col-md-9">
                     <form name="editForm" onsubmit="return userUpdate()" action="" method="post">
         
                    
                <div class="form-group">
                    <h4><b>Name</b></h4>
                <label><u>First Name</u></label>
                    <input name="tbFirstname" type="text" value="<?php echo $userData[0]['fname'];  ?>" class="form-control" />
                            <div class="inputError" id="firstnameError"></div>
                <label><u>Surname</u></label>
                    <input name="tbSurname" type="text" value="<?php echo $userData[0]['sname'];  ?>" class="form-control" />
                            <div class="inputError" id="surnameError"></div>
                <label><u>Username</u></label>
                    <input name="tbUsername" type="text" value="<?php echo $userData[0]['uname'];  ?>" class="form-control" />
                            <div class="inputError" id="usernameError"></div>
                </div>
                <div class="form-group">
                    <h4><b>Contact</b></h4>
                <label><u>Phone</u></label>
                    <input name="tbPhone" type="text" value="<?php echo $userData[0]['phone'];  ?>" class="form-control" />
                            <div class="inputError" id="phoneError"></div>
                <label><u>Mobile</u></label>
                    <input name="tbMobile" type="text" value="<?php echo $userData[0]['mobile'];  ?>" class="form-control" />
                        <div class="inputError" id="mobileError"></div>
                <label><u>Email</u></label>
                    <input name="tbEmail" type="text" value="<?php echo $userData[0]['email'];  ?>" class="form-control" />
                            <div class="inputError" id="emailError"></div>
                </div>
              
                <button name="submit" class="btn btn-default">Submit</button>
                <button onClick="window.location='calendar.php';" name="cancel" class="btn btn-danger">Cancel</button>
                        <br />
                        <br />
                <h4 class="<?php echo $serverError; ?>"><b>Issues</b> - Entered password doesn't match orginal!</h4>

                        </form>
               
               </div>
      
         <div class="col-md-3">  
                  <img alt="User Pic" src="" class="img-responsive" />        
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



<?php ob_end_flush(); ?>