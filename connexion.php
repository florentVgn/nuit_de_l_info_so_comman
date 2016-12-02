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
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Bootstrap 101 Template</title>

      <!-- Bootstrap -->
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!--FontAwesome -->
      <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

      <!--CSS -->
      <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
      <?php include 'include/menuIndex.php'; ?>
      <div class="container bandeau-connexion">
        <div id="Clouds">
          <div class="Cloud Foreground"></div>
          <div class="Cloud Background"></div>
          <div class="Cloud Foreground"></div>
          <div class="Cloud Background"></div>
          <div class="Cloud Foreground"></div>
          <div class="Cloud Background"></div>
          <div class="Cloud Background"></div>
          <div class="Cloud Foreground"></div>
          <div class="Cloud Background"></div>
          <div class="Cloud Background"></div>
        <!--  <svg viewBox="0 0 40 24" class="Cloud"><use xlink:href="#Cloud"></use></svg>-->
        </div>
      <h1 class="bandeau-connexion-h1">Connexion</h1>

        <div class="formulaire">
          <form action="" method="post">
            <p class="form"><input type="text" name="login" placeholder="Login" ></p><br>
            <p class="form"><input type="password" name="mdp" placeholder="Mot de passe"></p><br>
          </form>
          <a href="formulaire.php"><button type="button" name="button">Connexion</button></a>
          <a href="formulaire.php"><button type="button" name="button">Inscription</button></a>
        </div>
      </div>

     <?php include("include/footer.php");?>
    </body>
</html>
