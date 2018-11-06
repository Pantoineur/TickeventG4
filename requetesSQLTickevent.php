<?php 
	
	$user = "dbo759986335";
	$password = "Institutg4!";
	$host = "db759986335.hosting-data.io";
	$port = "3306";
	
	$connexion = mysqli_connect($host, $user, $password, $port);

	if ($connexion == true) 
	{
		echo "la base de données est connecté";
	}
	else 
	{
		echo "MERDE ALORS";
	}

?>