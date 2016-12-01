<?php
// Autochargement des classes
include_once 'app/bootstrap.inc.php';

function afficheTout($inscrits) {
    echo "------- Tous les inscrits :<br>";
    foreach ($inscrits->getAll() as $c)
        echo $c, "<br>";
    echo "---------------------------<br>";
}

$moi = new Inscrit([ 'login' => "genthial", 'nom' => "GENTHIAL", 'prénom' => "Damien", 'mdp' => "genthial",
                     'courriel' => "Damien.Genthial@iut-valence.fr", 'validation' => "", 'rôle' => "ROLE_UTILISATEUR" ]);
echo $moi, "<br>";
$inscrits = new InscritsDAO(MaBD::getInstance());
echo $inscrits->getOne("renaudes"), "<br>";
echo $inscrits->getOne("volfoni"), "<br>";

afficheTout($inscrits);

echo "Enregistrement de ";
$inscrits->insert($moi);
echo $moi, "<br>";

afficheTout($inscrits);

echo "Modification de $moi<br>";
$moi->validation = uniqid();
$inscrits->update($moi);
echo "\t==> $moi<br>";

afficheTout($inscrits);

echo "Effacement de $moi<br>";
$inscrits->delete($moi);

afficheTout($inscrits);

?>
