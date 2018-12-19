<?php
	require 'requetesSQLTickevent.php';
	for($i=1;$i<101;$i++)
	{
		$req = "Insert into numero values ($i)";
		$res2 = mysqli_query($connexion,"$req");
	}
?>