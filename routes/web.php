<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Auth;

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
    Route::get('/login', [AuthController::class, 'ViewLogin'])->name('login.show');
    Route::post('/login', [AuthController::class, 'UserLogin'])->name('login.perform');
    Route::get('/register', [AuthController::class, 'ViewRegister'])->name('register.show');
    Route::get('/forget-password', [AuthController::class, 'forgotPassword'])->name('user.forgotPassword.show');
    Route::post('/forget-password', [AuthController::class, 'sendEmail'])->name('user.sendEmail');
    Route::get('resetPassword/{token}', [AuthController::class, 'resetPasswordForm'])->name('user.resetPasswordForm.show');
    Route::post('resetPassword', [AuthController::class, 'resetPassword'])->name('user.resetPassword');
    // Route::get('/detailPost/{post_id}', [PostController::class, 'DetailPost'])->name('detailPost');
});

//Route User
Route::middleware(['auth', 'user-role:user'])->group(function () {
    //Route::get('/user/home', [PostController::class, 'Home'])->name('home')->middleware(isAuthMiddleware::class);
});

// Route::group(['middleware' => ['auth', 'user-role:user']], function () {

// });

//Route Admin
Route::middleware(['auth', 'user-role:admin'])->group(function () {
    Route::get('welcome', [UserController::class, 'Welcome'])->name('welcome');
    Route::get('/detailPost/{post_id}', [PostController::class, 'DetailPost'])->name('detailPost');
});
// Route::group(['middleware' => ['auth', 'user-role:admin']], function () {
//     Route::get('welcome', [UserController::class, 'Welcome'])->name('welcome')
//     ->middleware(isAuthMiddleware::class);
//     Route::get('/detailPost/{post_id}', [PostController::class, 'DetailPost'])->name('detailPost')
//     ->middleware(isAuthMiddleware::class);
// });

Route::middleware(['isAuth'])->group(function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [AuthController::class, 'Logout'])->name('logout.perform');
    });
});

// Route::group(['namespace' => 'App\Http\Controllers'], function()
// {   
//     /**
//      * Home Routes
//      */
//     Route::get('/', [PostController::class, 'Home'])->name('home');

//     Route::group(['middleware' => ['guest']], function() {
//         /**
//          * Register Routes
//          */
//         Route::get('/register', [AuthController::class, 'ViewRegister'])->name('register.show');

//         /**
//          * Login Routes
//          */
//         Route::get('/login', [AuthController::class, 'ViewLogin'])->name('login.show');
//         Route::post('/login', [AuthController::class, 'UserLogin'])->name('login.perform');

//     });

//     Route::group(['middleware' => ['auth', 'permission']], function() {
//         /**
//          * Logout Routes
//          */
//         Route::get('/', [AuthController::class, 'Logout'])->name('logout.perform');

//         /**
//          * User Routes
//          */
//         Route::group(['prefix' => 'users'], function() {
//             // Route::get('/', 'UsersController@index')->name('users.index');
//             // Route::get('/create', 'UsersController@create')->name('users.create');
//             // Route::post('/create', 'UsersController@store')->name('users.store');
//             // Route::get('/{user}/show', 'UsersController@show')->name('users.show');
//             // Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
//             // Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
//             // Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
//         });

//         /**
//          * User Routes
//          */
//         Route::group(['prefix' => 'posts'], function() {
//             Route::get('/', 'PostsController@index')->name('posts.index');
//             Route::get('/create', 'PostsController@create')->name('posts.create');
//             Route::post('/create', 'PostsController@store')->name('posts.store');
//             Route::get('/{post}/show', 'PostsController@show')->name('posts.show');
//             Route::get('/{post}/edit', 'PostsController@edit')->name('posts.edit');
//             Route::patch('/{post}/update', 'PostsController@update')->name('posts.update');
//             Route::delete('/{post}/delete', 'PostsController@destroy')->name('posts.destroy');
//         });

//         Route::resource('roles', RolesController::class);
//         Route::resource('permissions', PermissionsController::class);
//     });
// });