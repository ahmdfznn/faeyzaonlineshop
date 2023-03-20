<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesControllers;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\ManageProductController;

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

Route::controller(PagesControllers::class)->group(function () {
    Route::get('/', 'index');
});

Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/dashboardUser/profile', 'index')->middleware('auth');
        Route::patch('profile', 'update')->name('profile.update');
        Route::delete('profile', 'destroy')->name('profile.destroy');
        Route::delete('/deleteProfilePicture', 'deleteProfilePicture');
    });
});

Route::get('product', [ProductController::class, 'index'])->name('product');

Route::controller(OrderController::class)->group(function () {
    Route::get('product/{slug}', 'index');
    Route::post('order', 'store')->name('order')->middleware('auth');
    Route::get('/order', '')->name('order')->middleware('auth');
    Route::delete('/order/cancel/{id}', 'cancel')->middleware('auth');
});

Route::resource('/manageProduct', ManageProductController::class)->middleware('admin');

Route::resource('/dashboard/manageUsers', ManageUsersController::class)->middleware('admin');

Route::get('/dashboard/orders', [AdminController::class, 'orders'])->middleware('admin');

Route::get('/dashboard/transaction', [AdminController::class, 'transaction'])->middleware('admin');

Route::post('/dashboard/orders/confirm/{order}', [AdminController::class, 'confirm'])->middleware('admin');

Route::delete('/deletemessage/{id}', [AdminController::class, 'destroymessage'])->middleware('admin');

Route::get('/dashboard/message', [AdminController::class, 'viewMessage'])->middleware('admin');
Route::post('/message', [AdminController::class, 'message'])->middleware('admin');
Route::post('/transaction/paid/{id}', [AdminController::class, 'paid'])->middleware('admin');

Route::get('/dashboardUser/{username}',  [DashboardUserController::class, 'index'])->middleware('auth');

Route::get('/myorder',  [DashboardUserController::class, 'order'])->middleware('auth');
Route::get('/mytransaction',  [DashboardUserController::class, 'transaction'])->middleware('auth');


Route::controller(CommentController::class)->group(function () {
    Route::post('/sendcomment/{id}', 'store')->middleware('auth');
    Route::put('/comment/{id}/edit', 'update')->middleware('auth');
    Route::delete('/deletecomment/{id}', 'destroy')->middleware('auth');
});

require __DIR__ . '/auth.php';
