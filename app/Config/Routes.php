<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/tambah', 'Home::tambah');
$routes->get('/hapus/(:any)', 'Home::hapus/$1');
$routes->get('/approve/(:any)', 'Home::approve/$1');
$routes->post('/ttd/(:any)', 'Home::ttd/$1');
