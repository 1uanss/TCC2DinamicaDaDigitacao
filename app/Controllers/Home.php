<?php

namespace App\Controllers;

use App\Models\SenhaModel;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        
        return view('index');
    }
}





