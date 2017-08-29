<?php
	if (isset($_POST['submit']))
	{
		require_once("./classes/LoginClass.php");
		if (LoginClass::check_if_email_exists($_POST['email']))
		{
			//Zo ja, geef een melding dat het emailadres bestaat en stuur
			//door naar register_form.php
			echo "Het door u gebruikte emailadres is al in gebruik.<br>
				  Gebruik een ander emailadres. U wordt doorgestuurd naar<br>
				  het registratieformulier";
			header("refresh:5;url=index.php?content=register_form");
		}
		else
		{
			LoginClass::insert_into_database($_POST);
		}
	}
	else
	{
?>
<!DOCTYPE html>
<html>
	<head>
		<title>register</title>
	</head>
	<body>
    <div class="container">
        <div class="col-sm-6">
	<h3>Registratieformulier</h3>
		<form action='index.php?content=register_form' method='post'>
            <input type="text" class="form-control" name="firstname" placeholder="Voornaam" style="border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1;"/>
            <input type="text" class="form-control" name="infix" placeholder="Tussenvoegsel" style="border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1;"/>
            <input type="text" class="form-control" name="lastname" placeholder="Achternaam" style="border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1;" required/>
            <input type="text" class="form-control" name="adres" placeholder="Adres" style="border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1;" required/>
            <input type="email" class="form-control" name="email" placeholder="E-mail" style="border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1;" required/>

			<input type='submit' name='submit' />
        </div>
		</form>	
	</body>
</html>
        </div>
<?php
	}
?>