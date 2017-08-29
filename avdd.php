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
            <div class="panel-body">
                <?php
                $results = $mysqli->query("SELECT * FROM `products`");

                if ($results) {
                    foreach ($results as $r) {
                        echo"Product id:";
                        echo $r['id'];
                        echo "<br> Product code: ";
                        echo $r['product_code'];
                        echo "<br> Product naam: ";
                        echo $r['product_name'];
                        echo "<br><br><a href='index.php?content=avdd1&id=".$r['id']."'><button type='button' style='width:15%; background-color:lightgreen;'>Kies product van de dag</button></a>";
                        echo '<hr>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>