<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rotas para Clientes
$routes->group('clientes', function($routes) {
    $routes->get('', 'ClienteController::index');
    $routes->get('add', 'ClienteController::addCliente');
    $routes->post('create', 'ClienteController::createCliente');
    $routes->get('edit/(:num)', 'ClienteController::getCliente/$1');
    $routes->post('update/(:num)', 'ClienteController::updateCliente/$1');
    $routes->get('delete/(:num)', 'ClienteController::deleteCliente/$1');
});

// Rotas para Fornecedores
$routes->group('fornecedores', function($routes) {
    $routes->get('', 'FornecedorController::index');
    $routes->get('add', 'FornecedorController::addFornecedor');
    $routes->post('create', 'FornecedorController::createFornecedor');
    $routes->get('edit/(:num)', 'FornecedorController::getEditfornecedor/$1');
    $routes->post('update/(:num)', 'FornecedorController::updateFornecedor/$1');
    $routes->get('delete/(:num)', 'FornecedorController::deleteFornecedor/$1');
});

// Aliases para manter compatibilidade com URLs antigas
$routes->get('addclientes', 'ClienteController::addCliente');
$routes->get('addfornecedores', 'FornecedorController::addFornecedor');
$routes->get('deletecliente/(:num)', 'ClienteController::deleteCliente/$1');
$routes->get('deletefornecedor/(:num)', 'FornecedorController::deleteFornecedor/$1');

$routes->setAutoRoute(false); // Desabilita auto-routing por segurança




