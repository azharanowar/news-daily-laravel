<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // News Routes
    Route::get('/news/add-news', [NewsController::class, 'addNews'])->name('news.add-news');
    Route::get('/news/manage-news', [NewsController::class, 'manageNews'])->name('news.manage-news');
    Route::get('/news/all-news', [NewsController::class, 'allNews'])->name('news.all-news');
    Route::post('/news/save-news', [NewsController::class, 'allNews'])->name('news.save-news');// News Routes

    // Category Routes
    Route::get('/category/add-category', [CategoryController::class, 'addCategory'])->name('category.add-category');
    Route::post('/category/save-category', [CategoryController::class, 'saveCategory'])->name('category.save-category');
    Route::get('/category/all-categories', [CategoryController::class, 'allCategories'])->name('category.all-categories');
    Route::get('/category/manage-categories', [CategoryController::class, 'manageCategories'])->name('category.manage-categories');
    Route::get('/category/change-status/{id}', [CategoryController::class, 'changeCategoryStatus'])->name('category.change-status');
    Route::get('/category/update/{id}', [CategoryController::class, 'updateCategory'])->name('category.update');
});
