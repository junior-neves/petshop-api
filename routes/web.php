<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;
use Laravel\Lumen\Routing\Router;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/** @var Router $router */
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'owners'], function () use ($router) {
    $router->post('',       'OwnerController@store');
    $router->get('',        'OwnerController@index');
    $router->get('{id}',    'OwnerController@show');
    $router->put('{id}',    'OwnerController@update');
    $router->delete('{id}', 'OwnerController@destroy');
});

$router->group(['prefix' => 'pets'], function () use ($router) {
    $router->post('',       'PetController@store');
    $router->get('',        'PetController@index');
    $router->get('{id}',    'PetController@show');
    $router->put('{id}',    'PetController@update');
    $router->delete('{id}', 'PetController@destroy');
});

$router->get('/owners', 'OwnerController@index');
