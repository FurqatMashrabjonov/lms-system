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

        //Group Students CRUD
        Route::prefix('group_student')
            ->controller(\App\Http\Controllers\Moderator\GroupStudentController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::get('/{group_student}', 'show');
                Route::post('/', 'store');
                Route::post('/{group_student}/update', 'update');
                Route::delete('/{group_student}', 'delete');
            });

        //Lessons CRUD
        Route::prefix('lesson')
            ->controller(\App\Http\Controllers\Moderator\LessonController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::get('/{lesson}', 'show');
                Route::post('/', 'store');
                Route::post('/{lesson}/update', 'update');
                Route::delete('/{lesson}', 'delete');
            });

        //Lesson detail CRUD
        Route::prefix('lesson_detail')
            ->controller(\App\Http\Controllers\Teacher\LessonDetailController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::get('/{lesson_detail}', 'show');
                Route::post('/', 'store');
                Route::post('/{lesson_detail}/update', 'update');
                Route::delete('/{lesson_detail}', 'delete');
            });


        //Semesters CRUD
        Route::prefix('semester')
            ->controller(\App\Http\Controllers\Moderator\SemesterController::class)
            ->group(function () {
                Route::get('/{lesson_id}', 'index');
                Route::get('/{semester}', 'show');
                Route::post('/', 'store');
                Route::post('/{semester}/update', 'update');
                Route::delete('/{semester}', 'delete');
            });

    });
