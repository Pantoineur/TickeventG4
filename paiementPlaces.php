 <?php

	session_start();
  	require 'requetesSQLTickevent.php';
  	$rang = $_POST['Rang'];
  	$place = $_POST['Place'];
  	echo "$rang$place";
  	$checkIfExists = "SELECT $rang$place from concert where nom='test' ";

  	if ($rang == "Rang" || $place == "Place")
	header("Refresh:0;url=PagePlaces.php");

	if($connexion == NULL)
	{
		echo 'erreur connexion base de donnees';
	}
	else
	{
		$res = mysqli_query($connexion,$checkIfExists);
		if (!$res)
		{
			
		}
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
require 'requeteContent.php';

require_once "config.php";
?>

<form action="paiementPlaces.php?Titre=<?= $tab['Titre'] ?>" method="POST" enctype="multipart/form-data" >
    <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="<?= $stripeDetails['publishableKey']?>"
            data-amount="5099"
            data-currency="eur"
            data-name="<?= $tab['Titre'] ?>"
            data-description="<?= $tab['Description'] ?>"
            data-image="images/Logo.PNG"
            data-locale="French"
            data-zip-code="true">

    </script>
</form>
<script  type="text/javascript" src="https://js.stripe.com/v3/"></script>


</body>
</html>