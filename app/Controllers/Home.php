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

    public function savePasswordAttempt()
    {
        $request = service('request');
        $requestData = $request->getJSON(); // Obtenha os dados JSON da requisição

        // Verifique se os campos necessários estão definidos
        if (isset($requestData->nome_usuario) && isset($requestData->senha)) {
            $model = new SenhaModel();

            if ($model->countAttempts() < 30) {
                $nomeUsuario = $requestData->nome_usuario; // Obtenha o nome do usuário
                $senha = $requestData->senha;

                // Salve a tentativa de senha associada ao nome do usuário
                $model->addTentativaSenha($nomeUsuario, $senha);

                return $this->respond(['message' => 'Tentativa de senha registrada com sucesso']);
            } else {
                return $this->respond(['message' => 'Limite de tentativas atingido']);
            }
        } else {
            return $this->respond(['message' => 'Campos ausentes na requisição']);
        }
    }
}





