<?php

namespace App\Controllers;

use App\Models\SenhaModel;
use CodeIgniter\API\ResponseTrait;

class Fase2 extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return view('fase2');
    }

}