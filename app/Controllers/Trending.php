<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Trending extends BaseController
{
    public function index()
    {
        return view('_partials/_trending');
    }
}
