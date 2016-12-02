
<?php
include_once 'app/bootstrap.inc.php';
$userNameToSupp = $InscritsDAO->getOne($_SESSION['loginToSupp'])['login'];

//Si on a cliqué sur un bouton
if (isset($_POST['confirm_supp'])) {
//et que ce bouton est le bouton "oui"
    if ($_POST['confirm_supp'] == "Oui")
    {
      echo "oui";
      $userToSupp = $InscritsDAO->getOne($_SESSION['loginToSupp']);
      $InscritsDAO->delete($userToSupp);
    }
    header("Location: admin.php");
    exit(0);
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">

    <title>Confirmation</title>
</head>
    <body>
        <div>
            <?php
            echo "Voulez vous vraiment supprimer $userNameToSupp ?";
            echo "<form id='leformsupp' method='post'>";
            echo '<input type="submit" name="confirm_supp" value="Oui"/>';
            echo '<input type="submit" name="confirm_supp" value="Non"/>';
            echo '</form>';
            ?>


        </div>

    </body>
</html>
