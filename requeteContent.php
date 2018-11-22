
<?php
/**
 * Created by PhpStorm.
 * User: orencohen
 * Date: 15/11/2018
 * Time: 10:28
 */

require 'requetesSQLTickevent.php';
$id = $_POST['ID'];

if($connexion == NULL)
{
    echo 'erreur connexion base de donnees';
}else
{
    $recuperer = "SELECT * From Concert WHERE ID = '".$id."'";
    $res = mysqli_query($connexion,"$recuperer");
    while ($tab = mysqli_fetch_array($res))
    {
        //echo "<img src='images/".$tab['Image']."'>";
        echo' <div class="imageC">'."<img src='images/".$tab['Image']."'></div>",
            ' <div class="titreC"> Nom: '.$tab['Nom']."</div>",
            ' <div class="dateC">Date : '.$tab['Date']."</div>",
            ' <div class="cpC">CP : '.$tab['CP']."</div>",
            ' <div class="descriptionC">Description : '.$tab['Description']."</div>";


    }
}
//header("Refresh:0;url=ContentConcert.php");
?>

