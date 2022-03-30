<?php


namespace App\Controllers;


use App\Models\SecondCategory;


class SecondCategoryController
{
    public function create($request) {
        return (new SecondCategory())->new($request);
    }

    public function delete($request)
    {
        (new SecondCategory())->delete($request['id']);
    }

    public function put($request)
    {
        return (new SecondCategory())->update($request);
    }
}
