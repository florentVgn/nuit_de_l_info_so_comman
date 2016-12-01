<?php

class ZonesDAO extends DAO {
    protected $class = "zone";


    public function getAll() {
        $res = array();
        $stmt = $this->pdo->query("SELECT * FROM zone ORDER BY nom_ville");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            {
             $res[] = new Zone(array('nom_ville' => $row['nom_ville'],'departement' => $row['departement'],'id_ville' => $row['id_ville'],
              'region' => $row['region']));
            }

        return $res;
    }

    public function getOne($id_ville)
    {
      $stmt = $this->pdo->prepare("SELECT * FROM zone WHERE id_ville=:id_ville");
      $stmt->execute(['id_ville' => $id_ville]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      return $user;
    }

    public function insert($obj)
    {
      $stmt = $this->pdo->prepare("INSERT INTO zone (nom_ville, departement, id_ville, region) VALUES (:nom_ville, :departement, :id_ville, :region)");
      $res = $stmt->execute(array('nom_ville' => $obj->nom_ville,
                                  'departement' => $obj->departement,
                                  'id_ville' => $obj->id_ville,
                                  'region' => $obj->region);
      return $res;
    }

    public function delete($obj)
   {
        $stmt = $this->pdo->prepare("DELETE FROM zone WHERE id_ville=:id_ville");
        $res = $stmt->execute(['id_ville' => $obj['id_ville']]);
        return $res;
    }
}
