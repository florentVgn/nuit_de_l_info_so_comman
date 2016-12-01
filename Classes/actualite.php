<?php
class Inscrit extends TableObject {
    static public $tableName = "actualite";
    static public $keyFieldsNames = array('id_zone', 'id_categorie');
    public $hasAutoIncrementedKey = false;
}
