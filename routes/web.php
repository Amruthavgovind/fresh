<?php
// Route::redirect('/', 'Userhome');
// Route::get('/Userhome', function () {
//    return redirect('Userhome');

// }
// );
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;



Route::get('/', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');


Route::get('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');

Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::get('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{cartId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::delete('/cart/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/about', [CartController::class, 'viewabout'])->name('about.view');
Route::get('/contact', [CartController::class, 'viewcontact'])->name('contact.view');
