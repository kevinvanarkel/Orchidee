<?php
require_once("classes/LoginClass.php");
require_once("classes/SessionClass.php");
include("security_orders2.php");

$sql = "DELETE FROM `favorieten` WHERE `user_id` = ('" . $_SESSION["id"] . "') and `product_id`  = ('" . $_GET["id"] . "')";
$database->fire_query($sql);

header("refresh:4;url=index.php?content=assortiment");
?>
<div class="container">
    <?php echo"<h4>Het product is uit uw favorietenlijst verwijderd! Ga naar uw portaal om uw favorietenlijst te bekijken.</h4>";?>
</div>

