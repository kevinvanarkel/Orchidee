<div class="container">

    <h5>Do you rather have the English version of the website? <a href="index.php?content=hp"
                                                                  style="font-size:13px; text-decoration:none;">Click
            Here!</a></h5>

    <h3>Homepage</h3>
    <p>Welkom op de orchideen website van Nederland! Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque
        penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque
        eu, pretium quis, sem. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
        dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec
        quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Lorem ipsum dolor sit amet, consectetuer
        adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
        parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
        sem. </p>

</div>

<?php
include_once("config.php");

$current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Orchidee</title>
    <link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <h3>Recente Modellen</h3>

    <!-- Products List Start -->
    <?php
    $results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price FROM products where id <=4");
    if ($results) {
        $products_item = '<ul class="products">';

        while ($obj = $results->fetch_object()) {
            $products_item .= <<<EOT
	<li class="product">
	<form method="post" action="cart_update.php">
	<div class="product-content"><h3>{$obj->product_name}</h3>
	<div class="product-thumb"><img src="images/{$obj->product_img_name}"></div>
	<div class="product-desc"><h5>{$obj->product_desc}</h5></div>
	<div class="product-info">
	
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

    <h3>Zoeken</h3>
    <p>Hier kunt u zoeken in ons assortiment. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque
        penatibus et magnis dis parturient montes. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque
        penatibus et magnis dis parturient montes. consectetues adipiscing elit ligula eget dolor aenean massa, magnis
        dis parturient.</p>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Zoek naar orchideen">

    <table id="myTable">
        <tr class="header">
            <th style="width:50%;">Naam</th>
            <th style="width:50%;">Prijs</th>
        </tr>
        <tr>
            <td>
                <?php
                $results = $mysqli->query("SELECT * FROM `products` where id=1");

                if ($results) {
                    foreach ($results as $r) {
                        echo $r['product_name'];
                    }
                }
                ?>
            </td>
            <td>
                <?php
                $results = $mysqli->query("SELECT * FROM `products` where id=1");

                if ($results) {
                    foreach ($results as $r) {
                        echo $r['price'];
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                $results = $mysqli->query("SELECT * FROM `products` where id=2");

                if ($results) {
                    foreach ($results as $r) {
                        echo $r['product_name'];
                    }
                }
                ?>
            </td>
            <td>
                <?php
                $results = $mysqli->query("SELECT * FROM `products` where id=2");

                if ($results) {
                    foreach ($results as $r) {
                        echo $r['price'];
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                $results = $mysqli->query("SELECT * FROM `products` where id=3");

                if ($results) {
                    foreach ($results as $r) {
                        echo $r['product_name'];
                    }
                }
                ?>
            </td>
            <td>
                <?php
                $results = $mysqli->query("SELECT * FROM `products` where id=3");

                if ($results) {
                    foreach ($results as $r) {
                        echo $r['price'];
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                $results = $mysqli->query("SELECT * FROM `products` where id=4");

                if ($results) {
                    foreach ($results as $r) {
                        echo $r['product_name'];
                    }
                }
                ?>
            </td>
            <td>
                <?php
                $results = $mysqli->query("SELECT * FROM `products` where id=4");

                if ($results) {
                    foreach ($results as $r) {
                        echo $r['price'];
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                $results = $mysqli->query("SELECT * FROM `products` where id=5");

                if ($results) {
                    foreach ($results as $r) {
                        echo $r['product_name'];
                    }
                }
                ?>
            </td>
            <td>
                <?php
                $results = $mysqli->query("SELECT * FROM `products` where id=5");

                if ($results) {
                    foreach ($results as $r) {
                        echo $r['price'];
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                $results = $mysqli->query("SELECT * FROM `products` where id=6");

                if ($results) {
                    foreach ($results as $r) {
                        echo $r['product_name'];
                    }
                }
                ?>
            </td>
            <td>
                <?php
                $results = $mysqli->query("SELECT * FROM `products` where id=6");

                if ($results) {
                    foreach ($results as $r) {
                        echo $r['price'];
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                $results = $mysqli->query("SELECT * FROM `products` where id=7");

                if ($results) {
                    foreach ($results as $r) {
                        echo $r['product_name'];
                    }
                }
                ?>
            </td>
            <td>
                <?php
                $results = $mysqli->query("SELECT * FROM `products` where id=7");

                if ($results) {
                    foreach ($results as $r) {
                        echo $r['price'];
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                $results = $mysqli->query("SELECT * FROM `products` where id=8");

                if ($results) {
                    foreach ($results as $r) {
                        echo $r['product_name'];
                    }
                }
                ?>
            </td>
            <td>
                <?php
                $results = $mysqli->query("SELECT * FROM `products` where id=8");

                if ($results) {
                    foreach ($results as $r) {
                        echo $r['price'];
                    }
                }
                ?>
            </td>
        </tr>
    </table>

    <br>
    <h3>Bestelprocedure</h3>
    <p>Onze bestelprocedure bestaat uit meerdere processen. Lees hieronder meer over deze processen!</p>
    <button type="button" class="btn btn-standard" data-toggle="collapse" data-target="#demo"
            style="width:15%; background-color:#cdcdcd; color:#000;">Lees hier meer!
    </button>
    <div id="demo" class="collapse">
        <p><br>De procedure gaat als volgt, u kiest een of meerdere Orchideen uit ons assortiment uit. Daarna kunt u
            ervoor kiezen om naar de kassa te gaan. <br>U selecteert checkout en dan kunt u uw order bekijken. Als u
            verzenden selecteert wordt uw order definitief en mag u hem betalen.<br>Als u betaald heeft en een account
            heeft kunt u uw order terugzien in uw klantenportaal.</p>
    </div>

    <br><br>
    <h3>Bestelvoorwaarden</h3>
    <p>Bekijk hier de voorwaarden die betrekking hebben op onze bestelprocedure.</p>
    <button type="button" class="btn btn-standard" style="width:15%; background-color:#cdcdcd; color:#000;"><a
                href="bestelvoorwaarden.pdf" style="text-decoration:none;">Lees hier meer!</a></button>

    <br><br>
    <h3>Zoeken</h3>
    <p>Op deze pagina kunt u geavanceerd zoeken.</p>
    <button type="button" class="btn btn-standard" style="width:15%; background-color:#cdcdcd; color:#000;"><a
                href="http://localhost/orchidee/index.php?content=search-form" style="text-decoration:none;">Zoeken</a>
    </button>

    <br><br>
    <h3 style="text-transform:none;">U kunt onze mooie modellen bestellen via de orchideen pagina!</h3><br><br>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<script>
    var $rows = $('#myTable tr');
    $('#myInput').keyup(function () {
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $rows.show().filter(function () {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
</script>
</body>
</html>
