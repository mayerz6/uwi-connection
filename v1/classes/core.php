<?php

  /* Definition of the application's Oficial Title */
  define('SITENAME', 'BIPA Membership Registry');

  define('DB_HOST', '.\SQLExpress');
  define('DB_DRIVE', 'SQL Server');
  define('DB_SERVER', 'SchedulerDB');

 
/* Define an array of configuration settings. */
$GLOBALS['config'] = array(
  'mssql' => array(
      'connection_string' => 'DRIVER={SQL Server};SERVER=localhost\SQLEXPRESS;DATABASE=CIL_SchedulerDB',
      'username' => 'sa',
      'password' => 'M@y3rZT#ch',
      'db' => '[CIL_SchedulerDB]'
  ),
  'server' => array(
      'host'     => 'tredia',
      'username' => 'barbados_mayerz',
      'password' => 'M@y3rZT#ch',
      'db' => 'barbados_membersRegistry'
  ),
  'testServer' => array(
    'host'     => 'localhost',
    'username' => 'mayerz',
    'password' => 'M@y3rZT#ch',
    'db' => 'uwi-connection'
),
  'table' => array(
      'users' => '[dbo].[Users]',
      'events' => '[dbo].[Events]',
      'rooms' => '[dbo].[Rooms]'
  ),
  'remember' => array(
      'cookie_name' => 'hash',
      'cookie_expiry' => 1800
  ),
  'session' => array(
      'session_name' => 'user'
  )
);

class Core{
  public static function get($path = null){
      if($path){
          $config = $GLOBALS['config'];
              $path = explode('/', $path);

              foreach($path as $bit){
                  if(isset($config[$bit])){
                     $config = $config[$bit];
                  }
              }

              return $config;
      }
  }
  

}

  
?>
