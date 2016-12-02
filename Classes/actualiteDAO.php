<?php
class actualiteDAO extends DAO{

    protected $class ="actualite";

    public function getOneActu($id_zone,$id_categorie) {
      $res = array();
      $stmt = $this->pdo->query("SELECT * from actualites ORDER BY titre");
      foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
      $res[] = new Actualite(array('titre' => $row['titre'], 'id_categorie' => $row['id_categorie']));
    }

      return $titre;
      }

    public function getAllActu() {
      $stmt = array();
      $stmt = $this->pdo->query("SELECT * FROM actualites ORDER BY titre");
      foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
      {
        $res[] = new actualite(array('titre' => $row['titre'], 'id_categorie' => $row['id_categorie'],'createur'=> $row['createur'],'id_zone' => $row['id_zone']));
      }
      return $res;
      }

    public function insert($obj) {
      $stmt = $this->pdo->prepare("INSERT INTO actualites(id_categorie,createur, id_zone) VALUES (:id_categorie, :createur, :id_zone)");
      $res[] = $stmt->execute(array('id_categorie' => $obj->id_categorie,
                                 'createur' => $obj->createur,
                                 'id_zone' => $obj->id_zone));
      return $res;
    }

    public function delete($obj) {
      $stmt = $this->pdo->prepare("DELETE FROM actualites WHERE id_categorie=:id_categorie AND id_zone=:id_zone");
      $res =$stmt->execute(array('id_categorie' => $obj['id_categorie'], 'id_zone' => $obj['id_zone']));
      return $res;
      }

}

?>
