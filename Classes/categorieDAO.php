<?php
class categorieDAO extends DAO{

    protected $class ="categorie";

          public function getOne($idcategorie) {
            $res = array();
            $stmt = $this->pdo->query("SELECT * from categorie ORDER BY id_categorie");
            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
              $res[] = new Categorie(array('libelle' => $row['libelle'], 'id_categorie' => $row['id_categorie']));
            }

            return $idcategorie;
          }

    public function getAll() {
      $stmt = array();
      $stmt = $this->pdo->query("SELECT * FROM categorie ORDER BY id_categorie");
      foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row))
      {
        $res[] = new Categorie(array('libelle' => $row['libelle'], 'id_categorie' => $row['id_categorie']));
      }
      return $res;
    }

    public function insert($obj) {
      $stmt = $this->pdo->prepare("INSERT INTO categorie(libelle,id_categorie)) VALUES (:libelle, :id_categorie)");
      $res = stmt->execute(array('libelle' => $obj->libelle,
                                  'id_categorie' => $obj->id_categorie));
      return $res;
    }

    public function delete($obj) {
      $stmt = $this->pdo->prepare("DELETE FROM categorie WHERE id_categorie=:id_categorie");
      $res =$stmt->execute(['id_categorie' => $obj['id_categorie']]);
      return $res;
      }

}

?>
