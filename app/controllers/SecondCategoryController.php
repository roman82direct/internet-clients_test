<?php


namespace App\Controllers;


use App\Models\SecondCategory;
use App\Request\Request;

class SecondCategoryController extends Controller
{
    public function create(Request $request) {
        return (new SecondCategory())->new($request);
    }

    public function delete(Request $request)
    {
        (new SecondCategory())->delete($request->id);
    }

    public function put(Request $request)
    {
        return (new SecondCategory())->update($request);
    }
}
