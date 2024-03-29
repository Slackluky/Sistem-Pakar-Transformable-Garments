<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/developers', function () {
        return Inertia::render('Developers');
    })->name('developers');

    Route::get('/knowledges', [App\Http\Controllers\KnowledgeController::class, 'index'])
    ->name('knowledges');

    Route::get('/diagnose', [App\Http\Controllers\DiagnoseController::class, 'index'])
    ->name('diagnose.index');

    Route::post('/diagnose', [App\Http\Controllers\DiagnoseController::class, 'run'])
    ->name('diagnose.run');

    Route::get('/guide', function () {
        return Inertia::render('Guides');
    })->name('guide');
});
