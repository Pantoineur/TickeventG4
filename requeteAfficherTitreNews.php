<?php


require 'requetesSQLTickevent.php';

if($connexion == NULL)
{
    echo 'erreur connexion base de donnees';
}else {
    $recuperer = "SELECT Titre From champs where ID = 3";
    $res = mysqli_query($connexion, "$recuperer");
}
?>