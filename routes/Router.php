<?php


namespace routes;


use App\Controllers\GoodController;
use App\Controllers\MainCategoryController;
use App\Controllers\SecondCategoryController;
use App\Request\Request;

class Router
{
    protected $method;
    protected $params;
    protected $itinity;
    protected $make;
    const PATH = "Location: ../public/dashboard.php";

    public function __construct($method, Request $request)
    {
     $this->method = $method;
     $this->params = $request->getRequestEntries();
     $this->itinity = $request->action;
     $this->make = $request->make;
    }

    public function getController(){
        $prefix = $this->itinity ?? null;
        $controllerName = 'app\controllers\\'.ucfirst($prefix).'Controller' ?? '';
        $controller = new $controllerName();

        return $controller;
    }

    public function get(){
        $this->getController()->delete($this->params);
        header(self::PATH);
    }

    public function post()
    {
        if ($this->make == 'update'){
            $this->getController()->put($this->params);
            header(self::PATH);
        } else {
            $this->getController()->create($this->params);
            header(self::PATH);
        }
    }

    public function route()
    {
        ($this->method == 'POST') ? $this->post() : $this->get();
    }
}
