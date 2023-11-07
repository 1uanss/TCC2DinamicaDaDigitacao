<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function autenticar()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Verificar as credenciais do usuário, por exemplo, consultando o banco de dados
        if ($this->verificarCredenciais($username, $password)) {
            $session = session();
            $userData = [
                'username' => $username,
                'logged_in' => true
            ];
            $session->set($userData);

            return redirect()->to(base_url('/dashboard'));
        } else {
            return view('login', ['erro' => 'Credenciais inválidas']);
        }
    }

    public function verificarCredenciais($username, $password)
    {
       
            $db = \Config\Database::connect(); // Conecta ao banco de dados
        
            // Consulta o banco de dados para verificar as credenciais
            $builder = $db->table('usuarios'); // Substitua 'usuarios' pelo nome da tabela do seu banco de dados
        
            $user = $builder->where('username', $username)->get()->getRow();
        
            // Verifique se o usuário existe e se a senha está correta
            if ($user && password_verify($password, $user->password)) {
                return true; // Credenciais válidas
            }
        
            return false; // Credenciais inválidas
        
        
    }

    public function dashboard()
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }

        return view('dashboard');
    }
}
