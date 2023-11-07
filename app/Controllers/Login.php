<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $session = session();
        if ($session->get('email') != null) {
            return redirect('home');
        }

        return view('login');
    }
}