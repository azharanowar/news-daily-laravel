<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

use App\Http\Controllers\HomeController;

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

// Frontend routes.
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/breaking-news', [HomeController::class, 'breakingNews'])->name('news.breaking-news');

// Category routes.
Route::get('/category/{slug}', [HomeController::class, 'categoryArchive'])->name('category.index');

// Tag routes
Route::get('/tag/{slug}', [HomeController::class, 'tagArchive'])->name('tag.index');

// Backend routes.
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'
])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // News Routes
    Route::get('/dashboard/news/add-news', [NewsController::class, 'addNews'])->name('news.add-news');
    Route::post('/dashboard/news/save-news', [NewsController::class, 'saveNews'])->name('news.save-news');
    Route::get('/dashboard/news/all-news', [NewsController::class, 'allNews'])->name('news.all-news');
    Route::get('/dashboard/news/manage-news', [NewsController::class, 'manageNews'])->name('news.manage-news');
    Route::get('/dashboard/news/change-status/{id}', [NewsController::class, 'changeNewsStatus'])->name('news.change-status');
    Route::get('/dashboard/news/update/{id}', [NewsController::class, 'updateNews'])->name('news.update');
    Route::post('/dashboard/news/save-updated-news-info/{id}', [NewsController::class, 'saveUpdatedNewsInfo'])->name('news.save-updated-news-info');
    Route::post('/dashboard/news/delete/{id}', [NewsController::class, 'deleteNews'])->name('news.delete');

    // Category Routes
    Route::get('/dashboard/category/add-category', [CategoryController::class, 'addCategory'])->name('category.add-category');
    Route::post('/dashboard/category/save-category', [CategoryController::class, 'saveCategory'])->name('category.save-category');
    Route::get('/dashboard/category/all-categories', [CategoryController::class, 'allCategories'])->name('category.all-categories');
    Route::get('/dashboard/category/manage-categories', [CategoryController::class, 'manageCategories'])->name('category.manage-categories');
    Route::get('/dashboard/category/change-status/{id}', [CategoryController::class, 'changeCategoryStatus'])->name('category.change-status');
    Route::get('/dashboard/category/update/{id}', [CategoryController::class, 'updateCategory'])->name('category.update');
    Route::post('/dashboard/category/save-updated-info/{id}', [CategoryController::class, 'saveUpdatedCategoryInfo'])->name('category.save-updated-info');
    Route::post('/dashboard/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');

    // Category Routes
    Route::get('/dashboard/tags/add-tag', [TagController::class, 'addTag'])->name('tags.add-tag');
    Route::post('/dashboard/tags/save-tag', [TagController::class, 'saveTag'])->name('tags.save-tag');
    Route::get('/dashboard/tags/manage-tags', [TagController::class, 'manageTags'])->name('tags.manage-tags');
    Route::get('/dashboard/tags/all-tags', [TagController::class, 'allTags'])->name('tags.all-tags');
    Route::get('/dashboard/tags/change-status/{id}', [TagController::class, 'changeTagStatus'])->name('tags.change-status');
    Route::get('/dashboard/tags/update/{id}', [TagController::class, 'updateTag'])->name('tags.update');
    Route::post('/dashboard/tags/save-updated-info/{id}', [TagController::class, 'saveUpdatedTagInfo'])->name('tags.save-updated-info');
    Route::post('/dashboard/tags/delete/{id}', [TagController::class, 'deleteTag'])->name('tags.delete');
});
