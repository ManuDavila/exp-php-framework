<?php

class ROUTER 
{
    static function show_view($view, $model=null)
    {
        if (is_array($model))
        {
            extract($model);
        }
        
        $route = explode("/", $_GET["r"]);
        $controller = $route[0];
        $controller = ucfirst($controller)."Controller";
        $obj = new $controller;
        $layout = $obj->layout;
        $content = "../app/Views/$view.php";
        include "../app/Views/$layout.php";
    }
    
    static function create_action_url($r, $parameters=null)
    {
        $p = null;
        if (is_array($parameters))
        {
            foreach($parameters as $param => $value)
            {
                $p .= "&$param=$value";
            }
        }
        
        return URL::base_url()."/index.php?r=".$r."".$p."";
    }
    
    static function redirect_to_action($r, $parameters=null)
    {
        $p = null;
        if (is_array($parameters))
        {
            foreach($parameters as $param => $value)
            {
                $p .= "&$param=$value";
            }
        }
        
        header("location: index.php?r=".$r."".$p."");
    }
    
    static function load_view($v)
    {
        include "../app/Views/$v.php";
    }
}

