<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Hash;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('add-product',[FormController::class, 'index']);
Route::get('add',[FormController::class, 'index']);
Route::post('list',[FormController::class,'store']);
// Route::get('retrieve',function(){
//     return view('retrieve');
// });
Route::get('retrieve',[FormController::class, 'show']);
Route::get('edit/{id}',[FormController::class, 'edit']);
Route::post('update/{id}',[FormController::class, 'update']);
Route::get('delete/{id}',[FormController::class, 'delete']);
Route::get('view/{id}',[FormController::class, 'view']);

Route::get('categories',[FormController::class, 'select']);
Route::get('register',[FormController::class, 'registration']);
Route::post('register-user',[FormController::class,'registerUser']);
Route::get('/',[FormController::class, 'login']);
Route::get('/login',[FormController::class, 'login']);
Route::post('login-user',[FormController::class,'loginUser']);
Route::get('test',[FormController::class,'test']);



// Route::get('categories', function () {
//         return view('categories');
//     });



// Route::view('index.blade.php','/index.blade.php');




