<?php

namespace App\Models;

use CodeIgniter\Model;

class SenhaModel extends Model
{
    protected $table = 'senhas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome_usuario','senha'];

    public function addTentativaSenha($nomeUsuario, $senha)
    {
        return $this->insert([
            'nome_usuario' => $nomeUsuario,
            'senha' => $senha,
            
        ]);
    }
}
