<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\ProfileController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ContactUsController;
use App\Http\Controllers\Public\LoginController;
use App\Http\Controllers\Private\DashboardController;
use App\Http\Controllers\Private\UserController;
use App\Http\Controllers\Private\SettingController;
use App\Http\Controllers\Private\PendidikanController;
use App\Http\Controllers\Private\PengalamanController;

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

// Error Handler
// Fallback route untuk menangani 404
Route::fallback(function () {
    return response()->view('pages.error.404_not_found', [], 404);
});

// Public Area
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/contact', [ContactUsController::class, 'index'])->name('contact');
Route::post('/contact', [ContactUsController::class, 'store'])->name('create_contact');
Route::get('/login', [LoginController::class, 'index'])->name('login');

// Private Area
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin_contact_response', [ContactUsController::class, 'indexPaginate'])->name('contact_response');
Route::get('/show_response/{id}', [ContactUsController::class, 'show'])->name('show_response');
Route::delete('/delete_response/{id}', [ContactUsController::class, 'destroy'])->name('delete_response');

Route::get('/admin_user', [UserController::class, 'index'])->name('admin_user');
Route::get('/edit_user/{id}', [UserController::class, 'edit'])->name('edit_user');
Route::put('/update_user/{id}', [UserController::class, 'update'])->name('update_user');

Route::get('/admin_profile', [ProfileController::class, 'indexPaginate'])->name('admin_profile');

Route::post('/create_pendidikan', [PendidikanController::class, 'store'])->name('create_pendidikan');
Route::get('/edit_pendidikan/{id}', [PendidikanController::class, 'edit'])->name('edit_pendidikan');
Route::put('/update_pendidikan/{id}', [PendidikanController::class, 'update'])->name('update_pendidikan');
Route::delete('/delete_pendidikan/{id}', [PendidikanController::class, 'destroy'])->name('delete_pendidikan');

Route::post('/create_pengalaman', [PengalamanController::class, 'store'])->name('create_pengalaman');
Route::get('/edit_pengalaman/{id}', [PengalamanController::class, 'edit'])->name('edit_pengalaman');
Route::put('/update_pengalaman/{id}', [PengalamanController::class, 'update'])->name('update_pengalaman');
Route::delete('/delete_pengalaman/{id}', [PengalamanController::class, 'destroy'])->name('delete_pengalaman');

Route::get('/admin_setting', [SettingController::class, 'index'])->name('admin_setting');

Route::post('/store_home', [SettingController::class, 'storeHome'])->name('store_home');
Route::put('/update_setting_home/{id}', [SettingController::class, 'updateHome'])->name('update_setting_home');
Route::delete('/destroy_setting_home/{id}', [SettingController::class, 'destroyHome'])->name('destroy_setting_home');

Route::post('/store_footer', [SettingController::class, 'storeFooter'])->name('store_footer');
Route::put('/update_setting_footer/{id}', [SettingController::class, 'updateFooter'])->name('update_setting_footer');
Route::delete('/destroy_setting_footer/{id}', [SettingController::class, 'destroyFooter'])->name('destroy_setting_footer');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home_login');
