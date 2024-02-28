<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\packageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Backend\jobController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\albumController;
use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\backend\VendorController;
use App\Http\Controllers\Backend\backendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\jobCategoryController;
use App\Http\Controllers\Backend\StockHistoryController;

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


//Routing Group without Middleware

/*
|--------------------------------------------------------------------------
| Admin Web Routes with admin prefix
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

Route::prefix('admin')->group(function () {
    Route::get('/', [backendController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Packages Routes
|--------------------------------------------------------------------------
*/

Route::get('/packages', [packageController::class, 'show'])->name('packages.show');
Route::get('package/create', [packageController::class, 'create'])->name('package.create');
Route::post('package/store', [packageController::class, 'store'])->name('package.store');


/*
|--------------------------------------------------------------------------
| Admin Job Categories Routes
|--------------------------------------------------------------------------
*/

Route::get('/job_categories', [jobCategoryController::class, 'show'])->name('job_categories.show');
Route::get('job_category/create', [jobCategoryController::class, 'create'])->name('job_category.create');
Route::post('job_category/store', [jobCategoryController::class, 'store'])->name('job_category.store');


/*
|--------------------------------------------------------------------------
| Admin Job Section Job Routes
|--------------------------------------------------------------------------
*/

Route::get('/jobs', [jobController::class, 'show'])->name('jobs.show');
Route::get('job/create', [jobController::class, 'create'])->name('job.create');
Route::post('job/store', [jobController::class, 'store'])->name('job.store');


/*
|--------------------------------------------------------------------------
| Album Routes
|--------------------------------------------------------------------------
*/

Route::get('/album', [albumController::class, 'index'])->name('album.show');
Route::get('album/create', [albumController::class, 'create'])->name('album.create');
Route::post('album/store', [albumController::class, 'store'])->name('album.store');
Route::get('album/edit/{id}', [albumController::class, 'edit'])->name('album.edit');
Route::post('album/{id}', [albumController::class, 'update'])->name('album.update');
Route::delete('album/{id}', [albumController::class, 'destroy'])->name('album.destroy');
/*
|--------------------------------------------------------------------------
| Photo Routes
|--------------------------------------------------------------------------
*/
Route::get('/photo/create', [PhotoController::class, 'create'])->name('photo.create');
Route::post('/photo/store', [PhotoController::class, 'store'])->name('photo.store');
Route::get('/photo/edit', [PhotoController::class, 'edit'])->name('photo.edit');
Route::get('/photo/{id}', [PhotoController::class, 'index'])->name('photo.show');


/*
|--------------------------------------------------------------------------
| Category Routes
|--------------------------------------------------------------------------
*/

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

/*
|--------------------------------------------------------------------------
| Vendor Routes
|--------------------------------------------------------------------------
*/

Route::get('/vendor', [VendorController::class, 'index'])->name('vendor.index');
Route::get('/vendor/create', [VendorController::class, 'create'])->name('vendor.create');
Route::post('/vendor/store', [VendorController::class, 'store'])->name('vendor.store');
Route::get('/vendor/edit/{id}', [VendorController::class, 'edit'])->name('vendor.edit');
Route::post('/vendor/{id}', [VendorController::class, 'update'])->name('vendor.update');
Route::delete('/vendor/{id}', [VendorController::class, 'destroy'])->name('vendor.destroy');


/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
*/

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
*/

Route::get('/stock', [StockHistoryController::class, 'index'])->name('stock.index');
Route::get('/stock/create', [StockHistoryController::class, 'create'])->name('stock.create');
Route::post('/stock/store', [StockHistoryController::class, 'store'])->name('stock.store');
Route::get('/stock/edit/{id}', [StockHistoryController::class, 'edit'])->name('stock.edit');
Route::post('/stock/{id}', [StockHistoryController::class, 'update'])->name('stock.update');
Route::delete('/stock/{id}', [StockHistoryController::class, 'destroy'])->name('stock.destroy');



});


});


/*
|--------------------------------------------------------------------------
| End of Admin Web Routes with admin prefix
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/AssignRole', [UserController::class, 'AssignRole']);




