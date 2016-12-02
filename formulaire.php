<?php

// Autochargement des classes
include_once 'app/bootstrap.inc.php';
//Envoie inscription
if(isset($_POST['envoyerDemandeInscription']))
{
    $sujet = "Validation email";
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "From: ADMINISTRATEUR\r\nX-Mailer:PHP\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $nomInscri = $_POST['nomDemandeInscri'];
    $mailInscri = $_POST['mailDemandeInscri'];
    $message = "Un mail de l'organisation $nomInscri ($mailInscri)\n\n";
    $message .=$_POST['messageDemandeInscri'];

    $destinataire = "nicolas.jourdan@iut-valence.fr";

      if(mail($destinataire,$sujet,$message,$headers))
      {
          echo "Message envoyé";
      }
      else
      {
        echo "Une erreur s'est produite";
      }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Demande d'inscription</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/style.css" rel="stylesheet">

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
    <div class="theForm">


      <h1>Complétez votre formulaire d'inscription</h1>
        <form action="" method="post" enctype="application/x-www-form-urlencoded" name="formulaireInscription">
          <input class="formulaire-fields" id="nameInscri" type="text" name="nomDemandeInscri" placeholder="Nom de l'entreprise" maxlength="25" value="<?php echo @$_POST['nomInscri']; ?>" required/>
          <input class="formulaire-fields" id="mailInscri" type="email" name="mailDemandeInscri"  placeholder="Votre mail" maxlength="100" value="<?php echo @$_POST['mailInscri']; ?>" required/>
          <select class="formulaire-fields" name="selectRole"/>
            <?php
            $lesZones = $ZonesDAO->getAllZones();
            foreach ($lesZones as $uneZone)
            {
              $uneZone->toForm();
            }
             ?>
          </select>
          <textarea name="messageDemandeInscri" class="formulaire-fields text-areaForm" placeholder="Message" cols="70" rows="10"></textarea></td>
                <input class="formulaire-fields" type="reset" name="reset" id="reset" value="Réinitialiser le formulaire"/>
                <input class="formulaire-fields" type="submit" name="envoyerDemandeInscription" value="Envoyer">
        </form>
      </div>
    <?php include("include/footer.php");?>

  </body>
</html>
