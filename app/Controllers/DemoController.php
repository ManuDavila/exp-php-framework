<?php

class DemoController extends Config
{
    
    public $layout = "layouts/demolayout";
    
    public function index()
    {
        $meta = array
            (
            'title' => 'Página de inicio',
            'description' => 'Es la descripción de la página de inicio',
            'keywords' => 'php, framework, mvc',
            'robots' => 'All',
            );
        
        return ROUTER::show_view('demo/index', array('meta' => $meta));
    }
    
    public function login()
    {
        return ROUTER::show_view('demo/login');
    }
    
}

