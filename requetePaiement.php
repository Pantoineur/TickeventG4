<?php
  	require 'requetesSQLTickevent.php';
  	$req = "SELECT nom_rang, num_places from salleconcerts as s, concert as c, places as p where p.Nom_Salle = s.Nom_Salle and s.Nom_Salle = c.Nom_Salle and c.Titre = '".$_GET['Titre']."' and nom_rang = '".$_POST['Rang']."' and num_places = '".$_POST['Place']."'";
?>