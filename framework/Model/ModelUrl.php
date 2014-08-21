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
        $request_uri = $_SERVER["REQUEST_URI"];
        $path = explode("/", $request_uri);
        array_pop($path);
        array_pop($path);
        $path = implode("/", $path);
        return $protocol."://".$server_name.$path;
    }
    
    static function redirect($url)
    {
        header("location: $url");
    }
}

