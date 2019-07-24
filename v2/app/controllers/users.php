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

        if(self::isLoggedIn()){

            
            $recData = $this->userModel->fetchUserData($_SESSION['userId']);

             // Present the web form for user interaction.
             $data = [
                'f_name' => $recData[0]['f_name'],
                's_name' => $recData[0]['s_name'],
                'memCat' => $recData[0]['cat'],
                'memDes' => $recData[0]['des'],
                'gender' => $recData[0]['gender'],
                'mobile' => $recData[0]['mobile'],
                'work' => $recData[0]['work'],
                'phone' => $recData[0]['phone'],
                'email' => $recData[0]['email'],
                'status' => $recData[0]['status'],
                'app_date' => $recData[0]['app'],
                'admit'  => $recData[0]['admit'],
                'resign' => $recData[0]['resign']
            ];   

            switch($data['memDes']){

                case 1:
                    $data['memDes'] = "IT Systems Administrator";
                        break;
                case 2:
                    $data['memDes'] = "IT Systems Security";
                        break;
                case 3:
                    $data['memDes'] = "IT Project Manager";
                        break;
                case 4:
                    $data['memDes'] = "Web/Applications Developer";
                        break;
                case 5:
                    $data['memDes'] = "Social Media Manager";
                        break;
                case 6:
                    $data['memDes'] = "Graphic Designer";
                        break;                    
                case 7:
                    $data['memDes'] = "Modern Designation";
                            break;                           

            }
    
            switch($data['memCat']){

                case 1:
                    $data['memCat'] = "Affilitate Member";
                        break;
                case 2:
                    $data['memCat'] = "Student Member";
                        break;
                case 3:
                    $data['memCat'] = "Professional Member";
                        break;
                case 4:
                    $data['memCat'] = "Corporate Member";
                        break;                  

            }


            $this->view('users/dashboard', $data);

        } else {
            header('Location: '. URLROOT);
          //  $this->view('pages/index');
        }

      
    }

    public function edit(){

        if(self::isLoggedIn()){

              /* If the user SUBMITS the form, execute the following. */
           if($_SERVER['REQUEST_METHOD'] == 'POST'){

            /* User input delivered via the web form is SANITIZED before being processed. */
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            extract($_POST);
            /* Validation of user input can take place here. */

            /* Validation of user input can take place here. */
            $firstname = trim($firstname);
            $surname = trim($surname);
            $mobile = trim($mobile);
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            $email = trim($email);
                       
            /* Store user input into array for validation. */
            $data = [
                'id' => $_SESSION["userId"],
                'fname' => $firstname,
                'fnameError' => '',
                'sname' => $surname,
                'snameError' => '',
                'email' => $email,
                'emailError' => '',
                'mobile' => $mobile,
                'mobileError' => ''
            //    'pwd_1' => $pwd_1,
            //    'pwd_1Error' => '',
            //    'pwd_2' => $pwd_2,
             //   'pwd_2Error' => '',  
             //   'salt' => ''
            ];

              /* Validation of the user's input for their FIRSTNAME. */
      if(empty($data["fname"])){
        $data['fnameError'] = 'Blank firstnames aren\'t allowed...';
            }
        /* Validation of the user's input for their FIRSTNAME. */
        if(empty($data["sname"])){
            $data['snameError'] = 'Blank surnames aren\'t allowed...';
        }
        /* Validation of the user's input for their FIRSTNAME. */
        if(empty($data["email"])){
            $data['emailError'] = 'Blank email addresses aren\'t allowed...';
        } 
        /* Validation of the user's input for their FIRSTNAME. */
        if(empty($data["mobile"])){
            $data['mobileError'] = 'Blank contact numbers aren\'t allowed...';
        }
      
        /*
        if(empty($data["pwd_1"])){
            $data['pwd_1Error'] = 'Blank user passwords aren\'t allowed...';     
        } else {
            if (strlen($data['pwd_1']) < 6){
                $data['pwd_1Error'] = 'Passwords MUST be at least (7) characters in length...';
            } else if($data["pwd_1"] != $data["pwd_2"]){
                $data['pwd_1Error'] = 'Your confirmation password doesn\'t match...';
            }
        }
        */

         /* Validation of the user's input for their FIRSTNAME. */
      /*   if(empty($data["pwd_2"])){
            $data['pwd_2Error'] = '...Blank confirmation passwords aren\'t allowed';
        } else {
                if($data["pwd_1"] != $data["pwd_2"]){
                    $data['pwd_2Error'] = 'Confirmation password doesn\'t match...';
                }
        }
        */

        if(empty($data["fnameError"]) && empty($data["snameError"]) && empty($data["emailError"]) && empty($data["mobileError"])/* && empty($data["pwd_1Error"]) && empty($data["pwd_2Error"]) */ ){
        
            /* 

            $userEncrypt = new encryption;
            $pwdEncrypt = $userEncrypt->hashPwd($data["pwd_1"]);    
            $usrSalt = $userEncrypt->generateSalt();

            $txt = $pwdEncrypt . "" . $usrSalt;
                $usrPwdHash = $userEncrypt->hashPwd($txt);

                $data["pwd_1"] = $usrPwdHash;
                $data["salt"] = $usrSalt;
                
        */

                 //   print_r($data);
                   //     exit();
                
                $auth = $this->userModel->editRecord($data);

                if($auth){
            flash('update_success', 'You account was updated successfully!');
                 header('Location: '. URLROOT . '/users/dashboard');
                 // $this->view('users/login');  
                } else {
                    echo "Failed to add user data!";
                        exit();
                }

        
        } else {
            
            $this->view('profiles/edit-profile', $data);

        }

           } else {

           
   /* Functionality happening before user SUBMITS form. */
   $id = $_SESSION["userId"];
            
   $userData = $this->userModel->fetchUserData($id);
     //  print_r($userData);
       //        exit();
   if(!empty($userData)){
        /* If FORM has not been submitted; present the last
            stored records of the logged in user's account. */
       
       $data = [
           "fname" => $userData[0]["f_name"],
           "sname" => $userData[0]["s_name"],
           "email" => $userData[0]["email"],
           "phone" => $userData[0]["phone"],
           "mobile" => $userData[0]["mobile"],
           "title" => $userData[0]["title"]
       ];


            $this->view('profiles/edit-profile', $data);

           }

        }
           
        } else {
          // $this->view('pages/index');
      header('Location: '. URLROOT);
        }

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


        public static function isLoggedIn(){
            if(isset($_SESSION["userId"])){
                return true;
            } else {
                return false;
            }
        }
    
        
    public function logout(){

        unset($_SESSION["userId"]);
        unset( $_SESSION["fname"]);
        unset($_SESSION["userId"]);
            session_destroy();
                redirect('');

    }
    

}