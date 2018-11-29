<?php
/**
 * Created by PhpStorm.
 * User: orencohen
 * Date: 15/11/2018
 * Time: 10:07
 */

require 'requetesSQLTickevent.php';
$nomModif = $_POST['nomModif'];
$dateModif = $_POST['dateModif'];
$descriptionModif = $_POST['descriptionModif'];
$imageModif = $_POST['ImageModif'];
$Salle_ConcertModif = $_POST['SalleConcertModif'];

$id = $_GET['ID'];


if($connexion == NULL)
{
    echo 'erreur connexion base de donnees';
}else {

    $update = "UPDATE Concert SET Nom = '".$nomModif."',Date = '".$dateModif."', Description = '".$descriptionModif."',Nom_SalleConcerts = '".$Salle_ConcertModif."', Image = '".$imageModif."'  WHERE ID = '".$id."'";
    echo $update;
    $res = mysqli_query($connexion,"$update");
    printf("Message d'erreur:", mysqli_errno($connexion));
}
