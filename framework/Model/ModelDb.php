<?php

class DB
{
    static function connect($db)
    {
        if ($db["driver"] == "sqlite")
        {
            $driver = $db["driver"];
            $dbname = $db["dbname"];
            return new PDO("$driver:$dbname");
        }
    }
}

