<html>
    <head>
        <title>Cron</title>
    </head>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <body>
        <h1>Cron page</h1>
        <script type="text/javascript"> setInterval(function(){ $.get('http://localhost/orchidee/index.php?content=korting', function(data) { console.log(data); }); }, 5000); </script>
    </body>
</html>