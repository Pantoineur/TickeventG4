<html>
<head>

    <title>Page concert</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="IndexConcert.css">
</head>


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
</html>
