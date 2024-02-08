<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', App\Http\Controllers\HomeController::class . '@index')->name('home.index');
Route::get('/admin', App\Http\Controllers\Admin\AdminHomeController::class . '@index')->name('admin.home.index');

// Route::get('/about', function () {
//     return redirect('/posts');
// });

Route::get('/about', \App\Http\Controllers\HomeController::class . '@about')->name('home.about');

Route::get('/test', function () {
    return redirect('/test');
});

Route::get('/error/{message}', function ($message) {
    return view('error')->with('message', $message);
})->name('error');
// 
Route::get('/home/insert', App\Http\Controllers\HomeController::class . '@insert')->name('sample.insert');
Route::get('/home/select', App\Http\Controllers\HomeController::class . '@select')->name('sample.select');
Route::get('/home/update', App\Http\Controllers\HomeController::class . '@update')->name('sample.edit');

// product controller-view routing
Route::get('/products', App\Http\Controllers\ProductController::class . '@index')->name('products.index');
Route::get('/products/{id}', App\Http\Controllers\ProductController::class . '@show')->name('products.show');

// only for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', App\Http\Controllers\CartController::class . '@purchase')->name('cart.purchase');
    Route::get('/my-account/orders', App\Http\Controllers\MyAccountController::class . '@orders')->name('myaccount.orders');
    Route::get('/my-account/profile', App\Http\Controllers\MyAccountController::class . '@profile')->name('myaccount.profile');
    Route::post('/my-account/update/{id}', App\Http\Controllers\MyAccountController::class . '@update')->name('myaccount.update.profile');
    Route::post('/my-account/resetPassword/{id}', App\Http\Controllers\MyAccountController::class . '@resetPassword')->name('myaccount.reset.password');
});

Route::middleware('auth')->group(function () {
    Route::resource('/roles', App\Http\Controllers\Admin\RoleController::class);
    Route::resource('/users', App\Http\Controllers\Admin\UserController::class);
});
// Route::middleware('hasrole:superAdmin')->group(function () {
//     Route::get('/roles', App\Http\Controllers\RoleController::class . '@index')->name('roles.index');
//     Route::get('/users', App\Http\Controllers\RoleController::class . '@users')->name('users.index');
// });

Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::get('', App\Http\Controllers\Admin\AdminHomeController::class . '@index')->name('admin.home.index');
    Route::get('/products', App\Http\Controllers\Admin\AdminProductController::class . '@index')->name('admin.products.index');
    Route::get('/products/create', App\Http\Controllers\Admin\AdminProductController::class . '@create')->name('admin.products.create');
    Route::post('/products/store', App\Http\Controllers\Admin\AdminProductController::class . '@store')->name('admin.products.store');
    Route::get('/products/show/{id}', App\Http\Controllers\Admin\AdminProductController::class . '@show')->name('admin.products.show');
    Route::post('/products/{id}/delete', App\Http\Controllers\Admin\AdminProductController::class . '@delete')->name('admin.product.delete');
    Route::get('/products/{id}/edit', App\Http\Controllers\Admin\AdminProductController::class . '@edit')->name('admin.product.edit');
    Route::put('/products/{id}/update', App\Http\Controllers\Admin\AdminProductController::class . '@update')->name('admin.product.update');
    Route::get('/orders', App\Http\Controllers\OrderController::class . '@index')->name('orders.index');
    // Route::get('/users', App\Http\Controllers\RoleController::class . '@users')->name('users.index');


    // CCMS - admin opeartions from this onward
    Route::get('/person', App\Http\Controllers\PersonController::class . '@index')->name('admin.person.index');
    Route::get('/person/show/{id}', App\Http\Controllers\PersonController::class . '@show')->name('admin.person.show');
    Route::get('/person/create', App\Http\Controllers\PersonController::class . '@create')->name('admin.person.create');

    Route::get('/document_type', App\Http\Controllers\DocumetTypeController::class . '@index')->name('admin.document_type.index');
    Route::get('/document_type/show/{id}', App\Http\Controllers\DocumetTypeController::class . '@show')->name('admin.document_type.show');
    Route::get('/document_type/create', App\Http\Controllers\DocumetTypeController::class . '@create')->name('admin.document_type.create');
    Route::post('/document_type/store', App\Http\Controllers\DocumetTypeController::class . '@store')->name('admin.document_type.store');

    Route::get('/court', App\Http\Controllers\CourtController::class . '@index')->name('admin.court.index');
    Route::get('/court/show/{id}', App\Http\Controllers\CourtController::class . '@show')->name('admin.court.show');
    Route::get('/court/create', App\Http\Controllers\CourtController::class . '@create')->name('admin.court.create');
    Route::post('/court/store', App\Http\Controllers\CourtController::class . '@store')->name('admin.court.store');

    Route::get('/party', App\Http\Controllers\PartyController::class . '@index')->name('admin.party.index');
    Route::get('/party/show/{id}', App\Http\Controllers\CourtController::class . '@show')->name('admin.party.show');
    Route::get('/party/create', App\Http\Controllers\PartyController::class . '@create')->name('admin.party.create');
    Route::post('/party/store', App\Http\Controllers\PartyController::class . '@store')->name('admin.party.store');

    Route::get('/staffrole', App\Http\Controllers\StaffRoleController::class . '@index')->name('admin.staffrole.index');
    Route::get('/staffrole/show/{id}', App\Http\Controllers\StaffRoleController::class . '@show')->name('admin.staffrole.show');
    Route::get('/staffrole/create', App\Http\Controllers\StaffRoleController::class . '@create')->name('admin.staffrole.create');
    Route::post('/staffrole/store', App\Http\Controllers\StaffRoleController::class . '@store')->name('admin.staffrole.store');
    Route::get('/staffrole/{id}/edit',  App\Http\Controllers\StaffRoleController::class . '@edit')->name('admin.staffrole.edit');
    Route::post('/staffrole/{id}/delete', App\Http\Controllers\StaffRoleController::class . '@delete')->name('admin.staffrole.delete');
    Route::put('/staffrole/{id}/update', App\Http\Controllers\StaffRoleController::class . '@update')->name('admin.staffrole.update');

});

Route::get('/post', App\Http\Controllers\PostsController::class . '@index')->name('post.list');
Route::get('/post/insert', App\Http\Controllers\PostsController::class . '@insert')->name('post.insert');
Route::get('/post/insert_with_image', App\Http\Controllers\PostsController::class . '@insertPostWithPostImage')->name('post.insert_with_image');
Route::get('/post/select', App\Http\Controllers\PostsController::class . '@select')->name('post.show');
Route::get('/post/find/{id}', App\Http\Controllers\PostsController::class . '@show')->name('post.view');
Route::get('/post/soft_delete/{id}', App\Http\Controllers\PostsController::class . '@softDelete')->name('post.soft_delete');
Route::get('/post/read_soft_deletes', App\Http\Controllers\PostsController::class . '@readSoftDeletes')->name('post.read_soft_delets');
Route::get('/post/restore/{id}', App\Http\Controllers\PostsController::class . '@restore')->name('post.restore');
Route::get('/postCategories', App\Http\Controllers\PostCategoryController::class . '@index')->name('post.categories');

// cart controller-view routing
Route::get('/cart', \App\Http\Controllers\CartController::class . '@index')->name('cart.index');
Route::get('/cart/deleteme', '\App\Http\Controllers\CartController@deleteme')->name('cart.delete');
Route::get('/cart/{id}', \App\Http\Controllers\CartController::class . '@show')->name('cart.show');
Route::post('/cart/add/{id}', \App\Http\Controllers\CartController::class . '@add')->name('cart.add');


Route::get('/posts.about/{name}', 'App\Http\Controllers\PostsController@about');
Route::get('/pages/check/{view}', '\App\Http\Controllers\PagesController@checkIfExists');
Route::get('/home', '\App\Http\Controllers\HomeController@index');
Route::get('/home/employee-list', '\App\Http\Controllers\HomeController@employyes_list');
Route::get('/home/new-menu', '\App\Http\Controllers\HomeController@addNewMenu');

Auth::routes();

// Route::get('/test', App\Http\Controllers\Admin\AdminHomeController::class . '@index')->middleware('hasrole:supperAdmin,admin')->name('admin.test');

Route::get('/{locale?}', function ($locale = null) {
    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        app()->setLocale($locale);
    }
    $viewData = [];
    $viewData["title"] = "Home Page - CCMS";
    return view('home.index')->with("viewData", $viewData);
});

Route::get("language/{locale}", App\Http\Controllers\LocalizationController::class . '@changeLocale')->name('locale');
