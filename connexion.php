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
      switch ($check['role']) {
        case 'ROLE_ADMINISTRATEUR':
          $_SESSION['id'] = $check['login'];
          $_SESSION['role'] = $check['role'];
          header('Location:admin.php');
          break;
        case 'ROLE_ORGANISATEUR':
          $_SESSION['id'] = $check['login'];
          $_SESSION['role'] = $check['role'];
          header('Location:homeOrga.php');
          break;
        default:
          echo "<p class=\"erreur\">Vous n'avez pas de role</p>";
          break;
      }
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
        <link rel="stylesheet" href="style/style.css">
        <title>Modèle de page pour le TP Contacts</title>
    </head>
    <body>
      <h1>Connexion</h1>

        <div class="formulaire">
          <form action="" method="post">
            <p class="form"><input type="text" name="login" placeholder="Login" ></p><br>
            <p class="form"><input type="password" name="mdp" placeholder="Mot de passe"></p><br>
            <p class="form"><input type="image" name="voir[]" src="img/voir.png" value="submit"></p>
          </form>
        </div>
     <a href="formulaire.php">Inscription</a>
     <?php include("include/footer.php");?>
    </body>
</html>
