<?php

namespace App\Controllers;

use App\Models\SenhaModel;
use CodeIgniter\API\ResponseTrait;

class Fase1 extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return view('fase1');
    }

    public function processValues(){

        $usuarioLegitimo = $_POST['usuarioLegitimo'];
        $usuarioImpostor = $_POST['usuarioImpostor'];

        echo "<pre>";
        var_dump($usuarioLegitimo);
        echo "</pre>";
    }

}