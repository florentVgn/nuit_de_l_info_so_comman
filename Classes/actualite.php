<?php
class actualite extends TableObject {
    static public $tableName = "actualites";
    static public $keyFieldsNames = array('id_zone', 'id_categorie');
    public $hasAutoIncrementedKey = false;
}
