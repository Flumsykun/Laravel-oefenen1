<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
    $posts = [];
    if (auth()->check()) {
        $posts = auth()->user()->usersCoolPosts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);


Route::resource('post', PostController::class)->only([
    'store', 'show', 'update', 'destroy'
]);

//Route::controller(PostController::class)->group(function () {
//    Route::post(uri: '/create-post', action: 'store')->name('post.store');
//    Route::get(uri: '/edit-post/{post}', action: 'show')->name('post.show');
//    Route::put(uri: '/edit-post/{post}', action: 'update')->name('post.update');
//});
