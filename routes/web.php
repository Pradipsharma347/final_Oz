<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\BlogController;

// Frontend Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/service', [HomeController::class, 'service'])->name('service');
Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/ielts', [HomeController::class, 'ielts'])->name('ielts');
Route::get('/pte', [HomeController::class, 'pte'])->name('pte');
Route::get('/australia', [HomeController::class, 'australia'])->name('australia');
Route::get('/contactus', [HomeController::class, 'contactus'])->name('contactus');

// Contact Form POST route
Route::post('/enquiry', [HomeController::class, 'storeEnquiry'])->name('enquiry.store');

// Admin login
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Contact submit
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

// Delete contact
Route::get('/admin/contact/delete/{id}', [AdminController::class, 'deleteContact'])->name('admin.contact.delete');

// Testimonials
Route::post('/admin/testimonial/store', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
Route::get('/admin/testimonial/delete/{id}', [TestimonialController::class, 'delete'])->name('admin.testimonial.delete');
Route::get('/testimonial', [HomeController::class, 'testimonial'])->name('website.testimonial');

// Blogs
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');              // Blog list
Route::get('/blog/{id}', [HomeController::class, 'showBlog'])->name('blog.show'); // Single blog page
Route::post('/admin/blog/store', [BlogController::class, 'store'])->name('admin.blog.store');
Route::get('/admin/blog/delete/{id}', [BlogController::class, 'destroy'])->name('admin.blog.delete');

// Update CEO Name & Message
Route::post('/admin/ceo/info', [AdminController::class, 'updateCEOInfo'])->name('admin.ceo.info');

// Upload / Replace CEO Image
Route::post('/admin/ceo/update-image', [AdminController::class, 'updateCEOImage'])->name('admin.ceo.update.image');

// Delete CEO Image
Route::delete('/admin/ceo/delete-image', [AdminController::class, 'deleteCEOImage'])->name('admin.ceo.delete.image');

// Team Routes
Route::post('admin/team/store', [AdminController::class, 'storeTeam'])->name('admin.team.store');
Route::get('admin/team/edit/{id}', [AdminController::class, 'editTeam'])->name('admin.team.edit');
Route::post('admin/team/update/{id}', [AdminController::class, 'updateTeam'])->name('admin.team.update');
Route::get('admin/team/delete/{id}', [AdminController::class, 'deleteTeam'])->name('admin.team.delete');



