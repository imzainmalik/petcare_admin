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

Route::get('/home', function () {
    return redirect('login');
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
    Route::get('/admin/sitters', [App\Http\Controllers\AdminController::class, 'sitters'])->name('admin.sitters');
    Route::get('/admin/sitters/create', [App\Http\Controllers\AdminController::class, 'create_sitters'])->name('admin.create_sitters');
    Route::post('/admin/sitters/sitter_create', [App\Http\Controllers\AdminController::class, 'sitter_create'])->name('admin.sitter_create');
    Route::get('/admin/schedule', [App\Http\Controllers\AdminController::class, 'schedule'])->name('admin.schedule');

    Route::get('/admin/pet-types', [App\Http\Controllers\AdminController::class, 'category'])->name('admin.category');
    Route::get('/admin/pet-types/create', [App\Http\Controllers\AdminController::class, 'category_create'])->name('admin.category_create');
    Route::post('/admin/pet-types/category_store', [App\Http\Controllers\AdminController::class, 'category_store'])->name('admin.category_store');
    Route::get('/admin/pet-types/destroy/{type_id}', [App\Http\Controllers\AdminController::class, 'change_status'])->name('admin.change_status');
    Route::post('/admin/pet-types/update/{type_id}', [App\Http\Controllers\AdminController::class, 'categpry_update'])->name('admin.categpry_update');

    Route::get('/admin/services', [App\Http\Controllers\AdminController::class, 'services'])->name('admin.services');
    Route::get('/admin/services/create', [App\Http\Controllers\AdminController::class, 'create_services'])->name('admin.create_services');
    Route::post('/admin/services/store', [App\Http\Controllers\AdminController::class, 'service_store'])->name('admin.service_store');
    Route::get('/admin/services/destroy_service/{service_id}', [App\Http\Controllers\AdminController::class, 'destroy_service'])->name('admin.destroy_service');

})->middleware('verified');


Route::group(['middleware' => ['user']], function () {
   
    Route::get('/user/home', [App\Http\Controllers\UserController::class, 'index'])->name('user.home');

    
})->middleware('verified');

Route::group(['middleware' => ['sitter']], function () {
    Route::get('/sitter/home', [App\Http\Controllers\SitterController::class, 'index'])->name('sitter.home');

    
})->middleware('verified');

