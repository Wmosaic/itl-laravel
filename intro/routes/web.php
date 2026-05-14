<?php

use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RecordController::class, 'serve']);
Route::get('records', [RecordController::class, 'serve']);
Route::get('create', [RecordController::class, 'create']);
Route::post('save', [RecordController::class, 'save']);
Route::get('view/{id}', [RecordController::class, 'view']);
Route::post('update/{id}', [RecordController::class, 'update']);
Route::post('delete/{record}', [RecordController::class, 'delete']);
