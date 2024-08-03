<?php

use App\Http\Controllers\AuctionController;
use App\Http\Controllers\AuctionProductController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminController;


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

        Route::get('/history', [ProductController::class, 'viewHistory'])->name('history');
        Route::get('/view/{id}', [ProductController::class, 'view'])->name('product-details');

    });

    Route::prefix('/auction-product')->group(function () {
        Route::get('/view/{id}', [AuctionProductController::class, "view"])->name('view-auction-product');
    });

    Route::prefix('/offer')->group(function () {
        Route::put('/edit/{id}', [OfferController::class, 'edit']);
        Route::post('/add/{auction_product}', [OfferController::class, 'add']);
    });

    Route::prefix('/media')->group(function () {
        Route::post('/edit', [FileController::class, 'edit'])->name('edit-file');
    });

    Route::middleware('isAdmin')->group(function () {
        Route::get('/admin-dashboard', [HomeController::class, 'viewDashboard'])->name('admin');
        Route::post('/status/{id}', [ProductController::class, 'changeStatus'])->name('change-status');


        Route::get('/add-auction', [AuctionController::class, 'addForm'])->name('form-add-auction');
        Route::post('/add-auction', [AuctionController::class, 'add'])->name('add-auction');

        Route::get('/edit', [AuctionController::class, 'editForm']);
        Route::get('/view/product-info/{id}', [AuctionProductController::class, 'viewInfoForAdmin'])->name('product-info-admin');

        Route::get('/product/pending', [ProductController::class, 'viewPending'])->name('pending-products');

        Route::get('/edit-auction/{id}', [AuctionController::class, 'editForm'])->name('formEditAuction');
        Route::post('/edit-auction/{id}', [AuctionController::class, 'edit'])->name('edit-auction');

        Route::get('/users-form',[AdminController::class,'viewUsersForm'])->name('view-users-form');
        Route::get('/user/{id}',[AdminController::class,'viewUser'])->name('user-details');

    });


});

