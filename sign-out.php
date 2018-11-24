<?php session_start(); ?>
<?php ob_start(); ?>

<?php  include 'classes/db.php';  ?>


 <?php 

$response = "default";
$response_error = "default";
$server_error = "default";
$user_error = "default";

if($_SESSION){ 

  
?>
   

<!DOCTYPE html>
<html lang="en">

	<head>
	
     <meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		<meta name="theme-color" content="#000000">
	
        <link rel="icon" href="favicon.png">

<title>UWI Connection</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/styles.css" >



    </head>

    <body>						
    			 <!--  Site Navigation  -->
                 <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registration.php">Registration</a>
      </li>
    </ul>
  </div>
</nav>
        </header>

    	  <!--  End of Site Navigation  -->
   


<?php  session_unset(); ?>
    <?php  session_destroy(); ?>


<div class="screen"> 

 <div class="jumbotron">
            <h2>Manage Your Schedule Here</h2>
            <p>...secure access ONLY!</p>
            </div>



  <div class="row">
        <div class="container">

            <h4>Till next time...</h4>

               <p class="text">

                    <b>Actions: &nbsp;</b><a href="calendar.php">View Our Calendar</a></b>
                    &nbsp;|&nbsp; <b><a href="index.php">Log In</a></b>
               
                </p>

            <br />
            <br />

            <div class="row">
                <div class="col-md-6">
              <!--      Running on the LEFT     -->
        
                   
                    <img class="logout-banner" src="assets/images/calendar.png" />
                    <br />
                    <br />
                      <p><a href="index.php"><b>Register</b></a> Now!</p>
                </div>
                
                <div class="col-md-6 section-line">
                 <!--   Running on the RIGHT     -->
                    <h4>Manage Your Day Effectively!</h4>
                    <p>Staying productive was never this easy...</p>
                    <br />
                <!-- <img class="logout-banner" src="../Assets/calendar.png" /> -->
                    <br />
                    <br />
                    
                <p>View the latest schedule <a href="calendar.php"><b>here</b></a>.</p>

                </div>
            </div>


            </div>
       </div>


</div>


        
<footer>&copy; Copyright UWI | All Rights Reservered</footer>
    
    </body>
    

<?php

} else {

	header('Location: index.php');
	  exit;
  
  }

?>


 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</html>



<?php ob_end_flush(); ?>

