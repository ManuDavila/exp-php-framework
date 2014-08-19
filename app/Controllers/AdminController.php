<?php

class AdminController extends Controllers
{
    public function admin()
    {
        return ROUTER::show_view("admin/admin");
    }
}

