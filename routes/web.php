<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/',HomeController::class );
Route::resource('users',UserController::class );
Route::resource('modules',ModuleController::class );
