<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BannerHome extends BaseController
{
    public function index()
    {
        return view('fetch/_bannerHome');
    }
}
