<?php

class FORM_VALIDATE
{
    public $is_valid = false;
    public $msg = null;
    
    public function validate($rules)
    {
        foreach($rules as $key => $val)
        {
            $field = $key;
            
            if(isset($_FILES[$key]))
            {
                $value = $_FILES[$key];
            }
            else
            {
                $value = $_REQUEST[$key];  
            }
            
            foreach($rules[$key] as $index => $condition)
            {
                foreach($condition as $k => $v)
                {
                    $this->msg = $rules[$key][$index]["msg"];
                    
                    switch($k)
                    {
                        case "required":
                            if ($v == true)
                            {
                                if (empty($value))
                                {
                                    $this->is_valid = false;
                                    return;
                                }
                                else
                                {
                                    $this->is_valid = true;
                                }
                            }
                            break;
                         
                        case "min_length":
                            if (strlen($value) < $v)
                            {
                                $this->is_valid = false;
                                return;
                            }
                            else
                            {
                                $this->is_valid = true;
                            }
                            break;
                            
                        case "max_length":
                            if (strlen($value) > $v)
                            {
                                $this->is_valid = false;
                                return;
                            }
                            else
                            {
                                $this->is_valid = true;
                            }
                            break;
                            
                        case "min":
                            if ($value < $v)
                            {
                                $this->is_valid = false;
                                return;
                            }
                            else
                            {
                                $this->is_valid = true;
                            }
                            break;
                            
                        case "max":
                            if($value > $v)
                            {
                                $this->is_valid = false;
                                return;
                            }
                            else
                            {
                                $this->is_valid = true;
                            }
                            break;
                            
                        case "between":
                            $v = explode("-", $v);
                            $min = $v[0];
                            $max = $v[1];
                            if (strlen($value) < $min || strlen($value) > $max)
                            {
                                $this->is_valid = false;
                                return;
                            }
                            else
                            {
                                $this->is_valid = true;
                            }
                            break;
                            
                        case "alpha":
                            if (!preg_match("/^[a-z]+$/i", $value))
                            {
                                $this->is_valid = false;
                                return;
                            }
                            else
                            {
                                $this->is_valid = true;
                            }
                            break;
                            
                        case "alphanumeric":
                            if (!preg_match("/^[a-z0-9]+$/i", $value))
                            {
                                $this->is_valid = false;
                                return;
                            }
                            else
                            {
                                $this->is_valid = true;
                            }
                            break;
                            
                        case "integer":
                            if (!preg_match("/^[0-9]+$/", $value))
                            {
                                $this->is_valid = false;
                                return;
                            }
                            else
                            {
                                $this->is_valid = true;
                            }
                            break;
                            
                        case "email":
                            if (!preg_match("/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/", $value))
                            {
                                $this->is_valid = false;
                                return;
                            }
                            else
                            {
                                $this->is_valid = true;
                            }
                            break;
                            
                        case "regex":
                            if (!preg_match($v, $value))
                            {
                                $this->is_valid = false;
                                return;
                            }
                            else
                            {
                                $this->is_valid = true;
                            }
                            break;
                            
                        case "equal":
                            if ($value != $_REQUEST[$v])
                            {
                                $this->is_valid = false;
                                return;
                            }
                            else
                            {
                                $this->is_valid = true;
                            }
                            break;
                            
                        case "float":
                            if (!preg_match("/^([0-9]+\.+[0-9]|[0-9])+$/", $value))
                            {
                                $this->is_valid = false;
                                return;
                            }
                            else
                            {
                                $this->is_valid = true;
                            }
                            break;
                        
                        case "file_required":
                            if ($value["size"] == 0)
                            {
                                $this->is_valid = false;
                                return;
                            }
                            else
                            {
                                $this->is_valid = true;
                            }
                            break;
                            
                        case "file_min_size":
                            if ($value["size"] < $v)
                            {
                                $this->is_valid = false;
                                return;
                            }
                            else
                            {
                                $this->is_valid = true;
                            }
                            break;
                            
                        case "file_max_size":
                            if ($value["size"] > $v)
                            {
                                $this->is_valid = false;
                                return;
                            }
                            else
                            {
                                $this->is_valid = true;
                            }
                            break;
                            
                            
                        case "file_type":
                        $types = explode("|", $v);
                        $type = $value["type"];
                        $type = explode("/", $type);
                        $ext = $type[1];
                        $is_allowed = false;
                        foreach ($types as $e)
                        {
                            if ($e == $ext)
                            {
                                $is_allowed = true;
                                break;
                            }
                        }
                        if (!$is_allowed)
                        {
                            $this->is_valid = false;
                            return;
                        }
                        else
                        {
                            $this->is_valid = true;
                        }
                        break;
                    }
                }
            }
        }
    }
}

