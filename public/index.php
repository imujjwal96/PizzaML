<?php 
    require_once("../includes/config.php");
     
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("home.php");
    }
    
?>
