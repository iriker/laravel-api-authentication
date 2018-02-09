<?php

$controller = 'Pivotal\ApiAuthentication\Http\Api\Controllers\AuthenticationController';

Route::group(['prefix' => 'api'], function () use ($controller) {
    Route::post('/login', $controller . '@authenticate');
});
