<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Teacher\LessonDetailController::class)
    ->middleware(['auth', 'teacher'])
    ->prefix('teacher')
    ->group(function () {
        //Teacher


        //Semesters CRUD
        Route::prefix('lesson_detail')
            ->controller(\App\Http\Controllers\Moderator\SemesterController::class)
            ->group(function () {
                Route::get('/{lesson_id}', 'index');
                Route::get('/{lesson_detail}', 'show');
                Route::post('/', 'store');
                Route::post('/{lesson_detail}/update', 'update');
                Route::delete('/{lesson_detail}', 'delete');
            });

    });
