<?php


namespace App\Models;


use app\config\Database;
use Exception;

class Good extends Model
{
    protected $table = 'goods';


    public function new($args)
    {
        $sql = "INSERT INTO $this->table (name, upper_category_id, description, art) VALUES (:name, :second_category_id, :description, :art)";
        $arg = ['name' => $args['name'] ,
                'second_category_id' => $args['upper_item_id'],
                'description' => $args['description'],
                'art' => $args['art'],
            ];
        try {
            $res = Database::insert($sql, $arg);
        }
        catch (Exception $exception){
            $res = $exception->getMessage();
        }
        return $res;
    }

    public function update($args)
    {
        $sql = "UPDATE $this->table SET name=:name, upper_category_id=:second_category_id, description=:description, art=:art WHERE id=:id";
        $arg = ['name' => $args['name'] ,
                'second_category_id' => $args['upper_item_id'],
                'description' => $args['description'],
                'art' => $args['art'],
                'id' => $args['id']
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
