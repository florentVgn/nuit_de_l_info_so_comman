  <?php

// Autochargement des classes
include_once 'app/bootstrap.inc.php';


//Si il y a eu un clique sur le bouton de connexion
if (isset($_POST['voir'])) {
  //Si les champs ne sont pas vide
  if (!empty($_POST['login']) && !empty($_POST['mdp'])) {
    //On appel la fonction de vérification avec les paramètres renseigné
    $check = $InscritsDAO->checkAuthentification($_POST['login'],$_POST['mdp']);
    if ($check == null) {
      echo "<p class=\"erreur\">Vous n'êtes pas dans la base de données</p>";
    }
    else {
      switch ($check['rôle']) {
        case 'utilisateur':
          $_SESSION['id'] = $check['login'];
          $_SESSION['role'] = $check['rôle'];
          header('Location:listeInscrits.php');
          break;
        case 'redacteur':
          $_SESSION['id'] = $check['login'];
          $_SESSION['role'] = $check['rôle'];
          header('Location:envoi.php');
          break;
        case 'administrateur':
          $_SESSION['id'] = $check['login'];
          $_SESSION['role'] = $check['rôle'];
          header('Location:gestionInscrits.php');
          break;
        default:
          echo "<p class=\"erreur\">Vous n'avez pas de rôle</p>";
          break;
      }
      //header('Location:listeInscrits.php');
    }
  }
  //Sinon c'est que les champs sont vides
  else {
    echo "<p class=\"erreur\">Formulaire invalide</p>";
  }

}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Modèle de page pour le TP Contacts</title>
    </head>
    <body>
      <p class="binome">Réalisée par : Maxime Ambry et Martin Amilhaud - Groupe 1H</p>
      <h1>Connexion</h1>

        <div class="formulaire">
          <form action="" method="post">
            <p class="form"><input type="text" name="login" placeholder="Login" ></p><br>
            <p class="form"><input type="password" name="mdp" placeholder="Mot de passe"></p><br>
            <p class="form"><input type="image" name="voir[]" src="img/voir.png" value="submit"></p>
          </form>
        </div>
		 <a href="homeOrga.php">Connecté</a>
     <a href="admin.php">Si administrateur</a>
     <a href="formulaire.php">Inscription</a>
    </body>
</html>
