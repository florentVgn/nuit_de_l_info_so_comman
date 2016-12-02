<?php
class Inscrit extends TableObject {
    static public $tableName = "inscrit";
    static public $keyFieldsNames = array('login');
    public $hasAutoIncrementedKey = false;

    public function toTable()
    {
      echo "<tr>";
        echo "<td>".$this->login."</td>";
        echo "<td>".$this->nom."</td>";
        echo "<td>".$this->mail."</td>";
        echo "<td>".$this->role."</td>";
      echo "</tr>";
    }

    public function toForm() {
        echo "<form id='formgestion' method='post'> <p>";
        echo "<input type='text' name='nom' value='";
        echo $this->nom;
        echo "'>";
        echo "</input>";
        echo "<input type='text' name='login' value='";
        echo $this->login;
        echo "'readonly>";
        echo "</input>";
        echo "<input type='text' name='mdp' value='";
        echo $this->mdp;
        echo "'>";
        echo "</input>";
        echo "<input type='text' name='mail' value='";
        echo $this->mail;
        echo "'>";
        echo "</input>";
        echo "<input type='text' name='role' value='";
        echo $this->role;
        echo "'readonly>";
        echo "</input>";

        echo "<input type='text' name='acces_region' value='";
        echo $this->acces_region;
        echo "'>";
        echo "</input>";

        echo '<input type= "image" name="modif[]" src="../img/modif.png" value="submit"/>';
        echo '<input type= "image" name="supp[]" src="../img/supp.png" value="submit"/>';
        echo "</p></form>";
    }
}
?>
