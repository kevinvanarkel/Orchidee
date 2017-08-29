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
            <div class="panel-heading">Klanten Portaal <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Mijn Orders</div>
            <div class="panel-body">
                <?php
                $results = $mysqli->query("SELECT * FROM `order` WHERE `user_id` = " . $_SESSION['id']." ORDER BY id DESC");

                if ($results) {
                    foreach ($results as $r) {
                        echo"Order Id: ";
                        echo $r['id'];
                        echo" <br> Order datum: ";
                        echo $r['datum'];
                        echo" <br> Product: ";
                        echo $r['product'];
                        echo" <br> Stuks: ";
                        echo $r['aantal'];
                        echo" <br> Prijs:";
                        echo $r['prijs'];
                        echo" euro <br> Beoordeling: ";
                        echo $r['beoordeling'];
                        echo" <br> Verzendadres: ";
                        echo $r['verzendadres'];

                        echo '<hr>';
                    }
                }

                ?>
            </div>
        </div>
    </div>
</div>