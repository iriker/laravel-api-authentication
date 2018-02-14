<?php

$controller = '\Pvtl\ApiAuthentication\Http\Controllers\AuthenticateController';

Route::group(['prefix' => 'api'], function () use ($controller) {
    Route::post('/login', $controller . '@authenticate');
    Route::post('/register', $controller . '@register');
});
