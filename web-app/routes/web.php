<?php
use App\Http\Controllers\product_controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Catagery_controller;
use App\Http\Controllers\Subcategory_controller;
use App\Http\Controllers\Add_to_cart_controller;
use App\Http\Controllers\Checkout_controller;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register',[UserController::class, 'create'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/login', [UserController::class, 'index'])->name('users.login');
Route::post('/log', [UserController::class, 'authenticate'])->name('auth');


Route::group(['middleware' => ['auth', 'adminId']], function () {
 Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/products', [Product_controller::class, 'index'])->name('product.index');
Route::get('/create',[Product_controller::class, 'create'])->name('product.create');
Route::post('/product', [Product_controller::class, 'store'])->name('product.store');

Route::get('/products/{product}/edit',[Product_controller::class, 'edit'])->name('product.edit');
Route::put('/products/{product}',[Product_controller::class, 'update'])->name('product.update');
Route::delete('/products/{product}',[Product_controller::class, 'destroy'])->name('product.destroy');


Route::get('/catagery_create',[Catagery_controller::class, 'create'])->name('catagery.index');
Route::post('/catagery', [Catagery_controller::class, 'store'])->name('catagery.store');
Route::get('/catagerys/{catagery}/edit',[Catagery_controller::class, 'edit'])->name('catagery.edit');
Route::put('/catagerys/{catagery}',[Catagery_controller::class, 'update'])->name('catagery.update');
Route::delete('/catagerys/{catagery}',[Catagery_controller::class, 'destroy'])->name('catagery.destroy');


Route::get('/subcatagery_create',[Subcategory_controller::class, 'create'])->name('subcategory.index');
Route::post('/subcatagery', [Subcategory_controller::class, 'store'])->name('subcategory.store');
Route::get('/subcatagerys/{subcatagery}/edit',[Subcategory_controller::class, 'edit'])->name('subcategory.edit');
Route::put('/subcatagerys/{subcatagery}',[Subcategory_controller::class, 'update'])->name('subcategory.update');
Route::delete('/subcatagerys/{subcatagery}',[Subcategory_controller::class, 'destroy'])->name('subcategory.destroy');


});
Route::get('/landingpage',[UserController::class, 'show'])->name('landingpage');
Route::get('/show1',[Product_controller::class, 'index'])->name('product.show');
Route::get('/show2',[Catagery_controller::class, 'index'])->name('catagery.show');
Route::get('/show3',[Subcategory_controller::class, 'index'])->name('subcategory.show');


Route::get('/showproduct/{id}',[UserController::class, 'displayallproduct'])->name('productall.show');
Route::get('/products/{subcatagery}',[UserController::class, 'displayallproduct1'])->name('productallsub.show');



Route::get('/addtocart_create',[Add_to_cart_controller::class, 'create'])->name('addtocart.create');
Route::post('/addtocart', [Add_to_cart_controller::class, 'store'])->name('addtocart.store');
Route::get('/addtocarts/{addtocart}/edit',[Add_to_cart_controller::class, 'edit'])->name('addtocart.edit');
Route::put('/addtocarts/{addtocart}',[Add_to_cart_controller::class, 'update'])->name('addtocart.update');
Route::delete('/addtocarts/{addtocart}',[Add_to_cart_controller::class, 'destroy'])->name('addtocart.destroy');


Route::get('/checkout',[Add_to_cart_controller::class, 'checkout'])->name('addtocart.checkout');
Route::get('/checkout_create/{productId}',[Checkout_controller::class, 'create'])->name('checkout.create');
Route::post('/checkouts', [Checkout_controller::class, 'store'])->name('checkout.store');
Route::put('/checkout/update/{id}', [Checkout_controller::class, 'update'])->name('checkout.update');
Route::get('/payment/{id}', [Checkout_controller::class, 'shipping'])->name('checkout.shipping');
Route::get('/orderdetails', [Checkout_controller::class, 'orderdetail'])->name('checkout.orderdetail');
Route::put('/update/status/{id}', [Checkout_controller::class, 'updatestatus'])->name('checkout.updatstatus');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/userdashboard', [Checkout_controller::class, 'userdashboard'])->name('checkout.userdashboard');
});
Route::get('/search', [Product_controller::class, 'search'])->name('products.search');
Route::get('/orderdetailsuser', [Checkout_controller::class, 'orderdetailuser'])->name('checkout.orderdetailuser');
Route::get('/index', [Checkout_controller::class, 'index'])->name('checkout.index');