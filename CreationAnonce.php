<?php
session_start();

if(isset($_POST["accueil"]))
{
  header("Location: PageImigrant.php");
}
if(isset($_POST["Objet"]))
{
  //mail(/*adresse mail*/,$_POST["Objet"],$_POST["message"]);
}
?>
<html id="html">
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css.css">
  </head>
  <body>
    <h1 class="creerAnnonce"> Créer une annonce </h1>
    </br>
    <h2 class="creerAnnonce">Régles</h2>
    </br>
    <p class="creerAnnonce"> regles annonces....</p>
    </br>
    <form class="creerAnnonce" method="POST">
      <label>Titre article</label>
      </br>
      <input type="text" name="Objet" required=""/>
      </br>
      </br>
      </br>
      <label>Sujet article</label>
      </br>
      <textarea name="message" rows="10" cols="80"></textarea>
      </br>
      <input type="submit" value="poster"/>
    </form>
    <form id='idAcc' method="post" action="">
      <input type='submit' name="accueil" value='accueil'/>
    </form>
  </body>
</html>
