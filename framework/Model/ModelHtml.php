<?php

class HTML 
{
    static function a($href, $content, $optional=array())
    {
        $opt = null;
        foreach ($optional as $key => $val)
        {
            $opt .= " $key='$val'";
        }
        return "<a href='$href'$opt>$content</a>\n";
    }
    
    static function br($length=1)
    {
        $x=0;
        $br = null;
        while ($x < $length)
        {
            $br .= "<br>\n";
            $x++;
        }
        return $br;
    }
    
    static function open_div($attributes=array())
    {
        $att = null;
        foreach ($attributes as $key => $val)
        {
            $att .= " $key='$val'";
        }
        
        return "<div$att>\n";
    }
    
    static function close_div()
    {
        return "</div>\n";
    }
    
    static function open_form($attributes=array())
    {
        $attr = null;
        foreach ($attributes as $key => $val)
        {
            $attr .= " $key='$val'";
        }
        
        return "<form$attr>\n";
    }
    
    static function close_form()
    {
        return "</form>\n";
    }
    
    static function input($type, $name, $value=null, $attributes=array())
    {
        $attr = null;
        foreach($attributes as $key => $val)
        {
            $attr .= " $key='$val'";
        }
        
        return "<input type='$type' name='$name' value='$value'$attr>\n";
    }
    
    static function label($for, $content, $attributes=array())
    {
        $attr = null;
        foreach($attributes as $key => $val)
        {
            $attr .= " $key='$val'";
        }
        
        return "<label for='$for'$attr>$content</label>\n";
    }
    
    static function button_HTML5($type, $content, $attributes=array())
    {
        $attr = null;
        foreach($attributes as $key => $val)
        {
            $attr .= " $key='$val'";
        }
        return "<button type='$type'$attr>$content</button>\n";
    }
    
    static function radio($name, $value, $checked=false, $attributes=array())
    {
        $attr = null;
        foreach($attributes as $key => $val)
        {
            $attr .= " $key='$val'";
        }
        
        if ($checked == true)
        {
            $checked = ' checked';
        }
        else
        {
            $checked = null;
        }
        
        return "<input type='radio' name='$name' value='$value'$checked>";
    }
    
    static function checkbox($name, $value, $checked=false, $attributes=array())
    {
        $attr = null;
        foreach($attributes as $key => $val)
        {
            $attr .= " $key='$val'";
        }
        
        if ($checked == true)
        {
            $checked = ' checked';
        }
        else
        {
            $checked = null;
        }
        
        return "<input type='checkbox' name='$name' value='$value'$checked>";
    }
}

