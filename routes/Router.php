<?php


namespace routes;


use App\Request\Request;

class Router
{
    private $method;
    private $params;
    private $entity;
    private $action;
    const PATH = "Location: ../public/dashboard.php";

    public function __construct($method, Request $request)
    {
     $this->method = $method;
     $this->params = $request->getRequestEntries();
     $this->entity = $request->action;
     $this->action = $request->make;
    }

    private function getController(){
        $controllerName = 'app\controllers\\'.ucfirst($this->entity).'Controller';

        return new $controllerName();
    }

   private function get(){
       $this->getController()->delete($this->params);
        header(self::PATH);
    }

    private function post()
    {
        if ($this->action == 'update'){
            self::getController()->put($this->params);
            header(self::PATH);
        } else {
            self::getController()->create($this->params);
            header(self::PATH);
        }
    }

    public function route()
    {
        ($this->method == 'POST') ? self::post() : self::get();
    }
}
