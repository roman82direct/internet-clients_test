<?php


namespace App\Models;


use app\config\Database;
use Exception;

class SecondCategory extends Model
{

    protected $table = 'second_categories';


    public function new($request)
    {
        $sql = "INSERT INTO $this->table (name, description, upper_category_id) VALUES (:name, :description, :main_category_id)";
        $arg = ['name' => $request['name'] , 'description' => $request['description'], 'main_category_id' => $request['upper_item_id']];
        try {
            $res = Database::insert($sql, $arg);
        }
        catch (Exception $exception){
            $res = $exception->getMessage();
        }
        return $res;
    }

    public function update($request)
    {
        $sql = "UPDATE $this->table SET name=:name, description=:description, upper_category_id=:main_id WHERE id=:id";
        $arg = ['name' => $request['name'],'description' => $request['description'], 'main_id'=>$request['upper_item_id'], 'id' => $request['id']];
        try {
            $res = Database::update($sql, $arg);
        }
        catch (Exception $exception){
            $res = $exception->getMessage();
        }
        return $res;
    }

}
