<?php
class Inscrit extends TableObject {
    static public $tableName = "zone";
    static public $keyFieldsNames = array('id_ville');
    public $hasAutoIncrementedKey = false;
}
