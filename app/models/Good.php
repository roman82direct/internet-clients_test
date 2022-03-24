<?php


namespace App\Models;


use app\config\Database;
use App\Request\Request;
use Exception;

class Good

{
    public function new(Request $request)
    {
        $sql = "INSERT INTO goods (name, second_category_id, description, art) VALUES (:name, :second_category_id, :description, :art)";
        $arg = ['name' => $request -> name ,
                'second_category_id' => $request -> second_category_id,
                'description' => $request -> description,
                'art' => $request -> art,
            ];
        try {
            $res = Database::insert($sql, $arg);
        }
        catch (Exception $exception){
            $res = $exception->getMessage();
        }
        return $res;
    }

    public static function getAll(){
        $sql = "SELECT * FROM goods";
        return Database::getRows($sql);
    }

    public function getByCategorieId($sec_id)
    {
        $sql = "SELECT * FROM goods WHERE goods.second_category_id = $sec_id";
        return Database::getRows($sql);
    }

    public function delete($id)
    {
        $sql = "DElETE FROM goods WHERE id = $id";
        return Database::delete($sql);
    }
}
