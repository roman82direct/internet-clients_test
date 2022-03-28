<?php


namespace routes;


use App\Controllers\GoodController;
use App\Controllers\MainCategoryController;
use App\Controllers\SecondCategoryController;
use App\Request\Request;

class Router
{
    protected $method;
    public $params;

    public function __construct($method, Request $request)
    {
     $this->method = $method;
     $this->params = $request;
    }

    public function route()
    {
        if ($this->method == 'POST' && $this->params->action == 'main') {
            (new MainCategoryController())->create($this->params->getRequestEntries());

            header("Location: ../public/dashboard.php");
        }

        if ($this->method == 'POST' && $this->params->action == 'second') {
            (new SecondCategoryController())->create($this->params->getRequestEntries());

            header("Location: ../public/dashboard.php");
        }

        if ($this->method == 'POST' && $this->params->action == 'good') {

            (new GoodController())->create($this->params->getRequestEntries());

            header("Location: ../public/dashboard.php");
        }

        if ($this->method == 'GET' && $this->params->action == 'good') {
            (new GoodController())->delete($this->params->getRequestEntries());

            header("Location: ../public/dashboard.php");
        }

        if ($this->method == 'GET' && $this->params->action == 'second') {
            (new SecondCategoryController())->delete($this->params->getRequestEntries());

            header("Location: ../public/dashboard.php");
        }

        if ($this->method == 'GET' && $this->params->action == 'main') {
            (new MainCategoryController())->delete($this->params->getRequestEntries());

            header("Location: ../public/dashboard.php");
        }

        if ($this->method == 'POST' && $this->params->action == 'updatemain') {
            (new MainCategoryController())->put($this->params->getRequestEntries());

            header("Location: ../public/dashboard.php");
        }

        if ($this->method == 'POST' && $this->params->action == 'updatesecond') {
            (new SecondCategoryController())->put($this->params->getRequestEntries());

            header("Location: ../public/dashboard.php");
        }

        if ($this->method == 'POST' && $this->params->action == 'updategood') {
            (new GoodController())->put($this->params->getRequestEntries());

            header("Location: ../public/dashboard.php");
        }
    }
}
