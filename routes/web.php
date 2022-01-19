<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\Product\VarientController;
use App\Http\Controllers\Product\VatController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Warehouse\StoreController;
use App\Http\Controllers\Warehouse\WarehouseController;
use App\Http\Controllers\Warehouse\VendorController;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

Route::group(['prefix' => 'products', 'as' => 'products.'], function (){
//Category
    Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::get('/category/list',[CategoryController::class,'index'])->name('category.list');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/show',[CategoryController::class,'show'])->name('category.show');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::put('/category/delete',[CategoryController::class,'delete'])->name('category.delete');
//Brand
    Route::get('/brand/create',[BrandController::class,'create'])->name('brand.create');
    Route::get('/brand/list',[BrandController::class,'index'])->name('brand.list');
    Route::post('/brand/store',[BrandController::class,'store'])->name('brand.store');
    Route::get('/brand/show',[BrandController::class,'show'])->name('brand.show');
    Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
    Route::put('/brand/delete',[BrandController::class,'delete'])->name('brand.delete');
//Varient
    Route::get('/variant/create',[VarientController::class,'create'])->name('variant.create');
    Route::get('/variant/list',[VarientController::class,'index'])->name('variant.list');
    Route::post('/variant/store',[VarientController::class,'store'])->name('variant.store');
    Route::get('/variant/show',[VarientController::class,'show'])->name('variant.show');
    Route::get('/variant/edit/{id}',[VarientController::class,'edit'])->name('variant.edit');
    Route::post('/variant/update/{id}',[VarientController::class,'update'])->name('variant.update');
    Route::put('/variant/delete',[VarientController::class,'delete'])->name('variant.delete');
//Vat
    Route::get('/vat/create',[VatController::class,'create'])->name('vat.create');
    Route::get('/vat/list',[VatController::class,'index'])->name('vat.list');
    Route::post('/vat/store',[VatController::class,'store'])->name('vat.store');
    Route::get('/vat/show',[VatController::class,'show'])->name('vat.show');
    Route::get('/vat/edit/{id}',[VatController::class,'edit'])->name('vat.edit');
    Route::post('/vat/update/{id}',[VatController::class,'update'])->name('vat.update');
    Route::put('/vat/delete',[VatController::class,'delete'])->name('vat.delete');
//Product
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::get('/product/list',[ProductController::class,'index'])->name('product.list');
    Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/show',[ProductController::class,'show'])->name('product.show');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::put('/product/delete',[ProductController::class,'delete'])->name('product.delete');
    Route::get('/product/attributeSet',[ProductController::class,'attributeSet'])->name('product.attributeSet');
});

Route::group(['prefix' => 'warehouses', 'as' => 'warehouses.'], function (){
//store
    Route::get('/store/create',[storeController::class,'create'])->name('store.create');
    Route::get('/store/list',[storeController::class,'index'])->name('store.list');
    Route::post('/store/store',[storeController::class,'store'])->name('store.store');
    Route::get('/store/show',[storeController::class,'show'])->name('store.show');
    Route::get('/store/edit/{id}',[storeController::class,'edit'])->name('store.edit');
    Route::post('/store/update/{id}',[storeController::class,'update'])->name('store.update');
    Route::put('/store/delete',[storeController::class,'delete'])->name('store.delete');
//Warehouse
    Route::get('/warehouse/create',[WarehouseController::class,'create'])->name('warehouse.create');
    Route::get('/warehouse/list',[WarehouseController::class,'index'])->name('warehouse.list');
    Route::post('/warehouse/store',[WarehouseController::class,'store'])->name('warehouse.store');
    Route::get('/warehouse/show',[WarehouseController::class,'show'])->name('warehouse.show');
    Route::get('/warehouse/edit/{id}',[WarehouseController::class,'edit'])->name('warehouse.edit');
    Route::post('/warehouse/update/{id}',[WarehouseController::class,'update'])->name('warehouse.update');
    Route::put('/warehouse/delete',[WarehouseController::class,'delete'])->name('warehouse.delete');
//Vendor
    Route::get('/vendor/create',[VendorController::class,'create'])->name('vendor.create');
    Route::get('/vendor/list',[VendorController::class,'index'])->name('vendor.list');
    Route::post('/vendor/store',[VendorController::class,'store'])->name('vendor.store');
    Route::get('/vendor/show',[VendorController::class,'show'])->name('vendor.show');
    Route::get('/vendor/edit/{id}',[VendorController::class,'edit'])->name('vendor.edit');
    Route::post('/vendor/update/{id}',[VendorController::class,'update'])->name('vendor.update');
    Route::put('/vendor/delete',[VendorController::class,'delete'])->name('vendor.delete');
});