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
        
        $conn = DB::connect($this->db['sqlite']);
        $sql = "SELECT * FROM test";
        $query = $conn->prepare($sql);
        $query->execute();
        $model = array();
        
        while($filas = $query->fetch())
        {
            $model[] = $filas;
        }
        
        return ROUTER::show_view('demo/index', array('meta' => $meta, 'model' => $model));
    }
    
    public function login()
    {
        return ROUTER::show_view('demo/login');
    }
    
}

