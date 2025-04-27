<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Register extends BaseController
{
    public function index()
    {
        return view('register');
    }

    public function store()
    {
        var_dump('teu cú é meu');
    }
}
