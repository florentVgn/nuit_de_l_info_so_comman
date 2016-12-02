<?php
class Zone extends TableObject {
    static public $tableName = "zone";
    static public $keyFieldsNames = array('id_ville');
    public $hasAutoIncrementedKey = false;

    public function toForm()
    {
        echo "<option value=" . "$this" .'>'. "$this->departement" .'</option>';
    }
}
