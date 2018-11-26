<?php

 session_start();

?>

<html>
<head>
    <title>Page concert</title>
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

           <div class="collapse navbar-collapse" id="navbarCollapse">
                 <ul class="navbar-nav mr-auto">
                   <li class="nav-item active">
                         <a class="nav-link" href="#">Concert <span class="sr-only">(current)</span></a>
                   </li>
                   <li class="nav-item">
                         <a class="nav-link" href="#">À propos</a>
                   </li>

               <?php
                 if(isset($_SESSION['email']))
                   {
                     //header("Refresh:0;url=IndexConcert.php");
                     ?>

                     <form method="GET" action="PageConcert.php">
                     <li class="nav-item">
                       <input type="submit" value="Déconnexion" name="deconnexion" class="btn btn-outline-warning" class="deco" >
                     </li>
                     <?php
                       if(isset($_GET['deconnexion']))
                       {
                         session_destroy();
                         header("Refresh:0;url=PageConcert.php");
                        // header('location: "IndexConcert.php');
                       }
                         ?>

                     </form>

               <?php
                   }

               ?>

                 </ul>
           </div>
     </nav>
   </header>


    <br>
    <?php 
      if(isset($_SESSION['email']))
        {
    ?>
          <form action="FormulaireAjoutConcert.php">
            <input type="submit" class="btn btn-warning" value="Ajout concert" />
          </form>
      <?php
        }
      ?>

      <form action="PagePlaces.php">
        <input type="submit" class="btn btn-warning" value="Réservez vos places !">
      </form>


    <?php
    require "requeteConcert.php";
    echo'<h1 class="titre1"> CONCERT</h1>';
    ?>

    <div class="row">
            <?php
    while ($tab = mysqli_fetch_array($res))
    {
        ?>
        <div class="col-md-4">
    <form action="ContentConcert.php?ID=<?= $tab['ID'] ?>" method="post">
        <input type="hidden" name="ID" value="<?php '$_GET[\'ID\']' ?>"> </input>
        <?php
        //echo "<img src='images/".$tab['Image']."'>";
        echo '<center>',
             '<div class="card" style="width: 18rem;">',
             '<div class="imgcard">',
             "<img class=\"card-img-top\" src='images/".$tab['Image']."'>",
             '</div>',
            '<div class="card-body">',
              '<h5 class="card-title">Nom: '.$tab['Nom']."</h5>",
            ' Date : '.$tab['Date']."",
            ' CP : '.$tab['CP']."",
            ' <p class="card-text">Description : '.$tab['Description']."</p> ",
        '<input type="submit" class="btn btn-primary" value="Réservez"> </input></div></div>',
            '</center>';

        //'<div class="row">',
        //'<div class="col-sm-6">',
        // <div class="card" style="width: 18rem;">
        // <img class="card-img-top" src=".../100px180/" alt="Card image cap">
        // <div class="card-body">
        // <h5 class="card-title">Card title</h5>
        //  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        // <a href="#" class="btn btn-primary">Go somewhere</a>
        //</div>
//</div>
        ?>
    </form>
        </div>
<?php
    }
    ?>
    </div>


    <!-- <footer>

   </footer>

  </body>

</html>