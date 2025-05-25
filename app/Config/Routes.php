<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('fornecedores', 'Fornecedores::index');
$routes->get('addfornecedores', 'AddFornecedores::index');
$routes->post('savefornecedor', 'AddFornecedores::salvar');
$routes->get('clientes', 'Clientes::index');
$routes->get('addclientes', 'AddClientes::index');
$routes->post('clientes/salvar', 'AddClientes::salvar');
$routes->get('teste', 'Teste::index');
$routes->setAutoRoute(true);
$routes->post('addclientes', 'Clientes::add');




