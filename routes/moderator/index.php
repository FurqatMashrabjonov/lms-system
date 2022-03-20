<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\ModeratorController::class)
//    ->middleware(['auth', 'moderator'])
    ->prefix('moderator')
    ->group(function () {
        //Moderator Dashboard
        //Moderator can create Student

        //Student CRUD
        Route::prefix('student')
            ->controller(\App\Http\Controllers\Moderator\StudentController::class)
            ->group(function () {
                Route::get('/', 'index')->name('moderator.student.index');
                Route::get('/create', 'create')->name('moderator.student.create');
                Route::post('/store', 'store')->name('moderator.student.store');
                Route::get('/{id}/edit', 'edit')->name('moderator.student.edit');
                Route::post('/{id}/update', 'update')->name('moderator.student.update');
                Route::get('/{id}/delete', 'delete')->name('moderator.student.delete');
            });
    });
