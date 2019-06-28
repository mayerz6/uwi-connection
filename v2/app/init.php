<?php

require "config/config.php";
require "libraries/core.php";
require "libraries/controller.php";
require "libraries/encryption.php";
require "libraries/site_helpers.php";


spl_autoload_register(function($name){
    require_once 'libraries/' . $name . '.php';
});

?>