<?php

// Autochargement des classes
include_once 'app/bootstrap.inc.php';
//Envoie inscription
$param['loginperdu'] = isset($_POST['loginperdu'])?trim($_POST['loginperdu']):"";
$param['erreur'] = false;
$param['succes'] = false;
$param['message'] = "";

if (isset($_POST['mail_mdp_oublie']))
{ // On a cliqué sur le bouton
  if (empty($param['loginperdu']))
  {
    $param['erreur'] = true;
    $param['message'] = "Merci de saisir un login...";
  }
  else
  {
    $utilisateurMdpPerdu = $InscritsDAO->getOne($param['loginperdu']);
    if($utilisateurMdpPerdu)
    {
      $sujet = "Mot de passe perdu";
      $message = "Voici votre mot de passe : " . $utilisateurMdpPerdu['mdp'] . ".\n" . "Essayez de le retenier la prochaine fois ...\n";
      $headers = "MIME-Version: 1.0\r\n";
      $headers .= "From: ADMINISTRATEUR\r\nX-Mailer:PHP";

      if(mail($utilisateurMdpPerdu['mail'],$sujet,$message,$headers))
      {
        $param['succes'] = true;
        $param['message'] = "Le mot de passe a été envoyé sur l'adresse mail liée a " . $param['loginperdu'] ." !";
      }
      else
      {
        $param['erreur'] = true;
        $param['message'] = "Une erreur s'est produite durant l'envoi du mail";
      }
    }
    else
    {
      $param['erreur'] = true;
      $param['message'] = "Le login n'est pas dans la base de données ...";
    }
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8"/>
   <link rel="stylesheet" type="text/css" href="../style.css"/>
   <link href="https://fonts.googleapis.com/css?family=Heebo:100" rel="stylesheet">
   <title>Mot de passe oublié</title>
</head>
<body>
	<h1 style="text-align: center">Entrez votre login...</h1>
<?php
   if ($param['erreur'])
   {
       echo '<p class="erreur">', $param['message'], '</p>';
   }
   elseif ($param['succes'])
   {
       echo '<p>', $param['message'], '</p>';
   }
   else
   {
      echo '<p class="message">', $param['message'], '</p>';
   }
?>
   <center><form id="formLogin" action="" method="post">
   <table><tbody>
      <tr>
         <th>Login : </th>
         <td><input type="text" name="loginperdu" size="20" value="<?php echo $param['loginperdu']; ?>"/></td>
      </tr>

      <tr><td colspan="2" style="text-align: center; border: none;">
         <input type="submit" name="mail_mdp_oublie" value="Envoyer"/></td>
      </tr>
   </tbody></table>
   </form>
 </center>
</body>
</html>
