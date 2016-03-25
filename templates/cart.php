<?php 
    if($empty === true)
    {
        echo '<h1 class = "text-center">Your Cart is Empty</h1>';
    }
    else
    {
        ?>
        <h1 class="text-center">Order Summary</h1>
        <table class = "table table-hover text-center" >
            <thead>
                <tr>
                    <th style = "text-align: center">Item</th>
                    <th style = "text-align: center">Size</th>
                    <th style = "text-align: center">Quantity</th>
                    <th style = "text-align: center">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                    foreach($xml->xpath("/menu/category[@name]/item") as $item)
                    {
                        $item_name = str_replace(' ', '', $item[@name]);
                        
                        if (isset($_SESSION["user"][$item_name]))
                        {
                            if(isset($_SESSION["user"][$item_name]["Large"]))
                            {
                                $ans = "Large";
                            }
                            else {
                                $ans = "Small";
                            }
                            if(!isset($sum))
                                $sum  = ($_SESSION["user"][$item_name][$ans]["price"] * $_SESSION["user"][$item_name][$ans]["quantity"]);
                            else
                                $sum += ($_SESSION["user"][$item_name][$ans]["price"] * $_SESSION["user"][$item_name][$ans]["quantity"]);
                            echo '  <tr>
                                        <td>' . $item_name . '</td>
                                        <td>' . $ans . ' </td>
                                        <td>' . $_SESSION["user"][$item_name][$ans]["quantity"] . '</td>
                                        <td>' . ($_SESSION["user"][$item_name][$ans]["price"] * $_SESSION["user"][$item_name][$ans]["quantity"])  . '</td>
                                    </tr>';
                        }
                    }
                    
                ?>
                <tr>
                    <td />
                    <td />
                    <td><strong>Total : <?= $sum; ?></strong> </td>
                    <td>
                        <form role = "form" method = "POST" action = "confirmation.php">
                            <input type = "submit" value = "Check Out">
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
<?php
    }
?>