<?php

   // $connection_string = 'DRIVER={SQL Server};SERVER=localhost\SQLEXPRESS;DATABASE=CIL_SchedulerDB';
    // $connection_string = 'DRIVER={SQL Server};SERVER=.\SQLEXPRESS;DATABASE=SchedulerDB';
   // $user = 'sa';
   // $pass = 'M@y3rZT#ch';       
    
   // $connection = odbc_connect($connection_string, $user, $pass);
    
    
$dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "uwi-connection"; // the name of the database that you are going to use for this project
$dbuser = "mayerz"; // the username that you created, or were given, to access your database
$dbpass = "M@y3rZT#ch"; // the password that you created, or were given, to access your database
 
$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// if ($connection == false) {
 //   echo "Calendar is currently under maintenance";
// } else {
   //  echo "Successful Connection!!!!";
// }

    ?>