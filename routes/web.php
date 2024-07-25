<?php

use App\Http\Controllers\AuctionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FileController;
use \App\Http\Controllers\AuctionProductController;
use \App\Http\Controllers\OfferController;


require __DIR__ . '/auth.php';

Route::redirect('/dashboard', '/');
Route::get('/', [HomeController::class, 'viewData'])->name('dashboard');
Route::get('/auction/{id}/{type_id?}', [AuctionController::class, 'view'])->name('viewAuction');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('/product')->group(function () {
        Route::get('/add-product', [ProductController::class, 'addProductView'])->name('formAddProduct');
        Route::post('/add-old', [ProductController::class, 'addOldProduct'])->name('add-old-product');
        Route::post('/add-new', [ProductController::class, 'addNewProduct'])->name('add-new-product');

        Route::get('/edit-form/{product}', [ProductController::class, 'editProductView']);
        Route::put('/edit/{product}', [ProductController::class, 'edit']);

        Route::get('/history',[ProductController::class,'viewHistory'])->name('history');
        Route::get('/view/{id}',[ProductController::class,'view'])->name('product-details');

    });

    Route::prefix('/auction-product')->group(function (){
        Route::get('/view/{id}',[AuctionProductController::class,"view"])->name('view-auction-product');
    });

    Route::prefix('/offer')->group(function (){
        Route::put('/edit/{id}',[OfferController::class,'edit']);
        Route::post('/add/{auction_product}',[OfferController::class,'add']);
    });

    Route::prefix('/media')->group(function () {
        Route::post('/edit', [FileController::class, 'edit'])->name('edit-file');
    });


});

