<?php include APPROOT . '/views/shared/header.php'; ?>

<?php include APPROOT . '/views/shared/navigation.php'; ?>

 <div class="container">
 
    <div class="screen"> 
        <div class="row"><?php flash('register_success'); ?></div>
           <div class="row"> 

            <div class="col-md-6">
           
      <img src="<?php echo URLROOT; ?>/assets/images/pngs/Favicon/Favicon-Default_Reverse_on_Ttransparent.png" />
        <h2>Welcome To the Team</h2>
        
  </div>
  <div class="col-md-6">

     <!-- <h4 class="">Issues - Username and Password are incorrect.</h4> -->
        
       <h2 class="text-center">Login Now</h2>
        <form action="" class="login-form" name="loginForm" method="post">
        <div class="form-group">
    <input type="text" id="usrCheck" name="userCheck" class="hidden" placeholder="">
        <div id="usrCheckError"></div>
  </div>
  <div class="form-group">
    <label for="email" class="text-uppercase">Email</label>
    <input type="text" value="<?php echo (!empty($data['email'])) ? $data['email'] : ''; ?>" id="email" name="email" class="form-control <?php echo (!empty($data['emailErrorMsg'])) ? 'is-invalid' : ''; ?>" placeholder="">
        <div id="usrNameErrorMsg"><?php echo (!empty($data['emailErrorMsg'])) ? $data['emailErrorMsg'] : ''; ?></div>
  </div>
  <div class="form-group">
    <label for="usr_pwd" class="text-uppercase">Password</label>
    <input type="password" id="usr_pwd" name="usrPwd" class="form-control <?php echo (!empty($data['pwdErrorMsg'])) ? 'is-invalid' : ''; ?>" placeholder="">
          <div id="pwdErrorMsg"><?php echo (!empty($data['pwdErrorMsg'])) ? $data['pwdErrorMsg'] : ''; ?></div>
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
<h4><a href="<?php echo URLROOT; ?>/users/register">Register</a> now!</h4>



        </div>
    </div>
</div>
</div>

<br />
<br />

<?php include APPROOT . '/views/shared/footer.php';  ?>

<br />
<br />