<?php

use Illuminate\Support\Facades\Route;


Route::prefix('v1')->namespace('api\v1')->group(function () {
    Route::get('/farmHerds/{farm}', 'HerdsController@index');

    Route::middleware('auth:api')->group(function () {
        Route::get('/dashboard', 'DashboardController@index');
        Route::get('/city', 'CitiesController@index');
        Route::get('/user/{id}', 'UserController@index');

        Route::prefix('farmer')->group(function () {
            Route::get('/list', 'FarmersController@list');
        });
        Route::prefix('farm')->group(function () {
            Route::get('/list', 'FarmsController@index');
            Route::get('/{id}', 'FarmsController@show');
            Route::get('/{farm}/herd/list', 'HerdsController@index');
            Route::get('/herd/{herd}', 'HerdsController@show');
            Route::post('/newHerd', 'HerdsController@store');
        });
        Route::prefix('vaccine')->group(function () {
            Route::get('/list', 'VaccinesController@index');
            Route::get('/company', 'VaccineCompaniesController@index');
            Route::get('/method', 'VaccineMethodsController@index');
        });
        Route::prefix('analysis')->group(function () {
            Route::get('/{id}/{days}', 'AnalysisesController@getData');
            Route::get('/single/{id}/{day}', 'AnalysisesController@getRecord');

            Route::put('/saveLoss/{id}/{day}', 'AnalysisesController@saveLoss');
            Route::put('/saveTemperature/{id}/{day}', 'AnalysisesController@saveTemperature');
            Route::put('/saveHumidity/{id}/{day}', 'AnalysisesController@saveHumidity');
            Route::put('/saveLight/{id}/{day}', 'AnalysisesController@saveLight');
            Route::put('/saveWeight/{id}/{day}', 'AnalysisesController@saveWeight');
            Route::put('/saveVaccine/{id}/{day}', 'AnalysisesController@saveWeight');


        });
        Route::get('/messages/{user}', 'MessagesController@messages');
    });

    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');
});

