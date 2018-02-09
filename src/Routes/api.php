<?php

$controller = 'Pivotal\ApiAuthentication\Http\Api\Controllers\AuthenticationController';

Route::group(['prefix' => 'api'], function () {
    Route::post('/login', $controller . '@authenticate');
});
