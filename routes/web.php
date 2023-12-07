<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\ProductController;
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

//error pages
Route::get('/404',[ErrorController::class,'Error404'])->name('ContactUs');

Route::get('/blogs',[BlogController::class,'Blogs'])->name('Blogs');
Route::get('/blog/{slug}',[BlogController::class,'Blog'])->name('Blog');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [OtpController::class, 'profile'])->name('user.profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('isLogin')->group(function () {
    Route::post('verify-mail',[OtpController::class,'login'])->name('user.sverifymail');
    Route::post('register-mail',[OtpController::class,'register'])->name('user.register');
});
Route::match(['get', 'post'],'verify-otp',[OtpController::class,'verifyOTP'])->name('user.verifyotp');
Route::get('resend-otp/{id}',[OtpController::class,'resendVerifyOTP'])->name('user.sendOtp');
Route::get('logout',[OtpController::class,'logout'])->name('user.logout');

Route::get('showView',[OtpController::class,'showView'])->name('showView');

Route::get('brand/{id}',[App\Http\Controllers\BrandController::class,'show'])->name('brand.show');

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/{id}', 'category')->name('category');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'products')->name("products");
    Route::get('/product/{slug}', 'Product_details')->name("product");
});

//Frontend Routes END ******************************************************