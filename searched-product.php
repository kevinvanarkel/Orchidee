<?php
include_once("config.php");

$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<div class="container">
        <div>
            <?php
            $query = parse_url($url, PHP_URL_QUERY);
            parse_str($query, $parts);
            echo"<br><br>";
            $results = $mysqli->query("SELECT * FROM `products` where `id` = ".$parts['id']."");
            if($results){
                $products_item = '<ul class="products">';

                while($obj = $results->fetch_object())
                {
                    $products_item .= <<<EOT
	<li class="product">
	<form method="post" action="cart_update.php">
	<div class="product-content"><h3>{$obj->product_name}</h3>
	<div class="product-thumb"><img src="images/{$obj->product_img_name}"></div>
	<div class="product-desc"><h5>{$obj->product_desc}</h5></div>
	<div class="product-info">
	Prijs {$obj->price} euro
	
	<fieldset>
	
	</fieldset>
	<input type="hidden" name="product_code" value="{$obj->product_code}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<br><div align="right"><a href="http://localhost/orchidee/index.php?content=search-form" style="color:green;">Terug naar zoekscherm</a></div><br>
	</div>
	</form>
	</li>
EOT;
                }
                $products_item .= '</ul>';
                echo $products_item;
            }

            ?>
        </div>