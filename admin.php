<?php

// Autochargement des classes
include_once 'app/bootstrap.inc.php';

if(isset($_POST['deconnexion']))
{
  unset($_SESSION['login']);
  header('Location: connexion.php');
  exit(0);
}

if(isset($_POST['modif']))
{
    $InscritsDAO->updateUser($_POST['nom'], $_POST['login'], $_POST['mdp'],$_POST['mail'],$_POST['acces_region']);
    header("Location: admin.php?modif=OK");
    exit(0);
}
$message = isset($_GET["modif"])?"Modification effectuee\n":"";
//si on supp
if(isset($_POST['supp']))
{
    $_SESSION['loginToSupp'] = $_POST['login'];
    header("Location: confirme_delete.php");
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
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">

    <!--FontAwesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include 'include/menuAdmin.php';
    echo '<h1><i class="fa fa-print" aria-hidden="true"></i>Gestion admin</h1>';
    echo $message;
    function afficheTout($Inscrits) {
        echo "------- Tous les Inscrits :\n";
        echo '<tr>';
        foreach ($Inscrits->getAllUsers() as $lesInscrits)
        {
            echo $lesInscrits->toForm() ;
        }
        echo '</tr>';
    }
    afficheTout($InscritsDAO);?>







<?php include("include/footer.php");?>
  </body>
</html>
