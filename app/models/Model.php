<?php


namespace App\Models;


abstract class Model
{
    protected $id;
    protected $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
