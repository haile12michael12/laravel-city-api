<?php

use App\Http\Controllers\CityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Define web routes
$web_routes = [
    ['method' => 'GET', 'path' => '/', 'controller' => CityController::class, 'action' => 'index'],
    ['method' => 'GET', 'path' => '/cities', 'controller' => CityController::class, 'action' => 'index'],
    ['method' => 'GET', 'path' => '/cities/create', 'controller' => CityController::class, 'action' => 'create'],
    ['method' => 'POST', 'path' => '/cities', 'controller' => CityController::class, 'action' => 'store'],
    ['method' => 'GET', 'path' => '/cities/{id}', 'controller' => CityController::class, 'action' => 'show'],
    ['method' => 'GET', 'path' => '/cities/{id}/edit', 'controller' => CityController::class, 'action' => 'edit'],
    ['method' => 'PUT', 'path' => '/cities/{id}', 'controller' => CityController::class, 'action' => 'update'],
    ['method' => 'DELETE', 'path' => '/cities/{id}', 'controller' => CityController::class, 'action' => 'destroy'],
];