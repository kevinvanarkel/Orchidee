<div class="container">
<?php
	$userrole = array("customer","administrator");
	require_once("./security.php");
	
	
	if (isset($_POST['submit']))
	{
		require_once("classes/LoginClass.php");
		
		if (LoginClass::check_old_password($_POST['oude_wachtwoord']))
		{
			//echo "Goede wachtwoord";
			if (!strcmp($_POST['nieuw_wachtwoord'], $_POST['controle_wachtwoord']))
			{
				LoginClass::update_password($_SESSION['id'],$_POST['nieuw_wachtwoord']);
				header("refresh:5;url=index.php?content=customerHomepage");
			}
			else
			{
				echo "U heeft u nieuwe wachtwoord de tweede keer verkeerd ingevoerd. Probeer het nog een keer";
			header("refresh:5;url=index.php?content=wijzig_wachtwoord");
			}
		}
		else
		{
			echo "Uw heeft uw huidige wachtwoord verkeerd ingevoerd. Probeer het opnieuw";
			header("refresh:5;url=index.php?content=wijzig_wachtwoord");
		}
	}
	else
	{
?>

<div class="col-sm-6"><h3>Wijzig uw wachtwoord</h3>
<form action='index.php?content=wijzig_wachtwoord' method='post'>

    <input type="password" class="form-control" name="oude_wachtwoord" placeholder="Oude Wachtwoord" style="border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1;"/>
    <input type="password" class="form-control" name="nieuw_wachtwoord" placeholder="Nieuwe Wachtwoord" style="border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1;"/>
    <input type="password" class="form-control" name="controle_wachtwoord" placeholder="Controle Wachtwoord" style="border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1;"/>
	<input type='submit' name='submit' value='verzenden' style="color:black;">
</form>
<?php
	}
?>
</div></div>
