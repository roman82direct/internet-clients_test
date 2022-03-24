<?php


namespace App\Controllers;


use App\Models\MainCategory;
use App\Request\Request;


class MainCategoryController extends Controller
{
    public function create(Request $request) {
        return (new MainCategory())->new($request);
    }
}
