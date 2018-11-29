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
$imageModif  = $_FILES['ImageModif']['name'];
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

    $target = "images/".basename($_FILES['ImageModif']['name']);

    if(move_uploaded_file($_FILES['ImageModif']['tmp_name'],$target))
    {

        $msg = "Image bien uploader";
        echo $msg;
        header("Refresh:0;url=PageConcert.php");

    }else{
        $msg = "Image pas bien uploader";

        echo $msg;
    }
}
