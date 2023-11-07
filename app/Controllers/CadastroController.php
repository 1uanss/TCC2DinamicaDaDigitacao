<?php
// app/Controllers/CadastroController.php

namespace App\Controllers;

use CodeIgniter\Controller;

class CadastroController extends BaseController
{
    public function index()
    {
        // Exibir o formulário de cadastro
        return view('cadastro');
    }

    public function cadastrar()
    {
        // Processar o envio do formulário e salvar os dados no banco de dados
        $model = new \App\Models\UsuarioModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Hash da senha
            'nome' => $this->request->getPost('nome'),
        ];

        if ($model->save($data)) {
            return redirect()->to('/sucesso'); // Redirecionar para uma página de sucesso
        } else {
            return redirect()->to('/erro'); // Redirecionar para uma página de erro
        }
    }
}
