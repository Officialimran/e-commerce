<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\FileManagerController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//Admin route groupe

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {

    //Admin controller
    Route::match(['get', 'post'], 'login', 'AdminController@login');

    Route::group(['middleware' => ['admin']], function () {
        //Admin dashboard route 
        Route::get('dashboard', 'AdminController@dashboard');

        //Update admin password
        Route::match(['get', 'post'], 'update-admin-password', 'AdminController@updateAdminPassword');

        //Update admin details
        Route::match(['get', 'post'], 'update-admin-details', 'AdminController@updateAdminDetails');


        //Check admin password
        Route::post('check-admin-password', 'AdminController@checkAdminPassword');

        //Update vendors personal details 
        Route::match(['get', 'post'], 'update-vendor-details/{slug}', 'AdminController@updateVendorsDetails');

        //View Admin/Subadmin/Vendors
        Route::get('admins/{type?}', 'AdminController@admins');

        // View Admin vendor information
        Route::get('view-vendor-details/{id}', 'AdminController@viewVendorDetails');

        //Update admin status

        Route::post('update-admin-status', 'AdminController@updateAdminStatus');

        //Admin logout
        Route::get('logout', 'AdminController@logout');


        // section 
        Route::get('sections', 'SectionController@sections');
        Route::match(['get', 'post'], 'add-edit-section/{id?}', 'SectionController@addEditSection');

        //updated section status
        Route::post('update-section-status', 'SectionController@updateSectionStatus');
        Route::get('delete-section/{id}', 'SectionController@deleteSections');

        //Category
        Route::get('categories', 'CategoryController@categories');
        Route::post('update-category-status', 'CategoryController@updateCategoryStatus');
        Route::match(['get', 'post'], 'add-edit-category/{id?}', 'CategoryController@addEditCategory');
        Route::get('append-categories-level', 'CategoryController@appendCategoryLevel');


        //File Manager 
        Route::get('filemanager', 'FileManagerController@filemanager');
    });
});
