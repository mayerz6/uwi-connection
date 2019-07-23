<?php ?>

<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
     
     
  
      <?php if(isset($_SESSION['userId'])) { ?>

        <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/dashboard">Dashboard <span class="sr-only">(current)</span></a>
      </li>

     <!--   
       <li class="nav-item">
        <a class="nav-link" href="scheduler.php">Schedule</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo URLROOT; ?>/profile">Profile</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo URLROOT; ?>/profile">Job Board</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo URLROOT; ?>/profile">News</a>
      </li>
      -->

      <li class="nav-item ">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
      </li>

     <?php } else { ?>
      
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>/">Home <span class="sr-only">(current)</span></a>
      </li>
  

      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
      </li>

     <?php } ?>
    </ul>
  </div>
</nav>
        </header>