<div class="container">

    <?php
    $userrole = array("customer", "root", "administrator");
    require_once("./security.php");
    include_once("config.php");

    $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    ?>

    <br>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">Klanten Portaal <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Artikel van de dag</div>
            <div class="panel-body" style="margin-top:-35px;">
                <?php
                $query = parse_url($url, PHP_URL_QUERY);
                parse_str($query, $parts);
                echo"<br><br>";
                $results = $mysqli->query("SELECT * FROM `products` where `id` = ".$parts['id']."");
                if($results){
                    $products_item = '<ul class="products">';

                    while($obj = $results->fetch_object())
                    {
                        $products_item .= <<<EOT
                        Het artikel van de dag is nu: $obj->product_name
EOT;
                    }
                    $products_item .= '</ul>';
                    echo $products_item;
                }

                ?>

                <?php
                if ($results) {
                    foreach ($results as $r) {
                        echo"<br> Normale Prijs: ";
                        echo $r['price'];
                        $old_price = $r['price'];
                        $new_price = $old_price * 0.50;
                        echo "<br> Artikel van de dag prijs: ";
                        echo $new_price;
                        echo"<br>";

                        //AANVANG AVDD
                        $datum = date('H:i');
                        $datum=date('H:i', strtotime($datum));;
                        $aanvang = date('H:i', strtotime("10:59"));
                        $uitgang = date('H:i', strtotime("14:00"));

                        if (($datum > $aanvang)&&($datum < $uitgang)) {
                            $sql = "UPDATE `products` SET `price`= $new_price where `id` = ".$r['id']."";
                            echo "<p style='color:green;'>De prijs wordt aangepast op de website!</p>";
                        } else {
                            echo "<p style='color:red;'>De huidige tijd moet tussen 11:00 en 13:00 zijn om de actie te laten gelden</p>";
                        }

                        //UITGANG AVDD
                        $afgelopen = date('H:i', strtotime("13:01"));

                        if ($datum == $afgelopen) {
                            $sql = "UPDATE `products` SET `price`= ".$r['oudeprijs']." where `id` = ".$r['id']."";
                            echo "<p style='color:green;'>De actie wordt nu verwijderd en de prijs wordt teruggezet!";
                        } else {
                            echo "";
                        }
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
        </div>
    </div>
</div>