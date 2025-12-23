<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Define API routes
$routes = [
    // Public routes
    ['method' => 'GET', 'path' => '/cities', 'controller' => CityController::class, 'action' => 'index'],
    ['method' => 'GET', 'path' => '/cities/{id}', 'controller' => CityController::class, 'action' => 'show'],
    
    // Authenticated routes
    ['method' => 'POST', 'path' => '/cities', 'controller' => CityController::class, 'action' => 'store'],
    ['method' => 'PUT', 'path' => '/cities/{id}', 'controller' => CityController::class, 'action' => 'update'],
    ['method' => 'PATCH', 'path' => '/cities/{id}', 'controller' => CityController::class, 'action' => 'update'],
    ['method' => 'DELETE', 'path' => '/cities/{id}', 'controller' => CityController::class, 'action' => 'destroy'],
    
    // Auth routes
    ['method' => 'POST', 'path' => '/login', 'controller' => AuthController::class, 'action' => 'login'],
    ['method' => 'POST', 'path' => '/register', 'controller' => AuthController::class, 'action' => 'register'],
    ['method' => 'POST', 'path' => '/logout', 'controller' => AuthController::class, 'action' => 'logout'],
];