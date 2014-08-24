<?php

class HTACCESS
{
    static $DirectoryIndex;
    static $rules;
    static $ErrorPage;
    
    static function run()
    {
      if (in_array("mod_rewrite", apache_get_modules()))
      {
      $folder_public = "DirectoryIndex public/".HTACCESS::$DirectoryIndex."\n";
      $folder_public .= "ErrorDocument 404 ".URL::base_url()."/public/".HTACCESS::$ErrorPage."\n";
      $folder_public .= "RewriteEngine on\n";  
      $folder_public .= "RewriteCond %{REQUEST_FILENAME} !-f \n";
      $folder_public .= "RewriteCond %{REQUEST_FILENAME} !-d \n";
      $folder_public .= "RewriteRule ^(.*)$ public/$1 [L] \n";
      
      $handler = fopen("../.htaccess", "w");
      fwrite($handler, $folder_public);
      fclose($handler);
     
      $content = "DirectoryIndex ".HTACCESS::$DirectoryIndex."\n";
      $content .= "ErrorDocument 404 ".URL::base_url()."/".HTACCESS::$ErrorPage."\n";
      $content .= "RewriteEngine on\n";
      
      foreach(HTACCESS::$rules as $key => $val)
      {
          foreach(HTACCESS::$rules[$key] as $k => $v)
          {
              $content .= "RewriteRule ^$v$ index.php$k [L]\n";
          }
      }
      
      $handler = fopen(".htaccess", "w");
      fwrite($handler, $content);
      fclose($handler);
      
      }
      else
      { 
          $content = "DirectoryIndex public/".HTACCESS::$DirectoryIndex."\n";
          $content .= "ErrorDocument 404 ".URL::base_url()."/public/".HTACCESS::$ErrorPage."\n";
          $handler = fopen("../.htaccess", "w");
          fwrite($handler, $content);
          fclose($handler);
      }
    }
}

