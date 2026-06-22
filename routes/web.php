<?php

use Digitechbranz\BlogManager\Http\Controllers\Admin\BlogController;
use Digitechbranz\BlogManager\Http\Controllers\Admin\BlogCategoryController;
use Digitechbranz\BlogManager\Http\Controllers\Admin\SeoController;
use Illuminate\Support\Facades\Route;



Route::get('/package-test', function () {
    return 'Blog Manager Package Working!';
});

Route::prefix('admin/blog')
    ->name('blog-manager.')
    ->group(function () {

        Route::resource('category', BlogCategoryController::class);
        Route::resource('posts', BlogController::class);
    });

Route::prefix('admin')->name('seo-manager.')->group(function () {
    Route::resource('seo', SeoController::class);
});
