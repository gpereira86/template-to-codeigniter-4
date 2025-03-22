<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Category extends BaseController
{
    public function index(string $category)
    {
        return view('_partials/_category_'.$category);
    }
}
