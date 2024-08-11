<?php

use App\Models\Post;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;



Route::get('/', function () {
    $posts = Post::all();
    return view('home', ['posts' => $posts]);
    //
})->name('home');

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//Blog post related routes
Route::post('/create-post', [PostController::class, 'createPost'])->middleware('auth');
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'SaveChanges']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

Route::post('/comments', [CommentController::class, 'store'])->middleware('auth');

// Route for the login page
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

//Route for the register page
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

//Route for the MyPosts page
Route::get('/myposts', [AuthController::class, 'showMyPosts'])->name('myPosts');

//Route for the CreatePost page
Route::get('/createpost', [AuthController::class, 'showCreatePost'])->name('createPost');

//Route for the each post content
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
