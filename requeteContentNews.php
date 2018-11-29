
<?php
/**
 * Created by PhpStorm.
 * User: orencohen
 * Date: 15/11/2018
 * Time: 10:28
 */

require 'requetesSQLTickevent.php';

$id = $_GET['ID'];

if($connexion == NULL)
{
    echo 'erreur connexion base de donnees';
}else
{

    $selection = "SELECT * From News WHERE ID = '".$id."'";
    $res = mysqli_query($connexion,"$selection");

}
//header("Refresh:0;url=ContentConcert.php");
?>
