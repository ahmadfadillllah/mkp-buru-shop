<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SettingsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('home.index');
});
    Route::get('/homepage',[HomeController::class, 'homepage'])->name('home.index');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/post', [AuthController::class, 'loginpost'])->name('login.post');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/post', [AuthController::class, 'registerpost'])->name('register.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/dashboard/kategori/produk', [KategoriProdukController::class, 'index'])->name('kategoriproduk.index');
    Route::post('/dashboard/kategori/produk/insert', [KategoriProdukController::class, 'insert'])->name('kategoriproduk.insert');
    Route::post('/dashboard/kategori/produk/update/{id}', [KategoriProdukController::class, 'update'])->name('kategoriproduk.update');

    Route::get('/dashboard/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/dashboard/produk/insert', [ProdukController::class, 'insert'])->name('produk.insert');
    Route::get('/dashboard/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::get('/dashboard/produk/delete/{id}', [ProdukController::class, 'delete'])->name('produk.delete');

    Route::get('/dashboard/akun', [AkunController::class, 'index'])->name('akun.index');
    Route::post('/dashboard/akun/update/{id}', [AkunController::class, 'update'])->name('akun.update');
    Route::post('/dashboard/akun/changepassword/{id}', [AkunController::class, 'changepassword'])->name('akun.changepassword');

    Route::get('/dashboard/chat', [ChatController::class, 'index'])->name('chat.index');

    Route::get('/dashboard/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/dashboard/settings/changepassword', [SettingsController::class, 'changepassword'])->name('settings.changepassword');
    Route::post('/dashboard/settings/changeavatar', [SettingsController::class, 'changeavatar'])->name('settings.changeavatar');
    Route::post('/dashboard/settings/changeprofile', [SettingsController::class, 'changeprofile'])->name('settings.changeprofile');
});

