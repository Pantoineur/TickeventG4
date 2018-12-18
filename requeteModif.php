<?php


require 'requetesSQLTickevent.php';
$nomModif = $_POST['nomModif'];
$dateModif = $_POST['dateModif'];
$descriptionModif = $_POST['descriptionModif'];
$imageModif  = $_FILES['ImageModif']['name'];
$Salle_ConcertModif = $_POST['SalleConcertModif'];
$Nom_ArtisteModif = $_POST['NomArtisteModif'];

$Titre = $_GET['Titre'];


if($connexion == NULL)
{
    echo 'erreur connexion base de donnees';
}else {

    $update = "UPDATE Concert SET Titre = '".$nomModif."',Date = '".$dateModif."', Description = '".$descriptionModif."',Nom_Salle = '".$Salle_ConcertModif."', Image = '".$imageModif."', Nom_Artiste = '".$Nom_ArtisteModif."'  WHERE Titre = '".$Titre."'";
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
