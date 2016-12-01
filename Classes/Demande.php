<?php
class Inscrit extends TableObject {
    static public $tableName = "demande";
    static public $keyFieldsNames = array('id_ville', 'id_categorie');
    public $hasAutoIncrementedKey = false;
}
