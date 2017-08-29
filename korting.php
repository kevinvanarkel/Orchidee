<div class="container">
    <?php
    //wie kan er komen op deze pagina
    $userrole = array("administrator");
    require_once("./security.php");
    include_once("config.php");
    //ophalen van gegevens
    $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    $results = $mysqli->query("SELECT * FROM `products`");
    echo"<br>";

    if ($results) {
        foreach ($results as $r) {
            echo"Product ID: ";
            echo $r['id'];
            echo"<br> Code: ";
            echo $r['product_code'];
            echo"<br> Naam: ";
            echo $r['product_name'];
            echo"<br> Laatste verkoop: ";
            echo $r['laatsteverkoop'];
            echo"<br> Prijs: ";
            echo $r['price'];
            $old_price = $r['price'];
            $new_price = $old_price * 0.75;
            echo "<br> Actie prijs: ";
            echo $new_price;
            echo"<br>";

            //maak streefdatum aan
            $date = date_create($r['laatsteverkoop']);
            date_add($date, date_interval_create_from_date_string('2 months'));

            //if else voor ingang actie
            if (date("Y-m-d") == date_format($date, 'Y-m-d')) {
                echo "<p style='color:green;'>Er is een actie gevonden voor dit product, prijs wordt aangepast op de website!</p>";
                $sql = "UPDATE `products` SET `price`= $new_price where `id` = ".$r['id']."";
                //$sql1 = "UPDATE `products` SET `discountdate`= now() where `id` = ".$r['id']."";
            } else {
                echo "<p style='color:red;'>Er is geen actie gevonden voor dit product</p>";
            }

            //maak streefdatum aan
            $test = date_create($r['laatsteverkoop']);
            date_add($test, date_interval_create_from_date_string('1 month'));

            //if else voor uitgang datum
            if ($old_price != $new_price and date("Y-m-d") == date_format($test, 'Y-m-d')) {
                $sql = "UPDATE `products` SET `price`= ".$r['oudeprijs']." where `id` = ".$r['id']."";
                echo "<p style='color:green;'>De actie wordt vandaag verwijderd en de oude prijs wordt teruggezet!";
            } else {
                echo "";
            }

            echo '<hr>';
        }
    }

    ?>

    <?php
    //regels om te kijken of er connectie is
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
        echo 'Query verstuurd';
    }

    ?>
</div>