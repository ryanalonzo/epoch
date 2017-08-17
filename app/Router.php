<?php

namespace Epoch;

use Epoch\Models\User;

class Router
{
    protected $uri;
    protected $routes;

    public function __construct($uri)
    {
        $this->uri = trim($uri, '/');
    }

    public function get($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function post(Callable $callable)
    {
        $u = new User;

        if($callable($u)) {
            return true;
        }
    }

    public function fire()
    {
        foreach($this->routes as $route) {
            if ($this->uri === $route['uri']) {
                if ($route['controller'] instanceof \Closure) {
                    return $route['controller']();
                }

                list($controller, $method) = explode('::', $route['controller']);

                $controller = "\Epoch\Controllers\\$controller";

                $controller = new $controller;

                return $controller->$method();
            }
        }

        require_once(__DIR__ . '/../views/404.html');
    }
}
