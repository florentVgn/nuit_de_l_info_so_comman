<?php

// Autochargement des classes
include_once 'app/bootstrap.inc.php';

function verification_mdp($mdp)
{
  //au moins une maj, une mini, un chiffre et 8 max
  $regexMaj = "#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$#";
  if (preg_match($regexMaj, $mdp))
  {
    return true;
  }
  else
  {
    return false;
  }
}

if(isset($_POST['envoyerInscription']))
{
  if(!($InscritsDAO->getOne($_POST['loginInscri'])))
  {
    if($_POST['mdpInscri'] != $_POST['confirmInscri'])
    {
      echo "Les mots de passent ne correspondent pas !";
    }
    elseif (!(verification_mdp($_POST['mdpInscri'])))
    {
      echo "Le mot de passe doit contenir une majuscule et un chiffre au minimum";
    }

    else if(filter_var($_POST['mailInscri'], FILTER_VALIDATE_EMAIL))
    {
      $nouveauInscri = new inscrit(array('nom' => $_POST['nomInscri'],'login' => $_POST['loginInscri'], 'mdp' => $_POST['mdpInscri'],
                                         'mail' => $_POST['mailInscri'], 'role' => 'ROLE_ORGANISATEUR', 'acces_region' => 'TEST'));
      $InscritsDAO->insert($nouveauInscri);

      $sujet = "Validation email";
      $headers = "MIME-Version: 1.0\r\n";
      $headers .= "From: ADMINISTRATEUR\r\nX-Mailer:PHP\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

      $message = "Bonjour,\nVotre compte a été activé, voici vos identifiants : \nLogin : $nouveauInscri->login\nMot de passe : $nouveauInscri->mdp\nMerci";
      echo $message;
      $destinataire = $_POST['mailInscri'];

      if(mail($destinataire,$sujet,$message,$headers))
      {
          echo "Message envoyé";
      }
      else
      {
        echo "Une erreur s'est produite";
      }

    }
    else
    {
      echo "L'adresse mail n'est pas valide !";
    }
  }
  else
  {
    echo "Cet identifiant est déjà réservé !";
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
    <title>Creation d'un compte</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--FontAwesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  </head>

  <body>

    <div>
      <table>
        <form action="" method="post" enctype="application/x-www-form-urlencoded" name="formulaireInscription">
          <tr>
            <td colspan="2"><input id="nameInscri" type="text" name="nomInscri" placeholder="Nom de l'entreprise" maxlength="25" value="<?php echo @$_POST['nomInscri']; ?>" required/></td>
          </tr>
          <tr>
            <td colspan="2"><input id="mailInscri" type="email" name="mailInscri"  placeholder="Mail de l'entreprise" maxlength="100" value="<?php echo @$_POST['mailInscri']; ?>" required/></td>
          </tr>
          <tr>
            <td colspan="2"><input id="idInscri" type="text" name="loginInscri"  placeholder="Identifiant" maxlength="15" value="<?php echo @$_POST['loginInscri']; ?>" required/></td>
          </tr>
          <tr>
            <td colspan="2"><input id="mdpInscri" type="password" name="mdpInscri" maxlength="15" placeholder="Mot de passe" value="<?php echo @$_POST['mdpInscri']; ?>" required/></td>
          </tr>
          <tr>
            <td colspan="2"><input id="confirmInscri" type="password" name="confirmInscri" maxlength="15" placeholder="Confirmation" value="<?php echo @$_POST['confirmInscri']; ?>" required/></td>
          </tr>

          <tr>
            <td width="42%">
              <center>
                <input type="reset" name="reset" id="reset" value="Réinitialiser le formulaire"/>
              </center>
            </td>
            <td width="41%">
              <center>
                <input type="submit" name="envoyerInscription" value="Envoyer">
            </center>
            </td>
          </tr>
        </form>
      </table>
      </div>
<?php include("include/footer.php");?>
  </body>
