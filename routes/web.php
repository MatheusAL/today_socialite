<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Livewire\Task_Detail;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard-tasks', function () {
    return view('tasks');
})->name('dashboard-tasks');

Route::middleware(['auth:sanctum', 'verified'])->get('/{task}', [Task_Detail::class,'render'])->name('task-detail');

Route::get('social-auth/{provider}', [SocialController::class,'redirectToProvider'])
    ->name('social.auth');

Route::get('social-auth/{provider}/callback', [SocialController::class,'handleProviderCallback'])
    ->name('social-auth.callback');