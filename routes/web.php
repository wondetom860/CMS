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
    // Route::post('/my-account/update/{id}', App\Http\Controllers\MyAccountController::class . '@update')->name('myaccount.update.profile');
    // Route::post('/my-account/resetPassword/{id}', App\Http\Controllers\MyAccountController::class . '@resetPassword')->name('myaccount.reset.password');

    Route::get('/my-account/changeUserName', App\Http\Controllers\MyAccountController::class . '@changeUserName')->name('myaccount.change.username');
    Route::post('/my-account/updateUserName', App\Http\Controllers\MyAccountController::class . '@updateUserName')->name('myaccount.update.username');

    Route::get('/my-account/changePassword', App\Http\Controllers\MyAccountController::class . '@changePassword')->name('myaccount.change.password');
    Route::post('/my-account/updatePassword', App\Http\Controllers\MyAccountController::class . '@updatePassword')->name('myaccount.update.password');

    // case
    Route::get('/case', App\Http\Controllers\CaseController::class . '@index')->name('case.index');
    Route::get('/case/show/{id}', App\Http\Controllers\CaseController::class . '@show')->name('case.show');
    Route::get('/case/create', App\Http\Controllers\CaseController::class . '@create')->name('case.create');
    Route::post('/case/store', App\Http\Controllers\CaseController::class . '@store')->name('case.store');
    Route::get('/case/{id}/edit', App\Http\Controllers\CaseController::class . '@edit')->name('case.edit');
    Route::put('/case/{id}/update', App\Http\Controllers\CaseController::class . '@update')->name('case.update');
    Route::get('/case/{id}/delete', App\Http\Controllers\CaseController::class . '@delete')->name('case.delete');


    // for auth users - court
    Route::get('/courts', App\Http\Controllers\CourtController::class . '@index')->name('courts.index');

    // seach for person by ID
    Route::post('/person/findPerson', App\Http\Controllers\PersonController::class . '@findPerson')->name('person.findPerson');
});

Route::middleware('auth')->group(function () {
    // Route::resource('/roles', App\Http\Controllers\Admin\RoleController::class);
    // Route::resource('/users', App\Http\Controllers\Admin\UserController::class);
});
// Route::middleware('hasrole:superAdmin')->group(function () {
//     Route::get('/roles', App\Http\Controllers\RoleController::class . '@index')->name('roles.index');
//     Route::get('/users', App\Http\Controllers\RoleController::class . '@users')->name('users.index');
// });

Route::middleware('auth')->prefix('/admin')->group(function () {
    // Route::get('', App\Http\Controllers\Admin\AdminHomeController::class . '@index')->name('admin.home.index');
    // Route::get('/products', App\Http\Controllers\Admin\AdminProductController::class . '@index')->name('admin.products.index');
    // Route::get('/products/create', App\Http\Controllers\Admin\AdminProductController::class . '@create')->name('admin.products.create');
    // Route::post('/products/store', App\Http\Controllers\Admin\AdminProductController::class . '@store')->name('admin.products.store');
    // Route::get('/products/show/{id}', App\Http\Controllers\Admin\AdminProductController::class . '@show')->name('admin.products.show');
    // Route::post('/products/{id}/delete', App\Http\Controllers\Admin\AdminProductController::class . '@delete')->name('admin.product.delete');
    // Route::get('/products/{id}/edit', App\Http\Controllers\Admin\AdminProductController::class . '@edit')->name('admin.product.edit');
    // Route::put('/products/{id}/update', App\Http\Controllers\Admin\AdminProductController::class . '@update')->name('admin.product.update');
    // Route::get('/orders', App\Http\Controllers\OrderController::class . '@index')->name('orders.index');
    // Route::get('/users', App\Http\Controllers\RoleController::class . '@users')->name('users.index');


    // Person
    Route::get('/person', App\Http\Controllers\PersonController::class . '@index')->name('admin.person.index');
    Route::get('/person/show/{id}', App\Http\Controllers\PersonController::class . '@show')->name('admin.person.show');
    Route::get('/person/create', App\Http\Controllers\PersonController::class . '@create')->name('admin.person.create');
    Route::post('/person/store', App\Http\Controllers\PersonController::class . '@store')->name('admin.person.store');
    Route::get('/person/{id}/edit', App\Http\Controllers\PersonController::class . '@edit')->name('admin.person.edit');
    Route::put('/person/{id}/update', App\Http\Controllers\PersonController::class . '@update')->name('admin.person.update');
    Route::post('/person/{id}/delete', App\Http\Controllers\PersonController::class . '@destroy')->name('admin.person.delete');
    Route::post('/person/signup', App\Http\Controllers\PersonController::class . '@signUp')->name('admin.person.signup');

    // document-type
    Route::get('/document_type', App\Http\Controllers\DocumetTypeController::class . '@index')->name('admin.document_type.index');
    Route::get('/document_type/show/{id}', App\Http\Controllers\DocumetTypeController::class . '@show')->name('admin.document_type.show');
    Route::get('/document_type/create', App\Http\Controllers\DocumetTypeController::class . '@create')->name('admin.document_type.create');
    Route::post('/document_type/store', App\Http\Controllers\DocumetTypeController::class . '@store')->name('admin.document_type.store');
    Route::get('/document_type/{id}/edit', App\Http\Controllers\DocumetTypeController::class . '@edit')->name('admin.document_type.edit');
    Route::put('/document_type/{id}/update', App\Http\Controllers\DocumetTypeController::class . '@update')->name('admin.document_type.update');
    Route::post('/document_type/{id}/delete', App\Http\Controllers\DocumetTypeController::class . '@destroy')->name('admin.document_type.delete');

    // Court
    Route::get('/court', App\Http\Controllers\CourtController::class . '@index')->name('admin.court.index');
    Route::get('/court/show/{id}', App\Http\Controllers\CourtController::class . '@show')->name('admin.court.show');
    Route::get('/court/create', App\Http\Controllers\CourtController::class . '@create')->name('admin.court.create');
    Route::post('/court/store', App\Http\Controllers\CourtController::class . '@store')->name('admin.court.store');


    //Document
    Route::get('/document', App\Http\Controllers\DocumentController::class . '@index')->name('admin.document.index');
    Route::get('/document/show/{id}', App\Http\Controllers\DocumentController::class . '@show')->name('admin.document.show');
    Route::get('/document/create', App\Http\Controllers\DocumentController::class . '@create')->name('admin.document.create');
    Route::post('/document/store', App\Http\Controllers\DocumentController::class . '@store')->name('admin.document.store');
    Route::get('/document/{id}/edit', App\Http\Controllers\DocumentController::class . '@edit')->name('admin.document.edit');
    Route::put('/document/{id}/update', App\Http\Controllers\DocumentController::class . '@update')->name('admin.document.update');
    Route::post('/document/{id}/delete', App\Http\Controllers\DocumentController::class . '@destroy')->name('admin.document.delete');


    // event
    Route::get('/event', App\Http\Controllers\eventController::class . '@index')->name('admin.event.index');
    Route::get('/event/show/{id}', App\Http\Controllers\eventController::class . '@show')->name('admin.event.show');
    Route::get('/event/create', App\Http\Controllers\eventController::class . '@create')->name('admin.event.create');
    Route::post('/event/store', App\Http\Controllers\eventController::class . '@store')->name('admin.event.store');
    Route::get('/event/{id}/edit', App\Http\Controllers\eventController::class . '@edit')->name('admin.event.edit');
    Route::put('/event/{id}/update', App\Http\Controllers\eventController::class . '@update')->name('admin.event.update');
    Route::get('/event/{id}/delete', App\Http\Controllers\eventController::class . '@destroy')->name('admin.event.delete');

    Route::get('/party', App\Http\Controllers\PartyController::class . '@index')->name('admin.party.index');
    Route::get('/party/show/{id}', App\Http\Controllers\PartyController::class . '@show')->name('admin.party.show');
    Route::get('/party/create', App\Http\Controllers\PartyController::class . '@create')->name('admin.party.create');
    Route::post('/party/store', App\Http\Controllers\PartyController::class . '@store')->name('admin.party.store');
    Route::get('/party/{id}/edit', App\Http\Controllers\PartyController::class . '@edit')->name('admin.party.edit');
    Route::put('/party/{id}/update', App\Http\Controllers\PartyController::class . '@update')->name('admin.party.update');
    Route::get('/party/{id}/delete',  App\Http\Controllers\PartyController::class . '@delete')->name('admin.party.delete');


    Route::get('/staffrole', App\Http\Controllers\StaffRoleController::class . '@index')->name('admin.staffrole.index');
    Route::get('/staffrole/show/{id}', App\Http\Controllers\StaffRoleController::class . '@show')->name('admin.staffrole.show');
    Route::get('/staffrole/create', App\Http\Controllers\StaffRoleController::class . '@create')->name('admin.staffrole.create');
    Route::post('/staffrole/store', App\Http\Controllers\StaffRoleController::class . '@store')->name('admin.staffrole.store');
    Route::get('/staffrole/{id}/edit', App\Http\Controllers\StaffRoleController::class . '@edit')->name('admin.staffrole.edit');
    Route::post('/staffrole/{id}/delete', App\Http\Controllers\StaffRoleController::class . '@delete')->name('admin.staffrole.delete');
    Route::put('/staffrole/{id}/update', App\Http\Controllers\StaffRoleController::class . '@update')->name('admin.staffrole.update');

    //courtstaff
    Route::get('/courtstaff', App\Http\Controllers\CourtStaffController::class . '@index')->name('admin.courtstaff.index');
    Route::get('/courtstaff/show/{id}', App\Http\Controllers\CourtStaffController::class . '@show')->name('admin.courtstaff.show');
    Route::get('/courtstaff/create', App\Http\Controllers\CourtStaffController::class . '@create')->name('admin.courtstaff.create');
    Route::post('/courtstaff/store', App\Http\Controllers\CourtStaffController::class . '@store')->name('admin.courtstaff.store');
    Route::get('/courtstaff/{id}/edit', App\Http\Controllers\CourtStaffController::class . '@edit')->name('admin.courtstaff.edit');
    Route::post('/courtstaff/{id}/delete', App\Http\Controllers\CourtStaffController::class . '@delete')->name('admin.courtstaff.delete');
    Route::POST('/courtstaff/{id}/update', App\Http\Controllers\CourtStaffController::class . '@update')->name('admin.courtstaff.update');

    //case type

    Route::get('/case_type', App\Http\Controllers\CaseTypeController::class . '@index')->name('admin.case_type.index');
    Route::get('/case_type/show/{id}', App\Http\Controllers\CaseTypeController::class . '@show')->name('admin.case_type.show');
    Route::get('/case_type/create', App\Http\Controllers\CaseTypeController::class . '@create')->name('admin.case_type.create');
    Route::post('/case_type/store', App\Http\Controllers\CaseTypeController::class . '@store')->name('admin.case_type.store');
    Route::get('/case_type/{id}/delete', App\Http\Controllers\CaseTypeController::class . '@delete')->name('admin.case_type.delete');
    Route::get('/case_type/{id}/edit', App\Http\Controllers\CaseTypeController::class . '@edit')->name('admin.case_type.edit');
    Route::put('/case_type/{id}/update', App\Http\Controllers\CaseTypeController::class . '@update')->name('admin.case_type.update');

    //party type

    Route::get('/party_type', App\Http\Controllers\PartyTypeController::class . '@index')->name('admin.party_type.index');
    Route::get('/party_type/show/{id}', App\Http\Controllers\PartyTypeController::class . '@show')->name('admin.party_type.show');
    Route::get('/party_type/create', App\Http\Controllers\PartyTypeController::class . '@create')->name('admin.party_type.create');
    Route::post('/party_type/store', App\Http\Controllers\PartyTypeController::class . '@store')->name('admin.party_type.store');
    Route::get('/party_type/{id}/delete', App\Http\Controllers\PartyTypeController::class . '@delete')->name('admin.party_type.delete');
    Route::get('/party_type/{id}/edit', App\Http\Controllers\PartyTypeController::class . '@edit')->name('admin.party_type.edit');
    Route::put('/party_type/{id}/update', App\Http\Controllers\PartyTypeController::class . '@update')->name('admin.party_type.update');
    Route::get('/court/{id}/edit', App\Http\Controllers\CourtController::class . '@edit')->name('admin.court.edit');
    Route::put('/court/{id}/update', App\Http\Controllers\CourtController::class . '@update')->name('admin.court.update');
    Route::post('/court/{id}/delete', App\Http\Controllers\CourtController::class . '@destroy')->name('admin.court.delete');

    // event-type
    Route::get('/event-type', App\Http\Controllers\EventTypeController::class . '@index')->name('admin.event-type.index');
    Route::get('/event-type/show/{id}', App\Http\Controllers\EventTypeController::class . '@show')->name('admin.event-type.show');
    Route::get('/event-type/create', App\Http\Controllers\EventTypeController::class . '@create')->name('admin.event-type.create');
    Route::post('/event-type/store', App\Http\Controllers\EventTypeController::class . '@store')->name('admin.event-type.store');
    Route::get('/event-type/{id}/edit', App\Http\Controllers\EventTypeController::class . '@edit')->name('admin.event-type.edit');
    Route::put('/event-type/{id}/update', App\Http\Controllers\EventTypeController::class . '@update')->name('admin.event-type.update');
    Route::post('/event-type/{id}/delete', App\Http\Controllers\EventTypeController::class . '@destroy')->name('admin.event-type.delete');

    // case staff assignment 
    Route::get('/admin/case_staff_assignments', App\Http\Controllers\CaseStaffAssignmentController::class . '@index')->name('admin.case_staff_assignments.index');
    Route::get('/case_staff_assignments/show/{id}', App\Http\Controllers\CaseStaffAssignmentController::class . '@show')->name('admin.case_staff_assignments.show');
    Route::get('/case_staff_assignments/create', App\Http\Controllers\CaseStaffAssignmentController::class . '@create')->name('admin.case_staff_assignments.create');
    Route::post('/case_staff_assignments/store', App\Http\Controllers\CaseStaffAssignmentController::class . '@store')->name('admin.case_staff_assignments.store');
    Route::get('/case_staff_assignments/{id}/edit', App\Http\Controllers\CaseStaffAssignmentController::class . '@edit')->name('admin.case_staff_assignments.edit');
    Route::put('/case_staff_assignments/{id}/update', App\Http\Controllers\CaseStaffAssignmentController::class . '@update')->name('admin.case_staff_assignments.update');
    Route::get('/case_staff_assignments/{id}/delete', App\Http\Controllers\CaseStaffAssignmentController::class . '@destroy')->name('admin.case_staff_assignments.delete');
    // routes/web.php
    
    // User roles and assignment
    Route::get('/roles', App\Http\Controllers\Admin\RoleController::class . '@index')->name('admin.roles.index');
    Route::get('/roles/create', App\Http\Controllers\Admin\RoleController::class . '@create')->name('admin.roles.create');
    Route::post('/roles/store', App\Http\Controllers\Admin\RoleController::class . '@store')->name('admin.roles.store');
    Route::get('/roles/show/{id}', App\Http\Controllers\Admin\RoleController::class . '@show')->name('admin.roles.show');
    Route::get('/roles/{id}/edit', App\Http\Controllers\Admin\RoleController::class . '@edit')->name('admin.roles.edit');
    Route::get('/roles/{id}/destroy', App\Http\Controllers\Admin\RoleController::class . '@destroy')->name('admin.roles.destroy');
    Route::put('/roles/{id}/update', App\Http\Controllers\Admin\RoleController::class . '@update')->name('admin.roles.update');

    Route::get('/users', App\Http\Controllers\Admin\UserController::class . '@index')->name('admin.users.index');
    Route::get('/users/show/{id}', App\Http\Controllers\Admin\UserController::class . '@show')->name('admin.users.show');
    Route::get('/users/{id}/edit', App\Http\Controllers\Admin\UserController::class . '@edit')->name('admin.users.edit');
    Route::get('/users/{id}/destroy', App\Http\Controllers\Admin\UserController::class . '@destroy')->name('admin.users.destroy');
    Route::put('/users/{id}/update', App\Http\Controllers\Admin\UserController::class . '@update')->name('admin.users.update');
    
    // Manage Account
    // Route::get('/users/changeUserName', App\Http\Controllers\Admin\UserController::class . '@changeUserName')->name('admin.users.changeUserName');
    Route::get('/users/resetPassword/{id}', App\Http\Controllers\Admin\UserController::class . '@resetPassword')->name('admin.users.resetPassword');
});

//case



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



// use App\Http\Controllers\CaseStaffAssignmentController;
