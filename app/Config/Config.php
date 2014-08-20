<?php

class Config
{
     public $layout = "layouts/layout";
     
     public $db = array(
         
         'sqlite' => array(
             'driver' => 'sqlite',
             'dbname' => '../app/data/test.sqlite',
         ),
         
         'mysql' => array(
             'driver' => 'mysql',
             'dbname' => 'test',
             'host' => 'localhost',
             'user' => 'root',
             'password' => 'password',
         ), 
         
         'pgsql' => array(
             'driver' => 'pgsql',
             'dbname' => '',
             'host' => '',
             'port' => 5432,
             'user' => '',
             'password' => '',
         ),
         
         'sqlsrv' => array(
             'driver' => 'sqlsrv',
             'host' => '',
             'dbname' => '',
             'user' => '',
             'password' => '',
         ),
     );
     
     public $mailer = array(
         
         'gmail' => array(
             'isSMTP' => true,
             'SMTPAuth' => true,
             'SMTPSecure' => 'ssl',
             'Host' => 'smtp.gmail.com',
             'Port' => 465,
             'Username' => 'user@gmail.com',
             'Password' => 'password',
             'From' => 'user@gmail.com',
             'FromName' => 'Administrator',
         ),
         
         'hotmail' => array(
             'isSMTP' => true,
             'SMTPAuth' => true,
             'SMTPSecure' => 'tls',
             'Host' => 'smtp.live.com',
             'Port' => 25,
             'Username' => 'user@hotmail.com',
             'Password' => 'password',
             'From' => 'user@hotmail.com',
             'FromName' => 'Administrator',
         ),
         
     );
}

