<?php

/**
 * 
 * CORE CLASS
 * Manages all site URLS in order to facilitate overall functionality.
 * 
 */

 class Core{
     
    /* Designation of private variables used to  */
    /*  pass content across pages within the site. */
    private $_sController = "pages";
    private $_sMethod = "index";
    private $_sParams = array();

    public function __construct(){

        /* Grab the contents of the site's URL string. */
        $url = self::getUrl();

        if(file_exists('app/controllers/' . ucwords($url[0]) . '.php')){
            $this->_sController = ucwords($url[0]); 
                unset($url[0]);
        }

        require_once 'app/controllers/' . $this->_sController . '.php';

        /* Once the controller CLASS has been included; it MUST be instantied. */
        $this->_sController = new $this->_sController;

        if(isset($url[1])){
            if(method_exists($this->_sController, $url[1])){
                $this->_sMethod = $url[1];
                    unset($url[1]);
                }
        }

            $this->_sParams = $url ? array_values($url) : [];

            call_user_func_array([$this->_sController, $this->_sMethod], $this->_sParams);
    }

    public static function getUrl(){

        /* Test for the info entered within the URL string */
        if(isset($_GET['url'])){

            /* Retrieve the text entered in the URL */
            /* The remove the forward last forward slash if it exists. */
            $url = rtrim($_GET['url'], '/');

            /* Sanitize all the text entered before being processed. */
            $url = filter_var($url, FILTER_SANITIZE_URL);

            /* PHP 'explode' function will be used to create an array containing
            all information entered within the URL. */
            $url = explode('/', $url);

            return $url;         
        }
    }

/* Function used to retrieve elemets of the site's GLOBALLY defined variables */
/*    in a quick yet systemmatic way. */
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
