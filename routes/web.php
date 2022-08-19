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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->get('/','ProductController@index');
$router->post('/product/add','ProductController@add');
$router->get('/product/{productId}','ProductController@show');
$router->post('/product/search','ProductController@search');
$router->put('/product/update/{id}','ProductController@update');
$router->delete('/product/delete/{id}','ProductController@delete');

$router->get('/login',['middleware' => 'auth'], function(){
    echo "auth users only!";
});