<?php


class db{
    
    private static $_connection = null;

    private $_pdo,
          $_query,
          $_error = false,
          $_results,
          $_count = 0;

private static function connection(){

    $dbhost = Core::get('server2/host');
    $dbname = Core::get('server2/db');
    $dbuser = Core::get('server2/username');
    $dbpass = Core::get('server2/password');

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(mysqli_connect_errno()){
        echo "Application is currently undergoing maintenance..." . mysqli_connect_error();
            return false;
    } else {
    // echo "Successful connection!!!";
       return $connection;
    }

}


/* ################################## Function used to instantiate the DB connection ################################### */

public static function getInstance(){
    if(!isset(self::$_connection)){
      // self::$_connection = new db();
       self::$_connection = self::connection();
    }
  //  return self::$_connection;
}


/* ################################## Function used to REGISTER a new user ################################### */

public static function registerUser($userInput){

    /* Initial call to the database connection METHOD */
        self::getInstance();
        
         $dbConnect = self::$_connection;

         switch(ucwords($userInput['gender'])){
            case 'Male':
                $userInput['gender'] = 'M';
                    break;
            case 'Female':
                    $userInput['gender'] = 'F';
                        break;
            default:
                $userInput['gender'] = 'X';
        }
      /*    Example of a PREPARED Statements   */
     /* Improved Security */
    
        $query = "INSERT INTO userProfileData (f_name, s_name, gender, phone, mobile, work, email, ";
        $query .= "admit_date, app_date, resign_date, user_des, user_cat) ";
        $query .= "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    

        // prepare and bind
        $stmt = mysqli_stmt_init($dbConnect);

        if(!mysqli_stmt_prepare($stmt, $query)){
            echo "SQL Connection error! <br />";
        } else {

            mysqli_stmt_bind_param(
                $stmt, 
                "ssssssssssss",
               // $userInput['pwd_1'], 
                $userInput['f_name'], 
                $userInput['s_name'], 
                $userInput['gender'], 
                $userInput['phone'], 
                $userInput['mobile'],
                $userInput['work'], 
                $userInput['email'],  
                $userInput['ad'], 
                $userInput['app_d'], 
                $userInput['rd'], 
                $userInput['memDes'],
                $userInput['memCat']
              //  $userInput['salt']  
            );

         $results = mysqli_stmt_execute($stmt);
          
          if($results){
              
              
            $usr = array();
            $usr = self::retrieveUserIdByEmail($userInput["email"]);

            $newId = $usr[0]["id"];
            $secQ = "";
            $secA = "";

        $query_2 = "INSERT INTO userCredentials (userId, secQ, ";
        $query_2 .= "secA, pwd, salt) VALUES (?, ?, ?, ?, ?)";
    

        // prepare and bind
        $stmt = mysqli_stmt_init($dbConnect);

        if(!mysqli_stmt_prepare($stmt, $query_2)){
            echo "SQL Connection error! <br />";
        } else {

            mysqli_stmt_bind_param(
                $stmt, 
                "sssss",
                $newId, 
                $secQ, 
                $secA, 
                $userInput['pwd_1'], 
                $userInput['salt'] 
            );

         $results_2 = mysqli_stmt_execute($stmt);
          
         return $results_2;

          }

        } else { return false; }
      
}

}



/* ################################## Function used to REGISTER a new user ################################### */

public static function updateUserProfile($userInput, $recordId){

    /* Initial call to the database connection METHOD */
    $dbConnect = self::getInstance();

    $fname = $userInput['fname'];
    $sname = $userInput['sname'];
    $title = $userInput['title'];
    $email = $userInput['email'];
    $work = $userInput['work'];
    $phone = $userInput['phone'];
    $mobile = $userInput['mobile'];

      /* Example of a PREPARED Statements   */
     /* Improved Security */
    
     $query = "UPDATE members SET ";
     $query .= "f_name = '$fname', ";
     $query .= "s_name = '$sname', ";
     $query .= "title = '$title', ";
     $query .= "email = '$email', ";
     $query .= "phone = '$phone', ";
     $query .= "mobile = '$mobile' ";
     $query .= "work = '$work' ";
     $query .= "WHERE  userid = '$recordId' ";

         $results = mysqli_query($dbConnect, $query);

             //   echo "<b>" . $results . "</b>";

     return $results;


        }
    
/* ################################## Function used to retrieve user information based on ################################### */
/* ################################### email address associated with the account. ################################### */

     public static function retrieveUserIdByEmail($email){
            
        /* Initial call to the database connection METHOD */
        self::getInstance(); 

        $dbConnect = self::$_connection;

        $userData = array();

        $query = "SELECT * FROM userProfileData ";
        $query .= "WHERE email = '$email' ";
        

       /* $results = odbc_exec(self::$_connection, $query); */
        $results = mysqli_query($dbConnect, $query);
        
        if($results){
            /* while($e=odbc_fetch_object($results)){ */
            while($e=$results->fetch_assoc()){
                $users[]=$e;
            }

            $userRecords = json_encode($users);
            $userRecord = json_decode($userRecords, true);

            $i=0;

            foreach($userRecord as $usr){                    
                $json = array(
                    'id'    =>  $usr['userId'],
                    'fname' =>  $usr['firstname'],
                    'sname' =>  $usr['surname'],
                    'email' =>  $usr['email'],
                    'phone' =>  $usr['phone'],
                    'gender'  => $usr['gender']
                );
                array_push($userData, $json);
            }

                // return json_encode($userData);
              //  print_r($userData);

                return $userData;


        }   else {
         
            die('Connection Failed...');
        }

    }


 
/* ############## Function used to verify the existence of a email address ############ */
/* ########### associated with an ACCOUNT ################ */

    public function checkUserEmail($email){
            
        /* Initial call to the database connection METHOD */
        self::getInstance();

        $dbConnect = self::connection();

        $query = "SELECT COUNT(*) AS Results FROM userProfileData ";
        $query .= "WHERE email = '$email' ";
        
  /* $results = odbc_exec(self::$_connection, $query); */
  $results = mysqli_query($dbConnect, $query);
        
  if($results){
      /* while($e=odbc_fetch_object($results)){ */
      while($e=$results->fetch_assoc()){
          $users[]=$e;
      }

            $userRecords = json_encode($users);
            $userRecord = json_decode($userRecords, true);

            return $userRecord;
        }

    }




    public static function authorizeUser($email, $password){
            
        
        self::getInstance();
        $dbConnect = self::connection();

         // SELECT userId FROM [Users] WHERE userPwd=@userPwd AND username=@username
             $query = "SELECT * FROM userProfileData "; 
             $query .= "WHERE email = '$email' ";
         
         $userData = array();
         $users = array();
   
         /* $results = odbc_exec(self::$_connection, $query); */
            $results = mysqli_query($dbConnect, $query);
        
         if($results){

            while($e=$results->fetch_assoc()){
                    $users[]=$e;
                }
             $userRecords = json_encode($users);
             $userRecord = json_decode($userRecords, true);
             $i=0;
             foreach($userRecord as $usr){
 
                 $json = array(
                     'id'    =>  $usr['userId'],
                     'fname' =>  $usr['f_name'],
                     'sname' =>  $usr['s_name'],
                     'email' =>  $usr['email'],
                     'phone' =>  $usr['phone'],
                     'mobile' => $usr['gender']
                 );
                 array_push($userData, $json);
             }
                 // return json_encode($userData);
             //        return $userData;
             
            $chk = self::checkCredentials($userData[0]["id"], $password);

            if($chk){
                return $userData;
            } else {
                return NULL;
            }

         }   else {
          
             die('Connection Failed...');
         }
      
     }
     
     public static function checkCredentials($userId, $pwdEncrypt){

        $userEncrypt = new encryption;
      
     //   $pwdEncrypt = $userEncrypt->hashPwd($password);
        $usrSalt = self::fetchUserSalt($userId);
            $txt =  $pwdEncrypt . "" . $usrSalt[0]["salt"]; 
                $usrPwdHash = $userEncrypt->hashPwd($txt);

                if($usrSalt[0]["pwd"] == $usrPwdHash){

                    return true;
                }

                return false;

     }
     
     public static function fetchUserSalt($userId){
          
        /* Initial call to the database connection METHOD */
        //$dbConnect = self::connection();
        self::getInstance();

        $userData = array();
        $users = array();
        $query = "SELECT * FROM userCredentials ";
        $query .= "WHERE userId = '$userId' ";

         /* $results = odbc_exec(self::$_connection, $query); */
         $results = mysqli_query(self::$_connection, $query);

        if($results){

            while($e=$results->fetch_assoc()){
                $users[]=$e;
            }

            $userRecords = json_encode($users);
            $userRecord = json_decode($userRecords, true);
            $i=0;
            foreach($userRecord as $usr){
                $json =  array(
                    'pwd'   => $usr['pwd'],
                    'salt'  => $usr['salt']
                );
                array_push($userData, $json);
            }

                // return json_encode($userData);
                    return $userData;

        }   else {
         
            die('Connection Failed...');
        }

    }


}