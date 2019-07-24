<?php include APPROOT . '/views/shared/header.php'; ?>

<?php include APPROOT . '/views/shared/navigation.php'; ?>

<div class="container profile">

<h2>Admin Access Only</h2>


<hr>
              <form class="form" action="" method="post" id="registrationForm">
               
           <div class="row">
              <div class="form-group col-md-6">
                      
                      <div class="">
                          <label for="first_name"><h4>First name</h4></label>
                          <input type="text" value="<?php echo (!empty($data[0]["f_name"])) ? $data[0]["f_name"] : ''; ?>" class="form-control <?php echo (!empty($data['fnameError'])) ? 'is-invalid' : ''; ?>" name="firstname" id="first_name" placeholder="first name" title="enter your first name if any.">
                                 <span><?php echo (!empty($data['fnameError'])) ? $data['fnameError'] : ''; ?></span>
                        </div>
                  </div>
                  <div class="form-group col-md-6">
                      
                      <div class="">
                        <label for="last_name"><h4>Last name</h4></label>
                          <input type="text" value="<?php echo (!empty($data[0]["s_name"])) ? $data[0]["s_name"] : ''; ?>" class="form-control <?php echo (!empty($data['snameError'])) ? 'is-invalid' : ''; ?>" name="surname" id="last_name" placeholder="last name" title="enter your last name if any.">
                          <span><?php echo (!empty($data['snameError'])) ? $data['snameError'] : ''; ?></span>
                        </div>
                  </div>
                    </div>


                        <div class="row">
                  <div class="form-group col-md-6">
                      
                  <div class="">
                          <label for="work"><h4>Mobile</h4></label>
                          <input type="text" value="<?php echo (!empty($data[0]["mobile"])) ? $data[0]["mobile"] : ''; ?>" class="form-control <?php echo (!empty($data['mobileError'])) ? 'is-invalid' : ''; ?>" name="mobile" id="mobile" placeholder="Mbbile Contact Number" title="enter your mobile number if any.">
                                    <span><?php echo (!empty($data['mobileError'])) ? $data['mobileError'] : ''; ?></span>
                        </div>
                  </div>
      
                  <div class="form-group col-md-6">
                      
                
                          <label for="email"><h4>Email</h4></label>
                          <input type="email" value="<?php echo (!empty($data[0]["email"])) ? $data[0]["email"] : ''; ?>" class="form-control <?php echo (!empty($data['emailError'])) ? 'is-invalid' : ''; ?>" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                                    <span><?php echo (!empty($data['emailError'])) ? $data['emailError'] : ''; ?></span>
                    
                  </div>
                         </div>
                        
                                <hr />
                                <div class="row">
                            <div class="form-group col-md-6">
                            <h4>Membership Category</h4>
                                    <br />
                                            <select name="memCat" class="form-control <?php echo (!empty($data['catErrorMsg'])) ? 'is-invalid' : ''; ?>">

                                            <?php 

                                                $selDefault = "selected=selected";
                                                $selAM = "";
                                                $selSM = "";
                                                $selPM = "";
                                                $selCM = "";

                                           //     echo "<b>Running</b>" . $data["security"];

                                                if($data[0]["cat"] != 0){

                                                    switch($data[0]["cat"]){

                                                case 1:
                                                    $selAM = "selected=selected";
                                                        break;
                                                    case 2:
                                                        $selSM = "selected=selected";
                                                            break;
                                                        case 3:
                                                            $selPM = "selected=selected";
                                                                break;
                                                            case 4:
                                                                $selCM = "selected=selected";          
                                                    }   

                                                        } else {
                                                            
                                                            $selDefault = "selected=selected";    
                                                            // echo "running" . $data["security"];
                                                                
                                                        }

                                                ?>
                                                                                            
                                                    <option value ="0" <?php echo $selDefault; ?>>Membership Category</option>
                                                    <option value="1" <?php echo $selAM; ?>>Affilitate Member</option>
                                                    <option value="2" <?php echo $selSM; ?>>Student Member</option>
                                                    <option value="3" <?php echo $selPM; ?>>Professional Member</option>
                                                    <option value="4" <?php echo $selCM; ?>>Corporate Member</option>
                                                </select>
                                                
                                                <div id="catErrorMsg"><?php echo (!empty($data['catErrorMsg'])) ? $data['catErrorMsg'] : ''; ?></div>
                                        </div>			
                                        </div>
                                        <div class="row">
                                        <div class="form-group col-md-6">
                                            <select name="memDes" class="form-control <?php echo (!empty($data['desErrorMsg'])) ? 'is-invalid' : ''; ?>">
                                                   
                                            <?php

                                                        $selDef = "selected=selected";
                                                        $selSA = "";
                                                        $selSE = "";
                                                        $selPM = "";
                                                        $selWD = "";
                                                        $selSocial = "";
                                                        $selGD = "";
                                                        $selO = "";

                                                        //     echo "<b>Running</b>" . $data["security"];

                                                        if($data[0]["des"] != 0){

                                                            switch($data[0]["des"]){

                                                        case 1:
                                                            $selSA = "selected=selected";
                                                                break;
                                                            case 2:
                                                                $selSE = "selected=selected";
                                                                    break;
                                                                case 3:
                                                                    $selPM = "selected=selected";
                                                                        break;    
                                                                case 4:
                                                                    $selWD = "selected=selected";
                                                                        break;
                                                                    case 5:
                                                                        $selSocial = "selected=selected";   
                                                                        break;
                                                                    case 6:
                                                                        $selGD = "selected=selected";
                                                                        break;
                                                                    case 7:
                                                                            $selO = "selected=selected";
                                                                            break;
                                                                           
                                                            }   

                                                                } else {
                                                                    
                                                                    $selDef = "selected=selected";    
                                                                    // echo "running" . $data["security"];
                                                                        
                                                                }

                                                        ?>
                                                                                                                
                                                                                                                <option value="0" <?php echo $selDef; ?>>ICT Designation</option>
                                                    <option value="1" <?php echo $selSA; ?>>IT Systems Admin</option>
                                                    <option value="2" <?php echo $selSE; ?>>IT Systems Security</option>
                                                    <option value="3" <?php echo $selPM; ?>>IT Project Manager</option>
                                                    <option value="4" <?php echo $selWD; ?>>Web/Applications Developer</option>
                                                    <option value="5" <?php echo $selSocial; ?>>Social Media Manager</option>
                                                    <option value="6" <?php echo $selGD; ?>>Graphic Designer</option>
                                                    <option value="7" <?php echo $selO; ?>>Other</option>
                                                    
                                                </select>
                                                <div id="desErrorMsg"><?php echo (!empty($data['desErrorMsg'])) ? $data['desErrorMsg'] : ''; ?></div>
                                        </div>	
                                        </div>                              

                         <div class="row">
                 
                  
                  <div class="form-group col-md-6">
                                  <h4>Membership Status</h4>
                                <!-- Rounded toggle switch -->
                                <label class="switch">
                                <input type="checkbox" <?php if($data[0]["status"] == 1) { echo 'checked="checked"'; } ?> name="memStatus" data-toggle="toggle" data-on="Ready" data-off="Not Ready" >
                                <span class="slider round"></span>
                                </label>
                            
                  </div>
                  <div class="form-group col-md-6">
                     
                        
                     </div>
                    </div>
                  <div class="form-group">
                       <div class="col-xs-12">
                            <br>
                              <button class="btn btn-lg btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Save</button>
                               <button onclick="location.href='<?php echo URLROOT; ?>/manage/profile'" class="btn btn-lg btn-danger" type="reset"><i class="glyphicon glyphicon-repeat"></i> Cancel</button>
                        </div>
                  </div>
              </form>
          
          <hr />

<hr />
    <!-- Profile UPDATE Form -->

    </div>

<?php require APPROOT . "/views/shared/footer.php"; ?>
