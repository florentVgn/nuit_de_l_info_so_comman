<?php

// Autochargement des classes
include_once 'app/bootstrap.inc.php';

if($_SESSION['role'] != 'administrateur')
{
  header ('location: connexion.php');
}





if (isset($_POST['supp'])) {
  // On détruit les variables de notre session
  session_unset ();
  // On détruit notre session
  session_destroy ();
  // On redirige le visiteur vers la page de connexion
  header ('location: connexion.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="style/style.css">
        <title>Liste inscrits</title>
    </head>
    <body>
      <p class="binome">Réalisée par : Maxime Ambry et Martin Amilhaud - Groupe 1H</p>
      <h1>Administrateur</h1>
      <div class="formulaire">
        <form action="" method="post">
          <label>Déconnexion</label>
          <p class="form"><input type="image" name="supp[]" src="img/supp.png" value="submit"></p>
        </form>
      </div>
      <?php include("include/footer.php");?>
    </body>
</html>
