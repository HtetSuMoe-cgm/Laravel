<?php

use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserController;
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
    Route::get('/detailPost/{post_id}', [PostController::class, 'detailPost'])->name('detailPost');
    Route::get('/postList', [PostController::class, 'postList'])->name('postList.show');
    Route::get('/post/create', [PostController::class, 'createPostForm'])->name('createPost.show');
    Route::post('/post/create', [PostController::class, 'createPost'])->name('createPost.perform');
    Route::get('/post/edit/{post}', [PostController::class, 'editPostForm'])->name('editPost.show');
    Route::post('/post/edit/{post}', [PostController::class, 'editPost'])->name('editPost.perform');
    Route::delete('/post/delete/{id}', [PostController::class, 'deletePost'])->name('deletePost.perform');
    Route::get('/post/export-posts', [PostController::class, 'exportPosts'])->name('export-posts');
    Route::get('/profile/{id}', [UserController::class, 'userProfile'])->name('userProfile.show');
    Route::post('/profile/edit/{id}', [UserController::class, 'updateProfile'])->name('updateUserProfile.perform');
    Route::get('/password/change', [UserController::class, 'changePasswordForm'])->name('changePassword.show');
    Route::post('/password/change', [UserController::class, 'changePassword'])->name('changePassword.perform');
    Route::get('/post/detail/{post_id}', [PostController::class, 'postDetail'])->name('postDetail.show');
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
    Route::get('/admin/user/edit/{id}', [UserController::class, 'editUserForm'])->name('editUser.show');
    Route::post('/admin/user/edit/{id}', [UserController::class, 'editUser'])->name('editUser.perform');
    Route::delete('/admin/user/delete/{id}', [UserController::class, 'deleteUser'])->name('deleteUser.perform');
    Route::get('/admin/user/file-import', [UserController::class, 'importView'])->name('import-view');
    Route::post('/admin/user/import-users', [UserController::class, 'importUsers'])->name('import-users');
    Route::get('/admin/user/export-users', [UserController::class, 'exportUsers'])->name('export-users');
});

Route::middleware(['isAuth'])->group(function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [AuthController::class, 'logout'])->name('logout.perform');
    });
});
