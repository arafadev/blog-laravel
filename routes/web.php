<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\FrontendController;

Auth::routes();



// Public Routes.
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [FrontendController::class, 'index']);
Route::get('tutorial/{category_slug}', [FrontendController::class, 'viewCategoryPost']);
Route::get('tutorial/{category_slug}/{category_post}', [FrontendController::class, 'viewPost']);



Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Categories Routes.
    Route::get('category', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'create']);
    Route::post('add-category', [CategoryController::class, 'store']);
    Route::get('edit-category/{category_id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{category_id}', [CategoryController::class, 'destroy']);


    // Posts Routes.
    Route::get('posts', [PostController::class, 'index']);
    Route::get('add-post', [PostController::class, 'create']);
    Route::post('add-post', [PostController::class, 'store']);
    Route::get('edit-post/{post_id}', [PostController::class, 'edit']);
    Route::put('update-post/{post_id}', [PostController::class, 'update']);
    Route::get('delete-post/{post_id}', [PostController::class, 'destroy']);

    // Users Routes.
    Route::get('users', [UserController::class, 'index']);
    Route::get('user/{user_id}', [UserController::class, 'edit']);
    Route::put('update-user/{user}', [UserController::class, 'update']);
});
