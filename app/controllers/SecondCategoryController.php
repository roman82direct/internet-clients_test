<?php


namespace App\Controllers;


use app\config\Database;
use App\Models\Good;
use App\Models\MainCategory;
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
}
