<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WishlistController;
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

Route::get('/', [FrontController::class, 'index'])->name('front.home');
Route::get('/category', [FrontController::class, 'category'])->name('front.category');
Route::get('/category/{slug}', [FrontController::class, 'viewCategory'])->name('view.category');
Route::get('/category/{category_slug}/{product_slug}', [FrontController::class, 'productDetails'])->name('product.details');
Route::post('/add-to-cart', [CartController::class, 'CartProduct'])->name('front.cart');
Route::post('/delete-cart-item', [CartController::class, 'deleteCartItem']);
Route::post('/update-cart', [CartController::class, 'updateCart']);

Route::post('/add-to-wishlist', [WishlistController::class, 'AddToWishlist'])->name('front.wishlist');
Route::post('/remove-wishlist-item', [WishlistController::class, 'removeWishlistItem']);

Route::get('/load-cart-count', [CartController::class, 'cartCount']);

Route::get('/load-wishlist-count', [WishlistController::class, 'wishlistCount']);

Auth::routes();

//__Users Route__//
Route::middleware(['auth'])->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/cart-list', [CartController::class, 'viewCart'])->name('user.cart');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('cart.checkout');
    Route::post('/place_order', [CheckoutController::class, 'placeOrder'])->name('order.place');

    //user dashboard
    Route::get('/my_orders', [UserController::class, 'index'])->name('my_orders');
    Route::get('/order_details/{id}', [UserController::class, 'orderDetails'])->name('order.details');

    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wish_lists');
});

//__Admin Route__//
 Route::middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/categories', [CategoryController::class, 'index'])->name('category.show');
    Route::get('/create_category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/save_category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit_category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update_category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/delete_category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    Route::get('/products', [ProductController::class, 'index'])->name('product.show');
    Route::get('/create_product', [ProductController::class, 'create'])->name('product.create');
    Route::post('/save_product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/edit_product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/update_product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/delete_product/{id}', [ProductController::class, 'destroy'])->name('product.delete');

    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.list');
    Route::get('/admin/order_detail/{id}', [OrderController::class, 'orderDetails'])->name('admin.orderDetails');
    Route::put('/admin/update_order/{id}', [OrderController::class, 'updateOrder'])->name('admin.updateOrder');
    Route::get('/admin/order_history', [OrderController::class, 'orderHistory'])->name('admin.orderHistory');

    Route::get('/users_list', [DashboardController::class, 'UsersList'])->name('registered.users');
    Route::get('/user_details/{id}', [DashboardController::class, 'UsersDetails'])->name('user.details');
 });
