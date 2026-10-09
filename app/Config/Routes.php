<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use App\Controllers\TaskController;
use App\Controllers\AuthController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [TaskController::class, 'index']);
$routes->get('/profile', [TaskController::class, 'profile']);
$routes->get('/about', [TaskController::class, 'about']);

// Public Auth Routes
$routes->get('login', [AuthController::class, 'login']);
$routes->post('login', [AuthController::class, 'attemptLogin']);
$routes->get('logout', [AuthController::class, 'logout']);

// Protected Task Routes (Requires Login Filter)
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/tasks', [TaskController::class, 'tasks']);
    $routes->get('tasks/new', [TaskController::class, 'create']);
    $routes->post('tasks/store', [TaskController::class, 'store']);
    $routes->get('tasks/edit/(:num)', [TaskController::class, 'edit/$1']);
    $routes->post('tasks/update/(:num)', [TaskController::class, 'update/$1']);
    $routes->get('tasks/delete/(:num)', [TaskController::class, 'delete/$1']);
});