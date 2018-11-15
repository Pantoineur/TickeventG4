<?php
/**
 * Created by PhpStorm.
 * User: orencohen
 * Date: 13/11/2018
 * Time: 11:09
 */
require 'requetesSQLTickevent.php';

$nom = $_POST['Nom'];
$date = $_POST['Date'];
$cp = $_POST['CP'];

if($connexion == NULL)
{
    echo 'erreur connexion base de donnees';
}else
{
    $ajout = "INSERT INTO Concert (Nom,Date,CP) VALUES ('".$nom."','".$date."','".$cp."')";
    $res = mysqli_query($connexion,"$ajout");
    //printf("Message d'erreur:", $mysqli->errno);


}
$nomModif = $_POST['nomModif'];
$dateModif = $_POST['dateModif'];
$cpModif = $_POST['cpModif'];

if($connexion == NULL)
{
    echo 'erreur connexion base de donnees';
}else {

    $update = "UPDATE Concert SET Nom = \"".$nomModif."\",Date = \"".$dateModif."\", CP = \"".$cpModif."\" WHERE ID =7";
    echo $update;
    $res = mysqli_query($connexion,"$update");
    printf("Message d'erreur:", mysqli_errno($connexion));
}



