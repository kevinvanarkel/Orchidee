<!DOCTYPE html>
<html lang="en">
<head>
    <div class="container">
    <style type="text/css">
            body{
                font-family: Arail, sans-serif;
            }
            /* Formatting search box */
            .search-box{
                width: 300px;
                position: relative;
                display: inline-block;
                font-size: 14px;
            }
            .search-box input[type="text"]{
                height: 32px;
                padding: 5px 10px;
                border: 1px solid #CCCCCC;
                font-size: 14px;
            }
            .result{
                position: absolute;
                z-index: 999;
                top: 80%;
                left: 0;
                background-color:#f2f2f2;
                border:1px solid #CCCCCC;
                padding-top:5px;
                padding-left:5px;
            }
            .search-box input[type="text"], .result{
                width: 100%;
                box-sizing: border-box;
            }
            /* Formatting result items */
            .result p{
                margin: 0;
                padding: 7px;
                border-top: none;
                cursor: pointer;
                background-color:#f1f1f1;
            }
            .result p:hover{
                background: #f2f2f2;
            }

        </style>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.search-box input[type="text"]').on("keyup input", function(){
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if(inputVal.length){
                    $.get("backend-search.php", {term: inputVal}).done(function(data){
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else{
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result p", function(){
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });
        });
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<h2>Zoeken</h2>
<div class="search-box">
    <input type="text" autocomplete="off" placeholder="Welke kleur Orchidee zoekt u..." />
    <div class="result"></div>
</div>
</div>

<div class="container">
</div>
<script>
    $( function() {
        $( "#accordion" ).accordion();
    } );
</script>

<?php
include_once("config.php");

$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<div class="container">
    <div id="accordion">
        <h3>Tussen 20 en 30 euro</h3>
        <div>
            <!--TUSSEN 20 EN 30 EURO-->
            <?php
            $results = $mysqli->query("SELECT * FROM `products` where `price` between 20 and 30");
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
	</div></div>
	</form>
	</li>
EOT;
                }
                $products_item .= '</ul>';
                echo $products_item;
            }
            ?>
        </div>
        <h3>Tussen 10 en 20 euro</h3>
        <div>
            <!--TUSSEN 10 EN 20 EURO-->
            <?php
            $results = $mysqli->query("SELECT * FROM `products` where `price` between 10 and 20");
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
	</div></div>
	</form>
	</li>
EOT;
                }
                $products_item .= '</ul>';
                echo $products_item;
            }
            ?>
        </div>
        <h3>Tussen 0 en 10 euro</h3>
        <div>
            <!--TUSSEN 0 EN 10 EURO-->
            <?php
            $results = $mysqli->query("SELECT * FROM `products` where `price` between 0 and 10");
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
	</div></div>
	</form>
	</li>
EOT;
                }
                $products_item .= '</ul>';
                echo $products_item;
            }
            ?>
        </div>
        <br><br><br>
    </div>
</div>