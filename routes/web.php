<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/content/{StaticPage:slug}', [StaticPageController::class, 'show'])
  ->name('static_page_show');

require __DIR__.'/auth.php';

require __DIR__.'/admin.php';
