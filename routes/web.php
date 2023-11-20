<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Posts;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(StudentController::class)->group(function () {
    Route::get('/students/index', 'index');
    Route::get('/students/insert', 'insert');
    Route::get('/students/read', 'read');
    Route::get('/students/update', 'update');
    Route::get('/students/delete', 'delete');
    Route::get('/students/find/{id}', 'find');
    Route::get('/students/findwhere', 'findwhere');
    Route::get('/students/basicinsert', 'basicinsert');
    Route::get('/students/create', 'create');
    Route::get('/students/basicupdate', 'basicupdate');
    Route::get('/students/update', 'update');
    Route::get('/students/delete2', 'delete2');
    Route::get('/students/softdelete', 'softdelete');
    Route::get('/students/readsoftdelete', 'readsoftdelete');
    Route::get('/students/restore', 'restore');
    Route::get('/students/forcedelete', 'forcedelete');
});

Route::get('/user/{id}/post', function($id) {
    return User::find($id)->post->title;
});

Route::get('/post/{id}/user', [UserController::class, 'user']);

Route::get('/user/{id}/posts', [UserController::class, 'posts']);


