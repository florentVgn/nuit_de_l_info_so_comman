<?php

class InscritsDAO extends DAO {
    protected $class = "inscrit";

    public function checkAuthentification($login, $mdp)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM inscrit WHERE login=:login");
        $stmt->execute(['login' => $login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $mdpCrypt = crypt($mdp, 'code');

        if($user !== false && (crypt($user['mdp'],'code') == $mdpCrypt))
        {
            return $user;
        }
        else
        {
            return null;
        }
    }

    public function getAllUsers() {
        $res = array();
        $stmt = $this->pdo->query("SELECT * FROM inscrit ORDER BY nom");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            {
             $res[] = new Inscrit(array('login' => $row['login'],'nom' => $row['nom'],
              'mdp' => $row['mdp'],'mail' => $row['mail'],'role' => $row['role'],
              'acces_region' => $row['acces_region']));
            }

        return $res;
    }

    public function getOne($login)
    {
      $stmt = $this->pdo->prepare("SELECT * FROM inscrit WHERE login=:login");
      $stmt->execute(['login' => $login]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      return $user;
    }

    public function insert($obj)
    {
      $stmt = $this->pdo->prepare("INSERT INTO inscrit (nom, login, mdp, mail, role, acces_region) VALUES (:nom, :login, :mdp, :mail, :role, :acces_region)");
      $res = $stmt->execute(array('nom' => $obj->nom,
                                  'login' => $obj->login,
                                  'mdp' => $obj->mdp,
                                  'mail' => $obj->mail,
                                  'role' => $obj->role,
                                  'acces_region' => $obj->acces_region));
      return $res;
    }

    public function delete($obj)
   {
        $stmt = $this->pdo->prepare("DELETE FROM inscrit WHERE login=:login");
        $res = $stmt->execute(['login' => $obj['login']]);
        return $res;
    }

    public function updateUser( $nom,$login, $mdp, $mail, $acces_region)
    {
      $stmt = $this->pdo->prepare("UPDATE inscrit SET nom=:nom, login=:login, mdp=:mdp, mail=:mail, acces_region=:acces_region  WHERE login=:login");
      $res = $stmt->execute(array('nom' => $nom,'login' => $login,'mdp' => $mdp,'mail' => $mail,'acces_region' => $acces_region ));
      return $res;
    }



}
