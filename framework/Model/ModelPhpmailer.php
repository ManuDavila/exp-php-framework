<?php
require "PHPMailer/class.phpmailer.php";
class MAILER extends PHPMailer
{
    public function config($config=array())
    {
        if ($config["isSMTP"])
        {
            $this->isSMTP();
            $this->SMTPAuth = $config["SMTPAuth"];
            $this->SMTPSecure = $config["SMTPSecure"];
            $this->Host = $config["Host"];
            $this->Port = $config["Port"];
            $this->Username = $config["Username"];
            $this->Password = $config["Password"];
            $this->From = $config["From"];
            $this->FromName = $config["FromName"];
        }
    }
}

