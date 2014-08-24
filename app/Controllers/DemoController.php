<?php

class DemoController extends Controllers
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
        
        /*
        $conn = DB::connect($this->db["mysql"]);
        $sql = "SELECT * FROM test";
        $query = $conn->prepare($sql);
        $query->execute();
        $model = array();
        
        while($filas = $query->fetch())
        {
            $model[] = $filas;
        }
        
        /* MAILER 
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
        */
        
        $rules = array(
            "name" => array(
                array("required" => true, "msg" => "El campo name es requerido"),
                //array("min_length" => 3, "msg" => "El campo name no puede contener menos de 3 caracteres"),
                //array("max_length" => 50, "msg" => "El campo name no puede contener más de 50 caracteres"),
                //array("between" => "3-10", "msg" => "El campo name debe contener entre 3 y 10 caracteres"),
                //array("alphanumeric" => true, "msg" => "El campo name debe contener solo letras y número a-z 0-9"),
                //array("email" => true, "msg" => "El formato de email es incorrecto"),
                //array("regex" => "/^[0-9]+$/", "msg" => "Sólo se aceptan números"),
                ),
            
            "repeat_name" => array(
                array("equal" => "name", "msg" => "El campo no coincide"),
            ),
            
            "upload" => array(
                array("file_required" => true, "msg" => "La subida de archivos es requerida"),
                array("file_type" => "png|jpg|jpeg|gif", "msg" => "El tipo de archivo no está permitido"),
            ),
        );
        
        $msg = null;
        if (isset($_POST["name"]))
        {
        $validate = new FORM_VALIDATE();
        $validate->validate($rules);
        
        if ($validate->is_valid)
        {
            $msg = "Enhorabuena datos correctos";
        }
        else
        {
            $msg = $validate->msg;
        }
        }
        return ROUTER::show_view('demo/index', array('meta' => $meta, 'msg' => $msg));
    }
    
    public function login()
    {
        return ROUTER::show_view('demo/login');
    }
    
}

