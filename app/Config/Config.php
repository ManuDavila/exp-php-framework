<?php

class Config
{
     public $layout = "layouts/layout";
     
     public $db = array(
         'sqlite' => array(
             'driver' => 'sqlite',
             'dbname' => '../app/data/test.sqlite',
         ),
     );
}

