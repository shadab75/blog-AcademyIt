<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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


Route::get('/',[PostController::class,'index']);








Route::middleware('guest')->group(function (){
    Route::get('/register',[RegisterController::class,'create']);
    Route::get('/login',[LoginController::class,'create'])->name('login');
    Route::post('/login',[LoginController::class,'store']);
    Route::post('/register/store',[RegisterController::class,'store']);


});


Route::middleware('auth')->group(function (){
    Route::delete('/logout',[LoginController::class,'destroy']);
    Route::get('/roles',[RoleController::class,'index']);
    Route::get('/roles/create',[RoleController::class,'create']);
    Route::post('/roles/store',[RoleController::class,'store']);
    Route::get('/roles/{role}',[RoleController::class,'edit']);
    Route::patch('/roles/{role}',[RoleController::class,'update']);
    Route::delete('/roles/{role}',[RoleController::class,'destroy']);

    Route::get('/profile',[ProfileController::class,'show']);
    Route::get('/profile/edit',[ProfileController::class,'edit']);
    Route::patch('/profile/update',[ProfileController::class,'update']);

    Route::get('/categories/create',[CategoryController::class,'create']);
    Route::get('/categories',[CategoryController::class,'index']);
    Route::post('/categories/store',[CategoryController::class,'store']);
    Route::get('/categories/{category}/edit',[CategoryController::class,'edit']);
    Route::patch('/categories/{category}',[CategoryController::class,'update']);
    Route::delete('/categories/{category}',[CategoryController::class,'destroy']);
    Route::get('/categories',[CategoryController::class,'index']);

    Route::get('/users',[UserController::class,'index']);
    Route::get('/users/{user}/edit',[UserController::class,'edit']);
    Route::patch('/users/{user}',[UserController::class,'update']);
    Route::delete('/users/{user}',[UserController::class,'Destroy']);
    Route::get('/users',[UserController::class,'index']);


    Route::post('/posts/store',[PostController::class,'store']);
    Route::get('/posts/{post}/edit',[PostController::class,'edit']);
    Route::patch('/posts/{post}',[PostController::class,'update']);
    Route::delete('/posts/{post}',[PostController::class,'destroy']);
    Route::get('/posts/create',[PostController::class,'create']);
});
Route::get('/posts/{post}',[PostController::class,'show']);
