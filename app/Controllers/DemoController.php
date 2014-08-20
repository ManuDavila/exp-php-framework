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
        
        /* SQLITE 
        $conn = DB::connect($this->db['sqlite']);
        $sql = "SELECT * FROM test";
        $query = $conn->prepare($sql);
        $query->execute();
        $model = array();
        
        while($filas = $query->fetch())
        {
            $model[] = $filas;
        }
        */
        
        $conn = DB::connect($this->db["mysql"]);
        $sql = "SELECT * FROM test";
        $query = $conn->prepare($sql);
        $query->execute();
        $model = array();
        
        while($filas = $query->fetch())
        {
            $model[] = $filas;
        }
        
        /* MAILER */
        $mailer = new MAILER();
        $mailer->config($this->mailer["hotmail"]);
        $mailer->Subject = "Hola amigo";
        $mailer->addAddress("mdgproduccionesweb@gmail.com", "Manuel");
        $mailer->msgHTML("Hola amigo");
        
        if ($mailer->Send())
        {
            $msg = "Mensaje enviado con éxito<br>";
        }
        else
        {
            $msg = "Ha ocurrido un error al enviar el mensaje<br>";
        }
        
        return ROUTER::show_view('demo/index', array('meta' => $meta, 'model' => $model, 'msg' => $msg));
    }
    
    public function login()
    {
        return ROUTER::show_view('demo/login');
    }
    
}

