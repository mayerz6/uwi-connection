<?php


class manage extends Controller{

    public $userModel;

    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function profile(){

        if(self::isAdmin()){

            $userRecords = $this->userModel->showUsers();

            /*  */
            $recData = array();
            foreach($userRecords as $row => $rec){
                   $data = array(
                       'id' => $rec['userId'],
                       'f_name' => $rec['f_name'],
                       's_name' => $rec['s_name'],
                       'gender' => $rec['gender'],
                       'user_cat' => $rec['user_cat'],
                        'status' => $rec['status']
                   );                
                   array_push($recData, $data);
            }
            /*  */

            $this->view('manage/profile', $recData);
        } else {
              // $this->view('pages/index');
      header('Location: '. URLROOT);
        }

      
    }

    public function editAccount($userId){

        if(self::isAdmin()){
        
            /* Validate input data */
        $userId = intval($userId);

        $id_length = strlen($userId);

        if($id_length < 3){

            $res = $this->userModel->confirmValidUserById($userId);
               
            if($res){

                    $userData = $this->userModel->fetchUserData($userId);

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


                        
                if(isset($memStatus)){
                    $memStatus = 1;
                } else {
                    $memStatus = 0;
                }
                           /* Store user input into array for validation. */
            $data = [
                'id' => $userId,
                'fname' => $firstname,
                'fnameError' => '',
                'sname' => $surname,
                'snameError' => '',
                'email' => $email,
                'emailError' => '',
                'mobile' => $mobile,
                'mobileError' => '',
                'memCat' => $memCat,
                'catErrorMsg' => '',
                'memDes' => $memDes,
                'desErrorMsg' => '',  
                'status' => $memStatus
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
      


        if(empty($data["fnameError"]) && empty($data["snameError"]) && empty($data["emailError"]) && empty($data["mobileError"])){ 

              //  print_r($data);
                //  exit();            

            $auth = $this->userModel->updateRecord($data);

            if($auth){
        flash('register_success', 'User account was updated successfully!');
             header('Location: '. URLROOT . '/manage/profile');
             // $this->view('users/login');  
            } else {
                echo "Failed to add user data!";
                    exit();
            }

         }

                    } else {

                        $this->view('manage/edit-account', $userData);

                    }             


                } else {
                    
                    header('Location: '. URLROOT . '/manage/profile');        
                }
               
        } else {
            header('Location: '. URLROOT . '/manage/profile');
        }

        } else {
            header('Location: '. URLROOT);
        }
    }

    public function deleteAccount($userId){
        if(self::isAdmin()){ 

        } else {
            header('Location: '. URLROOT);
        }
    }

    
    public static function isAdmin(){
        if($_SESSION["userId"] == '8'){
            return true;
        } else {
            return false;
        }
    }


}