<?php

namespace Core;

use app\Controller\Blog;
use app\Controller\User;
use Exception;

class Route
{
    private $controllerName;
    private $actionName;
    private $processed = false;
    private $routes;

    private function  process()
    {
        if (!$this->processed) {

            $paths = parse_url($_SERVER['REQUEST_URI']);
            $path = $paths['path'];
            if (isset($this->routes[$path])) {
                $this->controllerName = $this->routes[$path][0];
                $this->actionName = $this->routes[$path][1];
            } else {
                $parts = explode("/", $path);
                $this->controllerName = '\\App\\Controller\\' . ucfirst(strtolower($parts[1]));
                $this->actionName = strtolower($parts[2]) ?? 'index';
            }
            $this->processed = true;
        }
    }

    public function addRoute($path, $controllerName, $actionName)
    {
        $this->routes[$path] = [
            $controllerName,
            $actionName
        ];
    }

    public function getControllerName(): string
    {
        if (!$this->processed) {
            $this->process();
        }
        return $this->controllerName;
    }

    public function getActionName(): string
    {
        if (!$this->processed) {
            $this->process();
        }
        return $this->actionName . "Action";
    }
}
