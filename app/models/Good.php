<?php


namespace App\Models;


use app\config\Database;
use App\Request\Request;
use Exception;

class Good extends Model
{
    protected $table = 'goods';


    public function new(Request $request)
    {
        $sql = "INSERT INTO $this->table (name, upper_category_id, description, art) VALUES (:name, :second_category_id, :description, :art)";
        $arg = ['name' => $request -> name ,
                'second_category_id' => $request -> upper_item_id,
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

    public function update(Request $request)
    {
        $sql = "UPDATE $this->table SET name=:name, upper_category_id=:second_category_id, description=:description, art=:art WHERE id=:id";
        $arg = ['name' => $request -> name ,
                'second_category_id' => $request->upper_item_id,
                'description' => $request->description,
                'art' => $request->art,
                'id' => $request->id
        ];
        try {
            $res = Database::update($sql, $arg);
        }
        catch (Exception $exception){
            $res = $exception->getMessage();
        }
        return $res;
    }

}
