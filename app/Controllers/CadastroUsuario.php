<?php

namespace App\Controllers;

class CadastroUsuario extends BaseController
{
    public function index()
    {
        return view('cadastro');
    }

    public function novoUsuario()
    {
       $session = session();
       $cadastroUsuario = new \App\Models\UsuariosModel();
       $resultado = $cadastroUsuario->userInsert($_POST);
    //    var_dump($resultado);
       if ($resultado) {
        # code...
        $session->setFlashdata(["status" => 'okay']);
        return view('cadastro.php');
       }else{
        $session->setFlashdata(["status" => 'error']);
        return view('cadastro.php');
       }
    }
}