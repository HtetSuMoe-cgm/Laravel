<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Post\PostController;

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

Route::get('/', [PostController::class, 'Home'])->name('home');

Route::group(['prefix' => 'user'], function () {
    //Route::get('/', [PostController::class, 'Home'])->name('home');
    Route::get('/login', [AuthController::class, 'viewLogin'])->name('login.show');
    Route::post('/login', [AuthController::class, 'userLogin'])->name('login.perform');
    Route::get('/register', [AuthController::class, 'viewRegister'])->name('register.show');
    Route::post('/register', [AuthController::class, 'register'])->name('register.perform');
    Route::get('/forget-password', [AuthController::class, 'showPasswordResetMailForm'])->name('user.forgotPassword.show');
    Route::post('/forget-password', [AuthController::class, 'sendEmail'])->name('user.sendEmail');
    Route::get('resetPassword/{token}', [AuthController::class, 'resetPasswordForm'])->name('user.resetPasswordForm.show');
    Route::post('resetPassword', [AuthController::class, 'resetPassword'])->name('user.resetPassword');
    Route::get('/detailPost/{post_id}', [PostController::class, 'DetailPost'])->name('detailPost');
});

//Route User
Route::middleware(['auth', 'user-role:user'])->group(function () {
    //Route::get('/user/home', [PostController::class, 'Home'])->name('home')->middleware(isAuthMiddleware::class);
});

//Route Admin
Route::middleware(['auth', 'user-role:admin'])->group(function () {
    Route::get('welcome', [UserController::class, 'Welcome'])->name('welcome');
    Route::get('/admin/user/list', [UserController::class, 'userList'])->name('userList.show');
    Route::get('/admin/user/create', [UserController::class, 'createUserForm'])->name('createUser.show');
    Route::post('/admin/user/add', [UserController::class, 'createUser'])->name('createUser.perform');
});

Route::middleware(['isAuth'])->group(function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [AuthController::class, 'logout'])->name('logout.perform');
    });
});