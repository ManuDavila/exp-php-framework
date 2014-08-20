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
        else if ($db["driver"] == "mysql")
        {
            $driver = $db["driver"];
            $dbname = $db["dbname"];
            $host = $db["host"];
            $user = $db["user"];
            $password = $db["password"];
            return new PDO("$driver:dbname=$dbname;host=$host;", $user, $password);
        }
        else if ($db["driver"] == "pgsql")
        {
            $driver = $db["driver"];
            $dbname = $db["dbname"];
            $host = $db["host"];
            $port = $db["port"];
            $user = $db["user"];
            $password = $db["password"];
            return new PDO("$driver:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
        }
        else if ($db["driver"] == "sqlsrv")
        {
            $driver = $db["driver"];
            $host = $db["host"];
            $dbname = $db["dbname"];
            $user = $db["user"];
            $password = $db["password"];
            return new PDO("$driver:Server=$host;Database=$dbname", $user, $password);
        }
    }
}

