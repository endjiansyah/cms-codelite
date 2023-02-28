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

Route::get("/", [NewsController::class, "index"]);

Route::prefix("news")->name("news.")->controller(NewsController::class)->group(function () {
    Route::get('/', 'list')->name('index');
    Route::get("/detail/{id}", "detail")->name("detail");
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get("/edit/{id}", "edit")->name("edit");
    Route::post("/update/{id}", "update")->name("update");
    Route::get("/destroy/{id}", "destroy")->name("destroy");
});

Route::get('/admin', [UserController::class, 'index'])->name('admin');
Route::post('/changepass', [UserController::class, 'update'])->name('changepass');

// ----( auth )----
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/auth', [AuthController::class, 'login'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');