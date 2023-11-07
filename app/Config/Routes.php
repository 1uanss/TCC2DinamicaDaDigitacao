<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');

// $routes->get('/login', 'Login::index');

$routes->get('/fase2','Fase2::index');

$routes->get('/fase1','Fase1::index');

$routes->get('/cadastrar/usuario', 'CadastroUsuario::index');

// $routes->post('/save', 'Home::salvarValor');

// $routes->post('/autenticar', 'AuthController::login');



// rotas controle de sessão
$routes->get('/login', 'AuthController::login');
$routes->post('/autenticar', 'AuthController::autenticar');
$routes->get('/dashboard', 'AuthController::dashboard');




// cadastro 
$routes->get('cadastro', 'CadastroController::index');
$routes->post('cadastro', 'CadastroController::cadastrar');