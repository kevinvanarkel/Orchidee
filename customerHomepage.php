<div class="container">

<?php
	$userrole = array("customer", "root", "administrator", "developer", "photographer", "zaalbeheerder");
	require_once("./security.php");
?>

    <br>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">Klanten Portaal</div>
            <div class="panel-body"><a href='index.php?content=wijzig_wachtwoord'><font size='2px;'>Wachtwoord wijzigen</a></div>
            <div class="panel-body"><a href="index.php?content=orders"><font size='2px;'>Mijn orders</a></div>
            <div class="panel-body"><a href="index.php?content=favorites_portal"><font size='2px;'>Mijn favorieten</a></div>
        </div>
    </div>
</div>