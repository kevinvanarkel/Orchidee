<?php
include_once("view_cart.php");
require_once("./security_orders1.php");
?>

<link href="style/style1.css" rel="stylesheet" type="text/css"></head>
<body>
<div class="container">
    <?php
    foreach ($_SESSION['cart_products'] as $value) {
        $allproducts[] = $value['product_name'];
        $aantalproducts[] = $value['product_qty'];
        $prijsperstuk[] = $value['product_price'];
    }

    ?>
    <h4>Hier staan de gegevens op een rijtje, klik op verzenden om uw order te bevestigen</h4>

    <form action="insert.php" method="post">

        <br>Product:<input type="hidden" name="fnaam"
                           style="width:50%; border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1;"
                           value=" <?php echo implode(", ", $allproducts); ?>">

        <input type="hidden" name="qty"
               style="width:50%; border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1;"
               value=" <?php echo implode(",", $aantalproducts); ?>">

        <input type="hidden" name="datum" value="<?php echo date('d/m/y');?>"/>

        <?php echo implode(", ", $allproducts); ?><br>Aantal stuks:
        <?php echo implode(", ", $aantalproducts); ?>

        <br>Prijs per stuk: <?php echo implode(", ", $prijsperstuk); ?>

        <br>Totaalprijs:<input type="hidden" name="prijs"
                            style="width:50%; border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1;"
                            value=" <?php echo htmlspecialchars($grand_total); ?>">
        <?php echo htmlspecialchars($grand_total); ?>
        <input type="hidden" value="0" name="user_id">
        <input type="hidden" name="gebruiker"
                                style="width:50%; border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1;"
                                value="Gebruiker Zonder Account">

        <input type="text" name="verzendadres" placeholder="Afleveradres" style="width:50%; border-radius:0px; margin-top:11px; background-color:#F1F1F1; border:1px solid rgb(168, 168, 168);">

        <textarea rows="5" class="form-control" name="beoordeling"
                                      placeholder="Hoe verliep uw bestelling?"
                                      style="width:50%; border-radius:0px; margin-top:11px; background-color:#F1F1F1; border:1px solid rgb(168, 168, 168);"></textarea><br>

        <input type="submit" value="Verzenden">
    </form>
</div>