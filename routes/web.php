<?php

use App\Http\Livewire\Admin\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Controllers\HelperController;
use App\Http\Livewire\Admin\Images;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('docs', function () {
    return File::get(public_path() . '/documentation.html');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::middleware(['role:admin'])->group(function () {
    Route::get('show-picture}', [HelperController::class, 'showPicture'])->name('helper.show-picture');
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('product', Product::class)->name('product');
    Route::get('images', Images::class)->name('images');
});
