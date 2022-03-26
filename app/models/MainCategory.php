<?php


namespace App\Models;


use app\config\Database;
use App\Request\Request;
use Exception;

class MainCategory
{
    public function new(Request $request)
    {
        $sql = "INSERT INTO main_categories (name, description) VALUES (:name, :description)";
        $arg = ['name' => $request -> name , 'description' => $request -> description];
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
        $sql = "UPDATE main_categories SET name=:name, description=:description WHERE id=:id";
        $arg = ['name' => $request -> name,'description' => $request->description, 'id' => $request->id];
        try {
            $res = Database::update($sql, $arg);
        }
        catch (Exception $exception){
            $res = $exception->getMessage();
        }
        return $res;
    }

    public function get($id){
        $sql = "SELECT * FROM main_categories WHERE id = $id";
        return Database::getRow($sql);
    }

    public static function getAll(){
        $sql = "SELECT * FROM main_categories";
        return Database::getRows($sql);
    }

    public function delete($id)
    {
        $sql = "DElETE FROM main_categories WHERE id = $id";
        return Database::delete($sql);
    }

}
