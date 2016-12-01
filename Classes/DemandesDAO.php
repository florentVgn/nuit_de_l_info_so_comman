<?php

class ZonesDAO extends DAO {
    protected $class = "demande";


    public function getAll() {
        $res = array();
        $stmt = $this->pdo->query("SELECT * FROM demande ORDER BY libelle");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            {
             $res[] = new Demande(array('id_ville' => $row['id_ville'],'id_categorie' => $row['id_categorie'],'libelle' => $row['libelle']));
            }

        return $res;
    }

    public function getOne($id_ville,$id_categorie)
    {
      $stmt = $this->pdo->prepare("SELECT * FROM demande WHERE id_ville=:id_ville and id_categorie=:id_categorie");
      $stmt->execute(array('id_ville' => $row['id_ville'],'id_categorie' => $row['id_categorie']));
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      return $user;
    }

    public function insert($obj)
    {
      $stmt = $this->pdo->prepare("INSERT INTO demande (id_ville, id_categorie, libelle) VALUES (:id_ville, :id_categorie, :libelle)");
      $res = $stmt->execute(array('id_ville' => $obj->id_ville,
                                  'id_categorie' => $obj->id_categorie,
                                  'libelle' => $obj->libelle));
      return $res;
    }

    public function delete($obj)
   {
        $stmt = $this->pdo->prepare("DELETE FROM demande WHERE id_ville=:id_ville and id_categorie=:id_categorie");
        $res = $stmt->execute(array('id_ville' => $obj['id_ville'],'id_categorie' => $obj['id_categorie']));
        return $res;
    }
}
