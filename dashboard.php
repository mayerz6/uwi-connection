<?php session_start(); ?>
<?php ob_start(); ?>

<?php include 'classes/db.php'; ?>

    <?php

if($_SESSION){


$userConnect = new database;


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


<div class="screen"> 
 	<div class="row">

<!-- Definition of the PRIMARY column of content. -->
<div class="col-md-10">

		<h2 class="dark-grey">News &amp; Events</h2>
				
<div class="small-top">
    <div class="container">
        <div class="row">

			<div class="col-md-12">
				<div id="Date"><?php /* Must display Current Day of the week and Date. */ ?></div>
			</div>
  
	    </div>
     </div>
</div>
<div class="top-head left">
    		<div class="container">
            	<div class="row">
       				 <div class="col-md-12">
						<small>Get the latest News</small>
			  		</div>
      			</div>
          </div>
  </div>
	
	  


<section class="banner-sec">
        <div class="container">
    		<div class="row">
            	<div class="col-md-6">
        		<div class="card"> <img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/politics.jpg" alt="">
                <div class="card-img-overlay"> <span class="badge badge-pill badge-danger">News</span> </div>
                <div class="card-body">
            <div class="news-title">
            <h2 class=" title-small"><a href="#">Syria war: Why the battle for Aleppo matters</a></h2>
                  </div>
            <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
          </div>
              </div>
        <div class="card"> <img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/travel.jpg" alt="">
                <div class="card-img-overlay"> <span class="badge badge-pill badge-danger">Politics</span> </div>
                <div class="card-body">
            <div class="news-title">
                    <h2 class=" title-small"><a href="#">Key Republicans sign letter warning against</a></h2>
                  </div>
            <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
          </div>
              </div>
      </div>
            <div class="col-md-6">
        <div class="card"> <img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/business1.jpg" alt="">
                <div class="card-img-overlay"> <span class="badge badge-pill badge-danger">Travel</span> </div>
                <div class="card-body">
            <div class="news-title">
                    <h2 class=" title-small"><a href="#">Obamacare Appears to Be Making People Healthier</a></h2>
                  </div>
            <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
          </div>
              </div>
        <div class="card"> <img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/food.jpg" alt="">
                <div class="card-img-overlay"> <span class="badge badge-pill badge-danger">News</span> </div>
                <div class="card-body">
            <div class="news-title">
                    <h2 class=" title-small"><a href="#">‘S.N.L.’ to Lose Two Longtime Cast Members</a></h2>
                  </div>
            <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
          </div>
              </div>
      </div>
            <div class="col-md-12 top-slider">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
                <!-- Indicators -->
                <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>
                
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                    <div class="news-block">
                <div class="news-media"><img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/politics1.jpg" alt=""></div>
                <div class="news-title">
                        <h2 class=" title-large"><a href="#">Ray madison may struggle to get best from Paul in a 4-2-3-1 formation</a></h2>
                      </div>
                <div class="news-des">Condimentum ultrices mi est a arcu at cum a elementum per cum turpis dui vulputate vestibulum in vehicula montes vel. Mauris nam suspendisse consectetur mus...</div>
                <div class="time-text"><strong>2h ago</strong></div>
                <div></div>
              </div>
                  </div>
            <div class="carousel-item">
                    <div class="news-block">
                <div class="news-media"><img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/sport1.jpg" alt=""></div>
                <div class="news-title">
                        <h2 class=" title-large"><a href="#">An Alternative Form of Mental Health Care Gains a Foothold</a></h2>
                      </div>
                <div class="news-des">Condimentum ultrices mi est a arcu at cum a elementum per cum turpis dui vulputate vestibulum in vehicula montes vel. Mauris nam suspendisse consectetur mus...</div>
                <div class="time-text"><strong>2h ago</strong></div>
                <div></div>
              </div>
                  </div>
            <div class="carousel-item">
                    <div class="news-block">
                <div class="news-media"><img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/health.jpg" alt=""></div>
                <div class="news-title">
                        <h2 class=" title-large"><a href="#">Key Republican Senator Says She Will Not Vote for former president!</a></h2>
                      </div>
                <div class="news-des">Condimentum ultrices mi est a arcu at cum a elementum per cum turpis dui vulputate vestibulum in vehicula montes vel. Mauris nam suspendisse consectetur mus...</div>
                <div class="time-text"><strong>2h ago</strong></div>
                <div></div>
              </div>
                  </div>
          </div>
              </div>
      </div>
          </div>
  </div>
</section>
	  
<section class="section-01">
        <div class="container">
    <div class="row">
            <div class="col-md-12">
		<h3 class="heading-large">Politics</h3>
			</div>
		</div>
		
		<div class="row">
                <div class="col-lg-6 card">
            <div class="card"> <img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/war.jpg" alt="">
                    <div class="card-body">
                <div class="news-title"><a href="#">
                  <h2 class=" title-small">Minorities Suffer From Unequal Pain Treatment</h2>
                  </a></div>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
              </div>
                  </div>
          </div>
                <div class="col-lg-6 card">
            <div class="card"> <img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/politics.jpg" alt="">
                    <div class="card-body">
                <div class="news-title"><a href="#">
                  <h2 class=" title-small">Minorities Suffer From Unequal Pain Treatment</h2>
                  </a></div>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
              </div>
                  </div>
          </div>
                <div class="col-lg-6 card">
            <div class="card"> <img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/movie.jpg" alt="">
                    <div class="card-body">
                <div class="news-title"><a href="#">
                  <h2 class=" title-small">Minorities Suffer From Unequal Pain Treatment</h2>
                  </a></div>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
              </div>
                  </div>
          </div>
                <div class="col-lg-6 card">
            <div class="card"> <img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/travel1.jpg" alt="">
                    <div class="card-body">
                <div class="news-title"><a href="#">
                  <h2 class=" title-small">Minorities Suffer From Unequal Pain Treatment</h2>
                  </a></div>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
              </div>
                </div>
          </div>
        </div>
      </div>
          
  
</section>
      
</div>
		
			<div class="col-md-2">
				<h6 class="dark-grey">BIPA Notifications</h6>
				<img width="96px" src="assets/images/pngs/Favicon/Favicon-Default_Reverse_on_Ttransparent.png" />
			
            </div>
            
</div>


</div>

<?php

} else {

    header('Location: index.php');
            exit;

}

?>


        <footer>&copy; Copyright Larry Mayers | All Rights Reservered</footer>
    
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>