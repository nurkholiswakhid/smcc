<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\fotoController;
use App\Http\Controllers\photoController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VideoViewController;
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

Route::get('/',[AppController::class,'index']
);

Route::get('/video', [VideoViewController::class, 'index'])->name('video.index');

Route::get('/berita',[BeritaController::class,'berita']
);

Route::get('/detail/{slug}', [BeritaController::class,'detail']
);

Route::get('/foto',[fotoController::class,'foto']
);

Route::get('/contact',[contactController::class,'contact']
);


Route::get('/profil', [profilController::class, 'profil'])->name('profil');




Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout',[AuthController::class, 'logout']);

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard')->middleware('auth');


Route::get('/blog',[BlogController::class,'index'])->name('blog')->middleware('auth');
Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create')->middleware('auth');
Route::post('/blog/store',[BlogController::class,'store'])->name('blog.store')->middleware('auth');
Route::get('/blog/edit/{id}',[BlogController::class,'edit'])->name('blog.edit')->middleware('auth');
Route::post('/blog/update/{id}',[BlogController::class,'update'])->name('blog.update')->middleware('auth');
Route::delete ('/blog/destroy/{id}',[BlogController::class,'destroy'])->name('blog.destroy')->middleware('auth');

Route::get('/photo',[photoController::class,'index'])->name('photo')->middleware('auth');
Route::post('/photo/store',[photoController::class,'store'])->name('photo.store')->middleware('auth');
Route::patch('/photo/update/{id}',[photoController::class,'update'])->name('photo.update')->middleware('auth');
Route::delete ('/photo/destroy/{id}',[photoController::class,'destroy'])->name('photo.destroy')->middleware('auth');

Route::get('/tentang', [TentangController::class, 'tentang'])->name('tentang')->middleware('auth');
Route::put('/admin/tentang/update-profile', [TentangController::class, 'updateProfile'])->name('admin.tentang.updateProfile')->middleware('auth');
Route::put('/admin/tentang/update-vision-mission', [TentangController::class, 'updateVisionMission'])->name('admin.tentang.updateVisionMission')->middleware('auth');
Route::put('/admin/tentang/update-video', [TentangController::class, 'updateVideo'])->name('admin.tentang.updateVideo')->middleware('auth');




Route::get('/add_video', [VideoController::class, 'index'])->name('add_video')->middleware('auth');

Route::get('/add_video/create', [VideoController::class, 'create'])->name('add_video.create')->middleware('auth');

Route::post('/add_video/store', [VideoController::class, 'store'])->name('add_video.store')->middleware('auth');

Route::get('/add_video/{id}/edit', [VideoController::class, 'edit'])->name('add_video.edit')->middleware('auth');


Route::put('/add_video/{id}', [VideoController::class, 'update'])->name('add_video.update')->middleware('auth');


Route::delete('/add_video/{id}', [VideoController::class, 'destroy'])->name('add_video.destroy')->middleware('auth');

