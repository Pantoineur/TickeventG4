<?php

require 'requetesSQLTickevent.php';

$NomArtiste = $_POST['Nom_Artiste'];

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

    $ajout = "INSERT INTO artistes (Nom_Artiste) VALUES ('".$NomArtiste."')";
    $res = mysqli_query($connexion,"$ajout");
    header("Refresh:0;url=PageConcert.php");
}

 ?>