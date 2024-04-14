<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('register', 'AuthController::register');
$routes->post('register/create', 'AuthController::registerCreate');
$routes->post('login', 'AuthController::login');


$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('dashboard', 'Home::dashboard');
    $routes->get('logout', 'AuthController::logout');
    $routes->get('profile', 'ProfileController::index');
    $routes->put('profile/update/(:num)', 'ProfileController::update/$1');
    $routes->get('jobs', 'JobController::index');
    $routes->get('jobs/create', 'JobController::new');
    $routes->post('jobs/create', 'JobController::create');
});

