<?php

class PDO_Pagination
{
    public $connection;
    public $total;
    public $page;
    public $total_page;
    public $start_row;
    public $item;
    public $max_pages;
    public $max_rows;
    public $step;
    public $max;
    public $params = array();
    public $btn_first_page;
    public $btn_last_page;
    public $btn_next_page;
    public $btn_back_page;
    public $btn_page;
    public $btn_active;

    public function __construct($connection) 
            {
                $this->btn_first_page = 'Previous';
                $this->btn_last_page = 'Last';
                $this->btn_next_page = 'Next';
                $this->btn_back_page = 'Back';
                $this->btn_page = 'Pag.';
                $this->btn_active = 'active';
                return $this->connection = $connection;
            }

    public function rowCount($query)
            {
                $query = $this->connection->prepare($query);
                $query->execute();
                $this->total = $query->rowCount();  
            }

    public function config($max_pages, $max_rows)
            {
    
    $this->start_row = 0;
    $this->item = 0;
    $this->max_pages = $max_pages;
    $this->max_rows = $max_rows;
    $this->total_page = $this->total / $this->max_rows;

if (isset($_POST["page"]))
    {

        $this->page = $_POST["page"];

        if ($this->page < 0 || !preg_match("/^([0-9])+$/", $this->page))
            {
                return;
            }

        $this->start_row = $this->page * $this->max_rows;
        $this->item = $_POST["item"];

        if ($this->item < 0 || !preg_match("/^([0-9])+$/", $this->item))
        {
            return;
        }

        $this->max_pages = $this->max_pages + $this->max_rows;
        $this->max = $_POST["max"];

        if ($this->max < 0 || !preg_match("/^([0-9])+$/", $this->max))
        {
            return;
        }

        $this->max_pages = $this->max;
        }
        
        if(isset($_POST["next_page"]))
        {
            $this->page = $_POST["next_page"];
            if ($this->page < 0 || !preg_match("/^([0-9])+$/", $this->page))
            {
                return;
            }
        $this->start_row = $this->page * $this->max_rows;
        $this->item = $_POST["item"];
        
        if ($this->item < 0 || !preg_match("/^([0-9])+$/", $this->item))
        {
            return;
        }
        
        $this->max = $_POST["max"];
        
        if ($this->max < 0 || !preg_match("/^([0-9])+$/", $this->max))
        {
            return;
        }
        
        $this->max_pages = $this->max + 1;
        
        }
        
        if(isset($_POST["back_page"]))
        {
            
        $this->page = $_POST["back_page"] - 1;
        
        if ($this->page < 0 || !preg_match("/^([0-9])+$/", $this->page))
        {
            return;
        }
        
        $this->start_row = $this->page * $this->max_rows;
        $this->item = $_POST["item"] - 1;
        
        if ($this->item < 0 || !preg_match("/^([0-9])+$/", $this->item))
        {
            return;
        }
        
        $this->max = $_POST["max"];
        
        if ($this->max < 0 || !preg_match("/^([0-9])+$/", $this->max))
        {
            return;
        }
        
        $this->max_pages = $this->max - 1;
        
        }
        
        if (isset($_POST["previous"]))
        {
            $this->max_pages = $this->max_pages;
            $this->start_row=0;
            $this->item = 0;
        }
    }
    public function pages($class='')
    {
        
        $params = null;
        
        if (is_array($this->params))
        {
            foreach ($this->params as $key => $val)
            {
                $params .= "<input type='hidden' name='$key' value='$val'>";
            }
        }
        
        echo "<ul class='list-inline'>\n";
        if($this->item >= 1)
        {
            echo "<li>"
                    . "<form method='POST'>"
                    . "<button class='$class' type='submit'>$this->btn_first_page</button>"
                    . "<input type='hidden' name='previous' value='1'>"
                    . "$params"
                    . "</form>"
                    . "</li>";

            echo "<li>"
                    . "<form method='POST'>"
                    . "<button class='$class' type='submit'>$this->btn_back_page</button>"
                    . "<input type='hidden' name='back_page' value='$this->page'>"
                    . "<input type='hidden' name='item' value='$this->item'>"
                    . "<input type='hidden' name='max' value='$this->max_pages'>"
                    . "$params"
                    . "</form>"
                    . "</li>";
        }
        
        for($x = $this->item; $x < $this->max_pages; $x++)
        {
            while($x * $this->max_rows < $this->total)
            {
                $p = $x+1;
                $this->page == $p-1 ? $active = ' ' . $this->btn_active : $active = null;
                echo "<li>"
                        . "<form method='POST'>"
                        . "<button class='$class$active' type='submit'>$p</button>"
                        . "<input type='hidden' name='page' value='$x'>"
                        . "<input type='hidden' name='item' value='$this->item'>"
                        . "<input type='hidden' name='max' value='$this->max_pages'>"
                        . "$params"
                        . "</form>"
                        . "</li>";
                break;
            }
        }
        
        $numbers = $this->page+1;
        
        echo "<li>$this->btn_page <b>$numbers</b></li>";
        
        if ($this->max_pages * $this->max_rows < $this->total)
        {
            $this->page = $this->page+1;
            $this->item = $this->item + 1;

            echo "<li>"
                    . "<form method='POST'>"
                    . "<button class='$class' type='submit'>$this->btn_next_page</button>"
                    . "<input type='hidden' name='next_page' value='$this->page'>"
                    . "<input type='hidden' name='item' value='$this->item'>"
                    . "<input type='hidden' name='max' value='$this->max_pages'>"
                    . "$params"
                    . "</form>"
                    . "</li>";

        $this->page = round($this->total_page - 1);
        $this->item = round($this->total_page - $this->max_pages);
        $this->max = round($this->total_page);

            echo "<li>"
                    . "<form method='POST'>"
                    . "<button class='$class' type='submit'>$this->btn_last_page</button>"
                    . "<input type='hidden' name='page' value='$this->page'>"
                    . "<input type='hidden' name='item' value='$this->item'>"
                    . "<input type='hidden' name='max' value='$this->max_pages'>"
                    . "$params"
                    . "</form>"
                    . "</li>";
        }
        
        echo "</ul>\n";
}
}

