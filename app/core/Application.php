<?php

class Application
{
    protected $controllerName = 'HomeController';
    protected $action = 'index';
    // $parameters ended up being unused after I finished the solution. Not needed for any actions described in assignment
    protected $parameters = array();
    protected $database;

    public function __construct()
    {
        $this->processUrl();

        $this->database = new Database();

        if ($this->controllerName === 'HomeController') {
            $productRepo = new ProductRepo($this->database);
            $controller = new HomeController($productRepo);

            if ($this->action === 'index') {
                $productFactory = new ProductFactory();
                $controller->index($productFactory);
            }

            if($this->action === 'delete') {
                $controller->delete();
            }

        } elseif ($this->controllerName === 'AddController') {
            $productRepo = new ProductRepo($this->database);
            $controller = new AddController($productRepo);

            if ($this->action === 'index') {
                $controller->index();
            }

            if ($this->action === 'add') {
                $productFactory = new ProductFactory();
                $controller->add($productFactory);
            }
        }
    }

    /**
     * Removes irrelevant parts of the url, decides on controller and action based on url and sets
     * $controller, $index and $parameters based on data present in incoming url.
     */
    protected function processUrl()
    {
        $request = trim($_SERVER['REQUEST_URI'], '/');
        if (!empty($request)) {
            $url = explode('/', $request);

            $root = explode(D_S, ROOT);
            // remove directory names from url. leave only relevant part
            $url = array_diff($url, $root);
            $url = array_values($url);

            $this->controllerName = isset($url[0]) ? ucfirst($url[0]) . 'Controller' : 'HomeController';
            $this->action = $url[1] ?? 'index';

            // once we've used the url to decide on controller and action, remove params representing controller and action
            unset($url[0], $url[1]);
            $this->parameters = !empty($url) ? array_values($url) : array();
        }
    }
}