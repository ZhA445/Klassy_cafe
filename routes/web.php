<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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
Route::middleware(['auth:sanctum','verified'])->get('/dashboard',function(){
    return view('dashboard');
})->name('dashboard');

Route::get('/', [HomeController::class, 'index']);

Route::get('/redirect', [HomeController::class, 'redirect']);


Route::get('/users',[AdminController::class, 'show_users']);

Route::get('/food',[AdminController::class, 'show_foods']);

Route::get('/foods/add',[AdminController::class, 'add_food']);

Route::post('/foods/add',[AdminController::class, 'upload_food']);

Route::get('/users/delete/{id}', [AdminController::class, 'delete_user']);

Route::get('/foods/delete/{id}', [AdminController::class, 'delete_food']);

Route::get('/foods/update/{id}', [AdminController::class, 'update_food']);

Route::post('/foods/update/{id}', [AdminController::class, 'reupload_food']);

Route::get('/viewreservations', [AdminController::class, 'show_reservation']);

Route::get('/reservation/confirm/{id}', [AdminController::class, 'confirm_reservation']);

Route::get('/reservations/delete/{id}', [AdminController::class, 'delete_reservation']);

Route::get('/chef', [AdminController::class, 'show_chefs']);

Route::get('/chefs/add', [AdminController::class, 'add_chef']);

Route::post('/chefs/add', [AdminController::class, 'upload_chef']);

Route::get('/chef/delete/{id}', [AdminController::class, 'delete_chef']);

Route::get('/chef/update/{id}', [AdminController::class, 'update_chef']);

Route::post('/chefs/update/{id}', [AdminController::class, 'reupload_chef']);


// Route::get('/reservation', function(){
//     return redirect('login');
// });

Route::post('/reservation', [HomeController::class, 'reservation']);

