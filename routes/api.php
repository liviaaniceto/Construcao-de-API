<?php

use App\Http\Controllers\SportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/meus-dados', function () {
    return response()->json([
        'nome_completo' => 'Lívia Proença Aniceto',
        'ra' => '2664'
    ]);
});

Route::apiResource('/sports', SportController::class);