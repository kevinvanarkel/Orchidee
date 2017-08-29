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
            <div class="panel-heading">Klanten Portaal <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Mijn Favorieten</div>
            <div class="panel-body">
                <?php
                $results = $mysqli->query("SELECT * FROM `favorieten` WHERE `user_id` = " . $_SESSION['id']);

                if ($results) {
                    foreach ($results as $r) {
                        echo"Product: ";
                        echo $r['product_id'];
                        echo '<hr>';
                    }
                }

                ?>
            </div>
        </div>
    </div>
</div>