<!DOCTYPE HTML>
<html>
    <head>
        <title>PizzaML</title>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1, maximum-scale = 1">
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />
        <meta name="Author" content="" />
        
        <!--    Facebook Open Graph Tags    -->
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:site_name" content="" />
        <meta property="og:description" content="" />
        <meta property="og:image" content="" />
        
        <link href="Content/bootstrap.min.css" rel="stylesheet" />
        <link rel="shortcut icon" href="img/favicon.png" />
    </head>
    <body>
        <!-- Anything Relevant Starts Here-->
        <!-- Header of the Page-->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        PizzaML
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php
                                    $xml = simplexml_load_file("../includes/food.xml");   
                                    foreach($xml->category as $category)
                                    {
                                        $item_name=$category[@name];
                                        $item_name2 = str_replace(' ', '%20', $item_name);
                                        echo '<li><a href="index.php?categ=' . $item_name2 . '">' . $item_name . '</a></li>';
                                    }
                                ?>
                                
                            </ul>
                        </li>
                        <li><a href="cart.php">Cart</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main Body -->
        <div class = "container">