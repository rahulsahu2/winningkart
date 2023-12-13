<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//Frontend Routes START ******************************************************

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/privacy-policy',[PageController::class,'privacyPolicy'])->name('privacyPolicy');
Route::get('/tnc',[PageController::class,'TermsandConditions'])->name('TermsandConditions');
Route::get('/faq',[PageController::class,'FaQ'])->name('FaQ');
Route::get('/faq/{slug}',[PageController::class,'FaqDetails'])->name('FaqDetail');
Route::get('/shipping-returns',[PageController::class,'ShippingReturns'])->name('ShippingReturns');
Route::get('/cancellation-returns',[PageController::class,'CancellationReturns'])->name('CancellationReturns');

Route::get('/about-us',[PageController::class,'AboutUs'])->name('AboutUs');
Route::get('/contact-us',[PageController::class,'ContactUs'])->name('ContactUs');

//auth
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name("register");
    Route::get('/login', 'login')->name("login");
    Route::get('/logout', 'logout')->name("user.logout");
    Route::get('/verifymail', 'VerifyOTP')->name("VerifyOTP");
    Route::post('/get-register', 'Registration')->name("user.register");
    Route::post('/get-login-otp', 'SendLoginOtp')->name("user.getLoginOtp");
    Route::post('/get-verifyotp', 'GetVerifyOtp')->name("user.verifyotp");
    Route::get('/send-otp', 'GetVerify')->name("user.sendOtp");
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user-profile', 'profile')->name("user.profile");
});


//error pages
Route::get('/404',[ErrorController::class,'Error404'])->name('ContactUs');

Route::get('/blogs',[BlogController::class,'Blogs'])->name('Blogs');
Route::get('/blog/{slug}',[BlogController::class,'Blog'])->name('Blog');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('brand/{id}',[App\Http\Controllers\BrandController::class,'show'])->name('brand.show');

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/{id}', 'category')->name('category');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'products')->name("products");
    Route::get('/product/{slug}', 'Product_details')->name("product");
});

//Frontend Routes END ******************************************************