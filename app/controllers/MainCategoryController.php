<?php


namespace App\Controllers;


use App\Models\MainCategory;



class MainCategoryController extends Controller
{
    public function create($request) {
        return (new MainCategory())->new($request);
    }

    public function delete($request)
    {
        (new MainCategory())->delete($request['id']);
    }

    public function put($request)
    {
        return (new MainCategory())->update($request);
    }
}
