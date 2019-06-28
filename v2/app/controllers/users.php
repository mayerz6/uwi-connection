<?php

class Users extends Controller{

    public $userModel;

    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function index(){
      //  echo "Running!!!";
    }

    public function dashboard(){
        $this->view('users/dashboard');
    }

    public function register(){

            /* Once the user SUBMITS form input, execute the following code. */
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                extract($_POST);

                $f_name = trim($f_name);
                $s_name = trim($s_name);
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                $email = trim($email);
                

                if(empty($checkConsent)){
                    $checkConsent = 'unchecked';
                } 

                if(empty($newsCheck)){
                    $newsCheck = 'unchecked';
                } else {
                    $newsCheck = 'checked';
                }
                
                if(empty($emailCheck)){
                    $emailCheck = 'unchecked';
                } else {
                    $emailCheck = 'checked';
                }
                
                     // Present the web form for user interaction.
                     $data = [
                        'f_name' => $f_name,
                        'fnErrorMsg' => '',
                        's_name' => $s_name,
                        'snErrorMsg' => '',
                        'memCat' => $memCat,
                        'catErrorMsg' => '',
                        'memDes' => $memDes,
                        'desErrorMsg' => '',
                        'gender' => $gender,
                        'mobile' => $mobile,
                        'mobileErrorMsg' => '',
                        'work' => $work,
                        'workErrorMsg' => '',
                        'phone' => $phone,
                        'phoneErrorMsg' => '',
                        'email' => $email,
                        'emailErrorMsg' => '',
                        'newsCheck' => $newsCheck,
                        'emailCheck' => $emailCheck,
                        'checkConsent' => $checkConsent,
                        'consentErrorMsg' => '',
                        'pwd_1' => $pwd_1,
                        'pwd1ErrorMsg' => '',
                        'pwd_2' => $pwd_2,
                        'pwd2ErrorMsg' => ''
                    ];   

            
                    /* Validation of the user's input for their FIRSTNAME. */
            if(empty($data["f_name"])){
                $data['fnErrorMsg'] = 'Blank firstnames aren\'t allowed...';
            }
            if(empty($data["s_name"])){
                $data["snErrorMsg"] = 'Blank security questions are\'t allowed...';
            }
            /* Validation of the user's input for their FIRSTNAME. */
            if(empty($data["email"])){
                $data['emailErrorMsg'] = 'Blank email addresses aren\'t allowed...';
            }
            /* Validation of the user's input for their FIRSTNAME. */
            if($data["memCat"] == 0){
                $data['catErrorMsg'] = 'Please select a membership category from the list.';
            }
            /* Validation of the user's input for their FIRSTNAME. */
            if($data["memDes"] == 0){
                $data['desErrorMsg'] = 'Please select an ICT denomination which describes you best.';
            }
            if(!empty($checkConsent) && $checkConsent != 'confirmed'){
                $data['consentErrorMsg'] = "You must consent to the terms of memberships if you wish to register.";
            }else if(!empty($checkConsent) && $checkConsent == 'confirmed'){
                $data['checkConsent'] = 'checked';
            }
             /* Validation of the user's input for their FIRSTNAME. */
            if(empty($data["mobile"])){
                $data['mobileErrorMsg'] = 'Blank contact numbers aren\'t allowed...';
            }
            if(empty($data["pwd_1"])){
                $data["pwd1ErrorMsg"] = 'Blank user passwords aren\'t allowed...';
            } else {
                if(strlen($data["pwd_1"]) < 6){
                    $data["pwd1ErrorMsg"] = 'Passwords MUST be at least (7) characters in length...';
                } else if($data["pwd_1"] != $data["pwd_2"]){
                    $data["pwd1ErrorMsg"] = 'Your confirmation password doesn\'t match...';
                }
            }            
              /* Validation of the user's input for their FIRSTNAME. */
              if(empty($data["pwd_2"])){
                $data['pwd2ErrorMsg'] = '...Blank confirmation passwords aren\'t allowed';
            } 

            if(empty($data["fnErrorMsg"]) && empty($data["snErrorMsg"]) && empty($data["catErrorMsg"]) && empty($data["desErrorMsg"]) && empty($data["emailErrorMsg"]) && empty($data["pwd1ErrorMsg"]) && empty($data["pwd2ErrorMsg"]) && empty($data["mobileErrorMsg"]) && empty($data["consentErrorMsg"])){
            
                $userEncrypt = new encryption;

                        $pwdEncrypt = $userEncrypt->hashPwd($data["pwd_1"]);    
                        $usrSalt = $userEncrypt->generateSalt();

                        $txt = $pwdEncrypt . "" . $usrSalt;
                            $usrPwdHash = $userEncrypt->hashPwd($txt);

                            $data["pwd_1"] = $usrPwdHash;
                            $data["salt"] = $usrSalt;
                       
                         $to = date('Y-m-d H:i:s');
                         //   $ny = date('Y-m-d H:i:s', strtotime($to. ' + 365 days'));

                            $data["ad"] = "";
                            $data["rd"] = "";
                            $data["app_d"] = $to;

                      $auth = $this->userModel->addRecord($data);

                            if($auth){
                         flash('register_success', 'You are registered and can now log in.');
                           //  header('Location: '. URLROOT . '/pages/login-success');
                             redirect('login-success');  
                            } else {
                                echo "Failed to add user data!";
                                    exit();
                            }
                       
               
               /* $this->view('pages/login-success');   */
            } else {

                $this->view('pages/register', $data);

                }

                
        
            } else {

                 // Present the web form for user interaction.
                $data = [
                    'f_name' => '',
                    'fnErrorMsg' => '',
                    's_name' => '',
                    'snErrorMsg' => '',
                    'memCat' => '',
                    'catErrorMsg' => '',
                    'memDes' => '',
                    'desErrorMsg' => '',
                    'gender' => '',
                    'mobile' => '',
                    'mobileErrorMsg' => '',
                    'work' => '',
                    'workErrorMsg' => '',
                    'phone' => '',
                    'phoneErrorMsg' => '',
                    'email' => '',
                    'emailErrorMsg' => '',
                    'newsCheck' => '',
                    'emailCheck' => '',
                    'checkConsent' => '',
                    'consentErrorMsg' => '',
                    'pwd_1' => '',
                    'pwd1ErrorMsg' => '',
                    'pwd_2' => '',
                    'pwd2ErrorMsg' => ''
                ];

                $this->view('pages/register');
    
            }
        }
}