<?php

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

$app->get('/', function() {
    return response(view('index'));
});

$app->group(['prefix' => 'api'], function() use ($app) {
    $app->get('recipes', 'RecipesController@index');
    $app->get('recipes/{id}', 'RecipesController@show');
    $app->get('recipes/search/{query}', 'RecipesController@search');
    $app->post('recipes', 'RecipesController@store');
    $app->put('recipes/{id}', 'RecipesController@update');
    $app->delete('recipes/{id}', 'RecipesController@destroy');
});