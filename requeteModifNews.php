<?php
/**
 * Created by PhpStorm.
 * User: orencohen
 * Date: 15/11/2018
 * Time: 10:07
 */

require 'requetesSQLTickevent.php';
$TitreModif = $_POST['titreModif'];
$ContenuModif = $_POST['contenuModif'];
$imageModif  = $_FILES['ImageModif']['name'];

$id = $_GET['ID'];


if($connexion == NULL)
{
    echo 'erreur connexion base de donnees';
}else {

    $update = "UPDATE news SET titre = '".$TitreModif."',contenu = '".$ContenuModif."', Image = '".$imageModif."'  WHERE ID = '".$id."'";
    echo $update;
    $res = mysqli_query($connexion,"$update");
    printf("Message d'erreur:", mysqli_errno($connexion));

    $target = "images/".basename($_FILES['ImageModif']['name']);

    if(move_uploaded_file($_FILES['ImageModif']['tmp_name'],$target))
    {

        $msg = "Image bien uploader";
        echo $msg;
        

    }else{
        $msg = "Image pas bien uploader";

        echo $msg;
    }

    header("Refresh:0;url=IndexConcert.php");
}
