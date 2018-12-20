  <?php

  session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Choisissez vos places !</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="IndexConcert.css">
</head>
<body>
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
              			<a class="nav-link" href="APropos.php">Nous Contacter</a>
            		</li>

                <?php 
                  if(isset($_SESSION['email']))
                    {
                      //header("Refresh:0;url=IndexConcert.php");
                      ?>

                      <form method="GET" action="PagePlaces.php">
                      <li class="nav-item">
                        <input type="submit" value="Déconnexion" name="deconnexion" class="btn btn-outline-warning" class="deco" >
                      </li>
                      <?php
                        if(isset($_GET['deconnexion']))
                        {
                          session_destroy();
                          header("Refresh:0;url=PagePlaces.php");
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
<?php
require "requeteContent.php";
while ($tab = mysqli_fetch_array($res))
{
?>
	<form method="POST" action="pagePlaces.php?Titre=<?= $tab['Titre'] ?>&Salle=<?= $tab['Nom_Salle'] ?>">
    <input type="hidden" name="Titre" value="<?php '$_GET[\'Titre\']' ?>"> </input>
        <input type="hidden" name="Salle" value="<?php '$_GET[\'Nom_Salle\']' ?>"> </input>


        <select name="Rang">
      <?php
        if (isset($_POST['Rang']))
          echo "<option>".$_POST['Rang']."</option>";
        else
          echo "<option>Rang<option>";
				require 'requetesSQLTickevent.php';
				$sql = "SELECT Nom_Rang FROM places where Titre = '".$_GET['Titre']."' group by Nom_Rang";
				$res2 = mysqli_query($connexion,"$sql");
        if (!isset($_POST['Rang']))
        {
          while($data = mysqli_fetch_array($res2)) 
          {
            echo '<option>'.$data["Nom_Rang"].'</option>'; 
          }
        }
				
			?>
		</select>
    <input type="submit" name="check" class="btn btn-warning" value="Vérifier les places pour le rang choisi">
  </form>
      <?php
        if (isset($_POST['Rang']))
        {
          echo $_POST['Rang'];
      ?>
          <form method="POST" action="paiementPlaces.php?Titre=<?= $tab['Titre']?>&Rang=<?= $_POST['Rang']?>&Salle=<?= $tab['Nom_Salle'] ?>">
            <input type="hidden" name="Titre" value="<?php '$_GET[\'Titre\']' ?>"> </input>
            <input type="hidden" name="Rang" value="<?php '$_GET[\'Rang\']' ?>"> </input>
              <input type="hidden" name="Salle" value="<?php '$_GET[\'Nom_Salle\']' ?>"> </input>

              <select name="Place">
        			<option>Place</option>
        			<?php
        			$sql = "SELECT Num_Place FROM places where Nom_Rang = '".$_POST['Rang']."' and Titre = '".$_GET['Titre']."'";
        				$res = mysqli_query($connexion,$sql);
        				while($data=mysqli_fetch_array($res)) 
        				{
        				   echo '<option>'.$data["Num_Place"].'</option>';
        				}
        			?>
        		</select>
            <input type="submit" name="valider" class="btn btn-warning">
          </form>
        <?php
        }
  }
        ?>



</body>
</html>