<?php
/**
 * Created by PhpStorm.
 * User: orencohen
 * Date: 15/11/2018
 * Time: 10:07
 */
$nomModif = $_POST['nomModif'];
$dateModif = $_POST['dateModif'];
$cpModif = $_POST['cpModif'];
$descriptionModif = $_POST['descriptionModif'];
$imageModif = $_POST['ImageModif'];

if($connexion == NULL)
{
    echo 'erreur connexion base de donnees';
}else {

    $update = "UPDATE Concert SET Nom = \"".$nomModif."\",Date = \"".$dateModif."\", CP = \"".$cpModif."\", Description = \"".$descriptionModif."\", Image = \"".$imageModif."\" WHERE ID =1";
    echo $update;
    $res = mysqli_query($connexion,"$update");
    printf("Message d'erreur:", mysqli_errno($connexion));
}
