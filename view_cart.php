<?php
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Winkelmandje</title>
<link href="style/style.css" rel="stylesheet" type="text/css"></head>
<body>
<div class="container"><br><br>
<div class="cart-view-table-back">
<form method="post" action="cart_update.php">
<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Hoeveelheid</th><th>Naam</th><th>Prijs</th><th>Totaal</th><th>Verwijder</th></tr></thead>
  <tbody>
 	<?php

	if(isset($_SESSION["cart_products"])) //check session var
    {
		$total = 0; //total value
		$b = 0; //var for zebra strepen tabel 
		foreach ($_SESSION["cart_products"] as $cart_itm)
        {
			//set variables to use in content below
			$product_name = $cart_itm["product_name"];
			$product_qty = $cart_itm["product_qty"];
			$product_price = $cart_itm["product_price"];
			$product_code = $cart_itm["product_code"];
			//$product_color = $cart_itm["product_color"];
			$subtotal = ($product_price * $product_qty); //Price x Qty
			
		   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class voor zebra strepen tabel 
		    echo '<tr class="'.$bg_color.'">';
			echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
			echo '<td>'.$product_name.'</td>';
			echo '<td>'.$product_price.' Euro</td>';
			echo '<td>'.$subtotal.' Euro</td>';
			echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
            echo '</tr>';
			$total = ($total + $subtotal); //add subtotaal naar far
        }
		
		$grand_total = $total + $shipping_cost; //grand total = + verzendkosten
		foreach($taxes as $key => $value){ //alles samen in array
				$tax_amount     = round($total * ($value / 100));
				$tax_item[$key] = $tax_amount;
				$grand_total    = $grand_total + $tax_amount;  //add tax val to grand total
		}

		$list_tax       = '';
		foreach($tax_item as $key => $value){ //List all taxes
			$list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
		}
		$shipping_cost = ($shipping_cost)?'Verzendkosten: '. sprintf("%01.2f", $shipping_cost).' Euro<br />':'';
	}

    if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])<3) {
        //code
        echo "U moet drie producten in uw winkelmandje hebben om de Actie Van De Dag te kunnen bestellen!";
        echo "<br><br>";
    }

    if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>2)
    {
        //code
        echo "U kunt nu bestellen!";
        echo "<br><br>";
    }

    ?>
    <tr><td colspan="5"><span style="float:right;text-align: right;"><?php echo $shipping_cost ?>Totaal: <?php echo sprintf("%01.2f Euro", $grand_total);?></span></td></tr>
    <tr><td colspan="5"><br><a href="index.php?content=assortiment" class="button" style="font-size:12px; color:white; background-color:lightgray; width:24.5%; float:left;">Voeg meer producten toe</a>
                        <button type="submit" style="font-size:12px; background-color:lightgray; width:24.9%; float:left;">Update</button>
                        <a href="index.php?content=datepicker" class="button" style="font-size:12px; color:white; background-color:lightsteelblue; width:24.9%; float:left;">Checkout voor leden</a>
                        <a href="index.php?content=datepicker1" class="button" style="font-size:12px; color:white; background-color:lightsalmon; width:24.9%; float:left;">Checkout voor bezoekers</a></td></tr>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>
</div>
<!--<form method="post" action="checkout.php">-->
</body>
</html>
