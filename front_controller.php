<?php
require "model/model.php";
require "controller/controller.php";
require "view/view.php";
$model=new Model();
$controller=new Controller($model);
$view=new View($model);
$controller->setValue("h1","tellnolies");
$controller->setValue("p"," ".$_GET['action']);
$view->render();