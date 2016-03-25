<?php 
    require_once("../includes/config.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {       
        $_SESSION = [];
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }
        session_destroy();
        render("confirmation.php", ["title", "Confirmation"]);    
    }
    else 
    {
        redirect("index.php");
    }
?>