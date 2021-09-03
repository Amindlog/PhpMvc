<?php
//composer autoloader.php

use App\Controller\Blog;
use App\Controller\User;
use Core\Route;

include "../vendor/autoload.php";

// spl_autoload_register(function($className)
// {
//     $parts = explode('\\',$className);//приобразуем строку в массив
//     $path = strtolower($parts[0]); //приобразуем большие символы в мелкие
//     for ($i = 1; $i < sizeof($parts); $i++) {//проходимся по массиву и добавляем путь
//         $path .= DIRECTORY_SEPARATOR . $parts[$i];
//     }
//     $path .= ".php";//добавим расширение файла
//     require_once("..". DIRECTORY_SEPARATOR . $path); //директория выше и вставляем путь
// });

$route = new Route();
/**  @use \App\Controller\User::loginAction() */
$route->addRoute('/user/login', \App\Controller\User::class, 'login');
/** @use \App\Controller\User::registerAction() */
$route->addRoute('/user/register', \App\Controller\User::class, 'register');
/** @use \App\Controller\User::registerAction() */
$route->addRoute('/blog/index', \App\Controller\User::class, 'register');


$controller = new $route->getControllerName();
$actionName = new $route->getActionName(); 