<?php


namespace App\Controllers;


use App\Models\Good;
use App\Request\Request;

class GoodController extends Controller
{
    public function create($data) {
        return (new Good())->new($data);
    }

    public function delete($request)
    {
        return (new Good())->delete($request['id']);
    }

    public function put($request)
    {
        return (new Good())->update($request);
    }
}
