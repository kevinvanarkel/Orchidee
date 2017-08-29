<ul>
<?php
	if (isset($_SESSION['userrole']))
	{
		switch ($_SESSION['userrole'])
		{
			case "developer":
				echo "<li><a href=''></a></li>";
			break;
			case "administrator":
				echo "<li><a href=''></a></li>";
			break;
			case "root":
				echo "<li><a href=''></a></li>";
			break;
			case "customer":
                echo "<li><a href=''></a></li>";
			break;
		}
	}
	else
	{
	echo "
		 ";
	}
    /*<li><a href='index.php?content=register_form'>registreren</a></li>
		<li><a href='index.php?content=Login_form'>inloggen</a></li> HOORT TUSSEN DE QUOTES*/
?>
</ul>