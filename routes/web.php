<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserBookingController;
use App\Http\Controllers\UserController;
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
    return redirect('login');
});

Auth::routes();
//profile start
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/edit-profile', [HomeController::class, 'edit'])->name('edit.profile');
Route::post('/update-profile', [HomeController::class, 'update'])->name('update.profile');
//profile end
Route::get('/check_acccount_type', [HomeController::class, 'check_acccount_type'])->name('check_acccount_type');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['admin']], function () {
    
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/clients', [AdminController::class, 'clients'])->name('admin.clients');
    Route::get('/admin/update_status/{client_id}', [AdminController::class, 'update_status'])->name('admin.update_status');
    Route::get('/admin/pets', [AdminController::class, 'pets'])->name('admin.pets');
    Route::get('/admin/pets/create', [AdminController::class, 'pets_add'])->name('admin.pets_add');
    Route::get('/admin/remove_pet/{pet_id}', [AdminController::class, 'remove_pet'])->name('admin.remove_pet');
    Route::post('/admin/pet_create', [AdminController::class, 'pet_create'])->name('admin.pet_create');
    Route::get('/admin/sitters', [AdminController::class, 'sitters'])->name('admin.sitters');
    Route::get('/admin/sitters/create', [AdminController::class, 'create_sitters'])->name('admin.create_sitters');
    Route::post('/admin/sitters/sitter_create', [AdminController::class, 'sitter_create'])->name('admin.sitter_create');
    Route::get('/admin/schedule', [AdminController::class, 'schedule'])->name('admin.schedule');

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
    Route::post('/admin/booking_payment/{service_id}', [App\Http\Controllers\UserController::class, 'booking_payment'])->name('user.booking_payment');
    Route::resource('/user-booking', UserBookingController::class);
    Route::get('/user/home', [UserController::class, 'home'])->name('user.home');
    


    
})->middleware('verified');

Route::group(['middleware' => ['sitter']], function () {
    Route::get('/sitter/home', [App\Http\Controllers\SitterController::class, 'index'])->name('sitter.home');

    
})->middleware('verified');

