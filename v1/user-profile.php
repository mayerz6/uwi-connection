<?php session_start(); ?>
<?php ob_start(); ?>

<?php include 'classes/db.php'; ?>

<?php

if(!empty($_SESSION['username'])){

    $userConnect = new database;

  $userData = $userConnect->fetchUserByUsername($_SESSION['username'])
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
       <?php if(isset($_SESSION['role']) && $_SESSION['role'] == "Administrator") { ?>
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



<div class="screen">    

<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">Welcome to Our Team!</h1>
                <small>Have fun in your unique profile account <b><?php echo $_SESSION['firstname']; ?></b>...</small>
            </div>
        </div>
    </div>
</div>


<div class="row">
             <div class="col-md-3 col-lg-3"> 
               <img alt="User Pic" src="assets/images/thumb__ser.png" class="img-circle img-responsive" />        
                </div>

              
            <!-- Section showcasing USER profile data -->
                    <div class=" col-md-9 col-lg-9 "> 
                      <table>
                
                       <tr>
                        <td>Username:</td>
                        <td><?php echo $userData[0]['uname'];  ?></td>
                      </tr>
                      <tr>
                        <td>First Name:</td>
                        <td><?php echo $userData[0]['fname'];  ?></td>
                      </tr>
                      <tr>
                        <td>Last Name:</td>
                        <td><?php echo $userData[0]['sname'];  ?></td>
                      </tr>
                      <tr>
                        <td>Membership Level:</td>
                        <td><?php echo (!empty($userData[0]['role'])) ? $userData[0]['role'] :  " "; ?></td>
                      </tr>
                       <tr>
                        <td>Membership Status:</td>
                        <td><?php echo (!empty($userData[0]['status'])) ? $userData[0]['status'] : " " ?></td>
                      </tr>
                      
                      <tr>
                        <td>Phone:</td>
                        <td><?php echo $userData[0]['phone'];  ?></td>
                      </tr>  
                       <tr>
                        <td>Mobile:</td>
                        <td><?php echo $userData[0]['mobile'];  ?></td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><?php echo $userData[0]['email'];  ?></td>
                      </tr> 
                </table>


                     <br />
                     <br />

                  <a href="edit-profile.php" class="btn btn-primary">Edit Details</a>
                  <a href="user-scheduler.php" class="btn btn-primary">View Your Schedule</a>
              
                    </div>
                      <!-- Section showcasing USER profile data -->
 

         </div>

</div>


<?php 
    
} else {

    header('Location: index.php');
            exit;

}


?>

    <footer>&copy; Copyright UWI | All Rights Reservered</footer>
    
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>



<?php ob_end_flush(); ?>