<?php

// Autochargement des classes
include_once 'app/bootstrap.inc.php';


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Refugees Assistance</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--FontAwesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript">
      $(window).load(function() {
        $('#exampleModal').modal('show');
        
      });
    </script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>
    <h1><i class="fa fa-print" aria-hidden="true"></i>Bonjour</h1>
    <a href="connexion.php">Organisateur</a>
    <a href="carte.php">Refugié</a>
    <div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          
        </div>
      </div>
    </div>
    




  </body>
</html>
