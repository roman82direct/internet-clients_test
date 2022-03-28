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

    public function get(){
        switch ($this->itinity) {
            case 'main':
                (new MainCategoryController())->delete($this->params);
                header(self::PATH);
                break;
            case 'second':
                (new SecondCategoryController())->delete($this->params);
                header(self::PATH);
                break;
            case 'good':
                (new GoodController())->delete($this->params);
                header(self::PATH);
                break;
        }
    }

    public function post()
    {
        if ($this->make == 'update'){
            switch ($this->itinity) {
                case 'main':
                    (new MainCategoryController())->put($this->params);
                    header(self::PATH);
                    break;
                case 'second':
                    (new SecondCategoryController())->put($this->params);
                    header(self::PATH);
                    break;
                case 'good':
                    (new GoodController())->put($this->params);
                    header(self::PATH);
                    break;
            }
        } else {
            switch ($this->itinity) {
                case 'main':
                    (new MainCategoryController())->create($this->params);
                    header(self::PATH);
                    break;
                case 'second':
                    (new SecondCategoryController())->create($this->params);
                    header(self::PATH);
                    break;
                case 'good':
                    (new GoodController())->create($this->params);
                    header(self::PATH);
                    break;
            }
        }
    }

    public function route()
    {
        ($this->method == 'POST') ? $this->post() : $this->get();
    }
}
