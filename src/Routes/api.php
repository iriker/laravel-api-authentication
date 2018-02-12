<?php

$controller = '\Pivotal\ApiAuthentication\Http\Api\AuthenticateController';

Route::group(['prefix' => 'api'], function () use ($controller) {
    Route::post('/login', $controller . '@authenticate');
});
