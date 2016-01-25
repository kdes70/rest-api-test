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

$app->get('/', function () use ($app) {
    return view('index');
});

$app->get('/two-test', function () use ($app) {
        return view('two_test');
});



    $app->group(['prefix' => 'api/v1','namespace' => 'App\Http\Controllers'], function($app)
    {
        $app->get('car','ApiController@index');

        $app->get('car/{id}','ApiController@getCar');

        $app->post('car','ApiController@createCar');

        $app->post('car/{id}','ApiController@updateCar');

        $app->delete('car/{id}','ApiController@deleteCar');
    });


// TODO not done
    $app->group(['prefix' => 'api/v1','namespace' => 'App\Http\Controllers'], function($app)
    {
        $app->get('make','ApiController@make');


    });

    $app->group(['prefix' => 'api/v1','namespace' => 'App\Http\Controllers'], function($app)
    {
        $app->get('model','ApiController@modelCar');

        $app->get('model/{id}','ApiController@getModelCar');

        $app->post('car','ApiController@createCar');

        $app->put('car/{id}','ApiController@updateCar');

        $app->delete('car/{id}','ApiController@deleteCar');
    });