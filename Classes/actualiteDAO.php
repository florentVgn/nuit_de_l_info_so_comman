<?php
class actualiteDAO extends DAO{

    protected $class ="actualite";

    public function getOne($id_zone,$id_categorie) {
      $res = array();
      $stmt = $this->pdo->query("SELECT * from actualite ORDER BY titre");
      foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
      $res[] = new Actualite(array('titre' => $row['titre'], 'id_categorie' => $row['id_categorie']));
    }

      return $titre;
      }

    public function getAll() {
      $stmt = array();
      $stmt = $this->pdo->query("SELECT * FROM actualite ORDER BY titre");
      foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row))
      {
        $res[] = new Actualite(array('titre' => $row['titre'],
                                     'id_categorie' => $row['id_categorie'],
                                     'createur'=> $row['createur'],
                                     'id_zone' => $row['id_zone'])
      }
      return $res;
      }

    public function insert($obj) {
      $stmt = $this->pdo->prepare("INSERT INTO actualite(id_categorie,createur, id_zone)) VALUES (:id_categorie, :createur, :id_zone)");
      $res = $stmt->execute(array('id_categorie' => $obj->id_categorie,
                                 'createur' => $obj->createur,
                                 'id_zone' => $obj->id_zone));
      return $res;
    }

    public function delete($obj) {
      $stmt = $this->pdo->prepare("DELETE FROM actualite WHERE id_categorie=:id_categorie AND id_zone=:id_zone");
      $res =$stmt->execute(array('id_categorie' => $obj['id_categorie'], 'id_zone' => $obj['id_zone']);
      return $res;
      }

}

?>
