<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');

$routes->get('/fase2','Fase2::index');

$routes->get('/fase1','Fase1::index');

$routes->get('/cadastrar/usuario', 'CadastroUsuario::index');


// rota para cadastro de usuario
$routes->post('/novo/usuario', 'CadastroUsuario::novoUsuario');


$routes->post('/autenticar', 'Login::login');

$routes->post('/fase1/enviadados','Fase1::processValues');

