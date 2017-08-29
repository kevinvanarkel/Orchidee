<div class="container">
    <?php
    //session_start();
    if ( isset( $_SESSION['id']))
    {
        echo "U bent een ingelogd lid en kan daarom niet als bezoeker zonder account uw bestelling voltooien.</a>";
        exit();
    }
    ?>
</div>
