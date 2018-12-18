<?php
/**
 * Created by PhpStorm.
 * User: orencohen
 * Date: 13/11/2018
 * Time: 11:09
 */
require 'requetesSQLTickevent.php';

$msg = "";
$nom = $_POST['Nom'];
$date = $_POST['Date'];
$description = $_POST['description'];
$image = $_FILES['Image']['name'];
$Salle_Concert = $_POST['SalleConcert'];
$Nom_artiste = $_POST['NomArtiste'];


if($connexion == NULL)
{
    echo 'erreur connexion base de donnees';
}else
{
   /* $nom = $_POST['Nom'];
    $date = $_POST['Date'];
    $cp = $_POST['CP'];
    $description = $_POST['description'];
    $image = $_POST['Image'];*/

    $ajout = "INSERT INTO Concert (Titre, Date, Image, Description,Nom_Artiste, Nom_Salle) VALUES ('".$nom."','".$date."','$image','".$description."','".$Nom_artiste."','".$Salle_Concert."')";
    $res = mysqli_query($connexion,"$ajout");
    //printf("Message d'erreur:", $mysqli->errno);


    $target = "images/".basename($_FILES['Image']['name']);

    if(move_uploaded_file($_FILES['Image']['tmp_name'],$target))
    {

        $msg = "Image bien uploader";
        echo $msg;
        header("Refresh:0;url=PageConcert.php");

    }else{
        $msg = "Image pas bien uploader";

        echo $msg;
    }



}




