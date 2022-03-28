<?php


namespace App\Controllers;


use App\Models\Good;
use App\Request\Request;

class GoodController extends Controller
{
    public function create(Request $request) {
        return (new Good('goods'))->new($request);
    }

    public function delete(Request $request)
    {
        return (new Good('goods'))->delete($request->id);
    }

    public function put(Request $request)
    {
        return (new Good('goods'))->update($request);
    }
}
