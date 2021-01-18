<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\Frontend\CommentController;

Route::get('/', function () {
    return redirect()->route('frontend.index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('frontend_index', [FrontendController::class,'index'])->name('frontend.index');
Route::get('subcategory_posts/{slug}', [FrontendController::class,'subcategory_posts'])->name('subcategory.post');
Route::get('category_posts/{slug}', [FrontendController::class,'category_posts'])->name('category.post');
Route::get('all_posts',  [FrontendController::class,'all_posts'])->name('all.post');
Route::get('division_posts/{slug}',  [FrontendController::class,'division_posts'])->name('division.post');
Route::get('district_posts/{slug}',  [FrontendController::class,'district_posts'])->name('district.post');
Route::get('faq',  [FrontendController::class,'faqs'])->name('faq');
Route::get('user-login', [LoginController::class,'login'])->name('user.login');
Route::resource('user_post', PostController::class);
Route::get('vendor_post/{id}', [PostController::class,'vendor_post'])->name('vendor.post');
Route::get('user_post/delete/{id}', [PostController::class,'destroy']);
Route::post('filter_subcategory', [PostController::class,'filter_subcategory'])->name('post.filter.subcategory');
Route::post('filter_district', [PostController::class,'filter_district'])->name('post.filter.district');
Route::post('filter_subdistrict', [PostController::class,'filter_subdistrict'])->name('post.filter.subdistrict');
Route::get('review_show/{id}', [ReviewController::class,'show'])->name('review.show');
Route::post('review_store', [ReviewController::class,'store'])->name('review.store');
Route::get('blog-index', [BlogController::class,'index'])->name('blog.index');
Route::get('category_blog-index/{slug}', [BlogController::class,'category_blogs'])->name('category.blog.show');
Route::get('single-blog/{slug}', [BlogController::class,'show'])->name('single.blog');
// Route::get('comment-show/{id}', [CommentController::class,'show'])->name('comment.show');
Route::post('comment-store', [CommentController::class,'store'])->name('comment.store');








































