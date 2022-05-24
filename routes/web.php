<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes(['register' => false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// получить комплектующие
Route::post('/getAcc', [App\Http\Controllers\HomeController::class, 'getAcc']);
/*
 * получить фото при изменении
 * Покрытие кровли
 * Форма кровли
 */
Route::post('/getPhotos', [App\Http\Controllers\HomeController::class, 'getPhotos']);
// получить ригель по типам getTypeRigel
Route::get('/getTypeRigel', [App\Http\Controllers\HomeController::class, 'getTypeRigel']);
// пдф
Route::get('pdf_generate', [App\Http\Controllers\PdfController::class, 'create']);
Route::post('pdf_generate', [App\Http\Controllers\PdfController::class, 'create']);
