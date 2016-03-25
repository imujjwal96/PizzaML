<?php
    /********************************
    * Configures Pages              *
    ********************************/  
    
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    //Requiring the functions
    require("functions.php");
    
    // Enables the Session
    session_start();
    
    if(!isset($_SESSION["user"]))
    {
        $_SESSION["user"] = array();
    }
    
?>
