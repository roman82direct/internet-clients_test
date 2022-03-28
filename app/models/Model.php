<?php


namespace App\Models;


use app\config\Database;


abstract class Model
{
    protected $table;


    abstract function new($params);

    abstract function update($params);

    public function get($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        return Database::getRow($sql);
    }

    public function getAll(){

        $sql = "SELECT * FROM $this->table";
        return Database::getRows($sql);
    }

    public function getByCategorieId($sec_id)
    {
        $sql = "SELECT * FROM $this->table WHERE upper_category_id = $sec_id";
        return Database::getRows($sql);
    }

    public function delete($id)
    {
        $sql = "DElETE FROM $this->table WHERE id = $id";
        return Database::delete($sql);
    }
}
