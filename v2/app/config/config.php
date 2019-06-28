<?php
    /* Definition of the application's ROOT DOCUMENT Path */
    define('APPROOT', dirname(dirname(__FILE__)));
    define('IMAGES_DIR', dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR .'assets' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'posts' . DIRECTORY_SEPARATOR ); 
   
   
    /* Definition of the application's ROOT URL Path */
     define('URLROOT', 'http://localhost/uwi-connection.com/v2');
    /* Definition of the application's ROOT URL Path */


    /* Definition of the application's Oficial Title */
    define('SITENAME', 'BIPA Membership Register');

    define('DB_HOST', '.\SQLExpress');
    define('DB_DRIVE', 'SQL Server');
    define('DB_SERVER', 'SchedulerDB');

        // $connection_string = 'DRIVER={SQL Server};SERVER=localhost\SQLEXPRESS;DATABASE=CIL_SchedulerDB';
       //  $connection_string = 'DRIVER={SQL Server};SERVER=.\SQLEXPRESS;DATABASE=SchedulerDB';
    
/* Define an array of configuration settings. */
$GLOBALS['config'] = array(
    'server' => array(
        'host'     => 'tredia',
        'username' => 'barbados_mayerz',
        'password' => 'M@y3rZT#ch',
        'db' => 'barbados_membersRegistry'
    ),
    'server2' => array(
        'host'     => 'localhost',
        'username' => 'mayerz',
        'password' => 'M@y3rZT#ch',
        'db' => 'uwi-connection'
    ),
    'mysql' => array(
        'connection_string' => 'DRIVER={SQL Server};SERVER=localhost\SQLEXPRESS;DATABASE=kbDbase',
        'username' => 'mayerz',
        'password' => 'M@y3rZT#ch',
        'db' => 'uwi-connection'
    ),
    'mssql' => array(
        'connection_string' => 'DRIVER={SQL Server};SERVER=localhost\SQLEXPRESS;DATABASE=kbDbase',
        'username' => 'sa',
        'password' => 'M@y3rZT#ch',
        'db' => '[kbDbase]'
    ),
    'mssqlv2' => array(
        'connection_string' => 'DRIVER={SQL Server};SERVER=.\SQLEXPRESS;DATABASE=SchedulerDB',
        'username' => 'sa',
        'password' => 'M@y3rZT#ch',
        'db' => '[SchedulerDB]'
    ),
    'mssqlv3' => array(
        'connection_string' => 'DRIVER={SQL Server};SERVER=localhost\SQLEXPRESS;DATABASE=kbDbase',
        'username' => 'sa',
        'password' => 'M@y3rZT#ch',
        'db' => '[KnowledgeDB]'
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
