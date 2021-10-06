<?php

namespace Core;

use app\Controller\User;

class Application
{
    private $controllerName;
    private $actionName;
    private $routes;
    public function __construct()
    {
        $this->routes = new Route();
    }
    public function run()
    {

        try {
            $this->addRoutes();
            $this->initController();
            $this->initAction();
            $view = new View();
            $this->controller->setView($view);
            $this->controller->{$this->actionName}();
        } catch (RedirectException $e) {
            \header('Location' . $e->getUrl());
        } catch (routeExeption $e) {
            \header("HTTP/1.0 404 Not Found");
        }
    }
    public function addRoutes()
    {
        // /** @uses \App\Controller\User::loginAction() */
        $this->routes->addRoute('user/login', User::class, 'login');
        // /** @uses \App\Controller\User::registrAction() */
        // $this->routes->addRoute('user/register', User::class,'register');
        // /** @uses \App\Controller\Blog::indexAction() */
        // $this->routes->addRoute('blog/index', User::class,'index');
        // $this->routes->addRoute('blog', Blog::class,'index');
    }
    public function initController()
    {
        $controllerName = $this->routes->getControllerName();
        if (!class_exists($controllerName)) {
            throw new routeExeption("Not fount controller" . $controllerName);
        }
        $this->controllerName = new $controllerName;
    }
    public function initAction()
    {
        $actionName = $this->routes->getActionName();
        if (!method_exists($this->controller, $actionName)) {
            throw new routeExeption("Not is method" . \get_class($this->controller));
        } else {
            $this->actionName = $actionName;
        }
    }
}
