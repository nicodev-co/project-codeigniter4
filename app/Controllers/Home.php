<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $helpers = ['form'];

    public function index(): string
    {
        return view('auth/login');
    }

    public function dashboard()  
    {
        return view('dashboard');    
    }
}
