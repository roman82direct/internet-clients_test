<?php


namespace App\Controllers;


use App\Models\Good;
use App\Models\MainCategory;
use App\Models\SecondCategory;
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
}
