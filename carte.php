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
    <title>Carte</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--FontAwesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    <!--CSS -->
    <link rel="stylesheet" href="style/style.css">

    <link href="jqvmap.css" media="screen" rel="stylesheet" type="text/css" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="jquery.vmap.js" type="text/javascript"></script>
    <script src="jquery.vmap.france.js" type="text/javascript"></script>
	<script src="jquery.vmap.colorsFrance.js" type="text/javascript"></script>

	<script type="text/javascript">
	$(document).ready(function() {
    function RedirectionJavascript(code)
    {
      document.location.href="ressource.php?code="+code;
    }
		$('#francemap').vectorMap({
		    map: 'france_fr',
			hoverOpacity: 0.5,
			hoverColor: false,
			backgroundColor: "#f7f8fa",
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
          RedirectionJavascript(code)
		    }
		});
	});
	</script>
  </head>
  <body>

    <?php include 'include/menuRegCarte.php'; ?>
    <h1>Selectionnez un département</h1>
    <div id="francemap" class="col-lg-6 col-lg-offset-3" style="height: 700px;"></div>

    <footer class="footer col-lg-12">
      <p class="footer-copyright col-lg-6 col-lg-offset-3">Copyright © 2016 - SoComman</p>
    </footer>



  </body>
</html>
