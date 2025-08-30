<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::menu');
$routes->get('/alumnos', 'AlumnoController::index');
$routes->get('/alumnos/create', 'AlumnoController::create');
$routes->post('/alumnos/store', 'AlumnoController::store');
$routes->get('/alumnos/edit/(:num)', 'AlumnoController::edit/$1');
$routes->post('/alumnos/update/(:num)', 'AlumnoController::update/$1');
$routes->get('/alumnos/delete/(:num)', 'AlumnoController::delete/$1');
$routes->post('alumnos/asignarCursos', 'AlumnoController::asignarCursos');


/**
 * Rutas para curso
 */
$routes->get('/cursos', 'CursoController::index');
$routes->get('/cursos/create', 'CursoController::create');
$routes->post('/cursos/store', 'CursoController::store');
$routes->get('/cursos/edit/(:num)', 'CursoController::edit/$1');
$routes->post('/cursos/update/(:num)', 'CursoController::update/$1');
$routes->get('/cursos/delete/(:num)', 'CursoController::delete/$1');



