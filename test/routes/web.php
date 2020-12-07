<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('/', 'UsersController@getAllUsers');
    $router->post('/', 'UsersController@addUser');
    $router->get('{id}', 'UsersController@getUser');
    $router->put('{id}', 'UsersController@updateUser');
    $router->delete('{id}', 'UsersController@deleteUser');
});
