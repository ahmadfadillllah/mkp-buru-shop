<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriProdukController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/post', [AuthController::class, 'loginpost'])->name('login.post');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/post', [AuthController::class, 'registerpost'])->name('register.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/dashboard/kategori/produk', [KategoriProdukController::class, 'index'])->name('kategoriproduk.index');
    Route::post('/dashboard/kategori/produk/insert', [KategoriProdukController::class, 'insert'])->name('kategoriproduk.insert');

});

