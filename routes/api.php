<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    require_once __DIR__ . '/v1/cat-facts.php';
    require_once __DIR__ . '/v1/dog-facts.php';

    Route::get('/', function () {
        return response()->json(['name' => config('app.name'), 'version' => 1]);
    });
});
