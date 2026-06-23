<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Authorize\AuthController;
use App\Http\Controllers\market\CartController;
use App\Http\Controllers\market\CustomController;
use App\Http\Controllers\market\PageController;
use App\Http\Controllers\market\AdminController as MarketController;
use App\Http\Controllers\market\CategoryController;
use App\Http\Controllers\market\BrandController;
use App\Http\Controllers\market\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;
use App\Models\Order;
use App\Models\Custom;
use Illuminate\Support\Facades\Auth;
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
    return view('pages.index', ['title' => 'Главная']);
}) -> name('home');

Route::get('/about', function () {
    return view('pages.about', ['title' => 'О нас']);
}) -> name('about');

Route::get('/users/masters', [\App\Http\Controllers\UserController::class, 'allMasters']) -> name('masters');

Route::get('/register', function () {
    return view('pages.register', ['title' => 'Регистрация']);
}) -> name('register');

Route::get('/login', function () {
    return view('pages.login', ['title' => 'Вход']);
}) -> name('login');
Route::post('/login', AuthController::class)->name('post.login');
Route::post('/register', \App\Http\Controllers\Authorize\RegisterController::class)->name('register.post');

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('pages.profile', [
            'title' => 'Личный кабинет',
            'user' => Auth::user(),
            'orders' => Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get(),
            'marketOrders' => Custom::with('items.product')
                ->where('user_id', auth()->id())
                ->latest()
                ->get()
        ]);
    }) -> name('lk');
    Route::prefix('/market')->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('market.index');
        Route::get('/catalog/search', [ProductController::class, 'search'])
            ->name('market.catalog.search');
        Route::get('/catalog', [PageController::class, 'catalog'])->name('market.catalog');
        Route::get('/catalog/{product}', [PageController::class, 'show'])->name('market.catalog.product');
        Route::get('/brand/{slug}', [PageController::class, 'showBrand'])->name('brand.show');
        Route::get('/category/{slug}', [PageController::class, 'showCategory'])->name('category.show');

        Route::get('/allBrands', [PageController::class, 'showBrands'])->name('market.brands');
        Route::get('/allCategories', [PageController::class, 'showCategories'])->name('market.categories');

        Route::prefix('cart')->group(function () {

            Route::get('/', [CartController::class, 'index'])->name('cart.index');

            Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');

            Route::post('/update/{id}', [CartController::class, 'update'])->name('cart.update');

            Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

            Route::delete('/clear', [CartController::class, 'clear'])->name('cart.clear');

        });


        Route::post('/cart/create', [CustomController::class, 'store'])->name('cart.store');
        Route::get('/custom/{id}', [CustomController::class, 'show'])->name('custom.show');



        Route::middleware('can:admin')->group(function () {
            Route::get('/admin', [MarketController::class, 'index'])->name('market.admin');



            Route::get('/products', [ProductController::class, 'index'])->name('market.admin.products');
            Route::get('/product/{product}', [ProductController::class, 'show'])->name('market.admin.product');
            Route::get('/products/create', [ProductController::class, 'create'])->name('market.admin.products.create');
            Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('market.admin.products.edit');
            Route::post('/products', [ProductController::class, 'store'])->name('market.admin.products.store');
            Route::put('/products/{id}', [ProductController::class, 'update'])->name('market.admin.products.update');
            Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('market.admin.products.destroy');



            Route::get('/brands',[BrandController::class,'index'])->name('market.admin.brands');
            Route::get('/brand/{brand}',[BrandController::class,'show'])->name('market.admin.brand.show');
            Route::get('/brands/create',[BrandController::class,'create'])->name('market.admin.brands.create');
            Route::get('/brands/edit/{id}',[BrandController::class,'edit'])->name('market.admin.brands.edit');
            Route::post('/brands', [BrandController::class, 'store'])->name('market.admin.brands.store');
            Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('market.admin.brands.update');
            Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('market.admin.brands.destroy');



            Route::get('/categories', [CategoryController::class, 'index'])->name('market.admin.categories');
            Route::get('/category/{category}',[CategoryController::class,'show'])->name('market.admin.category.show');
            Route::get('/category/{category}/edit',[CategoryController::class,'edit'])->name('market.admin.categories.edit');
            Route::get('/categories/create',[CategoryController::class,'create'])->name('market.admin.categories.create');
            Route::post('/categories', [CategoryController::class, 'store'])->name('market.admin.categories.store');
            Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('market.admin.categories.update');
            Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('market.admin.categories.destroy');


            Route::get('/customs', [CustomController::class, 'index'])->name('custom.index');
            Route::get('/custom/edit/{custom}', [CustomController::class, 'edit'])->name('custom.edit');
            Route::put('/custom/admin/{custom}', [CustomController::class, 'update'])->name('custom.update');
            Route::put('/customs/{custom}', [CustomController::class, 'update'])
                ->name('custom.update');

            Route::delete('/admin/customs/{custom}', [CustomController::class, 'destroy'])
                ->name('custom.destroy');
        });
    });

    Route::post('/logout', \App\Http\Controllers\Authorize\LogoutController::class)->name('logout');
    Route::post('/upload', [UserController::class, 'uploadImage'])->name('upload');
    Route::post('/delete', [UserController::class, 'deleteImage'])->name('deleteImage');
    Route::post('create_request', RequestController::class)->name('create.post');

    Route::get('create', [\App\Http\Controllers\UserController::class, 'createOrder'])-> name('create');
    Route::get('/order/{uuid}', [\App\Http\Controllers\OrderController::class, 'showOrder'])-> name('show-order');


    Route::middleware('role.accept')->group(function () {
        Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'show'])-> name('orders.index');
        Route::get('/requests', [AdminController::class, 'getRequests']) -> name('requests');
        Route::post('/create_order', [OrderController::class, 'action'])->name('order.accept');
        Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
        Route::put('/order/{id}/update', [OrderController::class, 'update'])->name('order.update');
        Route::delete('/order/{id}/delete', [OrderController::class, 'destroy'])->name('order.destroy');
        Route::get('/masters', function() {
            return view('admin.masters', ['title' => 'Мастера', 'masters' => \App\Models\Master::all()]);
        })->name('admin.masters');
        Route::get('/create_master', function() {
           return view('admin.add_master', ['title' => 'Добавить мастера',
               'users' => \App\Models\User::where('role', 'пользователь')->get(),
               'masters' => \App\Models\Master::all()]);
        })->name('add.master');
        Route::post('/create_master', [UserController::class, 'createMaster'])->name('create.master');
        Route::post('/delete_master', [UserController::class, 'deleteMaster'])->name('delete.master');
        Route::get('/my_tasks', [OrderController::class, 'myTasks']) -> name('master.tasks');
    });
});
