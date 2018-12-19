<?php

	require 'requetesSQLTickevent.php';

	$NomSalle = $_POST['Nom_salle'];
	$Ville = $_POST['Ville_salle'];
	$Code_Postal = $_POST['CP'];

	if($connexion == NULL)
		{
    		echo 'erreur connexion base de donnees';
	}else
		{

    		$ajout = "INSERT INTO salleconcerts (Nom_Salle, Ville, CP) VALUES ('".$NomSalle."', '".$Ville."', '".$Code_Postal."')";
    		$res = mysqli_query($connexion,"$ajout");
    		header("Refresh:0;url=PageConcert.php");
		}

?>