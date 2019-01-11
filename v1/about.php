<?php session_start(); ?>
<?php ob_start(); ?>

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

        <h2>About the Association</h2>

<div class="row">
        <div class="col-md-6"><!-- start slipsum code -->

      <img src="assets/images/pngs/Favicon/Favicon-Black_on_Transparent.png" />
<p>The Barbados ICT Professionals Association (BIPA) is the island’s foremost professional membership organisation for individuals and corporations whose primary focus is the expansion and development of ICT opportunities in Barbados and the Caribbean region.

<!-- end slipsum code --></div>
        <div class="col-md-6">
            <!-- start slipsum code -->

<p>BIPA is dedicated to providing its members with a forum in and through which they can exchange industry information, network with other members of the ICT sector, undertake advocacy activities on behalf of industry interests, and collaborate with each other to extend the scale and scope of services accessible through the Barbadian and Caribbean ICT sectors.</p>
<img height="180px"; src="assets/images/pngs/Favicon/Logo-Black_on_White.png" />
<!-- end slipsum code -->
        </div>
    </div>

</div>
        <footer>&copy; Copyright Larry Mayers | All Rights Reservered</footer>
    
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>