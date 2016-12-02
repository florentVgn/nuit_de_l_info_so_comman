  <?php

// Autochargement des classes
include_once 'app/bootstrap.inc.php';


//Si il y a eu un clique sur le bouton de connexion
$param['login'] = isset($_POST['login'])?trim($_POST['login']):"";
$param['mdp'] = isset($_POST['mdp'])?trim($_POST['mdp']):"";
$param['erreur'] = false;
$param['message'] = "";


if(isset($_POST['inscription']))
{
  header("Location: formulaire.php");
  exit(0);
}

if(isset($_POST['inscription']))
{
  header("Location: formulaire.php");
  exit(0);
}

if (isset($_POST['connexion']))
{ // On a cliqué sur le bouton
  if (empty($param['login']) || empty($param['mdp']))
  {
     $param['erreur'] = true;
     $param['message'] = "Merci de saisir un nom et un mot de passe...";
  }
  else
  {
     // Recherche de l'identification dans la base
     $user = $InscritsDAO->checkAuthentification($param['login'], $param['mdp']);
     if (!$user)
     {
        $param['erreur'] = true;
        $param['message'] = "Erreur d'authentification (".$param['login'].").";
     }
     else
     {
        $_SESSION['login'] = $user['login'];

        if($user['role'] == 'ROLE_ADMINISTRATEUR')
        {
          header("Location: admin.php");
        }

        if($user['role'] == 'ROLE_ORGANISATEUR')
        {

            header("Location: homeOrga.php");
        }
     }
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
      <title>connexion</title>

      <!-- Bootstrap -->
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!--FontAwesome -->
      <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

      <!--CSS -->
      <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
      <?php include 'include/menuIndex.php';
      echo $param['message']?>

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
            <input type="submit" name="connexion" value="Connexion"/>
            <input type="submit" name="forgot" value="Mot de passe oublié"/>
            <input type="submit" name="inscription" value="Inscription"/>            
          </form>


        </div>
      </div>

     <?php include("include/footer.php");?>
    </body>
</html>
