<?php
// Classe de connexion à une base de données
// S'inspire du pattern singleton pour n'ouvrir qu'une seule connexion
// Utilisation :
//    $bd = MaBD::getInstance(); // $bd est un objet PDO
class MaBD {

   static private $pdo = null; // Le singleton

   // Obenir le singleton
   static function getInstance() {
      if (self::$pdo == null) {
         $dsn = "mysql:host=localhost;dbname=refugeesassistance;charset=utf8";
         self::$pdo = new PDO($dsn, "root", "");
         self::$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      }
      return self::$pdo;
   }
}

?>
