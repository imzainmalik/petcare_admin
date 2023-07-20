<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
});

Auth::routes(['verify' => true]);
Route::get('/check_acccount_type', [App\Http\Controllers\HomeController::class, 'check_acccount_type'])->name('check_acccount_type');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['admin']], function () {
    
    Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/clients', [App\Http\Controllers\AdminController::class, 'clients'])->name('admin.clients');
    Route::get('/admin/update_status/{client_id}', [App\Http\Controllers\AdminController::class, 'update_status'])->name('admin.update_status');
    Route::get('/admin/pets', [App\Http\Controllers\AdminController::class, 'pets'])->name('admin.pets');
    Route::get('/admin/pets/create', [App\Http\Controllers\AdminController::class, 'pets_add'])->name('admin.pets_add');
    Route::get('/admin/remove_pet/{pet_id}', [App\Http\Controllers\AdminController::class, 'remove_pet'])->name('admin.remove_pet');
    Route::post('/admin/pet_create', [App\Http\Controllers\AdminController::class, 'pet_create'])->name('admin.pet_create');

})->middleware('verified');

Route::group(['middleware' => ['user']], function () {
   
    Route::get('/user/home', [App\Http\Controllers\UserController::class, 'index'])->name('user.home');

    
})->middleware('verified');

Route::group(['middleware' => ['sitter']], function () {
    Route::get('/sitter/home', [App\Http\Controllers\SitterController::class, 'index'])->name('sitter.home');

    
})->middleware('verified');
