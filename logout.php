<div class="container">
<?php
	require_once("./classes/SessionClass.php");	
	$session->logout();	
	echo "U wordt doorgestuurd naar de homepage";
			header("refresh:5;url=http://localhost/orchidee");
?>
</div>
