<?php


namespace App\Models;


use app\config\Database;
use App\Request\Request;
use Exception;

class SecondCategory
{
    public function new(Request $request)
    {
        $sql = "INSERT INTO second_categories (name, description, main_category_id) VALUES (:name, :description, :main_category_id)";
        $arg = ['name' => $request -> name , 'description' => $request -> description, 'main_category_id' => $request -> main_category_id];
        try {
            $res = Database::insert($sql, $arg);
        }
        catch (Exception $exception){
            $res = $exception->getMessage();
        }
        return $res;
    }

    public static function getAll(){
        $sql = "SELECT * FROM second_categories";
        return Database::getRows($sql);
    }

    public function getByMainId($main_id)
    {
        $sql = "SELECT * FROM second_categories WHERE main_category_id = $main_id";
        return Database::getRows($sql);
    }

    public function delete($id)
    {
        $sql = "DElETE FROM second_categories WHERE id = $id";
        return Database::delete($sql);
    }

}
