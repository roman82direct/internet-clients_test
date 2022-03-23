<?php


namespace App\Models;


abstract class Model
{
    protected $id;
    protected $name;
    protected $timestamp;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}
