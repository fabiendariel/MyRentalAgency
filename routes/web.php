<?php

use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PropertyController;
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
$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('testimonials');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact/send', [HomeController::class, 'contactSend'])
->name('contact.send');

Route::get('/property', [PropertyController::class, 'index'])
->name('property.index');
Route::get('/property/{slug}-{property}', [PropertyController::class, 'show'])
->name('property.show')->where([
    'property' => $idRegex,
    'slug' => $slugRegex
]);
Route::post('/property/{property}/contact', [PropertyController::class, 'contact'])
->name('property.contact')->where(['property' => $idRegex]);

Route::get('/login', [AuthController::class, 'login'])
->middleware('guest')
->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::delete('/logout', [AuthController::class, 'logout'])
->middleware('auth')
->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('property', AdminPropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});

Route::get('/images/{path}', [ImageController::class, 'show']);

Route::fallback(function() {
   return view('404'); // 404 Error View
});