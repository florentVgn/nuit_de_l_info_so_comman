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
<<<<<<< HEAD
    <div>
      <table>
        <form action="" method="post" enctype="application/x-www-form-urlencoded" name="formulaireInscription">
          <tr>
            <td colspan="2"><input id="nameInscri" type="text" name="nomDemandeInscri" placeholder="Nom de l'entreprise" maxlength="25" value="<?php echo @$_POST['nomInscri']; ?>" required/></td>
          </tr>
          <tr>
            <td colspan="2"><input id="mailInscri" type="email" name="mailDemandeInscri"  placeholder="Votre mail" maxlength="100" value="<?php echo @$_POST['mailInscri']; ?>" required/></td>
          </tr>
          <tr>
            <td colspan="2"><select name="selectRole"/>
                            <?php
                            $lesZones = $ZonesDAO->getAllZones();
                            foreach ($lesZones as $uneZone)
                            {
                              $uneZone->toForm();
                            }
                             ?>
                         </select></td>
          </tr>
          <tr>
            <td colspan="2"><textarea name="messageDemandeInscri" class="text-areaForm" placeholder="Message" cols="70" rows="10"></textarea></td>
          </tr>

          <tr>
            <td width="42%">
              <center>
                <input type="reset" name="reset" id="reset" value="Réinitialiser le formulaire"/>
              </center>
            </td>
            <td width="41%">
              <center>
                <input type="submit" name="envoyerDemandeInscription" value="Envoyer">
            </center>
            </td>
          </tr>
        </form>
      </table>
      </div>
=======
    <h1><i class="fa fa-print" aria-hidden="true"></i>Ici un formulaire permettant d'envoyer un mail pour vouloir s'inscrire</h1>

    <p>Test</p>



    <?php include("include/footer.php");?>
>>>>>>> origin/master
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
