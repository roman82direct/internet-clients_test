<?php


namespace App\Models;


use app\config\Database;
use App\Request\Request;
use Exception;

class SecondCategory
{
    public function new(Request $request)
    {
        $sql = "INSERT INTO second_categories (name, description, upper_category_id) VALUES (:name, :description, :main_category_id)";
        $arg = ['name' => $request -> name , 'description' => $request -> description, 'main_category_id' => $request -> main_category_id];
        try {
            $res = Database::insert($sql, $arg);
        }
        catch (Exception $exception){
            $res = $exception->getMessage();
        }
        return $res;
    }

    public function update(Request $request)
    {
        $sql = "UPDATE second_categories SET name=:name, description=:description, upper_category_id=:main_id WHERE id=:id";
        $arg = ['name' => $request -> name,'description' => $request->description, 'main_id'=>$request->upper_item_id, 'id' => $request->id];
        try {
            $res = Database::update($sql, $arg);
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

    public function get($id){
        $sql = "SELECT * FROM second_categories WHERE id = $id";
        return Database::getRow($sql);
    }

    public function getByMainId($main_id)
    {
        $sql = "SELECT * FROM second_categories WHERE upper_category_id = $main_id";
        return Database::getRows($sql);
    }

    public function delete($id)
    {
        $sql = "DElETE FROM second_categories WHERE id = $id";
        return Database::delete($sql);
    }

}
