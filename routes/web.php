<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\CustomFormFieldController as CFFC;
use App\Http\Controllers\ContactController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/myform',[ContactController::class,'index'])->name('myform');
Route::post('/save-contact',[ContactController::class,'StoreContact'])->name('save-contact');

Route::group(['middleware'=>'guest','prefix'=>'admin'],function(){
	Route::get('/dashboard',[Dashboard::class,'index'])->name('dashboard');
	Route::get('/addcustomformfield',[CFFC::class,'addcustomformfield'])->name('addcustomformfield');
	Route::post('/storecustomformfield',[CFFC::class,'storecustomformfield'])->name('storecustomformfield');
	Route::get('/form-field-table',[CFFC::class,'index'])->name('formfieldtable');
	Route::post('/update-field-order',[CFFC::class,'UpdateFieldOrder'])->name('update.order');
	Route::post('/status_change',[CFFC::class,'status_change'])->name('status_change');
	Route::get('/field-delete/{id}',[CFFC::class,'FieldDelete'])->name('FieldDelete');



});


