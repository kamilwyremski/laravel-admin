<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\StaticPageController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\StaticPage;
use App\Models\User;

Route::get('/admin', [HomeController::class, 'index'])
  ->middleware(['auth'])
  ->name('admin');

  Route::get('/admin/static-pages', [StaticPageController::class, 'list'])
  ->middleware(['auth'])
  ->name('admin_static_page_list');

Route::get('/admin/static-pages/add', [StaticPageController::class, 'create'])
  ->middleware(['auth'])
  ->name('admin_static_page_add');

Route::get('/admin/static-pages/edit/{StaticPage}', [StaticPageController::class, 'edit'])
  ->name('admin_static_page_edit');

Route::post('/admin/static-pages/add', [StaticPageController::class, 'store'])
  ->middleware(['auth']);

Route::post('/admin/static-pages/edit/{StaticPage}', [StaticPageController::class, 'store'])
  ->middleware(['auth']);

Route::delete('/admin/static-pages/remove/{StaticPage}', [StaticPageController::class, 'remove'])
  ->middleware(['auth'])
  ->name('admin_static_page_remove');

Route::get('/admin/users', [UserController::class, 'list'])
  ->middleware(['auth'])
  ->name('admin_user_list');

Route::get('/admin/users/add', [UserController::class, 'create'])
  ->middleware(['auth'])
  ->name('admin_user_add');

Route::get('/admin/users/edit/{User}', [UserController::class, 'edit'])
  ->name('admin_user_edit');

Route::post('/admin/users/add', [UserController::class, 'store'])
  ->middleware(['auth']);

Route::post('/admin/users/edit/{User}', [UserController::class, 'store'])
  ->middleware(['auth']);

Route::delete('/admin/users/remove/{User}', [UserController::class, 'remove'])
  ->middleware(['auth'])
  ->name('admin_user_remove');
