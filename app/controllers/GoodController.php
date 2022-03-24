<?php


namespace App\Controllers;


use App\Models\Good;
use App\Models\SecondCategory;
use App\Request\Request;

class GoodController extends Controller
{
    public function create(Request $request) {
        return (new Good())->new($request);
    }

    public function delete(Request $request)
    {
        return (new Good())->delete($request->id);
    }
}
