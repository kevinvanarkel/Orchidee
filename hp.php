<div class="container">

    <h5>Heeft u liever de Nederlandse website? <a href="index.php?content=algemeneHomepage" style="font-size:13px; text-decoration:none;">Klik Hier!</a></h5>

    <h3>Homepage</h3>
    <p>Welcome on the Orchid website of the Netherlands! Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. </p>

</div>

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
    <h3>Recent Models</h3>

    <!-- Products List Start -->
    <?php
    $results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price FROM products where id <=4");
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

    <h3>Search</h3>
    <p>This is the please where you can find all of our products. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes. consectetues adipiscing elit ligula eget dolor aenean massa, magnis dis.</p>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for orchids">

    <table id="myTable">
        <tr class="header">
            <th style="width:50%;">Name</th>
            <th style="width:50%;">Price</th>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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
        </tr><tr>
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

    <br><h3>Orderprocedure</h3>
    <p>Our orderprocedure contains more than one proces. Click the link below to read more about our processes!</p>
    <button type="button" class="btn btn-standard" data-toggle="collapse" data-target="#demo" style="width:15%; background-color:#cdcdcd; color:#000;">Click to read more!</button>
    <div id="demo" class="collapse">
        <p><br>This is how our proces starts, you choose one or more Orchids. After that you can choose to get to the checkout. <br>You select checkout and than you can view your order before proceeding. If you press send, your order will be processed and you have to pay.<br>If you paid and you have an account on our website, you can look your order up at you customerportal.</p>
    </div>

    <br><br><h3>Orderconditions</h3>
    <p>Click here to see the orderconditions related to our orderprocedure.</p>
    <button type="button" class="btn btn-standard" style="width:15%; background-color:#cdcdcd; color:#000;"><a href="bestelvoorwaarden.pdf" style="text-decoration:none;">Click to read more!</a></button>

    <br><br><h3>Search</h3>
    <p>On this page you can use our advanced search engine</p>
    <button type="button" class="btn btn-standard" style="width:15%; background-color:#cdcdcd; color:#000;"><a href="http://localhost/orchidee/index.php?content=search-form" style="text-decoration:none;">Search</a></button>

    <br><br><h3 style="text-transform:none;">You can see all of our nice Orchids at the Orchideen page!</h3><br><br>
</div>

<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</body>
</html>
