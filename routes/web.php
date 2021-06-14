<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Models\StaticPage;

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

Route::get('/', [HomeController::class, 'index'])
  ->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
  ->middleware(['auth'])
  ->name('dashboard');

Route::get('/ustawienia', [SettingController::class, 'index'])
  ->middleware(['auth'])
  ->name('settings');

Route::post('/ustawienia', [SettingController::class, 'store'])
  ->middleware(['auth']);

Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/content/{StaticPage:slug}', [StaticPageController::class, 'show'])
  ->name('static_page_show');

Route::get('/blog/{id}/{slug}', [BlogController::class, 'show'])
  ->name('blog_show');

require __DIR__.'/auth.php';

require __DIR__.'/admin.php';
