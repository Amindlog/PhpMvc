<?php
    namespace Core;

    class Route
    {
        /**@var */
        private $controllerName;
        private $actionName;
        private $processed = false;
        private $routes;


        private function process()
        {
            $pars = parse_url($_REQUEST['REQUEST_URI']);//return array $path and string /var
            $path = $pars['path'];
            if(($route = $this->routes[$path] ?? null) !== null){//так правельней
            //if (isset($this->routes[$path])) {
                $this->controllerName = $route[0];
                $this->actionName = $route[1];
            }
        switch ($pars['path']) {
                case '/user/login':
                    
                    $controller = new User();
                    $controller->loginAction();
                    
                    break;
                
                case '/user/register':

                    $controller = new User;
                    $controller->registerAction();

                    break;

                case '/Blog/index':
                    
                    $controller = new Blog;
                    $controller->indexAction();

                    break;   
                default:
                    header("HTTP/2.0 404 Not Found.");
                    break;
                }
    
    }

        public function getControllerName(): string
        {
            if (!$this->protected) {
                $this->protected;
            }
            return $this->controllerName;
        }

        public function getActionName(): string
        {
            if (!$this->protected) {
                $this->protected;
            }
            return $this->actionName. "Action";
        }
        public function addRoute($path,$controllerName, $actionName)
        {
            $this->routes[$path] = [
                $controllerName,
                $actionName
            ];
        }
    }