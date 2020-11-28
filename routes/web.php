<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])
    ->name('index');

Route::middleware('auth')
->group(function () {
    // Тут проверка на авторизацию

    Route::resource('posts', PostController::class)
        ->except('index', 'show');

    Route::prefix('posts/{post}')
        ->group(function () {

            Route::resource('comments', CommentController::class)
                ->only('store');



            Route::put('favorite', [FavoriteController::class, 'toggle']);

        });

    Route::get('favorites', [FavoriteController::class, 'index'])
        ->name('user.favorites');

    Route::resource('comments', CommentController::class)
        ->only('destroy');

});

Route::resource('posts', PostController::class)
    ->only('index', 'show');


