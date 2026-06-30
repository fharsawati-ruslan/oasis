<?php

use Illuminate\Support\Facades\Route;
use App\Services\FonnteService;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| TEST WHATSAPP
|--------------------------------------------------------------------------
*/

Route::get('/test-wa', function () {

    $response = FonnteService::send(
        '082297408146',
        '🚀 Terimakasih sayang'
    );

    return $response->json();

});