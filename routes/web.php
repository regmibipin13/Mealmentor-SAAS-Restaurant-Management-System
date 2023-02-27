<?php

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

Route::group(['as' => 'frontend.', 'namespace' => 'Frontend'], function () {
    Route::get('/', 'PagesController@home')->name('home');
    Route::get('/categories', 'PagesController@categories')->name('categories');
    Route::get('/cart-count', 'CartController@cartCount')->name('carts.count');
    Route::get('/table-ordering/{restaurant}', 'PagesController@pos');
    Route::get('/pos-details/{restaurant}', 'PagesController@posDetails')->name('pos.get');
    Route::post('/table-ordering/{restaurant}', 'PagesController@createPosOrder')->name('pos');
    Route::get('/table-qr/{table}', 'PagesController@tableQR')->name('tableQR');
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => 'auth'], function () {
    Route::get('/cart', 'CartController@index')->name('carts.index');
    // Route::get('/cart-count', 'CartController@cartCount')->name('carts.count');
    Route::post('/add-cart', 'CartController@addToCart')->name('carts.add');
    Route::post('/remove-cart', 'CartController@removeFromCart')->name('carts.remove');
    Route::post('/change-cart-quantity', 'CartController@changeQuantity')->name('carts.changeQuantity');
    Route::post('/order', 'CartController@order')->name('carts.order');
    Route::get('/order-success', 'CartController@success')->name('carts.success');
    Route::get('/order-failed', function () {
        return "Order Payment Failed";
    });

    // User Addresses
    Route::resource('addresses', 'AddressController');
});



// Authentication Routes...
Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
    'as' => 'password.update',
    'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
    'as' => '',
    'uses' => 'Auth\RegisterController@register'
]);

// Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::resource('online-orders', 'OnlineOrderController');
});

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['is_admin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // Permissions
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::resource('roles', 'RolesController');

    // Users
    Route::resource('users', 'UsersController');

    // Users
    Route::resource('restaurants', 'RestaurantsController');

    // Units
    Route::resource('units', 'UnitsController');

    // Item Categories
    Route::resource('item-categories', 'ItemCategoriesController');

    // Items
    Route::resource('items', 'ItemsController');

    // Online Orders
    Route::resource('online-orders', 'OnlineOrdersController');

    // Reports
    Route::get('/reports', 'ReportsController@index')->name('reports.index');

    // Tables
    Route::resource('tables', 'TablesController');


    // POS
    // Route::resource('pos', 'PosOrderController');

    // POS Orders
    Route::post('pos-orders/{posOrder}/remove-items', 'PosOrdersController@remove')->name('pos-orders.remove_item');
    Route::resource('pos-orders', 'PosOrdersController');
});

Route::group(['as' => 'restaurants.', 'prefix' => 'restaurants', 'namespace' => 'Restaurants', 'middleware' => ['is_restaurant']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Units
    Route::resource('units', 'UnitsController');

    // Item Categories
    Route::resource('item-categories', 'ItemCategoriesController');

    // Items
    Route::resource('items', 'ItemsController');

    // Online Orders
    Route::resource('online-orders', 'OnlineOrdersController');

    // Reports
    Route::get('/reports', 'ReportsController@index')->name('reports.index');

    // Tables
    Route::resource('tables', 'TablesController');


    // POS
    Route::resource('pos', 'PosOrderController');

    // POS Orders
    Route::post('pos-orders/{posOrder}/remove-items', 'PosOrdersController@remove')->name('pos-orders.remove_item');
    Route::resource('pos-orders', 'PosOrdersController');
});
