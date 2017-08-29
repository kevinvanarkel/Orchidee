<?php

$con = mysqli_connect('127.0.0.1','root','');

if(!$con)
{
    echo 'Er is iets fout gegaan!';
}

if(!mysqli_select_db($con,'orchidee'))
{
    echo 'De database is niet geselecteerd';
}

$naam = $_POST['firstname'];
$email = $_POST['email'];
$comments = $_POST['comments'];

$sql = "INSERT INTO contact (naam, email, comments) values ('$naam','$email','$comments')";

if(!mysqli_query($con,$sql))
{
    echo 'Er is iets fout gegaan!<br><br>';
}
else
{
    header("refresh:0.1; url=index.php?content=bedankt");
}


?>

