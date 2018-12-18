<?php
/**
 * Created by PhpStorm.
 * User: orencohen
 * Date: 15/11/2018
 * Time: 10:28
 */

require 'requetesSQLTickevent.php';

if($connexion == NULL)
{
    echo 'erreur connexion base de donnees';
}else {
    $recuperer = "SELECT Titre From champs where ID = 3";
    $rop = mysqli_query($connexion, "$recuperer");
    if (!$rop) { // add this check.
    die('Invalid query: ' . mysql_error());
	}
}
?>