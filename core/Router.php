<?php


namespace Core;

class Router
{
    private $route;
    private $controller;
    private $method;

    public function __construct($route_array)
    {
        $this->route = $route_array;
        $url_request = $_SERVER['REQUEST_URI'];
        $url_request = explode('?', $url_request);
        $url_request = $url_request[0];
        if (isset($this->route[$url_request])) {
            $action = explode('@', $this->route[$url_request]);
            $this->controller = $action[0];
            $this->method = $action[1];
        } else {
            $this->controller = 'Error';
            $this->method = 'error_not_found';
        }
    }

    public function run()
    {
        require_once "../private/Controllers/".$this->controller."Controller.php";
        $controllerName = "\Controllers\\".$this->controller."Controller";
        $methodName = $this->method;

        $controllerUse = new $controllerName;
        $controllerUse->$methodName();
    }

    static function current()
    {
        return $_SERVER['REQUEST_URI'];
    }
}