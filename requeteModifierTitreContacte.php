<?php
/**
 * Created by PhpStorm.
 * User: orencohen
 * Date: 13/11/2018
 * Time: 11:09
 */
require 'requetesSQLTickevent.php';

$TitreContact = $_POST['titrecontact'];


if($connexion == NULL)
{
    echo 'erreur connexion base de donnees';
}else
{

       $update = "UPDATE champs SET titre = '".$TitreContact."' WHERE ID = 1";
       $res = mysqli_query($connexion,"$update");
       echo $update;




    header("Refresh:0;url=APropos.php");
}