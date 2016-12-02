<?php
function __autoload($class) { require_once "/../Classes/$class.php"; }
$ZonesDAO = new ZonesDAO(MaBD::getInstance());
$InscritsDAO = new InscritsDAO(MaBD::getInstance());

session_start();
