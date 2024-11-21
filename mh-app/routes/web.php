<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Aboutus_controller;
use App\Http\Controllers\Testimonial_controller;
use App\Http\Controllers\Portfolio_controller;
use App\Http\Controllers\Team_controller;
use App\Http\Controllers\Contact_controller;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Link_controller;
use App\Http\Controllers\Banner_controller;
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
/*
Route::get('/dashboard', function () {
    return view('dashboard');
});
*/
 /*Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
   // Add other admin routes here
});
*/
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [Aboutus_controller::class, 'dashboard'])->name('dashboard');
});
Route::get('/', [Aboutus_controller::class, 'show'])->name('service.show');
Route::get('/show/page',[Aboutus_controller::class, 'index'])->name('service.list');
Route::get('/create/service',[Aboutus_controller::class, 'create'])->name('service.create');
Route::post('/service', [Aboutus_controller::class, 'store'])->name('service.store');
Route::get('/services/{service}/edit',[Aboutus_controller::class, 'edit'])->name('service.edit');
Route::put('/services/{service}',[Aboutus_controller::class, 'update'])->name('service.update');
Route::delete('/services/{service}',[Aboutus_controller::class, 'destroy'])->name('service.destroy');



Route::get('/show1',[Testimonial_controller::class, 'index'])->name('testimonial.list');
Route::get('/create/test',[Testimonial_controller::class, 'create'])->name('testimonial.create');
Route::post('/testimonial', [Testimonial_controller::class, 'store'])->name('testimonial.store');
Route::get('/testimonials/{testimonail}/edit',[Testimonial_controller::class, 'edit'])->name('testimonial.edit');
Route::put('/testimonials/{testimonial}',[Testimonial_controller::class, 'update'])->name('testimonial.update');
Route::delete('/testimonials/{testimonial}',[Testimonial_controller::class, 'destroy'])->name('testimonial.destroy');




Route::get('/portfolio/design', [Portfolio_controller::class, 'show1']);
Route::get('/portfolio', [Portfolio_controller::class, 'show']);
Route::get('/show2',[Portfolio_controller::class, 'index'])->name('portfolio.list');
Route::get('/create/port',[Portfolio_controller::class, 'create'])->name('portfolio.create');
Route::post('/portfolios', [Portfolio_controller::class, 'store'])->name('portfolio.store');
Route::get('/portfolios/{portfolio}/edit',[Portfolio_controller::class, 'edit'])->name('portfolio.edit');
Route::put('/portfolios/{portfolio}',[Portfolio_controller::class, 'update'])->name('portfolio.update');
Route::delete('/portfolios/{portfolio}',[Portfolio_controller::class, 'destroy'])->name('portfolio.destroy');

Route::get('/team/show',[Team_controller::class, 'show']);
Route::get('/show3',[Team_controller::class, 'index'])->name('team.list');
Route::get('/create/team',[Team_controller::class, 'create'])->name('team.create');
Route::post('/team', [Team_controller::class, 'store'])->name('team.store');
Route::get('/teams/{team}/edit',[Team_controller::class, 'edit'])->name('team.edit');
Route::put('/teams/{team}',[Team_controller::class, 'update'])->name('team.update');
Route::delete('/teams/{team}',[Team_controller::class, 'destroy'])->name('team.destroy');



Route::get('/create/contact',[Contact_controller::class, 'create'])->name('form.create');
Route::post('/contact', [Contact_controller::class, 'store'])->name('form.store');
Route::get('/deatilproduct',[Contact_controller::class, 'detailofallproduct'])->name('form.list');
Route::delete('/contacts/{id}',[Contact_controller::class, 'destroy'])->name('form.destroy');


Route::get('/notifications/all', [NotificationController::class, 'showAll'])->name('notifications.all');
Route::post('/notifications/read/{id}', [NotificationController::class, 'markAsReadAjax'])->name('notifications.readAjax');
Route::get('/contact/search', [Contact_controller::class, 'search'])->name('contact.search');
Route::get('/portfolio/search', [Portfolio_controller::class, 'search'])->name('portfolio.search');
Route::get('/service/search', [Aboutus_controller::class, 'search'])->name('service.search');
Route::get('/team/search', [Team_controller::class, 'search'])->name('team.search');
Route::get('/testimonials/search', [Testimonial_controller::class, 'search'])->name('testimonials.search');


Route::get('/show4',[Link_controller::class, 'index'])->name('link.list');
Route::get('/create/link',[Link_controller::class, 'create'])->name('link.create');
Route::post('/link', [Link_controller::class, 'store'])->name('link.store');
Route::get('/links/{link}/edit',[Link_controller::class, 'edit'])->name('link.edit');
Route::put('/links/{link}',[Link_controller::class, 'update'])->name('link.update');
Route::delete('/links/{link}',[Link_controller::class, 'destroy'])->name('link.destroy');




Route::get('banners', [Banner_controller::class, 'index'])->name('banners.list');  
Route::get('banners/create', [Banner_controller::class, 'create'])->name('banners.create'); 
Route::post('banners', [Banner_controller::class, 'store'])->name('banners.store');  
Route::get('banners/{id}/edit', [Banner_controller::class, 'edit'])->name('banners.edit'); 
Route::put('banners/{id}', [Banner_controller::class, 'update'])->name('banners.update');  
Route::delete('banners/{id}', [Banner_controller::class, 'destroy'])->name('banners.destroy');  