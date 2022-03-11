<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OperationCaisseController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false, 'password.request' => false, 'reset' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/new-operation', [OperationCaisseController::class, 'new_operation']);
Route::post('/create-operation', [OperationCaisseController::class, 'create_operation']);
