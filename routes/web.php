<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Symfony\Component\Console\Input\Input;

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
//     return view('auth.login');
// });

Route::get('/', App\Http\Livewire\Index::class)->name('index');
Route::get('/login', App\Http\Livewire\Auth\Login::class)->name('login');
Route::get('/register', App\Http\Livewire\Auth\Register::class)->name('register');
Route::get('/forgot-password', App\Http\Livewire\Auth\PasswordRequest::class)->name('password.request');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

## Orders client
    Route::group(['prefix' => '/orders'], function () {
        Route::get('/', App\Http\Livewire\Client\Orders\Index::class)->name('orders');
        Route::get('/create', App\Http\Livewire\Client\Orders\Create::class)->name('orders.create');
        Route::get('/{order}', App\Http\Livewire\Client\Orders\Show::class)->name('orders.show');
    });

    Route::get('/home', App\Http\Livewire\Home::class)->name('home');
    Route::get('/profile', App\Http\Livewire\Client\Profile\Edit::class)->name('profile.edit');
});



Route::group(['prefix' => '/admin'], function () {
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {

        // Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        //     return view('dashboard');
        // })->name('admin.dashboard');

        Route::get('/dashboard', App\Http\Livewire\Dashboard::class)->name('admin.dashboard');

        // ## Orders
        Route::group(['prefix' => '/orders'], function () {
            Route::get('/', App\Http\Livewire\Orders\Index::class)->name('admin.orders');
            Route::get('/create', App\Http\Livewire\Orders\Create::class)->name('admin.orders.create');
            Route::get('/{order}', App\Http\Livewire\Orders\Edit::class)->name('admin.orders.edit');
        });

        ## Products
        Route::group(['prefix' => '/products'], function () {
            Route::get('/', App\Http\Livewire\Products\Index::class)->name('admin.products');
            Route::get('/create', App\Http\Livewire\Products\Create::class)->name('admin.products.create');
            Route::get('/{product}', App\Http\Livewire\Products\Edit::class)->name('admin.products.edit');
        });

        ## Product ingredient
        Route::group(['prefix' => '/product-ingredients'], function () {
            Route::get('/', App\Http\Livewire\ProductIngredients\Index::class)->name('admin.product.ingredients');
            Route::get('/create', App\Http\Livewire\ProductIngredients\Create::class)->name('admin.product.ingredients.create');
            Route::get('/{product_ingredient}', App\Http\Livewire\ProductIngredients\Edit::class)->name('admin.product.ingredients.edit');
        });

        ## Products Types
        Route::group(['prefix' => '/product-categories'], function () {
            Route::get('/', App\Http\Livewire\ProductCategory\Index::class)->name('admin.product-categories');
            Route::get('/create', App\Http\Livewire\ProductCategory\Create::class)->name('admin.product-categories.create');
            Route::get('/{product_categories}', App\Http\Livewire\ProductCategory\Edit::class)->name('admin.product-categories.edit');
        });

        ## Store
        Route::group(['prefix' => '/store'], function () {
            Route::get('/create', App\Http\Livewire\Stores\Create::class)->name('admin.store.create');
            Route::get('/{id}/edit', App\Http\Livewire\Stores\Edit::class)->name('admin.store.edit');
        });

        ## Users
        Route::group(['prefix' => '/users'], function () {
            Route::get('/', App\Http\Livewire\Users\Index::class)->name('admin.users');
            Route::get('/create', App\Http\Livewire\Users\Create::class)->name('admin.users.create');
            Route::get('/{id}', App\Http\Livewire\Users\Edit::class)->name('admin.users.edit');
        });

        ## User Types
        Route::group(['prefix' => '/user-types'], function () {
            Route::get('/', App\Http\Livewire\UserTypes\Index::class)->name('admin.user-types');
            Route::get('/create', App\Http\Livewire\UserTypes\Create::class)->name('admin.user-types.create');
            Route::get('/{id}', App\Http\Livewire\UserTypes\Edit::class)->name('admin.user-types.edit');
        });

        ## Client
        Route::group(['prefix' => '/clients'], function () {
            Route::get('/', App\Http\Livewire\Clients\Index::class)->name('admin.clients');
            Route::get('/create', App\Http\Livewire\Clients\Create::class)->name('admin.clients.create');
            Route::get('/{id}', App\Http\Livewire\Clients\Edit::class)->name('admin.clients.edit');
        });

        ## Deliveries
        Route::group(['prefix' => '/deliveries'], function () {
            Route::get('/', App\Http\Livewire\Deliveries\Index::class)->name('admin.deliveries');
            Route::get('/create', App\Http\Livewire\Users\Create::class)->name('admin.deliveries.create');
            Route::get('/{order}', App\Http\Livewire\Deliveries\Edit::class)->name('admin.deliveries.edit');
        });

        ## Profile
        Route::group(['prefix' => '/profile'], function () {
            Route::get('/', App\Http\Livewire\Profile\Edit::class)->name('admin.profile.edit');
        });
    });
});


    Route::post('/logout-admin', function () {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        // return redirect('/admin/');
    })->name('admin.logout');
