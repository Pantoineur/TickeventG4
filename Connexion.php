<html>
<head>
	<title>Page concert</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<link href="Connexion.css" rel="stylesheet">
</head>
<body>

<br><br><br><br><br><br><br><br>

<div class="encadrement">
	<center>

		<h1>Connexion</h1> <br>
		<div>
			<form method="POST" action="Connexion.php">

				<div class="col-8">
					<input type="email" name="email" placeholder="Adresse mail" class="form-control input-sm" /><br>
				</div>

				<div class="col-8">
					<input type="password" name="mdp"	placeholder="Mot de passe" class="form-control" /><br><br>
				</div>

					<input type="submit" value="Valider" name="Valider" class="btn btn-dark">

			</form>
		</div>	
	</center>
</div>

	<?php

		// On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site
		$login_valide = "globetickscontact@gmail.com";
		$pwd_valide = "Institutg4!";

		// on teste si nos variables sont définies
		if (isset($_POST['email']) && isset($_POST['mdp'])) {

		// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
			if ($login_valide == $_POST['email'] && $pwd_valide == $_POST['mdp']) {
			// dans ce cas, tout est ok, on peut démarrer notre session

			// on la démarre :)
				session_start ();
			// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['mdp'] = $_POST['mdp'];

			// on redirige notre visiteur vers une page de notre section membre
				header ('location: indexConcert.php');
			}
			else {
	

				echo "Rien ne va";
					
		
			}
		}
		else {
			echo 'Les variables du formulaire ne sont pas déclarées.';
		}
		
	?>

</body>

</html> 