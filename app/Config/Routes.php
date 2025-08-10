<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('maklumat-kenderaan', 'MaklumatKenderaan::index');
$routes->get('maklumat-pemandu', 'MaklumatPemandu::index');
$routes->get('jadual-kenderaan', 'JadualKenderaan::index');
$routes->get('status-perjalanan', 'StatusPerjalanan::index');
$routes->get('rekod-pemandu', 'RekodPemandu::index');
$routes->get('rekod-kenderaan', 'RekodKenderaan::index');

