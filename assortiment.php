<?php
include_once("config.php");

$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Orchidee</title>
    <link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">

    <h3>Alle Modellen</h3>

    <?php
    //sessie aanroepen
    if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
    {
        echo '<div class="cart-view-table-front" id="view-cart">';
        echo '<h3>Winkelmandje</h3>';
        echo '<form method="post" action="cart_update.php">';
        echo '<table width="100%"  cellpadding="6" cellspacing="0">';
        echo '<tbody>';

        $total =0;
        $b = 0;

        //foreach voor producten view
        foreach ($_SESSION["cart_products"] as $cart_itm)
        {
            $product_name = $cart_itm["product_name"];
            $product_qty = $cart_itm["product_qty"];
            $product_price = $cart_itm["product_price"];
            $product_code = $cart_itm["product_code"];
            //$product_color = $cart_itm["product_color"];
            $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
            echo '<tr class="'.$bg_color.'">';
            echo '<td>Hoeveelheid <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
            echo '<td>Product: '.$product_name.'</td>';
            //echo '<td>Verwijder<input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> </td>';
            echo '</tr>';
            $subtotal = ($product_price * $product_qty);
            $total = ($total + $subtotal);
        }
        echo '<td colspan="4">';
        echo '<button type="submit">Update</button><a href="index.php?content=view_cart" class="button" style="font-size:12px; color:white;">Kassa</a>';
        echo '</td>';
        echo '</tbody>';
        echo '</table>';

        $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
        echo '</form>';
        echo '</div>';

    }

    /*if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])<3) {
        echo"U moet drie producten in uw winkelmandje hebben om de Actie Van De Dag te kunnen kopen!";
    }*/

    if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])<3 && 'SELECT product_code, product_name, product_desc, product_img_name, price, oudeprijs FROM products WHERE `price` != `oudeprijs`') {
        echo"U moet drie producten in uw winkelmandje hebben om de Actie Van De Dag te kunnen kopen!";
    }
    ?>

    <!-- producten lijst start -->
    <?php
    $results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price, oudeprijs FROM products ORDER BY id ASC");
    if($results){
        $products_item = '<ul class="products">';

        while($obj = $results->fetch_object())
        {
            if($obj->price<$obj->oudeprijs){
                $string = '<h6>Prijs</h6> <h6 style="text-decoration: line-through; margin-top:-23px; margin-left:32px;"> '.$obj->oudeprijs.'</h6>'.$obj->price.'</h6>';
            }
            else{
                $string = '<h6>Prijs</h6> '.$obj->price;
            }
           // var_dump($obj); exit();
            $products_item .= <<<EOT
	<li class="product">
	<form method="post" action="cart_update.php">
	<div class="product-content"><h3>{$obj->product_name}</h3>
	<div class="product-thumb"><img src="images/{$obj->product_img_name}"></div>
	<div class="product-desc">{$obj->product_desc}</div>
	<div class="product-info">
	{$string} euro
	
	<fieldset>
	
	<label>
		<span>Aantal</span>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	</label>
	
	</fieldset>
	<input type="hidden" name="product_code" value="{$obj->product_code}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="right"><button type="submit" class="add_to_cart">Bestellen</button></div><br>
	<a href="index.php?content=favorites&id={$obj->product_name}" style="font-size:11.9px;">Voeg toe aan favorieten</a>
	<a style="font-size:10px;">|</a>
	<a href='index.php?content=delete&id={$obj->product_name}' style="font-size:11.8px">Verwijder uit Favorieten</a>
	</div></div>
	</form>
	</li>
EOT;
        }
        $products_item .= '</ul>';
        echo $products_item;
    }
    ?>
    <br><br>

    <h3>Kortingen en Acties</h3>

    <!-- Products List Start -->
    <?php
    $results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price, oudeprijs FROM products WHERE `price` != `oudeprijs`");
    if($results){
        $products_item = '<ul class="products">';

        while($obj = $results->fetch_object())
        {
            if($obj->price<$obj->oudeprijs){
                $string = '<h6>Prijs</h6> <h6 style="text-decoration: line-through; margin-top:-23px; margin-left:32px;"> '.$obj->oudeprijs.'</h6>'.$obj->price.'</h6>';
            }
            else{
                $string = '<h6>Prijs</h6> '.$obj->price;
            }
            // var_dump($obj); exit();
            $products_item .= <<<EOT
	<li class="product">
	<form method="post" action="cart_update.php">
	<div class="product-content"><h3>{$obj->product_name}</h3>
	<div class="product-thumb"><img src="images/{$obj->product_img_name}"></div>
	<div class="product-desc">{$obj->product_desc}</div>
	<div class="product-info">
	{$string} euro
	
	<fieldset>
	
	<label>
		<span>Aantal</span>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	</label>
	
	</fieldset>
	<input type="hidden" name="product_code" value="{$obj->product_code}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="right"><button type="submit" class="add_to_cart">Bestellen</button></div><br>
	<a href="index.php?content=favorites&id={$obj->product_name}" style="font-size:11.9px;">Voeg toe aan favorieten</a>
	<a style="font-size:10px;">|</a>
	<a href='index.php?content=delete&id={$obj->product_name}' style="font-size:11.8px">Verwijder uit Favorieten</a>
	</div></div>
	</form>
	</li>
EOT;
        }
        $products_item .= '</ul>';
        echo $products_item;
    }
    ?>
    <br><br>
</div>
</body>
</html>
