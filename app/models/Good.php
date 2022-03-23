<?php


namespace App\Models;


class Good extends Model
{
    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }
}
