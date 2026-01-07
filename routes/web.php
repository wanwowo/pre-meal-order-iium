<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminOrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/cafes'));

Route::get('/cafes', [CafeController::class, 'index'])->name('cafes.index');
Route::get('/cafes/{cafe}', [CafeController::class, 'show'])->name('cafes.show');

Route::middleware('auth')->group(function () {

    Route::get('/cafes/{cafe}/menus', [MenuController::class, 'index'])->name('menus.index');

    // CART
    Route::post('/cart/add/{menu}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    // ORDERS
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('/orders/success/{order}', function ($orderId) {
        $order = \App\Models\Order::findOrFail($orderId);
        return view('orders.success', compact('order'));
    })->name('orders.success');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/orders/{order}/pay', [OrderController::class, 'pay'])
    ->name('orders.pay');

    Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/orders', [AdminOrderController::class, 'index'])
            ->name('orders.index');

        Route::patch('/orders/{order}', [AdminOrderController::class, 'updateStatus'])
            ->name('orders.update');
});

});

require __DIR__.'/auth.php';


