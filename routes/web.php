<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\siteController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
// use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;


// Registration Routes

// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);


// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Password Reset Routes
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset']);

Route::get('/home', [adminController::class, 'index'])->name('home');


// Site Routes
// Home route for authenticated users
Route::get('/', [siteController::class, 'index'])->name('home');



// Product Routes
// Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::post('/products/{product}', [ProductController::class, 'update'])->name('products.update');



Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/data', [BlogController::class, 'getBlogs'])->name('blogs.data');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
Route::get('blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blogs/{blog}', 'BlogController@show')->name('blogs.show');


Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index');
Route::get('/sliders/create', [SliderController::class, 'create'])->name('sliders.create');
Route::post('/sliders', [SliderController::class, 'store'])->name('sliders.store');
Route::get('/sliders/{id}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
Route::put('/sliders/{id}', [SliderController::class, 'update'])->name('sliders.update');
Route::delete('/sliders/{id}', [SliderController::class, 'destroy'])->name('sliders.destroy');

// Routes for managing categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');