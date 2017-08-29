<div class="container">
    <?php
    //session_start();
    if ( !isset( $_SESSION['id']))
    {
        echo "U bent een bezoeker zonder account en kan daarom geen favorieten toevoegen. <a href='index.php?content=Login_form' style='font-size:13px; text-decoration:none;'>Klik hier om in te loggen.</a>";
        exit();
    }
    ?>
</div>
