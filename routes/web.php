<?php
use Illuminate\Support\Facades\Route;
use OpenApi\Generator;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/documentation', function () {
    $openapi = Generator::scan([
        base_path('app/Http/Controllers'),
        base_path('app/Models')
    ]);
    return response()->json($openapi);
});

Route::get('/docs', function () {
    return view('swagger');
});
