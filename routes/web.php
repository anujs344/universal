<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminContorller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BannerController;
use App\Models\Product;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\WishlistController;

use App\Http\Controllers\CareerCategoryController;
use App\Http\Controllers\AvailableCareersController;
use App\Models\AvailableCareers;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\OfferController;
use App\Models\Banner;
use App\Http\Controllers\MediaCoverageController;
use App\Models\MediaCoverage;
use App\Models\Category;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    $products = Product::where('status',1)->where('showontop',1)->limit(4)->get();
    $banners = Banner::where('status',1)->get();
    $medias = MediaCoverage::where('status',1)->get();
    $ourproducts = Product::where('status',1)->where('showontop',0)->limit(4)->get();;
    return view('welcome',compact('products','banners','medias','ourproducts'));
})->name('Home');

//USER LOGIN
Route::post('register',[AuthController::class,'create'])->name('register');
Route::post('login',[AuthController::class,'check'])->name('login');
Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('googlecall');
Route::get('callback/google', [AuthController::class, 'handleCallback']);
Route::get('/facebookredirect', [AuthController::class,'facebookredirect'])->name('facebookcall');
Route::get('/facebookcallback', [AuthController::class,'facebookcallback']);


//ADMIN LOGIN
Route::get('admin/login',[AdminAuthController::class,'show'])->name('admin.login.show');
Route::post('admin/login',[AdminAuthController::class,'check'])->name('admin.login');


Route::middleware('checkuser')->group(function(){

    Route::prefix('user')->group(function(){
        Route::prefix('cart')->group(function(){
            Route::post('add',[CartController::class,'add'])->name('cart.add');
            Route::get('show',[CartController::class,'show'])->name('cart.show');
            Route::post('increasequantity/{id}',[CartController::class,'increasequantity'])->name('cart.increase');
            Route::post('decreasequantity/{id}',[CartController::class,'decreasequantity'])->name('cart.decrease');
            Route::get('delete/{id}',[CartController::class,'delete'])->name('cart.delete');
            Route::post('checkout',[CartController::class,'checkout'])->name('user.checkout');
            Route::post('placeorder',[CartController::class,'placeorder'])->name('user.place.order');
            Route::get('trackorder',[CartController::class,'trackorder'])->name('user.trackorder');
        });
    
        Route::prefix('wishlist')->group(function(){
            Route::get('show',[WishlistController::class,'show'])->name('wishlist.show');
            Route::post('add',[WishlistController::class,'add'])->name('wishlist.add');
            Route::get('delete/{id}',[WishlistController::class,'delete'])->name('wishlist.delete');
            Route::get('addtocart/{id}',[WishlistController::class,'addtocart'])->name('wishlist.addtocart');
            Route::get('addalltocart',[WishlistController::class,'addalltocart'])->name('wishlist.addalltocart');
        });
        
        Route::get('/contactus',[ContactusController::class,'show'])->name('contactus.show');
        Route::post('/contactus',[ContactusController::class,'create'])->name('contactus.create');
    
        Route::prefix('product')->group(function(){
            Route::get('show',[UserProductController::class,'show'])->name('guest.product.show');
        });
    
        Route::prefix('career')->group(function(){
            Route::get('show',[CareerController::class,'show'])->name('user.career.show');
            Route::post('add',[CareerController::class,'add'])->name('user.career.add');
            Route::post('filter',[CareerController::class,'filter'])->name('user.career.filter');
        });

        Route::prefix('profile')->group(function(){
            Route::get('show',[ProfileController::class,'show'])->name('profile.show');
            Route::get('edit',[ProfileController::class,'edit'])->name('profile.edit');
            Route::get('history/{id?}',[ProfileController::class,'history'])->name('profile.history');
            Route::get('trackorder/{id?}',[ProfileController::class,'trackorder'])->name('profile.trackorder');
            Route::get('getcoupns',[ProfileController::class,'shwocoupons'])->name('profile.coupons');
            Route::post('update',[ProfileController::class,'update'])->name('profile.update');
        });
    });

    
    Route::get('user/logout',function(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('Home');
        }
        return redirect()->route('Home');
    })->name('user.logout');
});











Route::middleware('checkadmin')->group(function () {
    
    
    Route::prefix('admin')->group(function(){
        Route::get('dashboard',[AdminContorller::class,'showdashboard'])->name('Admin.Dashboard');
        Route::prefix('product')->group(function(){
            Route::get('list',[ProductController::class,'list'])->name('product.list');
        });
        Route::prefix('category')->group(function(){
            Route::get('list',[CategoryController::class,'list'])->name('category.list');
            Route::get('show',[CategoryController::class,'show'])->name('category.show');
            Route::post('add',[CategoryController::class,'add'])->name('category.add');
            Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
            Route::post('update',[CategoryController::class,'update'])->name('category.update');
            Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
        });

        Route::prefix('product')->group(function(){
            Route::get('list',[ProductController::class,'list'])->name('product.list');
            Route::get('show',[ProductController::class,'show'])->name('product.show');
            Route::post('add',[ProductController::class,'add'])->name('product.add');
            Route::get('edit/{id}',[ProductController::class,'edit'])->name('product.edit');
            Route::post('update',[ProductController::class,'update'])->name('product.update');
            Route::get('delete/{id}',[ProductController::class,'delete'])->name('product.delete');
        });
        Route::prefix('banner')->group(function(){
            Route::get('list',[BannerController::class,'list'])->name('banner.list');
            Route::get('show',[BannerController::class,'show'])->name('banner.show');
            Route::post('add',[BannerController::class,'add'])->name('banner.add');
            Route::get('edit/{id}',[BannerController::class,'edit'])->name('banner.edit');
            Route::post('update',[BannerController::class,'update'])->name('banner.update');
            Route::get('delete/{id}',[BannerController::class,'delete'])->name('banner.delete');
        });

        Route::prefix('careercategory')->group(function(){
            Route::get('list',[CareerCategoryController::class,'list'])->name('careercategory.list');
            Route::get('show',[CareerCategoryController::class,'show'])->name('careercategory.show');
            Route::post('add',[CareerCategoryController::class,'add'])->name('careercategory.add');
            Route::get('edit/{id}',[CareerCategoryController::class,'edit'])->name('careercategory.edit');
            Route::post('update',[CareerCategoryController::class,'update'])->name('careercategory.update');
            Route::get('delete/{id}',[CareerCategoryController::class,'delete'])->name('careercategory.delete');

        });

        Route::prefix('career')->group(function(){
            Route::get('list',[AvailableCareersController::class,'list'])->name('career.list');
            Route::get('show',[AvailableCareersController::class,'show'])->name('career.show');
            Route::post('add',[AvailableCareersController::class,'add'])->name('career.add');
            Route::get('edit/{id}',[AvailableCareersController::class,'edit'])->name('career.edit');
            Route::post('update',[AvailableCareersController::class,'update'])->name('career.update');
            Route::get('delete/{id}',[AvailableCareersController::class,'delete'])->name('career.delete');
            Route::prefix('form')->group(function(){
                Route::get('show\{id}',[AvailableCareersController::class,'showform'])->name('career.form.show');
                Route::get('delete\{id}',[AvailableCareersController::class,'deleteform'])->name('career.form.delete');

            });


        });

        Route::prefix('offers')->group(function(){
            Route::get('list',[OfferController::class,'list'])->name('offer.list');
            Route::get('show',[OfferController::class,'show'])->name('offer.show');
            Route::post('add',[OfferController::class,'add'])->name('offer.add');
            Route::get('edit/{id}',[OfferController::class,'edit'])->name('offer.edit');
            Route::post('update',[OfferController::class,'update'])->name('offer.update');
            Route::get('delete/{id}',[OfferController::class,'delete'])->name('offer.delete');
        });

        Route::prefix('media')->group(function(){
            Route::get('list',[MediaCoverageController::class,'list'])->name('media.list');
            Route::get('show',[MediaCoverageController::class,'show'])->name('media.show');
            Route::post('add',[MediaCoverageController::class,'add'])->name('media.add');
            Route::get('edit/{id}',[MediaCoverageController::class,'edit'])->name('media.edit');
            Route::post('update',[MediaCoverageController::class,'update'])->name('media.update');
            Route::get('delete/{id}',[MediaCoverageController::class,'delete'])->name('media.delete');
        });

    });   
        
    Route::get('logout',function(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('Home');
        }
        return redirect()->route('admin.login');
    })->name('Admin.Logout');
});

