<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Search extends BaseController
{
    public function index()
    {
        var_dump($this->request->getGet('s'));
    }
}
