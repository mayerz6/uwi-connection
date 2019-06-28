<?php  ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session')); ?>
<?php session_start(); ?>
<?php ob_start(); 

/* Function used to redirect users based on URL string INPUT. */
function redirect ($route){
    header('Location: ' . URLROOT . '/' . $route);
}

/* Function used to produce a notification element to the page. */
function flash($name='', $message='', $class='alert alert-success'){
    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }

            if(!empty($_SESSION[$name . '_class'])){
                unset($_SESSION[$name . '_class']);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        } else  if(empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
                echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name . '_class']);
        }
    }




}




