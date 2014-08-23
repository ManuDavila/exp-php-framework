<?php

class URL
{
    static function base_url()
    {
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] != "off")
        {
            $protocol = "https";
        }
        else
        {
            $protocol = "http";
        }
        $server_name = $_SERVER["SERVER_NAME"];
        $server_php_self = $_SERVER["PHP_SELF"]; //formato: /framework/public/index.php
        $path = explode("/", $server_php_self);
        //Eliminamos del array index.php
        array_pop($path);
	
        //Comprobamos si estamos utilizando urls amigables
        if (in_array("mod_rewrite", apache_get_modules()))
        {
           //Eliminamos del array public
           array_pop($path);
           $path = implode("/", $path);
        }
        else
        {
           $path = implode("/", $path);
        }
        
        return $protocol."://".$server_name.$path;
    }
    
    static function redirect($url)
    {
        header("location: $url");
    }
}

