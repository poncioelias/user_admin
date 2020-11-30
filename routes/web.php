<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => '/users'], function () use ($router){

    $router->get('/', "UserController@getAll");
    $router->get('/{id}', "UserController@get");
    $router->post('/', "UserController@store");
    $router->put('/{id}', "UserController@update");
    $router->delete('/{id}', "UserController@destroy");

});

$router->group(['prefix' => '/logs'], function () use ($router){ 
    $router->get('/{start}/{limit}', "UserLogController@getAll");
    $router->get('/{id}/{start}/{limit}', "UserLogController@get");
}); 