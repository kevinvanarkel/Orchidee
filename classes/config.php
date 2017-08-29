<?php
$witch_server = $_SERVER['SERVER_ADDR'];
switch ($witch_server)
{
    case '::1':
        define('SERVERNAME', 'localhost');
        define('USERNAME', 'root');   
        define('PASSWORD', '');
        define('DATABASENAME', 'orchidee');
        define('MAIL_PATH', 'http://localhost/orchidee/');
        break;
}
?>