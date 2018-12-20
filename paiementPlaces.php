 <?php

	session_start();
  require 'requetesSQLTickevent.php';
  require 'requeteContent.php';
  $mysqli->commit();
  while($tab = mysqli_fetch_array($res))
{
    //$mysqli->query("UPDATE `places` SET `Disponible` = '0' WHERE `places`.`Num_Place` = '".$_POST['Place']."' AND `places`.`Nom_Rang` = '".$_GET['Rang']."' AND `places`.`Nom_Salle` = '".$tab['Nom_Salle']."' AND `places`.`Titre` =  '".$tab['Titre']."'");

    $mysqli->query("UPDATE Places SET Disponible = '0' WHERE Places.Num_Place = '".$_POST['Place']."' AND Places.Nom_Rang = '".$_GET['Rang']."' AND Places.Nom_Salle = '".$tab['Nom_Salle']."' AND Places.Titre =  '".$tab['Titre']."'");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page de paiement</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="IndexConcert.css">
</head>
<body>
<header>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="IndexConcert.php">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <center>
        	<div class="collapse navbar-collapse" id="navbarCollapse">
          		<ul class="navbar-nav mr-auto">
            		<li class="nav-item active">
              			<a class="nav-link" href="PageConcert.php">Concert <span class="sr-only">(current)</span></a>
            		</li>
            		<li class="nav-item">
              			<a class="nav-link" href="#">À propos</a>
            		</li>

                <?php 
                  if(isset($_SESSION['email'])) {
                      //header("Refresh:0;url=IndexConcert.php");
                      ?>

                      <form method="GET" action="paiementPlaces.php">
                          <li class="nav-item">
                              <input type="submit" value="Déconnexion" name="deconnexion"
                                     class="btn btn-outline-warning" class="deco">
                          </li>
                          <?php
                          if (isset($_GET['deconnexion'])) {
                              session_destroy();
                              header("Refresh:0;url=PaiementPlaces.php");
                              // header('location: "IndexConcert.php');
                          }
                          ?>
                      </form>
                <?php
                    }
                ?>
          		</ul>
        	</div>
    	</center>
  	</nav>
</header>
    <?php

    if ($_POST['Rang']== "Rang" || $_POST['Place'] == "Place")
    {

     header("Refresh:3;url=pageConcert.php");
     ?>
        <div class= "alert alert-danger">
        <?php

          echo "Vous n'avez pas choisi de place ou de rang. Vous allez être redirigé vers la page des concerts.";
    }
    ?>
        </div>

<?php
/*require 'requeteContent.php';
while ($tab = mysqli_fetch_array($res)) {

    echo $tab['Nom_Salle'];
    echo $_GET['Nom_Salle'];*/

    require 'requetePaiement.php';
    while ($tab = mysqli_fetch_array($res)) {

        require_once "config.php";
        ?>

        <form action="ConfirmationPaiement.php?Titre=<?= $tab['Titre'] ?>&Salle=<?= $tab['Nom_Salle'] ?>&Rang=<?= $_GET['Rang'] ?>&Place=<?= $_POST['Place'] ?>"
              method="POST" enctype="multipart/form-data">
            <input type="hidden" name="Titre" value="<?php '$_GET[\'Titre\']' ?>"> </input>
            <input type="hidden" name="Rang" value="<?php '$_GET[\'Rang\']' ?>"> </input>
            <input type="hidden" name="Salle" value="<?php '$_GET[\'Nom_Salle\']' ?>"> </input>


            <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="<?= $stripeDetails['publishableKey'] ?>"
                    data-amount="<?= $tab['Prix'] * 100 ?>"
                    data-currency="eur"
                    data-name="<?= $tab['Titre'] ?>"
                    data-description="Rang: <?= $_GET['Rang'] ?> Place : <?= $_POST['Place'] ?>"
                    data-image="images/Logo.PNG"
                    data-locale="French"
                    data-zip-code="true">

            </script>
        </form>
        <script type="text/javascript" src="https://js.stripe.com/v3/"></script>

        <?php
    }

?>

</body>
</html>