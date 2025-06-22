<?php

use App\Http\Controllers\admin\AddProductController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Metadata\Uses;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManagerProductController;
use App\Http\Controllers\Admin\ProductadminController;
use App\Http\Controllers\Admin\PaymentProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\checkoutsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\CartController;
use App\Models\User;
use App\Http\Controllers\Admin\ManagerCustomerController;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/homeuser', function () {
    return view('homeuser');
})->name('homeuser');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit'); // xử lý logic phần đăng ký

Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); //login user
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.submit');

Route::get('/logout', function () {
    session()->forget(['customerName', 'customerNumber']);
    return redirect()->route('homeuser');
})->name('logout');

Route::middleware(['auth:customer'])->group(function() {
    Route::get('/checkout', [CheckoutsController::class, 'showcheckouts']);
    Route::post('/checkout', [CheckoutsController::class, 'proccesscheckouts']);
});






Route::get('/admin', function () {
    return view('admin.admin'); //admin trong folder admin
})->name('admin');

Route::get('/ManagerProduct',function () {
    return view('admin.ManagerProduct');
})->name('ManagerProduct');

Route::get('/ManagerCustomer',function(){
    return view('admin.ManagerCustomer');
})->name('ManagerCustomer');
Route::get('/PaymentProduct',function(){
    return view('admin.PaymentProduct');
})->name('PaymentProduct');

Route::get('/lietke/{type?}', [App\Http\Controllers\LietkeController::class, 'listProducts'])->name('lietke');
Route::get('/san-pham/{type}', [ProductController::class, 'listProducts'])->name('products.byType');

Route::get('/products/{productCode}', [ProductController::class, 'show'])
    ->where('productCode', '[A-Za-z0-9]+')
    ->name('products.show');    //2

Route::get('/districts', [LocationController::class, 'getDistricts']);
Route::get('/wards', [LocationController::class, 'getWards']);
    
Route::get('/checkouts',[checkoutsController::class, 'showcheckouts'])->name('checkouts');
Route::post('/checkouts',[checkoutsController::class, 'proccesscheckouts'])->name('checkouts.submit');
Route::get('/checkout', [AuthController::class, 'index'])->middleware('auth');

// viết xử lý trang admin ở đây
Route::get('/AddProduct',[AddProductController::class, 'showAddProduct'])->name('AddProduct');
Route::post('/AddProduct',[AddProductController::class, 'processAddProduct'])->name('AddProduct.submit');
Route::get('/AddProduct', function () {
    return view('admin.AddProduct'); // để trong source admin
})->name('AddProduct');

Route::get('/ManagerProduct', [ManagerProductController::class, 'showManagerProduct'])->name('ManagerProduct');
Route::resource('products', ProductadminController::class)
    ->parameters(['products' => 'productCode'])
    ->except(['edit', 'update','show']); // ưu tiên cái này hơn cái 2

Route::get('products/{productCode}/edit', [ProductadminController::class, 'edit'])->name('products.edit');
Route::put('products/{productCode}', [ProductadminController::class, 'update'])->name('products.update');

Route::get('/PaymentProduct', [PaymentProductController::class, 'index'])->name('PaymentProduct');
Route::post('/PaymentProduct/{orderNumber}/update', [PaymentProductController::class, 'updateStatus'])->name('PaymentProduct.update');

Route::get('/them',function(){
    return view('them');
})->name('them');   


Route::post('/checkout', [orderController::class, 'store'])->name('checkout');
// Thêm tạm route này vào routes/web.php để xóa giỏ hàng khi test

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');





Route::get('/ManagerCustomer', [ManagerCustomerController::class, 'index'])->name('ManagerCustomer');
Route::delete('/ManagerCustomer/{customerNumber}', [ManagerCustomerController::class, 'destroy'])->name('ManagerCustomer.destroy');