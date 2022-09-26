<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DependantDropdownController;
use App\Http\Controllers\OngkirController;
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
    return redirect()->route('homepage');
})->name('home');

Route::get('/provinces',[DependantDropdownController::class, 'provinces'])->name('provinces');
    Route::get('/cities',[DependantDropdownController::class, 'cities'])->name('cities');
    Route::get('/districts',[DependantDropdownController::class, 'districts'])->name('districts');
    Route::get('/villages',[DependantDropdownController::class, 'villages'])->name('villages');

Route::get('/homepage',[HomeController::class, 'homepage'])->name('homepage');
Route::get('/about',[HomeController::class, 'about'])->name('about');
Route::get('/contact',[HomeController::class, 'contact'])->name('contact');

Route::get('/logincustomer',[HomeController::class, 'logincustomer'])->name('logincustomer');
Route::post('/logincustomer/post',[HomeController::class, 'logincustomerpost'])->name('logincustomer.post');
Route::get('/registercustomer',[HomeController::class, 'registercustomer'])->name('registercustomer');
Route::post('/registercustomer/post',[HomeController::class, 'registercustomerpost'])->name('registercustomer.post');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/post', [AuthController::class, 'loginpost'])->name('login.post');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/post', [AuthController::class, 'registerpost'])->name('register.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkRole:customer,admin,penjual']], function(){

    Route::get('/customer/homepage',[HomeController::class, 'index'])->name('home.index');
    Route::get('/customer/about',[HomeController::class, 'aboutcustomer'])->name('home.about');
    Route::get('/customer/contact',[ContactController::class, 'contact'])->name('contact.customer');
    Route::post('/customer/contact/post',[ContactController::class, 'contactpost'])->name('contact.post');

    Route::get('/cart',[CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/update',[CartController::class, 'update'])->name('cart.update');

    Route::get('/checkout',[CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/cod',[CheckoutController::class, 'cod'])->name('checkout.cod');
    Route::post('/checkout/transfer',[CheckoutController::class, 'transfer'])->name('checkout.transfer');

    Route::get('/customer/homepage/addcart/{id}',[HomeController::class, 'addcart'])->name('home.addcart');
    Route::get('/customer/homepage/delete/{id}',[HomeController::class, 'delete'])->name('home.delete');

    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/dashboard/ongkir', [OngkirController::class, 'index'])->name('ongkir.index');
    Route::post('/dashboard/ongkir/update/{id}', [OngkirController::class, 'update'])->name('ongkir.update');

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
    Route::get('/dashboard/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/dashboard/contact/delete', [ContactController::class, 'delete'])->name('contact.delete');

    Route::get('/dashboard/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/dashboard/settings/changepassword', [SettingsController::class, 'changepassword'])->name('settings.changepassword');
    Route::post('/dashboard/settings/changeavatar', [SettingsController::class, 'changeavatar'])->name('settings.changeavatar');
    Route::post('/dashboard/settings/changeprofile', [SettingsController::class, 'changeprofile'])->name('settings.changeprofile');
});

