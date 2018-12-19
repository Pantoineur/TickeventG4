<?php

require 'requetesSQLTickevent.php';

//$rang = $_POST['Nom_Rang'];

if($connexion == NULL)
{
    echo 'erreur connexion base de donnees';
}else {

   /* $prix = "SELECT Prix, nom_rang, num_places, concert.Titre, concert.Description from rangs as r, salleconcerts as s, concert as c, places as p
    where p.Nom_Salle = s.Nom_Salle and s.Nom_Salle = c.Nom_Salle and c.Titre = '".$_GET['Titre']."'
    and nom_rang = '".$_POST['Rang']."' and num_places = '".$_POST['Place']."'";*/

  	$selection = "SELECT Prix, Titre from Rangs, concert where Nom_Rang = '".$_GET['Rang']."' and Titre = '".$_GET['Titre']."'";

    $res = mysqli_query($connexion,"$selection");

}
?>