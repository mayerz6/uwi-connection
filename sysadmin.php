<?php session_start(); ?>
<?php ob_start(); ?>

<?php include 'classes/db.php'; ?>

<?php if($_SESSION['role'] == "Administrator"){ ?>


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
	<div class="col-md-8">
				
                <h3 class="dark-grey">Manage Accounts</h3>
		
                <!-- User Accounts TABLE  -->
                   <table class="table">
                        <thead class="thead-dark">
                            <tr>
                              <th scope="col">First</th>
                              <th scope="col">Last</th>
                              <th scope="col">Email</th>
                              <th colspan="2" scope="col-2">Manage</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php  $usrConnect = new database; ?>
                        
                        <?php $usrConnect->displayAllUsers(); ?>
                          </tbody>
                      </table>                           
                <!--  User Accounts TABLE   -->
          
          </div>

          <div class="col-md-4">
                <h3 class="dark-grey">Terms and Conditions</h3>
                <p>
                        By clicking on "Register" you agree to The Company's' Terms and Conditions
                </p>
                <p>
                        While rare, prices are subject to change based on exchange rate fluctuations - 
                        should such a fluctuation happen, we may request an additional payment. You have the option to request a full refund or to pay the new price. (Paragraph 13.5.8)
                </p>
                <p>
                        Should there be an error in the description or pricing of a product, we will provide you with a full refund (Paragraph 13.5.6)
                </p>
                <p>
                        Acceptance of an order by us is dependent on our suppliers ability to provide the product. (Paragraph 13.5.6)
                </p>
                
              
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