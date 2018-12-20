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
$Rangs = $_POST['NbRangs'];
$Places = $_POST['NbPlaces'];
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
    $ajout = "INSERT INTO Concert(Titre, Date, Image, Description, Nom_artiste, Nom_Salle) values ('".$nom."','".$date."','".$image."','".$description."','".$Nom_artiste."','".$Salle_Concert."')";
    $res = mysqli_query($connexion,"$ajout");
    if ($Rangs == 1)
    {
        for($i=1;$i<$Places;$i++)
        {
            $ajout = "INSERT INTO Places values ('".$i."','A','".$Salle_Concert."','".$nom."',1)";
            $res = mysqli_query($connexion,"$ajout");
        } 
    }
    else if ($Rangs == 2)
    {
        for($i=1;$i<$Places;$i++)
        {
            $ajout = "INSERT INTO Places values ('".$i."','A','".$Salle_Concert."','".$nom."',1)";
            $res = mysqli_query($connexion,"$ajout");
            $ajout = "INSERT INTO Places values ('".$i."','B','".$Salle_Concert."','".$nom."',1)";
            $res = mysqli_query($connexion,"$ajout");
        } 
    }
    else if ($Rangs == 3)
    {
        for($i=1;$i<$Places;$i++)
        {
            $ajout = "INSERT INTO Places values ('".$i."','A','".$Salle_Concert."','".$nom."',1)";
            $res = mysqli_query($connexion,"$ajout");
            $ajout = "INSERT INTO Places values ('".$i."','B','".$Salle_Concert."','".$nom."',1)";
            $res = mysqli_query($connexion,"$ajout"); 
            $ajout = "INSERT INTO Places values ('".$i."','C','".$Salle_Concert."','".$nom."',1)";
            $res = mysqli_query($connexion,"$ajout");
        } 
    }
    else if ($Rangs == 4)
    {
        for($i=1;$i<$Places;$i++)
        {
            $ajout = "INSERT INTO Places values ('".$i."','A','".$Salle_Concert."','".$nom."',1)";
            $res = mysqli_query($connexion,"$ajout");
            $ajout = "INSERT INTO Places values ('".$i."','B','".$Salle_Concert."','".$nom."',1)";
            $res = mysqli_query($connexion,"$ajout"); 
            $ajout = "INSERT INTO Places values ('".$i."','C','".$Salle_Concert."','".$nom."',1)";
            $res = mysqli_query($connexion,"$ajout");
            $ajout = "INSERT INTO Places values ('".$i."','D','".$Salle_Concert."','".$nom."',1)";
            $res = mysqli_query($connexion,"$ajout");
        } 
    }
    else if ($Rangs == 5)
    {
        for($i=1;$i<$Places;$i++)
        {
            $ajout = "INSERT INTO Places values ('".$i."','A','".$Salle_Concert."','".$nom."',1)";
            $res = mysqli_query($connexion,"$ajout");
            $ajout = "INSERT INTO Places values ('".$i."','B','".$Salle_Concert."','".$nom."',1)";
            $res = mysqli_query($connexion,"$ajout"); 
            $ajout = "INSERT INTO Places values ('".$i."','C','".$Salle_Concert."','".$nom."',1)";
            $res = mysqli_query($connexion,"$ajout");
            $ajout = "INSERT INTO Places values ('".$i."','D','".$Salle_Concert."','".$nom."',1)";
            $res = mysqli_query($connexion,"$ajout");
            $ajout = "INSERT INTO Places values ('".$i."','VIP','".$Salle_Concert."','".$nom."',1)";
            $res = mysqli_query($connexion,"$ajout");
        } 
    }
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




