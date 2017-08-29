<?php
require_once("classes/LoginClass.php");
require_once("classes/SessionClass.php");
include("security_orders2.php");

$sql = "INSERT INTO `favorieten` (`user_id`,
                                  `product_id`)
                    VALUES       ('" . $_SESSION["id"] . "',
                                  '" . $_GET["id"] . "')";
$database->fire_query($sql);

header("refresh:4;url=index.php?content=assortiment");
?>
<div class="container">
<?php echo "<h4>Het product is aan uw favorietenlijst toegevoegd! Ga naar uw portaal om uw favorietenlijst te bekijken.</h4>";?>
</div>
