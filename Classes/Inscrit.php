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
        echo "<td>".$this->prenom."</td>";
        echo "<td>".$this->mail."</td>";
        echo "<td>".$this->role."</td>";
      echo "</tr>";
    }

    public function toForm() {
        echo "<form id='formgestion' method='post'> <p>";
        echo "<input type='text' name='login' value='";
        echo $this->login;
        echo "'readonly>";
        echo "</input>";
        echo "<input type='text' name='nom' value='";
        echo $this->nom;
        echo "'readonly>";
        echo "</input>";
        echo "<input type='text' name='prenom' value='";
        echo $this->prenom;
        echo "'readonly>";
        echo "</input>";
        echo "<input type='text' name='mail' value='";
        echo $this->mail;
        echo "'readonly>";
        echo "</input>";
        echo '<select name="selectRole"/>';
        echo "<option selected disable hidden>$this->role</option>";
                 echo '<option value="ROLE_ADMINISTRATEUR">ROLE_ADMINISTRATEUR</option>';
                 echo '<option value="ROLE_UTILISATEUR">ROLE_UTILISATEUR</option>';
                 echo '<option value="ROLE_REDACTEUR">ROLE_REDACTEUR</option>';
         echo '</select>';

        echo '<input type= "image" name="modif[]" src="../img/modif.png" value="submit"/>';
        echo '<input type= "image" name="supp[]" src="../img/supp.png" value="submit"/>';
        echo "</p></form>";
    }
}
?>
