<?php

$controller = '\Pivotal\ApiAuthentication\Http\AuthenticateController';

Route::group(['prefix' => 'api'], function () use ($controller) {
    Route::post('/login', $controller . '@authenticate');
});
