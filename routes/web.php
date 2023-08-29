<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubcategoryController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\FeedbackController;
use App\Http\Controllers\backend\AboutusController;
use App\Http\Controllers\backend\ShippingController;
use App\Http\Controllers\backend\PrivacyController;
use App\Http\Controllers\backend\TermsController;
use App\Http\Controllers\backend\ProductsController;



use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ShopController;
use App\Http\Controllers\frontend\ProductDetailsController;
use App\Http\Controllers\frontend\WishlistController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\AuthCustomController;
use App\Http\Controllers\frontend\UserDashboardController;


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




// Route::get('/', [HomeController::class, 'showTabs']);

Route::get('/',[HomeController::class,'index'])->name('index')->middleware('ShareSessionData');
Route::get('/about',[HomeController::class,'about'])->middleware('ShareSessionData');
Route::get('/faq',[HomeController::class,'faq'])->middleware('ShareSessionData');
Route::get('/contact',[HomeController::class,'contact'])->middleware('ShareSessionData');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index')->middleware('ShareSessionData');
Route::get('/get-products/categories', [ShopController::class, 'index'])->name('get-products.index')->middleware('ShareSessionData');
Route::get('/get-products/{category}', [ShopController::class, 'show'])->name('get-products.show')->middleware('ShareSessionData');
Route::get('/get-product_details/{id}',[ProductDetailsController::class,'index'])->name('get-product_details.index')->middleware('ShareSessionData');
Route::get('/get-products', [ShopController::class, 'peopleproducts'])->name('peopleproducts')->middleware('ShareSessionData');
Route::get('/register',[AuthCustomController::class,'register'])->middleware('aleradyLoggedIn');
Route::post('/register', [AuthCustomController::class, 'registeruser'])->middleware('aleradyLoggedIn');
Route::get('/login',[AuthCustomController::class,'login'])->name('userlogin');
Route::post('/login',[AuthCustomController::class,'userlogin'])->name('userlogin');
Route::post('/register', [AuthCustomController::class, 'registeruser']);


Route::middleware('ShareSessionData','isLoggedIn','prevent-back-history')->group(function() {

Route::get('/my-account',[UserDashboardController::class,'index'])->name('myaccount');
Route::get('/my-account',[UserDashboardController::class,'userdashboard'])->name('myaccount');
Route::get('/logout',[AuthCustomController::class,'logout'])->name('user.logout');
Route::get('/wishlist',[WishlistController::class,'index'])->name('wishlist.index');
Route::get('/wishlist/{product_id}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::get('/remove-from-wishlist/{id}', [WishlistController::class, 'removeProductFromWishlist'])
->name('remove-from-wishlist');
Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::get('/cart/{product_id}/{quantity}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/remove-from-cart/{id}', [CartController::class, 'removeProductFromCart'])
->name('remove-from-cart');
});







Route::get('/dashboard', function () {
    return view('backend.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware('auth','verified','prevent-back-history')->group(function() {

    //CategoryController
    Route::get('/category/add/',[CategoryController::class,'index']);
    Route::post('/category/add/',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/add/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('/category/add/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/category/add/delete/{id}',[CategoryController::class,'destroy'])->name('category.destroy');

    //SubcategoryController
    Route::get('/subcategory/add/',[SubcategoryController::class,'index']);
    Route::post('/subcategory/add/',[SubcategoryController::class,'store'])->name('subcategory.store');
    // Route::get('/subcategory/add/',[SubcategoryController::class,'show'])->name('subcategory.show');
    Route::get('/subcategory/add/edit/{id}',[SubcategoryController::class,'edit'])->name('subcategory.edit');
    Route::put('/subcategory/add/update/{id}',[SubcategoryController::class,'update'])->name('subcategory.update');
    Route::get('/subcategory/add/delete/{id}',[SubcategoryController::class,'destroy'])->name('subcategory.destroy');

    //SliderController
    Route::get('/slider/add/',[SliderController::class,'index']);
    Route::post('/slider/add/',[SliderController::class,'store'])->name('slider.store');
    Route::get('/slider/add/edit/{id}',[SliderController::class,'edit'])->name('slider.edit');
    Route::put('/slider/add/update/{id}',[SliderController::class,'update'])->name('slider.update');
    Route::get('/slider/add/delete/{id}',[SliderController::class,'destroy'])->name('slider.destroy');

    //FeedbackController
    Route::get('/testimonial/add/',[FeedbackController::class,'index']);
    Route::post('/testimonial/add/',[FeedbackController::class,'store'])->name('testimonial.store');
    Route::get('/testimonial/add/edit/{id}',[FeedbackController::class,'edit'])->name('testimonial.edit');
    Route::put('/testimonial/add/update/{id}',[FeedbackController::class,'update'])->name('testimonial.update');
    Route::get('/testimonial/add/delete/{id}',[FeedbackController::class,'destroy'])->name('testimonial.destroy');

    //AboutusController
    Route::get('/about/add/',[AboutusController::class,'index']);
    Route::post('/about/add/',[AboutusController::class,'store'])->name('about.store');
    Route::get('/about/add/edit/{id}',[AboutusController::class,'edit'])->name('about.edit');
    Route::put('/about/add/update/{id}',[AboutusController::class,'update'])->name('about.update');
    Route::get('/about/add/delete/{id}',[AboutusController::class,'destroy'])->name('about.destroy');

    Route::get('/privacy_policy/add/',[PrivacyController::class,'index']);
    Route::post('/privacy_policy/add/',[PrivacyController::class,'store'])->name('privacy_policy.store');
    Route::get('/privacy_policy/add/edit/{id}',[PrivacyController::class,'edit'])->name('privacy_policy.edit');
    Route::put('/privacy_policy/add/update/{id}',[PrivacyController::class,'update'])->name('privacy_policy.update');
    Route::get('/privacy_policy/add/delete/{id}',[PrivacyController::class,'destroy'])->name('privacy_policy.destroy');

    Route::get('/shipping_policy/add/',[ShippingController::class,'index']);
    Route::post('/shipping_policy/add/',[ShippingController::class,'store'])->name('shipping_policy.store');
    Route::get('/shipping_policy/add/edit/{id}',[ShippingController::class,'edit'])->name('shipping_policy.edit');
    Route::put('/shipping_policy/add/update/{id}',[ShippingController::class,'update'])->name('shipping_policy.update');
    Route::get('/shipping_policy/add/delete/{id}',[ShippingController::class,'destroy'])->name('shipping_policy.destroy');

    Route::get('/terms_&_condition/add/',[TermsController::class,'index']);
    Route::post('/terms_&_condition/add/',[TermsController::class,'store'])->name('terms_&_condition.store');
    Route::get('/terms_&_condition/add/edit/{id}',[TermsController::class,'edit'])->name('terms_&_condition.edit');
    Route::put('/terms_&_condition/add/update/{id}',[TermsController::class,'update'])->name('terms_&_condition.update');
    Route::get('/terms_&_condition/add/delete/{id}',[TermsController::class,'destroy'])->name('terms_&_condition.destroy');


    Route::get('/product/add/',[ProductsController::class,'index']);
    Route::post('/product/add/',[ProductsController::class,'store'])->name('adminproduct.store');
    Route::get('/product/add/',[ProductsController::class,'show']);
    // Route::post('/product/add/',[ProductsController::class,'findCategory'])->name('product.findCategory');
    Route::get('/product/add/edit/{id}',[ProductsController::class,'edit'])->name('product.edit');
    Route::put('/product/add/update/{id}',[ProductsController::class,'update'])->name('product.update');
    Route::get('/product/add/delete/{id}',[ProductsController::class,'destroy'])->name('product.destroy');


    // Route::get('/getSlug',function(Request $request){
    //     $slug = '';
    //     if(!empty($request->title)){
    //         $slug = Str::slug($request->title);
    //     }
    //     return response()->json($data, 200, $headers);
    // });


});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
