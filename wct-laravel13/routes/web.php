<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::resource('/products', ProductController::class);
Route::get('/testimonials', [TestimonialsController::class, 'index'])->name('testimonials');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
