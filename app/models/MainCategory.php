<?php


namespace App\Models;


use app\config\Database;
use App\Request\Request;
use Exception;

class MainCategory extends Model
{

    protected $table = 'main_categories';


    public function new(Request $request)
    {
        $sql = "INSERT INTO $this->table (name, description) VALUES (:name, :description)";
        $arg = ['name' => $request->name , 'description' => $request->description];
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
        $arg = ['name' => $request->name,'description' => $request->description, 'id' => $request->id];
        try {
            $res = Database::update($sql, $arg);
        }
        catch (Exception $exception){
            $res = $exception->getMessage();
        }
        return $res;
    }

}
