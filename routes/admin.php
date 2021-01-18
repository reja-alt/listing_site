<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\SubdistrictController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\SocialPageController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PageController;

Route::middleware('is_admin')->group(function () {
    Route::get('/login', function () {
        return redirect()->route('login');
    });
    Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    
    Route::prefix('admin/home')->group(function () {
        Route::resource('category', CategoryController::class);
        Route::get('category/delete/{id}', [CategoryController::class,'destroy']);
        Route::resource('subcategory',SubcategoryController::class);
        Route::get('subcategory/delete/{id}', [SubCategoryController::class,'destroy']);
        Route::resource('division', DivisionController::class);
        Route::get('division/delete/{id}', [DivisionController::class,'destroy']);
        Route::resource('district', DistrictController::class);
        Route::get('district/delete/{id}', [DistrictController::class,'destroy']);
        Route::resource('subdistrict', SubdistrictController::class);
        Route::get('subdistrict/delete/{id}', [SubdistrictController::class,'destroy']);
        Route::post('filter', [SubdistrictController::class,'filterdistrict'])->name('filter');
        Route::post('filter_edit', [SubdistrictController::class,'filterdistrict_edit'])->name('filter.edit');
        Route::resource('blog', BlogController::class);
        Route::get('blog/delete/{id}', [BlogController::class,'destroy']);
        Route::post('filter_subcategory', [BlogController::class,'filter_subcategory'])->name('filter.subcategory');
        Route::post('filter_subcategory_edit', [BlogController::class,'filter_subcategory_edit'])->name('filter.subcategory.edit');
        Route::resource('faq', FaqController::class);
        Route::get('faq/delete/{id}', [FaqController::class,'destroy']);
        Route::resource('advertisement', AdvertisementController::class);
        Route::get('advertisement/delete/{id}', [AdvertisementController::class,'destroy']);
        Route::resource('vendor', VendorController::class);
        Route::get('index', [UserController::class,'user_index'])->name('user.index');
        Route::get('user/show/{id}', [UserController::class,'show'])->name('user.show');
        Route::get('vendor/delete/{id}', [VendorController::class,'destroy']);
        Route::resource('post', PostController::class);
        Route::get('post/delete/{id}', [PostController::class,'destroy'])->name('post.delete');
        Route::resource('page', PageController::class);
        //Settings
        Route::get('setting/create', [SettingController::class,'create'])->name('setting.create');
        Route::post('setting/store', [SettingController::class,'store'])->name('setting.store');
        Route::get('seo/create', [SeoController::class,'create'])->name('seo.create');
        Route::post('seo/store', [SeoController::class,'store'])->name('seo.store');
        Route::get('social_link/create', [SocialLinkController::class,'create'])->name('social_link.create');
        Route::post('social_link/store', [SocialLinkController::class,'store'])->name('social_link.store');
        Route::get('social_link/create', [SocialLinkController::class,'create'])->name('social_link.create');
        Route::post('social_link/store', [SocialLinkController::class,'store'])->name('social_link.store');
        Route::get('social_page/create', [SocialPageController::class,'create'])->name('social_page.create');
        Route::post('social_page/store', [SocialPageController::class,'store'])->name('social_page.store');
    });
});



