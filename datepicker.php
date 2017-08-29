<?php
include_once("view_cart.php");
require_once("./security_orders.php");
?>

<link href="style/style1.css" rel="stylesheet" type="text/css"></head>
<body>
<div class="container">
    <?php
    $user_id = $_SESSION['id'];
    foreach ($_SESSION['cart_products'] as $value) {
        //var_dump($_SESSION['cart_products']);
        $allproducts[] = $value['product_name'];
        $aantalproducts[] = $value['product_qty'];
        $prijsperstuk[] = $value['product_price'];
    }

    if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])<3 AND 'SELECT FROM products WHERE `price` != `oudeprijs`') {
        $sql = "UPDATE `products` SET `price`= `oudeprijs` where `product_code` = '$product_code'";
        echo"<br><br>";
    }

    $con = mysqli_connect('127.0.0.1','root','');

    if(!$con)
    {
        echo 'Er is iets fout gegaan!';
    }

    if(!mysqli_select_db($con,'orchidee'))
    {
        echo 'De database is niet geselecteerd';
    }

    if(!mysqli_query($con,$sql))
    {
        echo 'Query niet gevuld';
    }
    else
    {
        //echo 'Query verstuurd';
    }

    ?>
    <h4>Hier staan de gegevens op een rijtje, klik op verzenden om uw order te bevestigen</h4>

    <form action="insert.php" method="post">

        <br>Product:
        <input type="hidden" name="fnaam"
               style="width:50%; border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1;"
               value=" <?php echo implode(", ", $allproducts); ?>">
        <input type="hidden" name="qty"
               style="width:50%; border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1;"
               value=" <?php echo implode(",", $aantalproducts); ?>">
        <input type="hidden" name="datum" value="<?php echo date('d/m/y'); ?>"/>
        <?php echo implode(", ", $allproducts); ?>

        <br>Aantal stuks: <?php echo implode(", ", $aantalproducts); ?>
        <br>Prijs per stuk: <?php echo implode(", ", $prijsperstuk); ?>
        <br>Totaalprijs:<input type="hidden" name="prijs"
                               style="width:50%; border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1;"
                               value=" <?php echo htmlspecialchars($grand_total); ?>">

        <?php echo htmlspecialchars($grand_total); ?>

        <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
        <br>De klantnaam:
        <input type="hidden" name="gebruiker"
               style="width:50%; border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1;"
               value=" <?php echo $_SESSION['username']; ?>">

        <?php echo $_SESSION['username']; ?>

        <?php
        $results = $mysqli->query("SELECT * FROM `users` WHERE `id` = " . $_SESSION['id']);

        if ($results) {
            foreach ($results as $r) {
            }
        }

        ?>

        <br><br>Wijzig uw adres indien u een afwijkend afleveradres heeft:<input type="text" value="<?php echo $r['adres']?>" name="verzendadres" placeholder="Afleveradres" style="width:50%; border-radius:0px; margin-top:11px; background-color:#F1F1F1; border:1px solid rgb(168, 168, 168);">

        <textarea rows="5" class="form-control" name="beoordeling"
                                      placeholder="Hoe verliep uw bestelling?"
                                      style="width:50%; border-radius:0px; margin-top:11px; background-color:#F1F1F1; border:1px solid rgb(168, 168, 168);"></textarea><br>

        <input type="submit" value="Verzenden">

    </form>
</div>