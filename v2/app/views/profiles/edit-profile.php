<?php include APPROOT . '/views/shared/header.php'; ?>

<?php include APPROOT . '/views/shared/navigation.php'; ?>

<div class="container profile">
   
    <!-- Profile UPDATE Form -->

<div class="row">
      <div class="col-sm-3"><!--left col-->
          

  <div class="text-center">
    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
    <h6>Upload a different photo...</h6>
  <!--  <input type="file" class="text-center center-block file-upload">  -->
  </div><hr /><br>

           <!--
      <div class="panel panel-default">
        <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
        <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
      </div>
      
      
      <ul class="list-group">
        <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
        <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
        <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
        <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
        <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
      </ul> 
         
      <div class="panel panel-default">
        <div class="panel-heading">Social Media</div>
        <div class="panel-body">
            <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
        </div>
      </div>
          --> 

    </div><!--/col-3-->


    <div class="col-sm-9">
           <!-- Content to be removed -->
           <div class="row">
      <div class="col-sm-4"><h2 class="greeting"></h2></div>
      <div class="col-sm-2"><img style="height: 202px" title="profile image" class="img-circle img-responsive" src="<?php echo URLROOT; ?>/assets/images/pngs/Favicon/Favicon-Default_Reverse_on_Ttransparent.png"></div>
            </div>
         
            <hr>
              <form class="form" action="" method="post" id="registrationForm">
               
              <div class="row">
              <div class="form-group col-md-6">
                      
                      <div class="">
                          <label for="first_name"><h4>First name</h4></label>
                          <input type="text" value="<?php echo (!empty($data["fname"])) ? $data["fname"] : ''; ?>" class="form-control <?php echo (!empty($data['fnameError'])) ? 'is-invalid' : ''; ?>" name="firstname" id="first_name" placeholder="first name" title="enter your first name if any.">
                                 <span><?php echo (!empty($data['fnameError'])) ? $data['fnameError'] : ''; ?></span>
                        </div>
                  </div>
                  <div class="form-group col-md-6">
                      
                      <div class="">
                        <label for="last_name"><h4>Last name</h4></label>
                          <input type="text" value="<?php echo (!empty($data["sname"])) ? $data["sname"] : ''; ?>" class="form-control <?php echo (!empty($data['snameError'])) ? 'is-invalid' : ''; ?>" name="surname" id="last_name" placeholder="last name" title="enter your last name if any.">
                          <span><?php echo (!empty($data['snameError'])) ? $data['snameError'] : ''; ?></span>
                        </div>
                  </div>
                    </div>
                        <div class="row">
                  <div class="form-group col-md-6">
                      
                  <div class="">
                          <label for="work"><h4>Mobile</h4></label>
                          <input type="text" value="<?php echo (!empty($data["mobile"])) ? $data["mobile"] : ''; ?>" class="form-control <?php echo (!empty($data['mobileError'])) ? 'is-invalid' : ''; ?>" name="mobile" id="mobile" placeholder="Mbbile Contact Number" title="enter your mobile number if any.">
                                    <span><?php echo (!empty($data['mobileError'])) ? $data['mobileError'] : ''; ?></span>
                        </div>
                  </div>
      
                  <div class="form-group col-md-6">
                      
                
                          <label for="email"><h4>Email</h4></label>
                          <input type="email" value="<?php echo (!empty($data["email"])) ? $data["email"] : ''; ?>" class="form-control <?php echo (!empty($data['emailError'])) ? 'is-invalid' : ''; ?>" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                                    <span><?php echo (!empty($data['emailError'])) ? $data['emailError'] : ''; ?></span>
                    
                  </div>
                         </div>
                    <!--
                         <div class="row">
                  <div class="form-group col-md-6">
                      
                      <div class="">
                          <label for="work"><h4>Work</h4></label>
                          <input type="text" value="<?php // echo (!empty($data["work"])) ? $data["work"] : ''; ?>" class="form-control <?php echo (!empty($data['workError'])) ? 'is-invalid' : ''; ?>" name="work" id="work" placeholder="Work Contact Number" title="enter your phone number if any.">
                                    <span><?php // echo (!empty($data['workError'])) ? $data['workError'] : ''; ?></span>
                        </div>
                  </div>
      
                  <div class="form-group col-md-6">
                      
                
                          <label for="title"><h4>Job Title</h4></label>
                          <input type="text" value="<?php // echo (!empty($data["title"])) ? $data["title"] : ''; ?>" class="form-control <?php echo (!empty($data['titleError'])) ? 'is-invalid' : ''; ?>" name="title" id="title" placeholder="Your professional title" title="enter your email.">
                                    <span><?php // echo (!empty($data['titleError'])) ? $data['titleError'] : ''; ?></span>
                    
                  </div>
                         </div>
                                //-->

<!--
                         <div class="row">
                  <div class="form-group col-md-6">
                     
                          <label for="password"><h4>Password</h4></label>
                          <input type="password" class="form-control <?php // echo (!empty($data['pwd_1Error'])) ? 'is-invalid' : ''; ?>" name="pwd_1" id="password" placeholder="Enter your password" title="enter your password.">
                                    <span><?php // echo (!empty($data['pwd_1Error'])) ? $data['pwd_1Error'] : ''; ?></span>
                     
                  </div>
                  
                  <div class="form-group col-md-6">
                     
                        <label for="password2"><h4>Confirm Password</h4></label>
                          <input type="password" class="form-control <?php // echo (!empty($data['pwd_2Error'])) ? 'is-invalid' : ''; ?>" name="pwd_2" id="password2" placeholder="One more time..." title="enter your password2.">
                                    <span><?php // echo (!empty($data['pwd_2Error'])) ? $data['pwd_2Error'] : ''; ?></span>   
                  </div>
                    </div>

                                    -->

                  <div class="form-group">
                       <div class="col-xs-12">
                            <br>
                              <button class="btn btn-lg btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Save</button>
                               <button onclick="location.href='<?php echo URLROOT; ?>/users/dashboard'" class="btn btn-lg btn-danger" type="reset"><i class="glyphicon glyphicon-repeat"></i> Cancel</button>
                        </div>
                  </div>
              </form>
          
          <hr>
          
         


         <!-- Content to be removed -->
      
          <!-- Content to be removed -->
       
            <!-- Content to be removed -->


          
      </div><!--/tab-content-->

            <!-- Test Layout -->


    </div><!--/col-9-->


    <!-- Profile UPDATE Form -->

</div>

<?php require APPROOT . "/views/shared/footer.php"; ?>
