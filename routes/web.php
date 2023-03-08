<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ViewKeyboardController;
use App\Http\Controllers\KeyboardDetailController;
use App\Http\Controllers\AddKeyboardController;
use App\Http\Controllers\UpdateKeyboardController;
use App\Http\Controllers\ManageCategoryController;
use App\Http\Controllers\UpdateCategoryController;
use App\Http\Controllers\TransactionHistoryController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\MyCartController;

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

Route::get('/', [HomeController::class, 'home']);
Route::get('/home', [HomeController::class, 'home']);

//User
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/changePassword', [ChangePasswordController::class, 'index'])->middleware('logged');
Route::post('/changePassword', [ChangePasswordController::class, 'changePassword']);

//Keyboard
Route::get('/viewKeyboard/{id}', [ViewKeyboardController::class, 'viewKeyboard']);
Route::get('/search', [ViewKeyboardController::class, 'viewSearch']);

Route::get('/keyboardDetail/{id}', [KeyboardDetailController::class, 'viewKeyboardDetail']);
Route::get('/addKeyboard', [AddKeyboardController::class, 'index'])->middleware('manager');
Route::post('/addKeyboard', [AddKeyboardController::class, 'addKeyboard']);
Route::get('/deleteKeyboard/{id}', [ViewKeyboardController::class, 'deleteKeyboard'])->middleware('manager');
Route::get('/updateKeyboard/{id}', [UpdateKeyboardController::class, 'index'])->middleware('manager');
Route::post('/updateKeyboard/{id}', [UpdateKeyboardController::class, 'updateKeyboard']);

//Category
Route::get('/manageCategory', [ManageCategoryController::class, 'manageCategory'])->middleware('manager');
Route::get('/deleteCategory/{id}', [ManageCategoryController::class, 'deleteCategory'])->middleware('manager');
Route::get('/updateCategory/{id}', [UpdateCategoryController::class, 'index'])->middleware('manager');
Route::post('/updateCategory/{id}', [UpdateCategoryController::class, 'updateCategory'])->middleware('manager');

//Transaction
Route::get('/addTransaction/{cartId}', [MyCartController::class, 'addTransaction'])->middleware('user');
Route::get('/transactionHistory/{id}', [TransactionHistoryController::class, 'showHistory'])->middleware('user');
Route::get('/transactionDetail/{id}', [TransactionDetailController::class, 'showHistoryDetail'])->middleware('user');

//Cart
Route::get('/myCart/{id}', [MyCartController::class, 'showCart'])->middleware('user');
Route::post('/addToCart/{id}', [KeyboardDetailController::class, 'addToCart']);
Route::post('/updateCart/{id}', [MyCartController::class, 'updateCart']);