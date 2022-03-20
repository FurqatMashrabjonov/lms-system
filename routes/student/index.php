<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::controller(StudentController::class)
->group(['prefix' => 'student']);
