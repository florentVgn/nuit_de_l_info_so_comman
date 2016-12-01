<?php
function __autoload($class) { require_once "Classes/$class.php"; }
$InscritsDAO = new InscritsDAO(MaBD::getInstance());
session_start();
