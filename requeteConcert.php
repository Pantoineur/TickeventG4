<?php
/**
 * Created by PhpStorm.
 * User: orencohen
 * Date: 15/11/2018
 * Time: 10:28
 */

require 'requetesSQLTickevent.php';

if($connexion == NULL)
{
    echo 'erreur connexion base de donnees';
}else {
    $recuperer = "SELECT ID,Nom,Date,SUBSTRING(Description,1,17) AS Description,Image,Nom_SalleConcerts From concert";
    $res = mysqli_query($connexion, "$recuperer");
}
?>

