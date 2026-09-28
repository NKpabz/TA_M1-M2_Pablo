<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\TaskController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [TaskController::class, 'index']);
$routes->get('/tasks', [TaskController::class, 'tasks']);
$routes->get('/profile', [TaskController::class, 'profile']);
$routes->get('/about', [TaskController::class, 'about']);