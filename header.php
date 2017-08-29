<style>
    #zwarteheader a{color:#000;}
    /*#zwarteheader a:hover{color:#ff4400; text-decoration: none; font-weight: bold; transition:.5s;}*/
    body {background-color:#fff;}
    a{font-size:16px; font-weight: normal;}
    a:hover{font-size:16px; background-color:chartreuse; text-decoration:none;}
</style><body>

<div id="zwarteheader" style="width:100%; height: 80px; background-color: #f2f2f2; padding-top:3px; padding-left:119px;">
    <br>
    <a style="color:black; font-size:20px; text-decoration: none; font-weight:bold;" href="index.php?content=algemeneHomepage">ORCHIDEE</a>
    <a href="index.php?content=assortiment" style="margin-left:680px;">Orchideen</a> |
    <a href="index.php?content=sitemap">Sitemap</a> |
    <a href="index.php?content=contact">Contact</a> |
    <a href="index.php?content=register_form">Registratie</a> |

<!--uitloggen wanneer je ingelogd bent-->
<?php
if (isset($_SESSION['userrole'])) {
   echo "<a href='index.php?content=logout'>Uitloggen</a>";

}
else{
   ?><a href="index.php?content=Login_form">Inloggen</a><?php
}
    
//klantportaal link als je ingelogd bent    
if (isset($_SESSION['userrole'])) {
    echo " | ";
    echo "<a href='index.php?content=customerHomepage'>Portaal</a>";

}
else {
}

?>
</div>

<?php