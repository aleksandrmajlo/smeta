<?php

use Illuminate\Support\Facades\Route;

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
/*
 *  получить для pdf тарифы прочее
 */
Route::get('dataPDF',[App\Http\Controllers\HomeController::class,'dataPDF']);
