<?php


namespace App\Models;


use app\config\Database;
use App\Request\Request;
use Exception;

class Good extends Model

{
    public function new(Request $request)
    {
        $sql = "INSERT INTO goods (name, main_category_id, second_category_id, description, art) VALUES (:name, :main_category_id, :second_category_id, :description, :art)";
        $arg = ['name' => $request -> name ,
                'main_category_id' => $request -> main_category_id,
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
        $sql = "SELECT * FROM main_categories";
        return Database::getRows($sql);
    }
}
