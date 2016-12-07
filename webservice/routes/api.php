<?php

Route::group([
    'middleware' => ['cors', 'api'],
], function () {
    Route::post('/login', 'LoginController@login');

    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        Route::get('/categories/full-list', ['uses' => 'CategoriesController@fullList']);
        Route::resource('/categories', 'CategoriesController', [
            'except' => ['create', 'edit'],
        ]);

        Route::resource('/products', 'ProductsController', [
            'except' => ['create', 'edit'],
        ]);
    });
});
