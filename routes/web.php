<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\KategoriController;


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



Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('about', 'about')->name('about');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');

});

// routes/web.php

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/AdminDashboard', [AdminController::class, 'Admin'])->name('AdminDashboard');   
    Route::get('/profileAdmin', [AuthController::class, 'profileAdmin'])->name('profileAdmin');
    Route::post('/profileAdmin', [AuthController::class, 'updateProfileAdmin'])->name('profileAdmin.update');
    
  
});

Route::prefix('users')->group(function () {
    
});

Route::prefix('events')->group(function () {
    Route::get('events', [EventController::class, 'index'])->name('events.index');
    Route::get('create', [EventController::class, 'create'])->name('events.create');
    Route::post('store', [EventController::class, 'store'])->name('events.store');
    Route::get('show/{id}', [EventController::class, 'show'])->name('events.show');
    Route::get('edit/{id}', [EventController::class, 'edit'])->name('events.edit');
    Route::put('update/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('destroy/{id}', [EventController::class, 'destroy'])->name('events.destroy');
});

Route::prefix('kategori')->group(function () {
    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('show/{id}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
});



Route::controller(FestivalController::class)->prefix('festivals')->group(function () {
    Route::get('', 'index')->name('festivals');
});


Route::middleware(['auth', 'role:Event'])->group(function () {
    Route::get('/EventDashboard', [AuthController::class, 'EventDashboard'])->name('EventDashboard');
    Route::get('/profileEvent', [AuthController::class, 'profileEvent'])->name('profileEvent');
    Route::post('/profileEvent', [AuthController::class, 'updateProfileEvent'])->name('profileEvent.update');
   
});

Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/UserDashboard', [AuthController::class, 'UserDashboard'])->name('UserDashboard');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::get('event/details/{id}', [AuthController::class, 'showUserDetails'])->name('event.details');
});

