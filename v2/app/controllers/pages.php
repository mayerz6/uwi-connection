<?php

class pages extends Controller{

    public function __construct()
    {
       $this->userModel = $this->model('User');
    }

    /* Function to load the default login VIEW  */
    /* With the default LOGIN form */
    public function index(){

/* Once the user SUBMITS form input, execute the following code. */
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        extract($_POST);

        $email = filter_var($email, FILTER_VALIDATE_EMAIL);      
        $email = trim($email);
            
        $data = [
            'email' => $email,
            'emailErrorMsg' => '',
            'pwd_1' => $usrPwd,
            'check' => $userCheck,
            'pwdErrorMsg' => ''    
        ];

        /* Validation of the user's input for their FIRSTNAME. */
        if(empty($data["email"])){
            $data['emailErrorMsg'] = 'Blank email addresses aren\'t allowed...';
        } else if(!empty($data["email"])){
        $test = $this->userModel->checkEmail($data["email"]);
            if($test[0]['Results'] == 0){
                $data['emailErrorMsg'] = 'This email has address no association with an account...';
            }
        }

        if(empty($data["pwd_1"])){
            $data['pwdErrorMsg'] = 'Blank passwords aren\'t allowed...';
        }

        if(empty($data["emailErrorMsg"]) && empty($data["pwdErrorMsg"])){

            $userEncrypt = new encryption;

            /* Produce a HASH on the user's entered PASSWORD. */    
            $pwdEncrypt = $userEncrypt->hashPwd($data["pwd_1"]);    
    
            /* Take the HASHED password and the email address and pass it to the USER'S Login function. */        
                $authUser = $this->userModel->userLogin($data["email"], $pwdEncrypt);
              
        /* Once the user's credentials have been confirmed; the variable will contain
           details about the users account used to present on the page.  */    
                 if(!empty($authUser)){
            /* Create SESSION variables containing details UNIQUE to the logged in user. */
                 $this->userSession($authUser);
             /* header('Location: '. URLROOT . '/users/dashboard');  */
                    } else {
                        $data['pwdErrorMsg'] = 'Please check your login credentials.';     
                               $this->view('pages/index', $data);    
                    }

                } else {
                    $this->view('pages/index', $data);
                }

    } else {

     // Present the web form for user interaction.
        $data = [
            'username' => '',
            'usrErrorMsg' => '',
            'password' => '',
            'check' => '',
            'pwdErrorMsg' => ''    
        ];

        $this->view('pages/index');
        //  Controller::view('index');


    }

    }


    public function userSession($user){

        $_SESSION["userId"] = $user[0]["id"];
        $_SESSION["fname"] = $user[0]['fname'];
        $_SESSION["sname"] = $user[0]['sname'];

        flash('login_success', 'Successful account log in!');

        redirect('users/dashboard');

    }
       

    public function isLoggedIn(){
        if(isset($_SESSION["userId"])){
            return true;
        } else {
            return false;
        }
    }


}