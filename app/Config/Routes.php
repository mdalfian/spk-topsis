<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->group('Admin', static function ($routes) {
    $routes->get('home', 'Admin::index', ['filter' => 'adminGuard']);
    $routes->get('kriteria', 'Admin::kriteria', ['filter' => 'adminGuard']);
});