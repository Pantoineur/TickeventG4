
<?php
/**
 * Created by PhpStorm.
 * User: orencohen
 * Date: 15/11/2018
 * Time: 10:28
 */

require 'requetesSQLTickevent.php';

$Titre = $_GET['Titre'];

if($connexion == NULL)
{
    echo 'erreur connexion base de donnees';
}else
{

    $selection = "SELECT * From Concert WHERE Titre = '".$Titre."'";
    $res = mysqli_query($connexion,"$selection");

}
//header("Refresh:0;url=ContentConcert.php");
?>

