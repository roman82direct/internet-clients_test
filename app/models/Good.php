<?php


namespace App\Models;


class Good extends Model

{
    protected $description;
    protected $main_category_id;
    protected $second_category_id;

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }
}
