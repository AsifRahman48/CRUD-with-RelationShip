<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WinnerListController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EloquentMethodController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SslCommerzPaymentController;

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
/*Route::get('/ecommerce', function () {
    return view('ecommerce.product');
});*/

Route::get('/c', function () {
    return view('practice_css');
});

Route::get('/b', function () {
    return view('practice_bootstrap');
});

Route::get('/dashboard',[ProductController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::resource('winner-list',WinnerListController::class);
});

Route::get('/ecommerce',[ProductController::class,'product'])->name('ecommerce');
Route::get('/cart',[ProductController::class,'cart'])->name('cart');
Route::post('/add-cart/{id}',[ProductController::class,'addCart'])->name('addCart');
Route::get('/cart-show/{id}',[ProductController::class,'cart_show'])->name('cart_show');
Route::post('/',[ProductController::class,'cart_store'])->name('cart.store');
Route::post('/',[ProductController::class,'cartDelete'])->name('cartDelete');
Route::post('cart-update',[ProductController::class,'cartUpdate'])->name('cartUpdate');


Route::resource('products',ProductController::class);
Route::resource('categories',CategoryController::class);
Route::get('method',[EloquentMethodController::class,'index'])->name('method');
Route::resource('invoice',InvoiceController::class);

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->name('payment');
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


require __DIR__.'/auth.php';
