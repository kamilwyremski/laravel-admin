<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\StaticPageController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Models\StaticPage;
use App\Models\User;
use App\Models\Blog;

Route::group(['middleware' => 'role:admin'], function() {

  Route::get('/admin', [HomeController::class, 'index'])
    ->name('admin');
  
  Route::get('/admin/static-pages', [StaticPageController::class, 'list'])
    ->name('admin_static_page_list');

  Route::get('/admin/static-pages/add', [StaticPageController::class, 'create'])
    ->name('admin_static_page_add');

  Route::get('/admin/static-pages/edit/{StaticPage}', [StaticPageController::class, 'create'])
    ->name('admin_static_page_edit');

  Route::post('/admin/static-pages/add', [StaticPageController::class, 'store']);

  Route::post('/admin/static-pages/edit/{StaticPage}', [StaticPageController::class, 'store']);

  Route::delete('/admin/static-pages/remove/{StaticPage}', [StaticPageController::class, 'remove'])
    ->name('admin_static_page_remove');

  Route::post('/admin/static-pages/positions', [StaticPageController::class, 'positions'])
    ->name('admin_static_page_positions');

  Route::get('/admin/users', [UserController::class, 'list'])
    ->name('admin_user_list');

  Route::get('/admin/users/add', [UserController::class, 'create'])
    ->name('admin_user_add');

  Route::get('/admin/users/edit/{User}', [UserController::class, 'create'])
    ->name('admin_user_edit');

  Route::post('/admin/users/add', [UserController::class, 'store']);

  Route::post('/admin/users/edit/{User}', [UserController::class, 'store']);

  Route::delete('/admin/users/remove/{User}', [UserController::class, 'remove'])
    ->name('admin_user_remove');

  Route::get('/admin/blog', [BlogController::class, 'list'])
    ->name('admin_blog_list');

  Route::get('/admin/blog/add', [BlogController::class, 'create'])
    ->name('admin_blog_add');

  Route::get('/admin/blog/edit/{Blog}', [BlogController::class, 'create'])
    ->name('admin_blog_edit');

  Route::post('/admin/blog/add', [BlogController::class, 'store']);

  Route::post('/admin/blog/edit/{Blog}', [BlogController::class, 'store']);

  Route::delete('/admin/blog/remove/{Blog}', [BlogController::class, 'remove'])
    ->name('admin_blog_remove');

  Route::get('/admin/settings', [SettingController::class, 'index'])
  ->name('admin_settings');

  Route::post('/admin/settings', [SettingController::class, 'store']);

});