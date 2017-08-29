<?php
if ( !isset( $_SESSION['id']))
{
    echo "";
    header("refresh:0;url=index.php?content=sm-iedereen");
    exit();
}

if (isset( $_SESSION['id']))
{
    echo "";
    header("refresh:0;url=index.php?content=sm-users");
    exit();
}
?>