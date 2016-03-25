<?php 
    require_once("../includes/config.php");
    $xml = simplexml_load_file("../includes/food.xml");
   
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {   
        if (empty($_GET))
        {
            if(empty($_SESSION["user"]))
                render("cart.php", ["title" => "Cart", "empty" => true]);
            else 
                render("cart.php", ["title" => "Cart", "empty" => false]);
        }
        else 
        {
           $name = $_GET["categ"];
           foreach($xml->xpath("/menu/category[@name='$name']/item") as $item)
           {
               $item_name = str_replace(' ', '', $item[@name]);
               $submit = $item_name . 'submit';
               $quantity = $item_name . 'quantity';
               $size = $item_name . 'size';
               $x = explode(" ", $_GET[$size]);
               $actual_size = $x[0];
               if(isset($_GET[$submit]))
               {
                    if(!isset($_SESSION["user"][$item_name]))
                    {
                        $y = array();
                        $y[$actual_size]["quantity"] = 0;
                        $_SESSION["user"][$item_name] = $y;
                        @$_SESSION["user"][$item_name][$actual_size]["quantity"] += $_GET[$quantity];
                        
                    }
                    else {
                        $_SESSION["user"][$item_name][$actual_size]["quantity"] += $_GET[$quantity];
                    }
                    $_SESSION["user"][$item_name][$actual_size]["price"] = $x[2];

                    
                    render("cart.php", ["empty" => false]);
               }
           }
        }
    }

?>