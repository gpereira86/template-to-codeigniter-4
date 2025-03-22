<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class HomeFetch extends BaseController
{
    public function banner()
    {
        return view('_partials/_bannerHome');
    }

    public function trending()
    {
        return view('_partials/_trending');
    }
}
