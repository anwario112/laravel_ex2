<?php

use Illuminate\Support\Facades\Route;
use App\Models\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'verify'=>true
]);


Route::get('/profile/{user}', [App\Http\Controllers\profilesController::class, 'index'])->name('profile.show');
Route::get('/p/create', [App\Http\Controllers\PostController::class, 'create']);
Route::post('storeImage', [App\Http\Controllers\PostController::class, 'storeImage'])->name('storeImage');



Route::get('/home', [App\Http\Controllers\PostController::class, 'getAllUserPosts'])->name('home')->middleware('verified');











