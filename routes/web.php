<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware(['auth', 'verified']);


//Admin-panel
Route::middleware(['web', 'auth', 'check.role'])->prefix('dashboard')->group(function() {

    //Users-web-route
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/{users}', [\App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{users}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{users}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{users}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

    //Categories-web-route
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');

    //Products-web-route
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [\App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');

    //Settings-web-route
    Route::get('/company_info', [\App\Http\Controllers\CompanyInfoController::class, 'index'])->name('company_info.index');
    Route::get('/company_info/create', [\App\Http\Controllers\CompanyInfoController::class, 'create'])->name('company_info.create');
    Route::post('/company_info', [\App\Http\Controllers\CompanyInfoController::class, 'store'])->name('company_info.store');
    Route::get('/company_info/{company_info}/edit', [\App\Http\Controllers\CompanyInfoController::class, 'edit'])->name('company_info.edit');
    Route::put('/company_info/{company_info}', [\App\Http\Controllers\CompanyInfoController::class, 'update'])->name('company_info.update');

    //Employee routes
    Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}', [\App\Http\Controllers\EmployeeController::class, 'show'])->name('employees.show');
    Route::get('/employees/{employee}/edit', [\App\Http\Controllers\EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [\App\Http\Controllers\EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [\App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employees.destroy');

    //Slider-web-route
    Route::get('/sliders', [App\Http\Controllers\SliderController::class, 'index'])->name('sliders.index');
    Route::get('/sliders/create', [App\Http\Controllers\SliderController::class, 'create'])->name('sliders.create');
    Route::post('/sliders', [App\Http\Controllers\SliderController::class, 'store'])->name('sliders.store');
    Route::get('/sliders/{slider}', [\App\Http\Controllers\SliderController::class, 'show'])->name('sliders.show');
    Route::get('/sliders/{sliders}/edit', [\App\Http\Controllers\SliderController::class, 'edit'])->name('sliders.edit');
    Route::put('/sliders/{sliders}', [\App\Http\Controllers\SliderController::class, 'update'])->name('sliders.update');
    Route::delete('/sliders/{slider}', [\App\Http\Controllers\SliderController::class, 'destroy'])->name('sliders.destroy');

    Route::get('/mail', [\App\Http\Controllers\UserController::class, 'mail'])->name('send.mail');

    //Brands-web-route
    Route::get('/brands', [App\Http\Controllers\BrandController::class, 'index'])->name('brands.index');
    Route::get('/brands/create', [App\Http\Controllers\BrandController::class, 'create'])->name('brands.create');
    Route::post('/brands', [App\Http\Controllers\BrandController::class, 'store'])->name('brands.store');
    Route::get('/brands/{brand}', [\App\Http\Controllers\BrandController::class, 'show'])->name('brands.show');
    Route::get('/brands/{brands}/edit', [\App\Http\Controllers\BrandController::class, 'edit'])->name('brands.edit');
    Route::put('/brands/{brands}', [\App\Http\Controllers\BrandController::class, 'update'])->name('brands.update');
    Route::delete('/brands/{brand}', [\App\Http\Controllers\BrandController::class, 'destroy'])->name('brands.destroy');

    //Comment-web-route
    Route::get('/comments', [App\Http\Controllers\CommentControler::class, 'index'])->name('comments.index');
    Route::get('/comments/create', [App\Http\Controllers\CommentControler::class, 'create'])->name('comments.create');
    Route::post('/comments', [App\Http\Controllers\CommentControler::class, 'store'])->name('comments.store');
    Route::get('/comments/{comment}', [\App\Http\Controllers\CommentControler::class, 'show'])->name('comments.show');
    Route::get('/comments/{comments}/edit', [\App\Http\Controllers\CommentControler::class, 'edit'])->name('comments.edit');
    Route::put('/comments/{comments}', [\App\Http\Controllers\CommentControler::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [\App\Http\Controllers\CommentControler::class, 'destroy'])->name('comments.destroy');

    //Routes messages
    Route::get('/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [\App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');
    Route::get('/messages/{message}/edit', [\App\Http\Controllers\MessageController::class, 'show'])->name('message.show');
    Route::put('/message/{message}', [\App\Http\Controllers\MessageController::class, 'update'])->name('message.update');
    Route::delete('messages/{message}', [\App\Http\Controllers\MessageController::class, 'delete'])->name('message.delete');

    //Routes orders
    //Routes messages
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'listOrders'])->name('orders.list');
    Route::get('/orders/{order}', [App\Http\Controllers\OrderController::class, 'getOrder'])->name('orders.get');
    Route::delete('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'delete'])->name('orders.delete');
    Route::put('/orders/{order}', [App\Http\Controllers\OrderController::class, 'changeStatus'])->name('orders.update');
    Route::post('/messages', [\App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');
    Route::get('/messages/{message}/edit', [\App\Http\Controllers\MessageController::class, 'show'])->name('message.show');
    Route::put('/message/{message}', [\App\Http\Controllers\MessageController::class, 'update'])->name('message.update');
    Route::delete('messages/{message}', [\App\Http\Controllers\MessageController::class, 'delete'])->name('message.delete');

    //Route feedback
    Route::get('/feedbacks/{feedback}', [\App\Http\Controllers\MessageController::class, 'answer'])->name('message.answer');
    Route::post('/feedbacks/{feedback}/sent', [\App\Http\Controllers\MessageController::class, 'sendResponse'])->name('message.response');

    //Route checkout

});

Route::middleware('auth')->prefix('User')->group(function () {
    Route::get('/{User}', [App\Http\Controllers\UserController::class, 'userProfile'])->name('frontend.profile');
    Route::get('/{User}/Edit', [App\Http\Controllers\UserController::class, 'showProfile'])->name('frontend.showProfileDetails');
    Route::post('/', [App\Http\Controllers\ShippingController::class, 'storeProfileDetails'])->name('frontend.storeProfileDetails');
    Route::put('/{User}', [App\Http\Controllers\UserController::class, 'updateProfileDetails'])->name('frontend.updateProfileDetails');
    Route::get('/Orders/{User}', [App\Http\Controllers\OrderController::class, 'listUserOrders'])->name('frontend.showProfileOrders');
    Route::get('/Orders/Download/{pdf}', [App\Http\Controllers\PDFController::class, 'view'])->name('pdf.viewAndDownload');
    Route::get('/OrderStatus/{Order}', [App\Http\Controllers\OrderController::class, 'viewUserOrder'])->name('frontend.showOrderDetails');
    Route::get('/Messages/{User}', [App\Http\Controllers\MessageController::class, 'userMessages'])->name('frontend.userMessages');
    Route::get('/Messages/Message/{User}', [App\Http\Controllers\MessageController::class, 'viewUserMessage'])->name('frontend.viewUserMessage');
    Route::delete('/Messages/{Message}', [App\Http\Controllers\MessageController::class, 'deleteUserMessage'])->name('frontend.deleteUserMessage');

});


Route::middleware('auth')->group(function () {
    Route::get('/search', [App\Http\Controllers\FrontendController::class, 'search'])->name('frontend.search');
    Route::get('/e-shop', [App\Http\Controllers\FrontendController::class, 'shop'])->name('frontend.shop');
    Route::get('/contactus', [App\Http\Controllers\FrontendController::class, 'contact_us'])->name('frontend.feedback');
    Route::get('/aboutus', [App\Http\Controllers\FrontendController::class, 'about_us'])->name('frontend.about');
    Route::get('/brands', [App\Http\Controllers\FrontendController::class, 'brands'])->name('frontend.brands');
    Route::get('/products/{slug}', [App\Http\Controllers\FrontendController::class, 'product'])->name('frontend.product');
    Route::post('/save-comment', [App\Http\Controllers\CommentControler::class, 'frontendSave'])->name('comment.save');

    // Whishlist
    Route::prefix('whishlists')->group(function () {
        Route::get('/', [App\Http\Controllers\WishlistController::class, 'index'])->name('frontend.wishlist');
        Route::get('/{wishlist}', [App\Http\Controllers\WishlistController::class, 'create'])->name('frontend.addToWishlist');
        Route::delete('/{wishlist}', [App\Http\Controllers\WishlistController::class, 'delete'])->name('frontend.wishlistDelete');
        Route::delete('/{wishlist}/transfer', [App\Http\Controllers\WishlistController::class, 'addToCart_deleteWishlist'])->name('addToCart.wishlistDelete');


    });
    // shopping Cart SESSION routes/////
    Route::prefix('shoppingcart')->group(function () {
        Route::get('/', [App\Http\Controllers\ShoppingCartController::class, 'viewCart'])->name('frontend.shoppingCart');
        Route::post('/add-to-cart', [App\Http\Controllers\ShoppingCartController::class, 'addToCart'])->name('add.to.cart');
        Route::delete('/delete/{product}', [App\Http\Controllers\ShoppingCartController::class, 'deleteProduct'])->name('delete.cart');
    });


//ORDERS ROUTES
    Route::get('/checkout', [App\Http\Controllers\OrderController::class, 'checkout'])->name('frontend.checkout');
    Route::post('/checkout/order', [App\Http\Controllers\OrderController::class, 'processOrder'])->name('frontend.processOrder');

    //// test PDF creation
    Route::get('pdf/preview', [App\Http\Controllers\PDFController::class, 'preview'])->name('pdf.preview');
    Route::get('pdf/{pdf}', [App\Http\Controllers\PDFController::class, 'download'])->name('pdf.generate');
    Route::get('/resume', [App\Http\Controllers\PDFController::class, 'index'])->name('pdf');
});
//Login
Route::get('/sign-up', [App\Http\Controllers\FrontendController::class, 'preSignUp'])->name('frontend.register');
Route::get('/reset', [App\Http\Controllers\FrontendController::class, 'preReset'])->name('frontend.reset');

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('frontend.index');
Route::get('/comingSoon', [App\Http\Controllers\FrontendController::class, 'comingSoon'])->name('frontend.comingSoon');

