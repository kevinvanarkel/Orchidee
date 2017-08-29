<?php
include_once("view_cart.php");
/*echo $shipping_cost ?>Totaal: <?php echo sprintf("%01.2f Euro", $grand_total);*/
//echo $product_qty;
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orchidee";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `products` SET `aantalKeerVerhuurd` = `aantalKeerVerhuurd` + '$product_qty' WHERE `product_name` = '$product_name'";

if ($conn->query($sql) === TRUE) {
    echo "<font color='white'>Bedankt voor uw bestelling. U wordt teruggestuurd naar de homepage!";
    header("refresh:5;url=http://localhost/videotheek/index.php?content=algemeneHomepage");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Checkout</title>
<link href="style/style1.css" rel="stylesheet" type="text/css"></head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
 
</body>
</html>