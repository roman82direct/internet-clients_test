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

    protected function getController(){
        $controllerName = 'app\controllers\\'.ucfirst($this->entity).'Controller';

        return new $controllerName();
    }

   protected function get(){
       if ($this->entity =='user'){
           $this->getController()->logOut();
       } else {
           $this->getController()->delete($this->params);
           header(self::PATH);
       }
    }

    protected function post()
    {
        if ($this->entity =='user'){
            if ($this->action == 'signIn'){
                self::getController()->signIn($this->params);
                header(self::PATH);
            } else {
                self::getController()->logIn($this->params);
                header(self::PATH);
            }

        }   else {
            if ($this->action == 'update'){
                self::getController()->put($this->params);
                header(self::PATH);
            } else {
                self::getController()->create($this->params);
                header(self::PATH);
            }
        }
    }

    public function route()
    {
        ($this->method == 'POST') ? self::post() : self::get();
    }
}
