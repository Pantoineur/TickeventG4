<?php
/**
 * Created by PhpStorm.
 * User: orencohen
 * Date: 28/11/2018
 * Time: 23:45
 */

require 'requetesSQLTickevent.php';

$id = $_GET['ID'];


if($connexion == NULL)
{
    echo 'erreur connexion base de donnees';
}else {

    $delete = "DELETE FROM Concert WHERE ID = '".$id."'";
    echo $delete;
    $res = mysqli_query($connexion,"$delete");
    printf("Message d'erreur:", mysqli_errno($connexion));
}
