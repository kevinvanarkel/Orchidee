<?php
$con = mysqli_connect('127.0.0.1','root','');

if(!$con)
{
    echo 'Er is iets fout gegaan!';
}

if(!mysqli_select_db($con,'orchidee'))
{
    echo 'De database is niet geselecteerd';
}

$product = $_POST['fnaam'];
$qty = $_POST['qty'];
$prijs = $_POST['prijs'];
$user_id = $_POST['user_id'];
$beoordeling = $_POST['beoordeling'];
$gebruiker = $_POST['gebruiker'];
$datum = $_POST['datum'];
$verzendadres = $_POST['verzendadres'];

$product_trim = trim($product," ");
$sql = "INSERT INTO `order` (datum, product, aantal, prijs, klantnaam, user_id, beoordeling, verzendadres) values ('$datum','$product','$qty','$prijs','$gebruiker','$user_id','$beoordeling','$verzendadres')";
$sql1 = "UPDATE `products` SET `laatsteverkoop`= CAST(now() AS DATE) WHERE `product_name`= '$product_trim'";

if(!mysqli_query($con,$sql1))
{
    echo 'Er is iets fout gegaan!<br><br>';
}
else
{
    header("refresh:0.1; url=index.php?content=order_bedankt");
}

if(!mysqli_query($con,$sql))
{
    echo 'Er is iets fout gegaan!<br><br>';
}
else
{
    header("refresh:0.1; url=index.php?content=order_bedankt");
}

?>

