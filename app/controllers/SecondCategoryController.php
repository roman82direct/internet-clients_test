<?php


namespace App\Controllers;


use App\Models\MainCategory;
use App\Models\SecondCategory;
use App\Request\Request;

class SecondCategoryController extends Controller
{
    public function create(Request $request) {
        return (new SecondCategory())->new($request);
    }
}
