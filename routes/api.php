<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;

// API Resource route - creates all 5 CRUD endpoints
Route::apiResource('categories', CategoryController::class);