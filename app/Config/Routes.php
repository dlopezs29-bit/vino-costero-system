<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'Auth::index');
$routes->post('auth/intentarLogin', 'Auth::intentarLogin');
$routes->get('logout', 'Auth::logout');
$routes->get('dashboard', 'Dashboard::index');

//PARCELAS
$routes->get('parcelas', 'Parcelas::index');
$routes->get('parcelas/crear', 'Parcelas::crear');
$routes->post('parcelas/guardar', 'Parcelas::guardar');
$routes->get('parcelas/editar/(:num)', 'Parcelas::editar/$1');
$routes->post('parcelas/actualizar/(:num)', 'Parcelas::actualizar/$1');
$routes->get('parcelas/eliminar/(:num)', 'Parcelas::eliminar/$1');

//CREAR USUARIOS
$routes->get('usuarios/crear', 'Usuarios::crear');
$routes->post('usuarios/guardar', 'Usuarios::guardar');

//UVAS
$routes->get('uvas', 'UvaController::index');
$routes->get('uvas/create', 'UvaController::create');
$routes->post('uvas/store', 'UvaController::store');

//ESTADO SANITARIO
$routes->get('estadoSanitario', 'EstadoSanitarioController::index');
$routes->get('estado_sanitario/create', 'EstadoSanitarioController::create');
$routes->post('estado_sanitario/store', 'EstadoSanitarioController::store');

//COSECHAS
$routes->get('cosechas', 'CosechaController::index');
$routes->get('cosechas/create', 'CosechaController::create');
$routes->post('cosechas/store', 'CosechaController::store');

//LOTES
$routes->get('lotes', 'LoteController::index');
$routes->get('lotes/create', 'LoteController::create');
$routes->post('lotes/store', 'LoteController::store');

//REPORTES
$routes->get('reportes', 'ReporteController::index');
$routes->post('reportes/generar', 'ReporteController::generar');
$routes->get('reportes/pdf/(:any)/(:any)', 'ReporteController::pdf/$1/$2');
