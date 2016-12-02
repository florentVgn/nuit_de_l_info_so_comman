<?php
class Demande extends TableObject {
    static public $tableName = "demande";
    static public $keyFieldsNames = array('id_ville', 'id_categorie');
    public $hasAutoIncrementedKey = false;

    public function toForm() {
        echo "<form id='formDemande' method='post'> <p>";
        echo "<input type='text' name='id_ville' value='";
        echo $this->id_ville;
        echo "'readonly>";
        echo "</input>";
        echo "<input type='text' name='id_categorie' value='";
        echo $this->id_categorie;
        echo "'readonly>";
        echo "</input>";
        echo "<input type='text' name='libelle' value='";
        echo $this->libelle;
        echo "'readonly>";
        echo "</input>";
        echo '<input type= "submit" name="accept" value="Accepter"/>';
        echo '<input type= "submit" name="refuse" value="Refuser"/>';
        echo "</p></form>";
    }
}
