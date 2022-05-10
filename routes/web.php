<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
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



Route::get('/purchase', function () {
    return view('product.purchase');
});

Route::get('/sale', function () {
    return view('product.sale');
});
Route::get('/daily', function () {
    return view('product.transaction');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Product Controller
Route::get('/product/alldetails/{id}', [ProductController::class, 'transaction_details'])->name('product.deails');
Route::get('/product/details/{id}', [ProductController::class, 'detailsview'])->name('product.singledeails');
Route::get('/product/day/{day}', [ProductController::class, 'searchday'])->name('product.search');

Route::get('/product/report', [InvoiceController::class, 'detailsview'])->name('product.alldeails');
Route::get('/product/report/{id}', [InvoiceController::class, 'fetchdetails'])->name('product.alldeails');
Route::get('/product/report/day/{day}', [InvoiceController::class, 'searchday'])->name('product.search');



//Category Routes
Route::get('/product', [ProductController::class, 'index' ])->name('product.home');
Route::get('/product/list/{data}', [ProductController::class, 'list'])->name('product.list');

Route::post('/product/add', [ProductController::class, 'store'])->name('product.store');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('/product/single/{data}', [ProductController::class, 'single'])->name('product.single');


//Cusotmer Routes
Route::get('/customer/list/{data}', [CustomerController::class, 'list'])->name('customer.list');
Route::get('/customer/single/{data}', [CustomerController::class, 'single'])->name('customer.single');
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::post('/customer/add', [CustomerController::class, 'store'])->name('customer.store');
Route::post('/customer/transaction', [CustomerController::class, 'transaction'])->name('customer.transaction');


Route::get('/customer/report', [CustomerController::class, 'report'])->name('customer.transaction');
//details
Route::get('/customer/details/{id}', [CustomerController::class, 'detailsview'])->name('customer.deails');
Route::get('/customer/alldetails/{id}', [CustomerController::class, 'transaction_details'])->name('customer.deails');
Route::get('/daily/data', [HomeController::class, 'daily'])->name('daily.deails');
Route::post('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
Route::get('/customer/day/{day}', [CustomerController::class, 'searchday'])->name('customer.search');




//purchase Routs
Route::post('/purchase', [InvoiceController::class, 'invoiceBuy'])->name('purchase.invoice');
Route::get('/invoice/number', [InvoiceController::class, 'leatestid'])->name('invoice.id');


//expense
Route::get('/expense', function () {
    return view('expense.index');
});
Route::post('/expense/add', [ExpenseController::class, 'store'])->name('expense.store');
Route::get('/expense/list/{data}', [ExpenseController::class, 'list'])->name('expense.list');
Route::get('/expense/amount', [ExpenseController::class, 'amount'])->name('expense.amount');

Route::post('/Expense/update/{id}', [ExpenseController::class, 'update'])->name('expense.update');
Route::post('/Expense/delete/{id}', [ExpenseController::class, 'destroy'])->name('expense.delete');

