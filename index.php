<?php
define('ROOT',"");
require ROOT . "core/Model.php";
require ROOT . "core/Controller.php";
require ROOT . "Dispatcher.php";
require ROOT . "Router.php";
require ROOT . "Request.php";

$router=new Router;
$router->add('',['controller'=> 'Home','action'=> 'index']);
$router->add('home/{action}',['controller' => 'Home']);
$router->add('user/view/{id:\d+}');
$dispatcher = new Dispatcher($router);
$dispatcher->dispatch();