<?php

class database {

        private static function connection(){

            
        // Set up ODBC connection
    /* Success connection to SQL Database */
    
    $dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ
    $dbname = "uwi-connection"; // the name of the database that you are going to use for this project
    $dbuser = "mayerz"; // the username that you created, or were given, to access your database
    $dbpass = "M@y3rZT#ch"; // the password that you created, or were given, to access your database
     
    $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    


 //   $connection = odbc_connect( $connection_string, $user, $pass );
    
            if (mysqli_connect_errno()) {
                echo "Calendar is currently under maintenance" . mysqli_connect_error();
            } else { 
               //  echo "Successful Connection!!!!";
                    }

            return $connection;

}



        
public static function registerUser($userInput){

    /* Initial call to the database connection METHOD */
    $dbConnect = self::connection();

      /*    Example of a PREPARED Statements   */
     /* Improved Security */

    
        $query = "INSERT INTO members (username, pwd, f_name, ";
        $query .= "s_name, m_name, status, DOB, instit_work, ";
        $query .= "instit_edu, gender, POA, phone, mobile, work, ";
        $query .= "email, admit_date, resign_date, user_cat, salt) ";
        $query .= "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ";
        $query .= "?, ?, ?, ?, ?, ?, ?, ?);";
    

        // prepare and bind
        $stmt = mysqli_stmt_init($dbConnect);

        if(!mysqli_stmt_prepare($stmt, $query)){
            echo "SQL error";
        } else {
            mysqli_stmt_bind_param(
                $stmt, 
                "sssssssssssssssssss",
                $userInput['username'], 
                $userInput['password'], 
                $userInput['fname'], 
                $userInput['sname'], 
                $userInput['mname'], 
                $userInput['status'], 
                $userInput['DOB'], 
                $userInput['work'], 
                $userInput['edu'], 
                $userInput['gender'], 
                $userInput['POA'], 
                $userInput['phone'], 
                $userInput['mobile'], 
                $userInput['work'], 
                $userInput['email'], 
                $userInput['ad'], 
                $userInput['rd'], 
                $userInput['membership'],
                $userInput['salt']  
            );
         $results = mysqli_stmt_execute($stmt);

             //   echo "<b>" . $results . "</b>";

     return $results;


        }
      


    /* $query = "INSERT INTO Users (userFN, userSN, username, email, userPwd, salt)";
     $query .= "VALUES(?, ?, ?, ?, ?, ?) ";

    // $q = "update TABLE set PASS=? where NAME=?";
     $res = odbc_prepare($connection, $query);

     $a = $fname; 
     $b = $sname;
     $c = $username;
     $d = $email;
     $e = $usrPwdHash;
     $f = $usrSalt;
     
     $results = odbc_execute($res, array($a, $b, $c, $d, $e, $f));
        */

}


        public static function fetchAllUsers(){
            $dbConnect = self::connection();
            $userData = array();
            $users = array();
            $json = array();
            $query = 'SELECT * FROM Users';
            $results = odbc_exec($dbConnect, $query);

            if($results){

                while($e=odbc_fetch_object($results)){
                    $users[]=$e;
                }
                $userRecords = json_encode($users);
                $userRecord = json_decode($userRecords, true);
                $i=0;
                foreach($userRecord as $usr){
                    $json = array(
                        'id'    =>  $usr['userId'],
                        'fname' =>  $usr['userFN'],
                        'sname' =>  $usr['userSN'],
                        'uname' =>  $usr['username'],
                        'email' =>  $usr['email'],
                        'phone' =>  $usr['userPhone'],
                        'mobile' => $usr['userMobile'],
                        'role'  => $usr['userRole'],
                        'pwd'   => $usr['userPwd'],
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

     /* Functions used to FETCH all Events from the database; then populate the calendar with these records. */
     public function roomIsAvailable($room_id, $startD, $startT, $endT)
     {
         
         $dbConnect = self::connection();
             
             $data =  array();
             
             $query = "SELECT * FROM Events WHERE roomId='$room_id' ORDER BY eventSD";
             $result = odbc_exec($dbConnect, $query);
             
             if($result) {
                 
                 //foreach($result as $row)
                 while($e=odbc_fetch_object($result))
                 {
                     /* Collect of database records as OBJECT */
                     $data[]=$e;
                 }
                 
                 /* Conversion of database records as OBJECT to STRING */
                 $records = json_encode($data);
                 /* Conversion of database records as STRING to ASSOCIATIVE ARRAY/ARRAY of ARRAYS */
                 $record = json_decode($records, true);
                 $json = array();
                 $allEvents = array();
                 $i = 0;
               foreach($record as $eventRecord) {
                     /* Storing our results into an ARRAY. */
                  //   $json = array(
                    
                    /*        'id'          => $eventRecord['eventId'],
                         'title'       => $eventRecord['name'],
                         'description' => $eventRecord['description'],
                         'start'       => $eventRecord['eventSD'],
                         'end'         => $eventRecord['eventED']   
                     );
                        */
                                $eSD = $eventRecord['eventSD'];
                                $eED = $eventRecord['eventED'];

                      $sD = date("m-d-Y", strtotime("$eSD"));  
                       $sT = date("g:ia", strtotime("$eSD"));
                        $eT = date("g:ia", strtotime("$eED"));

                     if($sD == $startD){
                        // if($sT == $startT && $startT < $eT){
                              $i++;
                       //  }
                     } 

                 }
                 
              return $i;
             
          //   echo 'We are connected...';
             
             
         } else {
             
             die('Connection Failed...');
             
         }
         
 
     }




         /* Functions used to FETCH all Events from the database; then populate the calendar with these records. */
    public function fetchDataByRoom($room_id)
    {
        
        $dbConnect = self::connection();
            
            $data =  array();
            
            $query = "SELECT * FROM Events WHERE roomId='$room_id' ORDER BY eventSD";
            $result = odbc_exec($dbConnect, $query);
            
            if($result) {
                
                //foreach($result as $row)
                while($e=odbc_fetch_object($result))
                {
                    /* Collect of database records as OBJECT */
                    $data[]=$e;
                }
                
                /* Conversion of database records as OBJECT to STRING */
                $records = json_encode($data);
                /* Conversion of database records as STRING to ASSOCIATIVE ARRAY/ARRAY of ARRAYS */
                $record = json_decode($records, true);
                $json = array();
                $allEvents = array();
                $i = 0;
              foreach($record as $eventRecord) {
                    /* Storing our results into an ARRAY. */
                    $json = array(
                        'id'          => $eventRecord['eventId'],
                        'title'       => $eventRecord['name'],
                        'description' => $eventRecord['description'],
                        'start'       => $eventRecord['eventSD'],
                        'end'         => $eventRecord['eventED']   
                    );
    
                    // Adds each array into the container array
                    array_push($allEvents, $json);
   
                    
                }
                
                return json_encode($allEvents);
            
         //   echo 'We are connected...';
            
            
        } else {
            
            die('Connection Failed...');
            
        }
        

    }


        public static function fetchAllUsernames(){
          
          
            $dbConnect = self::connection();
            $userData = array();
            $users = array();
            $query = 'SELECT * FROM [SchedulerDB].[dbo].[Users]';
            $results = odbc_exec($dbConnect, $query);

            if($results){

                while($e=odbc_fetch_object($results)){
                    $users[]=$e;
                }
                $userRecords = json_encode($users);
                $userRecord = json_decode($userRecords, true);
                $i=0;
                foreach($userRecord as $usr){
                    $json = array(
                    //    'id'    =>  $usr['userId'],
                     //   'fname' =>  $usr['userFN'],
                     //   'sname' =>  $usr['userSN'],
                        'uname' =>  $usr['username'],
                     //   'email' =>  $usr['email'],
                     //   'phone' =>  $usr['userPhone'],
                     //   'mobile' => $usr['userMobile'],
                     //   'role'  => $usr['userRole'],
                     //   'pwd'   => $usr['userPwd'],
                     //   'salt'  => $usr['salt']
                    );
                    array_push($userData, $json);
                }
                    // return json_encode($userData);
                        return $userData;

            }   else {

                die('Connection Failed...');
            }
        }

        public static function editUserData($title, $description, $startD, $endD, $roomId, $userId, $hostId)
        {
             /* Initial call to the database connection METHOD */
             $dbConnect = self::connection();

             $sql = "INSERT INTO [SchedulerDB].[dbo].[Users] (name, description, eventSD, eventED, roomId, userId, hostId, IsPublic, RecurrenceType) ";
             $sql .= "VALUES ('$title', '$description', convert(datetime,'$startD'), convert(datetime,'$endD'), $roomId, $userId, $hostId, 1, 'N')";
      


        }

        public static function retrieveUsersByUsername($username){
            
            /* Initial call to the database connection METHOD */
            $dbConnect = self::connection();

            $query = "SELECT COUNT(*) AS Results FROM members ";
            $query .= "WHERE username = '$username' ";
            

            $results = mysqli_query($dbConnect, $query);

            
            if($results){

                while($e=$results->fetch_assoc()){
                    $users[]=$e;
                }

                $userRecords = json_encode($users);
                $userRecord = json_decode($userRecords, true);

                return $userRecord;
            }

        }


        public static function fetchUserByUsername($username){
         
         
            /* Initial call to the database connection METHOD */
            $dbConnect = self::connection();
        
            $userData = array();
            $users = array();
            $query = "SELECT * FROM members ";
            $query .= "WHERE username = '$username' ";

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
                        'id'    =>  $usr['userid'],
                        'fname' =>  $usr['f_name'],
                        'sname' =>  $usr['s_name'],
                        'uname' =>  $usr['username'],
                        'email' =>  $usr['email'],
                        'phone' =>  $usr['phone'],
                        'mobile' => $usr['mobile'],
                        'pwd'   => $usr['pwd']
                    );
                    array_push($userData, $json);
                }

                    // return json_encode($userData);
                        return $userData;

            }   else {
             
                die('Connection Failed...');
            }

        }

            
        public static function fetchUserByUserId($userId){
           
           
            /* Initial call to the database connection METHOD */
            $dbConnect = self::connection();
        
            $userData = array();
            $users = array();
            $query = "SELECT * FROM [SchedulerDB].[dbo].[Users] ";
            $query .= "WHERE userId = '$userId' ";

            $results = odbc_exec($dbConnect, $query);

            if($results){

                while($e=odbc_fetch_object($results)){
                    $users[]=$e;
                }
                $userRecords = json_encode($users);
                $userRecord = json_decode($userRecords, true);
                $i=0;
                foreach($userRecord as $usr){
                    $json = array(
                        'id'    =>  $usr['userId'],
                        'fname' =>  $usr['userFN'],
                        'sname' =>  $usr['userSN'],
                        'uname' =>  $usr['username'],
                        'email' =>  $usr['email'],
                        'phone' =>  $usr['userPhone'],
                        'mobile' => $usr['userMobile'],
                        'role'  => $usr['userRole'],
                        'pwd'   => $usr['userPwd'],
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



        public static function fetchUserSalt($username){
          
          
            /* Initial call to the database connection METHOD */
            $dbConnect = self::connection();
        
            $userData = array();
            $users = array();
            $query = "SELECT * FROM members ";
            $query .= "WHERE username = '$username' ";

            $results = mysqli_query($dbConnect, $query);

            if($results){

                while($e=$results->fetch_assoc()){
                    $users[]=$e;
                }
                $userRecords = json_encode($users);
                $userRecord = json_decode($userRecords, true);
                $i=0;
                foreach($userRecord as $usr){
                    $json =  array(
                        'id'    =>  $usr['userid'],
                        'fname' =>  $usr['f_name'],
                        'sname' =>  $usr['s_name'],
                        'uname' =>  $usr['username'],
                        'email' =>  $usr['email'],
                        'phone' =>  $usr['phone'],
                        'mobile' => $usr['mobile'],
                        'pwd'   => $usr['pwd'],
                        'salt'  => $usr['salt']
                    );
                    array_push($userData, $json);
                }

                    // return json_encode($userData);
                        return $userData[0]['salt'];

            }   else {
             
                die('Connection Failed...');
            }

        }
     
        public static function fetchEventById($eventId){
        
        
            /* Initial call to the database connection METHOD */
            $dbConnect = self::connection();
        
            $userData = array();
            $users = array();
            $query = "SELECT * FROM [SchedulerDB].[dbo].[Events] ";
            $query .= "WHERE eventId = '$eventId' ";

            $results = odbc_exec($dbConnect, $query);

            if($results){

                while($e=odbc_fetch_object($results)){
                    $users[]=$e;
                }
                $userRecords = json_encode($users);
                $userRecord = json_decode($userRecords, true);
                $i=0;
                foreach($userRecord as $usr){
                    $json = array(
                        'id'    =>  $usr['eventId'],
                        'roomId' =>  $usr['roomId'],
                        'meetingId' =>  $usr['meetingId'],
                        'title' =>  $usr['name'],
                        'description' =>  $usr['description'],
                        'startD' =>  $usr['eventSD'],
                        'endD' => $usr['eventED'],
                        'userId'  => $usr['userId'],
                        'hostId'   => $usr['hostId'],
                        'vStatus'  => $usr['IsPublic']
                    );
                    array_push($userData, $json);
                }

                    // return json_encode($userData);
                        return $userData;

            }   else {
             
                die('Connection Failed...');
            }

        }

     public static function authorizeUser($username, $password){
            
            $dbConnect = self::connection();
          
            // SELECT userId FROM [Users] WHERE userPwd=@userPwd AND username=@username
                $query = "SELECT * FROM members "; 
                $query .= "WHERE pwd = '$password' ";
                $query .= "ANd username = '$username' ";
            
            $userData = array();
            $users = array();
       //     $query = "SELECT * FROM Users ";
       //     $query .= "WHERE username = '$usr' ";

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
                        'id'    =>  $usr['userid'],
                        'fname' =>  $usr['f_name'],
                        'sname' =>  $usr['s_name'],
                        'uname' =>  $usr['username'],
                        'email' =>  $usr['email'],
                        'phone' =>  $usr['phone'],
                        'mobile' => $usr['mobile'],
                        'pwd'   => $usr['pwd']
                    );
                    array_push($userData, $json);
                }

                    // return json_encode($userData);
                       
                  //  print_r($userData);
                  //      exit;
                    return $userData;
            }   else {
             
                die('Connection Failed...');
            }
         
        }


}

?>