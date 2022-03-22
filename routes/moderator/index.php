<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\ModeratorController::class)
    ->middleware(['auth', 'moderator'])
    ->prefix('moderator')
    ->group(function () {
        //Moderator can create Student

        //Student CRUD
        Route::prefix('student')
            ->controller(\App\Http\Controllers\Moderator\StudentController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::get('/{student}', 'show');
                Route::post('/', 'store');
                Route::post('/{student}/update', 'update');
                Route::delete('/{student}', 'delete');
            });

        //Teacher CRUD
        Route::prefix('teacher')
            ->controller(\App\Http\Controllers\Moderator\TeacherController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::get('/{teacher}', 'show');
                Route::post('/', 'store');
                Route::post('/{teacher}/update', 'update');
                Route::delete('/{teacher}', 'delete');
            });

        //Group CRUD
        Route::prefix('group')
            ->controller(\App\Http\Controllers\Moderator\GroupController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::get('/{group}', 'show');
                Route::post('/', 'store');
                Route::post('/{group}/update', 'update');
                Route::delete('/{group}', 'delete');
            });
    });
