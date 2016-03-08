<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::auth();

    Route::group(['middleware' => 'auth'], function () {
        Route::get('tasks', 'TaskController@index');
        Route::post('task', 'TaskController@store');
        Route::delete('task/{task}', 'TaskController@destroy');
    });

    Route::group(['as' => 'admin::'], function () {
        Route::get('dashboard', ['as' => 'dashboard', function () {
            return 'ererere';
        }]);
    });

    Route::group(['prefix' => 'admin', 'admin' => 'admin.cook.loc'], function () {
        Route::get('user/{id?}', function ($account, $id) {
            return $id ?: 'false';
        });
    });

});
