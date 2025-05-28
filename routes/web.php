<?php

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\Auth\CategoryController;
use App\Http\Controllers\WebsiteController;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





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

Route::get('/', [WebsiteController::class, 'home'])->name('website.home');
Route::get('/admin/dashboard', function () {
    return view('auth.dashboard');
});
route::get('/about', [WebsiteController::class, 'about'])->name('website.about');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('website.contact');
Route::get('/coming_soon', function () {
    return view('website.coming_soon');
})->name('website.coming_soon');
route::get('/notFound', [WebsiteController::class, 'notFound'])->name('website.404');
Route::get('/faq', function () {
    return view('website.faq');
})->name('website.faq');
Route::get('/service', [WebsiteController::class, 'service'])->name('website.service');
route::get('/pricing', [WebsiteController::class, 'pricing'])->name('website.pricing'); // Added
Route::get('/blog/{id}', [WebsiteController::class, 'show'])->name('website.post.show');
Route::get('/about', [WebsiteController::class, 'about'])->name('website.about');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('website.contact');
Route::get('/blog', [WebsiteController::class, 'blog'])->name('website.blog');
Route::get('/blog/category/{category}', [WebsiteController::class, 'category'])->name('website.category');
Route::get('/portfolio', [WebsiteController::class, 'portfolio'])->name('website.portfolio');
Route::get('/portfolio/single', [WebsiteController::class, 'portfolioSingle'])->name('website.portfolio_single');

Auth::routes();

Route::get('/auth/dashboard', [DashboardController::class, 'dashboard'])->name('auth.dashboard')->middleware('auth');

////////////start post routes
Route::get('/auth/post', [PostController::class, 'index'])->name('auth.posts')->middleware('auth');
Route::get('/auth/post/create', [PostController::class, 'create'])->name('auth.post.create')->middleware('auth');
Route::post('/auth/post', [PostController::class, 'store'])->name('auth.post.store')->middleware('auth');

Route::get('/auth/post/publish/{post}', [PostController::class, 'publish'])->name('auth.post.publish')->middleware('auth');
Route::get('/auth/post/{post}', [PostController::class, 'show'])->name('auth.post.show')->middleware('auth');
Route::get('/auth/post/{post}/edit', [PostController::class, 'edit'])->name('auth.post.edit')->middleware('auth');
Route::put('/auth/post/{post}', [PostController::class, 'update'])->name('auth.post.update')->middleware('auth');
Route::delete('/auth/post/{post}', [PostController::class, 'destroy'])->name('auth.post.destroy')->middleware('auth');
//////////end post routes

/////////start category routes
Route::get('/auth/category', [CategoryController::class, 'index'])->name('auth.category')->middleware('auth');
Route::get('/auth/category/create', [CategoryController::class, 'create'])->name('auth.category.create')->middleware('auth');
Route::post('/auth/category', [CategoryController::class, 'store'])->name('auth.category.store')->middleware('auth');
Route::get('/auth/category/{id}', [CategoryController::class, 'show'])->name('auth.category.show')->middleware('auth');
Route::get('/auth/category/{id}/edit', [CategoryController::class, 'edit'])->name('auth.category.edit')->middleware('auth');
Route::put('/auth/category/{id}', [CategoryController::class, 'update'])->name('auth.category.update')->middleware('auth');
Route::delete('/auth/category/{id}', [CategoryController::class, 'destroy'])->name('auth.category.destroy')->middleware('auth');
/////////end category routes
