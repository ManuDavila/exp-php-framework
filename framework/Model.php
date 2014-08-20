<?php

require "Model/ModelRouter.php";
require "Model/ModelHtml.php";
require "Model/ModelDb.php";
require "Model/ModelPhpmailer.php";
require "../app/Config/Config.php";

if (isset($_GET["r"]))
{
    $route = $_GET["r"];
    
    $route = explode("/", $route);
    
    $controller = $route[0];
    $action = $route[1];
    
    $class_controller = ucfirst($controller)."Controller";
    
    require "../app/Controllers/$class_controller.php";
    
    $obj = new $class_controller;
    
    call_user_func(array($obj, $action));
}
