<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::get('/create_new_user',function(){
    $user = new \App\User();
    $user->name = 'سهیل دلشاد';
    $user->email = 'username@domain.com';
    $user->password = \Illuminate\Support\Facades\Hash::make('123456');
    $user->api_token = Str::random(60);
    $user->save();
    return redirect('/');
});
Route::middleware('auth')->group(function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/user/{user}/password/reset', 'UsersController@showPassword')->name('reset_password_form');
    Route::put('/user/{user}/password/reset', 'UsersController@resetPassword')->name('costume_reset_password');
    Route::get('/analysis/{farm}/{herd}', 'AnalysisesController@show')->name('analysisPage');
    Route::get('/analysis/{andata}', 'AnalysisesController@edit')->name('analysisEditPage');
    Route::resources([
        'city' => 'CitiesController',
        'province' => 'ProvincesController',
        'notification' => 'NotificationsController',
        'disease' => 'DiseasesController',
        'expert' => 'ExpertsController',
        'farmer' => 'FarmersController',
        'farm' => 'FarmsController',
        'vaccine' => 'VaccinesController',
        'vaccine_category' => 'VaccineCategoriesController',
        'vaccine_method' => 'VaccineMethodsController',
        'vaccine_company' => 'VaccineCompaniesController',
        'worker' => 'WorkersController',
        'herd' => 'HerdsController',
        'user' => 'UsersController',
    ]);
});

Route::auth();
