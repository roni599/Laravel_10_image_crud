<?php

use App\Http\Controllers\ImagecrudController;
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

Route::get('/',[ImagecrudController::class,'all_image'])->name('upload.all_image');
Route::get('/add_image',[ImagecrudController::class,'upload_image'])->name('upload.add_image');
Route::post('/store-image',[ImagecrudController::class,'store_image'])->name('store.image');
Route::get('/edit-image',[ImagecrudController::class,'edit_image'])->name('edit.image');
Route::post('/update-image',[ImagecrudController::class,'update_image'])->name('update.image');
Route::post('/delete-image',[ImagecrudController::class,'delete_image'])->name('delete.image');