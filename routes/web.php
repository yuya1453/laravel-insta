<?php

use App\Http\Controllers\Admin\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Postcontroller;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoriesController;
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


Auth::routes();


Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/suggestions', [HomeController::class, 'suggestions'])->name('suggestions');
    Route::get('/people', [HomeController::class, 'search'])->name('search');

    #POST
    Route::get('/post/create',[Postcontroller::class, 'create'])->name('post.create');
    Route::post('/post/store', [Postcontroller::class, 'store'])->name('post.store');
    Route::get('/post/{id}/show', [Postcontroller::class, 'show'])->name('post.show');
    Route::get('/post/{id}/edit', [Postcontroller::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}/update',[Postcontroller::class,'update'])->name('post.update');
    Route::delete('/post/{id}/destroy', [Postcontroller::class, 'destroy'])->name('post.destroy');


    #Comment
    Route::post('/comment/{post_id}/store',[CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comment/{post_id}/destroy',[CommentController::class, 'destroy'])->name('comment.destroy');
    
    
    #Profile
    Route::get('/profile/{id}/show',[ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit',[ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/{id}/followers', [ProfileController::class, 'followers'])->name('profile.followers');
    Route::get('profile/{id}/following', [ProfileController::class, 'following'])->name('profile.following');

    #Like
    Route::post('like/{post_id}/store', [LikeController::class, 'store'])->name('like.store');
    Route::delete('like/{post_id}/destroy', [LikeController::class, 'destroy'])->name('like.destroy');

    #follow
    Route::post('follow/{user_id}/store', [FollowController::class, 'store'])->name('follow.store');
    Route::delete('follow/{user_id}/destroy', [FollowController::class, 'destroy'])->name('follow.destroy');

    #admin
    Route::group(['prefix' =>'admin', 'as' => 'admin.', 'middleware' =>'admin'], function(){
        //Users
        Route::get('/users', [UsersController::class, 'index'])->name('users');
        Route::delete('/users/{id}/deactivate', [UsersController::class, 'deactivate'])->name('users.deactivate');
        Route::patch('/users/{id}/activate', [UsersController::class, 'activate'])->name('users.activate');
        Route::get('/people', [UsersController::class, 'search'])->name('users.search');

        //Posts
        Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
        Route::delete('/posts/{id}/hidden', [PostsController::class, 'hidden'])->name('posts.hidden');
        Route::patch('/users/{id}/visible', [PostsController::class, 'visible'])->name('posts.visible');

        //CATEGORIES
        Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
        Route::post('/categories/store', [CategoriesController::class, 'store'])->name('categories.store');
        Route::patch('/categories/{id}/update', [CategoriesController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{id}/destroy', [CategoriesController::class, 'destroy'])->name('categories.destroy');
    });
});





