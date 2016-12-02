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
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--FontAwesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    <!--CSS -->
    <link rel="stylesheet" href="style/style.css">
    <link href="style/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />

    <script src="js/jquery.vmap.js" type="text/javascript"></script>
    <script src="js/jquery.vmap.france.js" type="text/javascript"></script>
	  <script src="js/jquery.vmap.colorsFrance.js" type="text/javascript"></script>

	  <script type="text/javascript">
	  $(document).ready(function() {
		$('#francemap').vectorMap({
		    map: 'france_fr',
			hoverOpacity: 0.5,
			hoverColor: false,
			backgroundColor: "#ffffff",
			colors: couleurs,
			borderColor: "#000000",
			selectedColor: "#EC0000",
			enableZoom: true,
			showTooltip: true,
  		    onRegionClick: function(element, code, region)
  		    {
  		        var message = 'Département : "'
  		            + region
  		            + '" || Code : "'
  		            + code
  					+ '"';

  		        alert(message);
  		    }
  		});
  	});
  	</script>
  </head>
  <body>

    <nav class="navbar navbar-default menu" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="home.php">
            <img alt="WIIO" src="img/logo.jpg" height="20vh" style="margin-left: 10px;">
          </a>
          <a class="navbar-brand" href="index.php">
            <p style="margin-left: 10px; font-family: 'Josefin Sans', sans-serif; color: white; height: 20px; line-height: 20px;">Refugees Assistant</p>
          </a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li class="lien-menu lien-actif"><a href="#">Actualité</a></li>
            <li class="lien-menu "><a href="#">Ressources</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="lien-actif">Déconnexion</a></li>

          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <h1><i class="fa fa-angle-down fa-stack-2x faa-float animated" aria-hidden="true"></i>Selectionnez un département</h1>
    <a href="homeRefugie.php">Si on clique sur un lieu</a>
    <div id="francemap" style="width: 700px; height: 600px;"></div>


    <?php include("include/footer.php");?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
