<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
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
//
//Route::get('/', function () {
//    $posts = Post::all();
//    return view('home', ['posts' => $posts]);
//}) ->name('home');
// routes/web.php

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

Route::resource('post', PostController::class);

//Route::controller(PostController::class)->group(function () {
//    Route::post(uri: '/create-post', action: 'store')->name('post.store');
//    Route::get(uri: '/edit-post/{post}', action: 'show')->name('post.show');
//    Route::put(uri: '/edit-post/{post}', action: 'update')->name('post.update');
//});
