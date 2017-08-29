<div class="container">
<?php
	$userrole = array("administrator", "root");
	require_once("./security.php");
?>
    <br>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">Klanten Portaal</div>
            <div class="panel-body"><a href='index.php?content=wijzig_wachtwoord'><font size='2px;'>Wachtwoord wijzigen</a></div>
            <div class="panel-body"><a href="index.php?content=orders"><font size='2px;'>Mijn orders</a></div>
            <div class="panel-body"><a href="index.php?content=favorites_portal"><font size='2px;'>Mijn favorieten</a></div>
            <div class="panel-body"><a href="index.php?content=korting"><font size='2px;'>Extra Opdracht</a></div>
            <div class="panel-body"><a href="index.php?content=sm-admin"><font size='2px;'>Sitemap</a></div>
            <div class="panel-body"><a href="index.php?content=avdd"><font size='2px;'>Artikel van de dag</a></div>
        </div>
    </div>
</div>