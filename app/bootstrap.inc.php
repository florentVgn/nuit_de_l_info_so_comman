<?php
function __autoload($class) { require_once "/../Classes/$class.php"; }
$ZonesDAO = new ZonesDAO(MaBD::getInstance());
$InscritsDAO = new InscritsDAO(MaBD::getInstance());

session_start();

//check les droits pour les pages
function isGranted($userID)
{
  global $InscritsDAO;
  $user = $InscritsDAO->getOne($userID);

  if (strpos($_SERVER['REQUEST_URI'], 'admin.php'))
  {
    if (!($user['role'] =='ROLE_ADMINISTRATEUR'))
    {

        header("Location: ../web/connexion.php");
    }
  }

  if (strpos($_SERVER['REQUEST_URI'], 'homeOrga.php'))
  {
    if (!($user['role'] =='ROLE_ADMINISTRATEUR') && !($user['role']=='ROLE_ORGANISTAEUR'))
    {

        header("Location: ../web/connexion.php");
    }
  }

  if(strpos($_SERVER['REQUEST_URI'], 'connexion.php'))
  {
    if($user['role']=='ROLE_ADMINISTRATEUR'){
      header('Location: ../web.admin.php');
    }elseif($user['role']=='ROLE_ORGANISTAEUR'){
      header('Location: ../web/homeOrga.php');
    }
  }}


?>
