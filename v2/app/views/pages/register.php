<?php include APPROOT . '/views/shared/header.php'; ?>

<?php include APPROOT . '/views/shared/navigation.php'; ?>

<div class="screen"> 

<br />
<br />

<form action="" name="registerForm" method="post">
    <div class="row">
<!-- Row SECTION defined -->
            <div class="col-md-12 register-right">
              
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                             
                        <h2 class="register-heading">Membership Registration</h2>
                        <br />
                      <?php // print_r($data); ?>
                                <div class="row register-form">
                                      <div class="col-md-12">
                                         <h4 class="dark-grey">User Details</h4>
                                      </div>

                                    <div class="col-md-6">
                                  
                                        <div class="form-group">
                                            <input type="text" name="f_name" class="form-control <?php echo (!empty($data['fnErrorMsg'])) ? 'is-invalid' : ''; ?>" placeholder="First Name" value="<?php echo (!empty($data['f_name'])) ? $data['f_name'] : ''; ?>" />
                                            <div id="fnErrorMsg"><?php echo (!empty($data['fnErrorMsg'])) ? $data['fnErrorMsg'] : ''; ?></div>
                                        </div>
                                   
                                        <div class="form-group">
                                            <input type="text" name="s_name" class="form-control <?php echo (!empty($data['snErrorMsg'])) ? 'is-invalid' : ''; ?>" placeholder="Last Name" value="<?php echo (!empty($data['s_name'])) ? $data['s_name'] : ''; ?>" />
                                            <div id="snErrorMsg"><?php echo (!empty($data['snErrorMsg'])) ? $data['snErrorMsg'] : ''; ?></div>
                                        </div>
                                      
                                        <div class="form-group">
                                            <select name="memCat" class="form-control <?php echo (!empty($data['catErrorMsg'])) ? 'is-invalid' : ''; ?>">

                                            <?php 

                                                $selDefault = "selected=selected";
                                                $selAM = "";
                                                $selSM = "";
                                                $selPM = "";
                                                $selCM = "";

                                           //     echo "<b>Running</b>" . $data["security"];

                                                if($data["memCat"] != 0){

                                                    switch($data["memCat"]){

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
                
                                        <div class="form-group">
                                            <select name="memDes" class="form-control <?php echo (!empty($data['desErrorMsg'])) ? 'is-invalid' : ''; ?>">
                                                   
                                            <?php

                                                        $selDef = "selected=selected";
                                                        $selSA = "";
                                                        $selSE = "";
                                                        $selWD = "";
                                                        $selSocial = "";
                                                        $selGD = "";
                                                        $selO = "";

                                                        //     echo "<b>Running</b>" . $data["security"];

                                                        if($data["memDes"] != 0){

                                                            switch($data["memDes"]){

                                                        case 1:
                                                            $selSA = "selected=selected";
                                                                break;
                                                            case 2:
                                                                $selSE = "selected=selected";
                                                                    break;
                                                                case 3:
                                                                    $selWD = "selected=selected";
                                                                        break;
                                                                    case 4:
                                                                        $selSocial = "selected=selected";   
                                                                        break;
                                                                    case 5:
                                                                        $selGD = "selected=selected";
                                                                        break;
                                                                    case 6:
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
                                                    <option value="3" <?php echo $selWD; ?>>Web/Applications Developer</option>
                                                    <option value="4" <?php echo $selSocial; ?>>Social Media Manager</option>
                                                    <option value="5" <?php echo $selGD; ?>>Graphic Designer</option>
                                                    <option value="6" <?php echo $selO; ?>>Other</option>
                                                </select>
                                                <div id="desErrorMsg"><?php echo (!empty($data['desErrorMsg'])) ? $data['desErrorMsg'] : ''; ?></div>
                                        </div>	
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="M" checked>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="F">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    
                                        <div class="form-group">
                                            <input type="text" name="mobile" maxlength="15" class="form-control <?php echo (!empty($data['mobileErrorMsg'])) ? 'is-invalid' : ''; ?>" placeholder="Mobile Contact" value="<?php echo (!empty($data['mobile'])) ? $data['mobile'] : ''; ?>" />
                                                <div id="mobileErrorMsg"><?php echo (!empty($data['mobileErrorMsg'])) ? $data['mobileErrorMsg'] : ''; ?></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="work" maxlength="15" class="form-control <?php echo (!empty($data['workErrorMsg'])) ? 'is-invalid' : ''; ?>" placeholder="Work Contact" value="<?php echo (!empty($data['work'])) ? $data['work'] : ''; ?>" />
                                            <div id="workErrorMsg"><?php echo (!empty($data['workErrorMsg'])) ? $data['workErrorMsg'] : ''; ?></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" maxlength="15" class="form-control <?php echo (!empty($data['phoneErrorMsg'])) ? 'is-invalid' : ''; ?>" placeholder="Landline Contact" value="<?php echo (!empty($data['phone'])) ? $data['phone'] : ''; ?>" />
                                            <div id="phoneErrorMsg"><?php echo (!empty($data['phoneErrorMsg'])) ? $data['phoneErrorMsg'] : ''; ?></div>
                                        </div>
                                        <small>Please use the FORMAT <b>(xxx)-xxx-xxxx</b></small>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>   


        <!-- Row SECTION defined -->
    </div>


    
<div class="row">

<div class="col-md-12">
 <h4 class="dark-grey">Login Details</h4>
   </div>

	<div class="col-md-6">
							
				<div class="form-group col-lg-12">
				<!--	<label>Email Address</label>    -->
					<input type="email" name="email" value="<?php echo (!empty($data['email'])) ? $data['email'] : ''; ?>" placeholder="Email *" class="form-control <?php echo (!empty($data['emailErrorMsg'])) ? 'is-invalid' : ''; ?>" id="email">
                    <div id="emailErrorMsg"><?php echo (!empty($data['emailErrorMsg'])) ? $data['emailErrorMsg'] : ''; ?></div>
				</div>
                
				<div class="form-group col-lg-12">
				<!--	<label>Password</label>     -->
					<input type="password" name="pwd_1" placeholder="Password *" class="form-control <?php echo (!empty($data['pwd1ErrorMsg'])) ? 'is-invalid' : ''; ?>" id="pwd_1">
                    <div id="pwd1ErrorMsg"><?php echo (!empty($data['pwd1ErrorMsg'])) ? $data['pwd1ErrorMsg'] : ''; ?></div>
				</div>
				
				<div class="form-group col-lg-12">
				<!--	<label>Repeat Password</label>  -->
					<input type="password" name="pwd_2" placeholder="Confirm Password *" class="form-control <?php echo (!empty($data['pwd2ErrorMsg'])) ? 'is-invalid' : ''; ?>" id="pwd_2">
                    <div id="pwd2ErrorMsg"><?php echo (!empty($data['pwd2ErrorMsg'])) ? $data['pwd2ErrorMsg'] : ''; ?></div>
				</div>
				
				
			
				<div class="col-sm-12">
                    <?php
                    /* Manages and records user's interaction with the checkbox fields. */
                        if(empty($data["newsCheck"])){ $data["newsCheck"] = 'unchecked'; }
                        if(empty($data["emailCheck"])){ $data["emailCheck"] = 'unchecked'; }
                        if(empty($data["checkConsent"])){ $data["checkConsent"] = 'unchecked'; }
                    ?>
                
                    <input name ="newsCheck" <?php echo ($data['newsCheck'] == "checked") ? 'checked="checked"' : ''; ?> type="checkbox" class="checkbox" />&nbsp;&nbsp;&nbsp;Sign up for our newsletter
				</div>

				<div class="col-sm-12">
                    <input name="emailCheck" <?php echo ($data['emailCheck'] == "checked") ? 'checked="checked"' : ''; ?> type="checkbox" class="checkbox" />&nbsp;&nbsp;&nbsp;Send notifications to this email
    				</div>		

			
			</div>
		
			<div class="col-md-6">
				<h3 class="dark-grey">Terms &amp; Conditions</h3>
                <p>
                The Barbados ICT Professionals' Association takes privacy and data protection very seriously.  Your 
            personal information will only be used in the administration of your BIPA membership account in order to 
        provide the services you have requested from the association.</p>
                <p>
					By clicking <b>"Register"</b> you agree to the Associations's Code of Conduct for acting as a member of the Barbados ICT Professionals' Association.
				</p>
				<p>
                This Code governs your personal conduct as an individual member of BIPA and not the nature of business or ethics of the relevant authority.  Any breach of the Code of Conduct brought to the attention of the Association 
                will be considered under the Association’s disciplinary procedures.</p>
                
				
                
                <p>If you consent to the association storing your details for the purpuse of adding value to you
                    as a member of the association please confirm below;
                </p>
                <div class="col-sm-12">
					<input name="checkConsent" <?php echo ($data['checkConsent'] == "checked") ? 'checked="checked"' : ''; ?> value="confirmed" type="checkbox" class="checkbox <?php echo (!empty($data['consentErrorMsg'])) ? 'is-invalid' : ''; ?>" />&nbsp;&nbsp;&nbsp;I consent to these TERMS &amp; Conditions
                        <div id="consentErrorMsg"><?php echo (!empty($data['consentErrorMsg'])) ? $data['consentErrorMsg'] : ''; ?></div>
                </div>
                <br />
                <button name="submit" class="btn btn-primary">Register</button>
            </div>
           
</div>

 </form>
            
</div>

<br />
<br />

<?php include APPROOT . '/views/shared/footer.php';  ?>

<br />
<br />