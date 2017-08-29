<div class="container">
<?php
	require_once("./classes/LoginClass.php");
	
	if (isset($_GET['id']) && isset($_GET['email']) && isset($_GET['password']))
	{
		
		if (LoginClass::check_if_activated($_GET['email'],$_GET['password']))
		{
			$action = "index.php?content=activate&id=".$_GET['id']."&email=".$_GET['email']."&password=".$_GET['password'];	
			
			if (LoginClass::check_if_email_password_exists($_GET['email'], $_GET['password'], 'no'))
			{	
				if (isset($_POST['submit']))
				{
					// 1. Check of de twee ingevoerde passwords correct zijn.
					if ( !strcmp($_POST['password_1'], $_POST['password_2']))
					{		
						// 2. Activeer het account en update het oude password naar het nieuwe password.
						LoginClass::activate_account_by_id($_GET['id']);
						LoginClass::update_password($_POST['id'], $_POST['password_1']);
					}
					else
					{
						echo "passwords komen niet overeen, probeer het nog een keer.";
						header("refresh:4;url=".$action);			
					}
				}
				else
				{	
					echo "<h3>Uw account wordt geactiveerd. Kies een nieuw password</h3><br>";
	?>
					<form  action="<?php echo $action; ?>" method='post' >
						<input type='password' name='password_1' placeholder=" Typ hier uw nieuwe wachtwoord" style="border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1; width:21%;"                     />
						<input type='password' name='password_2' placeholder=" Typ hier uw wachtwoord ter controle" style="border-radius:0px; height:30px; margin-bottom:11px; margin-top:11px; background-color:#F1F1F1; width:21%;"
                        /><br>
						<input type='hidden' name='id' value='<?php echo $_GET['id']; ?>'/>
						<input type='submit' name='submit' />
					</form>
	<?php
				}
			}
			else
			{
				echo "U heeft geen rechten op deze pagina. Uw email/password combi is niet correct of uw account is al geactiveerd. U wordt doorgestuurd naar de registratiepagina<br>";
				header("refresh:4;url=index.php?content=register_form");
			}
		}
		else
		{
			echo "Uw account is all geactiveerd of uw email/password combi is niet correct u heeft daarom geen rechten op deze pagina. U wordt doorgestuurd naar de registratiepagina<br>";
			header("refresh:4;url=index.php?content=register_form");
		}
	}
	else
	{
		echo "Succes! u gaat nu naar de homepage<br>";
		header("refresh:4;url=http://localhost/orchidee/index.php?content=algemeneHomepage");
	}
?>
</div>
