<?php

// Autochargement des classes
include_once 'app/bootstrap.inc.php';

if(isset($_POST['refuse']))
{
  $demandeASupp = $DemandesDAO->getOneSVP($_POST['id_ville'],$_POST['id_categorie']);
  $DemandesDAO->delete($demandeASupp);
  header("Location: gestiondemandes.php?refuse=OK");
  exit(0);
}

if(isset($_POST['accept']))
{

  $demandeAccepter = $DemandesDAO->getOneSVP($_POST['id_ville'],$_POST['id_categorie']);
  $newActualite = new actualite(array('titre' => $_POST['libelle'], 'createur' => $InscritsDAO->getOne($_SESSION['login'])['nom'], 'id_zone' => $_POST['id_ville'], 'id_categorie' => $_POST['id_categorie']));
  $actualiteDAO->insert($newActualite);
  $DemandesDAO->delete($demandeAccepter);
  header("Location: gestiondemandes.php?accepter=OK");
  exit(0);
}
//Envoie inscription

$message = isset($_GET["refuse"])?"Suppression effectuee\n":"";
$message = isset($_GET["accepter"])?"Acceptation effectuee\n":$message;
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Gestion demandes</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/style.css" rel="stylesheet">

    <!--FontAwesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">
    <!-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include 'include/menuOrgaGestion.php'; ?>

    <?php echo $message ?>
    <?php

    $lesDemandes = $DemandesDAO->getAllDemandes();
    foreach ($lesDemandes as $uneDemande )
    {
      $uneDemande->toForm();
    }

     ?>
    <?php include("include/footer.php");?>
  </body>
</html>
