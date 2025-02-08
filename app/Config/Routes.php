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
    $routes->post('kriteria/add', 'Kriteria::add_kriteria', ['filter' => 'adminGuard']);
    $routes->post('kriteria/edit/(:any)', 'Kriteria::edit_kriteria/$1', ['filter' => 'adminGuard']);
    $routes->get('kriteria/delete/(:any)', 'Kriteria::delete_kriteria/$1', ['filter' => 'adminGuard']);
    $routes->get('sub_kriteria', 'Admin::sub_kriteria', ['filter' => 'adminGuard']);
    $routes->post('sub_kriteria/add/(:any)', 'Kriteria::add_sub_kriteria/$1', ['filter' => 'adminGuard']);
    $routes->post('sub_kriteria/edit/(:any)', 'Kriteria::edit_sub_kriteria/$1', ['filter' => 'adminGuard']);
    $routes->get('sub_kriteria/delete/(:any)', 'Kriteria::delete_sub_kriteria/$1', ['filter' => 'adminGuard']);
    $routes->get('alternatif', 'Admin::alternatif', ['filter' => 'adminGuard']);
    $routes->post('alternatif/add', 'alternatif::add_alternatif', ['filter' => 'adminGuard']);
    $routes->post('alternatif/edit/(:any)', 'alternatif::edit_alternatif/$1', ['filter' => 'adminGuard']);
    $routes->get('alternatif/delete/(:any)', 'alternatif::delete_alternatif/$1', ['filter' => 'adminGuard']);
    $routes->get('penilaian', 'Admin::penilaian', ['filter' => 'adminGuard']);
    $routes->post('penilaian/input/(:any)', 'Penilaian::add_penilaian/$1', ['filter' => 'adminGuard']);
    $routes->post('penilaian/edit', 'Penilaian::edit_penilaian', ['filter' => 'adminGuard']);
    $routes->get('perhitungan', 'Admin::perhitungan', ['filter' => 'adminGuard']);
});
