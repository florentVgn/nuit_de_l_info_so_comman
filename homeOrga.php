<?php

// Autochargement des classes
include_once 'app/bootstrap.inc.php';
if(isset($_POST['deconnexion']))
{
  unset($_SESSION['login']);
  header('Location: connexion.php');
  exit(0);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Organisateur</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--FontAwesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include 'include/menuOrga.php'; ?>
    <h1><i class="fa fa-print" aria-hidden="true"></i>Home organisateur</h1>
    <ul>

    </ul>
  <h2>Consulter notifications</h2>
    <p>en construction</p>
  <!-- Recevoir notifications des réfugiés -->

  <h2>Rediger une actualité</h2>
  <form action=".php" method="post" enctype="multipart/form-data">
    <p>Ajouter une image <p>
    <label for="mon_fichier">Fichier (tous formats | max. 10 Mo) :</label><br />
    <input type="hidden" name="MAX_FILE_SIZE" value="123450" />
    <input type="file" name="mon_fichier" id="mon_fichier" /><br />
    <p>Titre de la publication</p>
    <input type="text" name="objet"/>
      <br><br>
    <textarea name="contenu" rows="5" cols="100"></textarea>
      <br><br>
    <input type="submit" value="valider" />
    <input type="reset" value="vider le formulaire" />
  </form>





    <?php include("include/footer.php");?>
  </body>
</html>
