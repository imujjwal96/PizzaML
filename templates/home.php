<?php 
    if (empty($_GET))
    {
        echo '<h1 class="text-center">Welcome to PizzaML</h1>';
    }
    else
    {
?>
<div class = "row">
    <div class = "col-xs-12">
        <h1 class = "text-center">Here are your <?= @$_GET["categ"] ?></h1>
        <table class = "table table-hover text-center" >
            <thead>
                <tr>
                    <th style = "text-align: center">Item</th>
                    <th style = "text-align: center">Size</th>
                    <th style = "text-align: center">Quantity</th>
                    <th style = "text-align: right"></th>
                </tr>
            </thead>
            <tbody>
                <form role = "form " action="cart.php" method="GET">
                <?php
                    $name = $_GET["categ"];
                    $namenospace = str_replace(' ', '', $name);
                    foreach($xml->xpath("/menu/category[@name='$name']/item") as $item)
                    {
                        $item_name = str_replace(' ', '', $item[@name]);
                        echo '<tr>
                                <td>' . $item[@name] . '</td>
                                <td>
                                    <select name="' . $item_name . 'size">
                                        <option />';
                                    foreach($item->size as $size)
                                    {
                                        if($size->price)
                                        echo '<option>'.$size[@type].' - '.$size->price.'</option>';
                                    }
                        echo       '</select>
                                </td>
                                <td><input type="number" min="0" max="20" name="' . $item_name . 'quantity"></td>
                                <td><input type="hidden" value="' . $name . '" name = "categ"></td>
                                <td><input type="submit" value="AddtoCart" name="' . $item_name . 'submit" class="input-group"></td>
                              </tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    }
    
?>