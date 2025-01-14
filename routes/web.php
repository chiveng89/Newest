<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\homeController;
use App\Http\Controllers\backend\addnewsController;
use App\Http\Controllers\backend\adsController;
use App\Http\Controllers\backend\allnewsController;
use App\Http\Controllers\backend\categoryController;
use App\Http\Controllers\backend\adminController;
use App\Http\Controllers\backend\editController;
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\backend\advertisementController;

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

// Backend
Route::get('/admin', [adminController::class, 'admin']);

Route::get('/admin/addnews', [addnewsController::class, 'addnews']);
Route::post('/admin/addnews/store', [addnewsController::class, 'store'])->name('admin.addnews.store');
Route::put('/admin/addnews/{id}', [addnewsController::class, 'update'])->name('admin.addnews.update');
Route::delete('/admin/addnews/{id}', [addnewsController::class, 'delete'])->name('admin.addnews.delete');
Route::get('admin/allnews', [addnewsController::class, 'allnews'])->name('admin.addnews.allnews');

Route::get('/admin/allnews', [allnewsController::class, 'allnews']);

Route::get('/admin/categories', [CategoryController::class, 'categories'])->name('admin.categories');
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{id}', [CategoryController::class, 'delete'])->name('admin.categories.delete');
Route::post('admin/categories/toggle-status/{id}', [CategoryController::class, 'toggleStatus'])->name('categories.toggle-status');

Route::get('/admin/advertisement', [advertisementController::class, 'advertisement'])->name('admin.advertisement');
Route::post('/admin/advertisement/store', [advertisementController::class, 'store'])->name('admin.advertisement.store');
Route::put('/admin/advertisement/{id}', [AdvertisementController::class, 'update'])->name('admin.advertisement.update');
Route::delete('/admin/advertisement/{id}', [advertisementController::class, 'destroy'])->name('admin.advertisement.delete');
Route::post('admin/advertisement/toggle-status/{id}', [advertisementController::class, 'toggleStatus'])->name('advertisement.toggle-status');

Route::get('/admin/editnews', [editController::class, 'editnews']);
Route::get('/admin/dashboard', [dashboardController::class, 'dashboard']);
Route::get('/admin/option', [dashboardController::class, 'option']);
// Frontend

Route::get('/', [HomeController::class, 'homepage']);
Route::get('/category/{name}', [HomeController::class, 'category'])->name('category.show');

// Route::get('/news', [HomeController::class, 'news'])->name('news');
// Route::get('/article-detail', [HomeController::class, 'articledetail']);
// Route::get('/media', [HomeController::class, 'media']);
// Route::get('/social', [HomeController::class, 'social']);
// Route::get('/entertainment', [HomeController::class, 'entertainment']);
// Route::get('/article', [HomeController::class, 'article']);
// Route::get('/about-us', [HomeController::class, 'aboutus']);
