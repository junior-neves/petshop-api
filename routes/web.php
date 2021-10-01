<?php

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

$router->group(['prefix' => 'pets'], function () use ($router) {
    $router->post('',       'PetController@store');
    $router->get('',        'PetController@index');
    $router->get('{id}',    'PetController@show');
    $router->put('{id}',    'PetController@update');
    $router->delete('{id}', 'PetController@destroy');
});

$router->group(['prefix' => 'employees'], function () use ($router) {
    $router->post('',       'EmployeeController@store');
    $router->get('',        'EmployeeController@index');
    $router->get('{id}',    'EmployeeController@show');
    $router->put('{id}',    'EmployeeController@update');
    $router->delete('{id}', 'EmployeeController@destroy');

    $router->post('{id}/services',             'EmployeeController@storeService');
    $router->get('{id}/services',              'EmployeeController@indexService');
    $router->delete('{id}/services/{service}', 'EmployeeController@destroyService');

    $router->get('{id}/schedule/{date}',                     'EmployeeController@showSchedule');
    $router->get('{id}/schedule/{date}/available/{service}', 'EmployeeController@showScheduleAvailable');
});

$router->group(['prefix' => 'services'], function () use ($router) {
    $router->post('',       'ServiceController@store');
    $router->get('',        'ServiceController@index');
    $router->get('{id}',    'ServiceController@show');
    $router->put('{id}',    'ServiceController@update');
    $router->delete('{id}', 'ServiceController@destroy');
});

$router->group(['schedules' => 'schedules'], function () use ($router) {
    $router->post('',       'ScheduleController@store');
    $router->get('',        'ScheduleController@index');
    $router->get('{id}',    'ScheduleController@show');
    $router->put('{id}',    'ScheduleController@update');
    $router->delete('{id}', 'ScheduleController@destroy');
});
