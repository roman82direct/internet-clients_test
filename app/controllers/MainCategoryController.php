<?php


namespace App\Controllers;


use App\Models\MainCategory;
use App\Request\Request;


class MainCategoryController extends Controller
{
    public function create(Request $request) {
        return (new MainCategory())->new($request);
    }

    public function delete(Request $request)
    {
        (new MainCategory())->delete($request->id);
    }

    public function put(Request $request)
    {
        return (new MainCategory())->update($request);
    }
}
