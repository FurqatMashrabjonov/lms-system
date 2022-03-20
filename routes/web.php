<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
//    if (auth()->check()) {
//        return redirect('/dashboard');
//    } else {
//        return redirect('/login');
//    }
    return Inertia::render('Welcome');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/moderator/index.php';

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('about', function () {
        return Inertia::render('About');
    })->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('my-subjects', [\App\Http\Controllers\ProfileController::class, 'mySubjects'])->name('profile.my_subjects');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
