<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", [NewsController::class, "index"])->name('index');

Route::prefix("news")->name("news.")->controller(NewsController::class)->group(function () {
    Route::get('/', 'list')->name('index');
    Route::get("/detail/{id}", "detail")->name("detail");
    Route::get('/create', 'create')->name('create')->middleware('notlogin');
    Route::post('/store', 'store')->name('store')->middleware('notlogin');
    Route::get("/edit/{id}", "edit")->name("edit")->middleware('notlogin');
    Route::post("/update/{id}", "update")->name("update")->middleware('notlogin');
    Route::get("/destroy/{id}", "destroy")->name("destroy")->middleware('notlogin');
});

Route::get('/admin', [UserController::class, 'index'])->name('admin')->middleware('notlogin');
Route::post('/changepass', [UserController::class, 'update'])->name('changepass')->middleware('notlogin');

// ----( auth )----

Route::get('/login', [AuthController::class, 'pagelogin'])->name('login')->middleware('islogin');
Route::post('/auth', [AuthController::class, 'login'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');