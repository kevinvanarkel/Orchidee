<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Orchidee</title>
		<link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" media="screen" href="screenstyle.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
		<header>
			<?php include("header.php"); ?>
		</header>
        <section>
			<?php include("redirect.php"); ?>
		</section>	
		<aside>
			<?php include("link.php"); ?>
		</aside>
    </body>
</html>