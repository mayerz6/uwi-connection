<?php

include 'classes/core.php';
include 'classes/encryption.php';


class database {

  /* Variable used to store a STATIC instance of a database connection. */
  private static $_connection = null;
  private $_pdo,
          $_query,
          $_error = false,
          $_results,
          $_count = 0;

/* ################################## Function used to instantiate the DB connection ################################### */

public static function getInstance(){
    if(!isset(self::$_connection)){
      // self::$_connection = new db();
       self::$_connection = self::connection();
    }
    return self::$_connection;
}




private static function connection(){
      
    $dbhost = Core::get('testServer/host'); 
    $dbname = Core::get('testServer/db');
    $dbuser = Core::get('testServer/username');
    $dbpass = Core::get('testServer/password');

    // $dbhost = "fdb24.awardspace.net"; // this will ususally be 'localhost', but can sometimes differ
    // $dbname = "2890673_bipa"; // the name of the database that you are going to use for this project
    // $dbuser = "2890673_bipa"; // the username that you created, or were given, to access your database
    // $dbpass = "M@y3rZT#ch"; // the password that you created, or were given, to access your database
     
    $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    
            if (mysqli_connect_errno()) {
                echo "Calendar is currently under maintenance" . mysqli_connect_error();
            } else { 
            //     echo "Successful Connection!!!!";
                    }

            return $connection;

}

/* ################################## Function used to REGISTER a new user ################################### */

public static function registerUser($userInput){

    /* Initial call to the database connection METHOD */
    $dbConnect = self::getInstance();

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
      
}



/* ################################## Function used to REGISTER a new user ################################### */

public static function updateUser($userInput, $id){

    /* Initial call to the database connection METHOD */
    $dbConnect = self::getInstance();

      /*    Example of a PREPARED Statements   */
     /* Improved Security */

    
        $query = "INSERT INTO members (username, pwd, f_name, ";
        $query .= "s_name, m_name, status, DOB, instit_work, ";
        $query .= "instit_edu, gender, POA, phone, mobile, work, ";
        $query .= "email, admit_date, resign_date, user_cat, salt) ";
        $query .= "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ";
        $query .= "?, ?, ?, ?, ?, ?, ?, ?) WHERE userid = $id";
    

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
      
}


/* ################################## Function used to REGISTER a new user ################################### */

public static function updateUserProfile($userInput, $recordId){

    /* Initial call to the database connection METHOD */
    $dbConnect = self::getInstance();

    $fname = $userInput['fname'];
    $sname = $userInput['sname'];
    $username = $userInput['username'];
    $email = $userInput['email'];
    $phone = $userInput['phone'];
    $mobile = $userInput['mobile'];

      /* Example of a PREPARED Statements   */
     /* Improved Security */
    
     $query = "UPDATE members SET ";
     $query .= "f_name = '$fname', ";
     $query .= "s_name = '$sname', ";
     $query .= "username = '$username', ";
     $query .= "email = '$email', ";
     $query .= "phone = '$phone', ";
     $query .= "mobile = '$mobile' ";
     $query .= "WHERE  userid = '$recordId' ";

         $results = mysqli_query($dbConnect, $query);

             //   echo "<b>" . $results . "</b>";

     return $results;


        }
    





/*  ################################ Function used to fetch ALL User data ################################ */

        public static function fetchAllUsers(){
            $dbConnect = self::getInstance();
            $userData = array();
            $users = array();
            $json = array();
            $query = 'SELECT * FROM [SchedulerDB].[dbo].[Users]';
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

/*  ################################ Function used to DISPLAY ALL User data within the SYSADMIN page ################################ */

public static function displayAllUsers(){

    $dbConnect = self::getInstance();

    $userData = array();
    $users = array();
    $json = array();

    $query = 'SELECT * FROM members';

    
    $results = mysqli_query($dbConnect, $query);

    if($results){

        while($e=$results->fetch_assoc()){
            $users[]=$e;
        }

        $userRecords = json_encode($users);
        $userRecord = json_decode($userRecords, true);
        $i=0;

        foreach($userRecord as $usr){
                echo "<tr>";
            echo "<td>" . $usr['f_name'] . "</td>";
            echo "<td>" . $usr['s_name'] . "</td>";
            echo "<td>" . $usr['email'] . "</td>";
            echo "<td><a href='edit-account.php?id=" . $usr['userid'] . "'>Edit</a></td>";
            echo "<td><a href='delete-account.php?id=" . $usr['userid'] . "'>Delete</a></td>";
                echo "</tr>";
        }

        return true;
           
    }   else {

        die('Connection Failed...');
    }

}


/* ################################## Function used to Confirm Location Availability ################################### */

     public static function roomIsAvailable($room_id, $startD, $endD, $startT, $endT)
     {
         
         $dbConnect = self::getInstance();
             
             $data =  array();
             
             $query = "SELECT * FROM Events WHERE roomId='$room_id' ORDER BY eventSD";
             $result = mysqli_query($dbConnect, $query);
             
            $no_rows = mysqli_num_rows($result);
            
            if($no_rows > 0) {
             
           //  if($result) {
                 
                 //foreach($result as $row)
                 while($e=$result->fetch_assoc())
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
                  
                    $eSD = $eventRecord['eventSD']; // Start dates of previously entered events.
                    $eED = $eventRecord['eventED']; // End dates of previously entered events.

                    $sD = date("m-d-Y", strtotime("$eSD"));  
                    $eD = date ("m-d-Y", strtotime("$eSD"));

                    $sD_new = date("m-d-Y", strtotime("$startD"));  //Start and End dates for event to be added to DB
                    $sD_new = date("m-d-Y", strtotime("$endD"));


                    $sT_prev = date("H:i", strtotime("$eSD"));  // Start TIMES of previously entered events.
                    $eT_prev = date("H:i", strtotime("$eED"));   // End TIMES of previously entered evenets.


                    $sT_new = date("H:i", strtotime("$startT"));  //Start and End TIMES for event to be added to DB
                    $eT_new = date("H:i", strtotime("$endT"));

                    

                        if($sT_new <= $eT_prev && $sT_prev <= $eT_new && $sD_new == $sD){
                          
                            $i++;  
                                
                                /*       
                            echo "Overlap Condition: ";
                            echo $sD_new . " @" . $sT_new . " to " . $eT_new . " <=> ";
                            echo $sD . "@" . $sT_prev . " to " . $eT_prev . " = " . $i;
                            echo "<br />";
                                    */    
                            break;

                        } else {

                            $i=0;
                           /*  echo "NO Overlap Condition: ";
                            echo $sD_new . " @" . $sT_new . " to " . $eT_new . "<=>";
                            echo $sD . " @" . $sT_prev . " to " . $eT_prev . " | ";
                            echo "<br />";
                            */

                        }
                            
                        
                 }
                 
              return $i;
             
          //   echo 'We are connected...';
             
             
         } else {
             
           return 0;  
         }
         
 
     }


/* ################################## Function used to FETCH Event Data based on Location. ################################## */

public function fetchDataByRoom($room_id)
{
        
        $dbConnect = self::getInstance();
            
            $data =  array();
            
            $query = "SELECT * FROM Events WHERE roomId='$room_id' ORDER BY eventSD";
            $result = mysqli_query($dbConnect, $query);
            
            if($result) {
                
                //foreach($result as $row)
                while($e=$result->fetch_assoc())
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
        
                     $userHost = self::fetchUserByUserId($eventRecord["hostId"]);
                  
                     $myfn = $userHost[0]["fname"];
                     $mysn = $userHost[0]["sname"];
        
                        $json = array(
                            'id'          => $eventRecord['eventId'],
                            'title'       => $eventRecord['name'],
                            'hostSname'   => $mysn,  
                            'hostFname'   => $myfn,
                            'description' => $eventRecord['description'],
                            'start'       => $eventRecord['eventSD'],
                            'end'         => $eventRecord['eventED']   
                        );
                    // Adds each array into the container array
                    array_push($allEvents, $json);
        
                    
                }
                
           //     print_r($allEvents);
             //   exit;
        
                return json_encode($allEvents);
            
         //   echo 'We are connected...';
            
            
        } else {
            
            die('Connection Failed...');
            
        }


}



/* ################################## Function used to FETCH Event Data based on Location. ################################## */

public function addEventData($eventData)
{
        
        $dbConnect = self::getInstance();
            
            $data =  array();
            $name = $eventData['name'];
            $description = $eventData['description'];
            $start_Date = $eventData['startDate'];
            $end_Date = $eventData['endDate'];
            $userId = $eventData['userId'];
            $hostId = $eventData['hostId'];
            
            $query = "INSERT INTO Events (name, description, eventSD, eventED, userId, hostId, IsPublic, RecurrenceType) ";
            $query .= "VALUES('$name', '$description', convert('$start_Date', datetime), convert('$end_Date', datetime), '$userId', '$hostId', 1, 'N')";
    
            $result = mysqli_query($dbConnect, $query);

            if($result) {
                return 1;
                
        } else {
            
            die('Connection Failed...');
            
        }


}



/* ################################## Function used to FETCH Event Data based on HOST. ################################## */

public static function fetchDataByHost($host_id)
{
        
        $dbConnect = self::getInstance();
            
            $data =  array();
            
            $query = "SELECT * FROM Events WHERE hostId='$host_id' ORDER BY eventSD";
            $result = mysqli_query($dbConnect, $query);
            
            
            $no_rows = mysqli_num_rows($result);
            
            if($no_rows > 0) {
                
                //foreach($result as $row)
                while($e=$result->fetch_assoc())
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
        
                     $userHost = self::fetchUserByUserId($eventRecord["hostId"]);
                  
                     $myfn = $userHost[0]["fname"];
                     $mysn = $userHost[0]["sname"];
        
                        $json = array(
                            'id'          => $eventRecord['eventId'],
                            'title'       => $eventRecord['name'],
                            'hostSname'   => $mysn,  
                            'hostFname'   => $myfn,
                            'description' => $eventRecord['description'],
                            'start'       => $eventRecord['eventSD'],
                            'end'         => $eventRecord['eventED']   
                        );
                    // Adds each array into the container array
                    array_push($allEvents, $json);
        
                    
                }
                
           //     print_r($allEvents);
             //   exit;
        
                return json_encode($allEvents);    
            
        } else {
            $data =  array();
                return $data;
            
        } 

}


/* ################################## Function used to FETCH ALL Usernames from DB. ################################## */

public static function fetchAllUsernames(){
          
          
    $dbConnect = self::getInstance();
    $userData = array();
    $users = array();
    $query = 'SELECT * FROM members';
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
               'uname' =>  $usr['username']
            );
            array_push($userData, $json);
        }
            // return json_encode($userData);
                return $userData;

    }   else {

        die('Connection Failed...');
    }
    
}




/* ################################## Function used to UPDATE a specific user based on their Username. ################################## */

public static function editUserData($userRecord)
{
     /* Initial call to the database connection METHOD */
     $dbConnect = self::getInstance();

     $sql = "INSERT INTO members (name, description, eventSD, eventED, roomId, userId, hostId, IsPublic, RecurrenceType) ";
     $sql .= "VALUES ('$title', '$description', convert(datetime,'$startD'), convert(datetime,'$endD'), $roomId, $userId, $hostId, 1, 'N')";

/* !!!   Function NOT COMPLETED  !!!  */


}



/* ################################## Function used to FETCH a specific user based on their Username. ################################## */

public static function fetchUserByUsername($username){
         
 
    /* Initial call to the database connection METHOD */
    $dbConnect = self::getInstance();

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
                'pwd'   => $usr['pwd'],
                'salt'  => $usr['salt']
            );
            array_push($userData, $json);
        }

            // return json_encode($userData);
                return $userData;
                    print_r($userData);
                    exit();
    }   else {
     
        die('Connection Failed...');
    }

}


/* ################################## Function used to FETCH User data based on their USERID. ################################## */

public static function fetchUserByUserId($userId){
           
           
    /* Initial call to the database connection METHOD */
    $dbConnect = self::getInstance();

    $userData = array();
    $users = array();
    $query = "SELECT * FROM members ";
    $query .= "WHERE userid = '$userId' ";

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
                'pwd'   => $usr['pwd'],
                'salt'  => $usr['salt']
        );
            array_push($userData, $json);
        }

          //   return json_encode($userData);
                return $userData;

    }   else {
     
        die('Connection Failed...');
    }

}



/* ################################## Function used to CHECK the existence of a specific User data based on their USERID. ################################## */

public static function retrieveUsersByUsername($username){
           
           
    /* Initial call to the database connection METHOD */
    $dbConnect = self::getInstance();

    $userData = array();
    $users = array();
    $query = "SELECT COUNT(*) AS Results FROM members ";
    $query .= "WHERE username = '$username' ";

    $results = mysqli_query($dbConnect, $query);

    if($results){

        while($e=$results->fetch_assoc()){
            $users[]=$e;
        }

        $userRecords = json_encode($users);
        $userRecord = json_decode($userRecords, true);
        
          //   return json_encode($userData);
                return $userRecord;

    }   else {
     
        die('Connection Failed...');
    }

}

/* ################################## Function used to FETCH a specific user's name ONLY. ################################## */

public static function fetchUserFnLName($userId){
           
           
            /* Initial call to the database connection METHOD */
            $dbConnect = self::getInstance();
        
            $userData = array();
            $users = array();
            $query = "SELECT * FROM members ";
            $query .= "WHERE userid = '$userId' ";

            $results = mysqli_query($dbConnect, $query);

            if($results){

                while($e=$results->fetch_assoc()){
                    $users[]=$e;
                }
                $userRecords = json_encode($users);
                $userRecord = json_decode($userRecords, true);
                $i=0;
                foreach($userRecord as $usr){
                    $json = array( $usr['userFN'], $usr['userSN']
                );
                    array_push($userData, $json);
                }

                    // return json_encode($userData);
                        return $userData;

            }   else {
             
                die('Connection Failed...');
            }

}


/* ################################## Function used to FETCH user's secure SALT HASH to facilitate site login. ################################## */

public static function fetchUserSalt($username){
          
  
    /* Initial call to the database connection METHOD */
    $dbConnect = self::getInstance();

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
     
/* ################################## Function used to FETCH a SPECIFIC event Record based on its ID. ################################## */

public static function fetchEventById($eventId){
        
        
            /* Initial call to the database connection METHOD */
            $dbConnect = self::getInstance();
        
            $userData = array();
            $users = array();
            $query = "SELECT * FROM Events ";
            $query .= "WHERE eventId = '$eventId' ";

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


/* ################################## Function used to FETCH All event data to be presented via the Calendar UI. ################################## */

public function fetchData()
{

 /* Initial call to the database connection METHOD */
 $dbConnect = self::getInstance();

    
    $data = array();
    
    $query = 'SELECT * FROM Events ORDER BY eventSD';
    $result = mysqli_query($dbConnect, $query);
    
    if($result){
        
        //foreach($result as $row)
        while($e=$result->fetch_assoc())
        {
            /* Collect of database records as OBJECT */
            $data[]=$e;
        }
        
        /* Conversion of database records as OBJECT to STRING */
        $records = json_encode($data);
        /* Conversion of database records as STRING to ASSOCIATIVE ARRAY/ARRAY of ARRAYS */
        $record = json_decode($records, true);
        
        $allEvents = array();
        $json = array();
        $userHost = array();
    
        for($i=0; $i<count($record); $i++){
          
            if(!empty($record[$i]['hostId'])){

                $userHost = array();

                $userHost = self::fetchUserByUserId($record[$i]['hostId']);
           //     $userHost = json_encode($userHost);

                $myfn = $userHost[0]['fname'];
                $mysn = $userHost[0]['sname'];

            }
           
            $json = array(
                'id'          => $record[$i]['eventId'],
                'title'       => $record[$i]['name'],
                'hostSname'   => "$mysn",  
                'hostFname'   => "$myfn",
                'description' => $record[$i]['description'],
                'start'       => $record[$i]['eventSD'],
                'end'         => $record[$i]['eventED']   
            );     

  
                      // Adds each array into the container array
            array_push($allEvents, $json);

        }

         return json_encode($allEvents);
    
        } else {
            
            die('Connection Failed...');
            
        }


}


/* ################################## Function used to AUTHORIZE User Access to the site. ################################## */

     public static function authorizeUser($username, $password){
            
            $dbConnect = self::getInstance();
          
                $query = "SELECT * FROM members "; 
                $query .= "WHERE pwd = '$password' ";
                $query .= "ANd username = '$username' ";
            
            $userData = array();
            $users = array();

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
                        'role'  => $usr['role'],
                        'pwd'   => $usr['pwd']
                    );
                    array_push($userData, $json);
                }

                    return $userData;
            }   else {
             
                die('Connection Failed...');
            }
         
        }


}


?>