<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Home\AboutContentController;
use App\Http\Controllers\Home\BannerSectionController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(AdminProfileController::class)->group(function(){
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile', 'editProfile')->name('edit.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/store/profile', 'storeProfile')->name('store.profile');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});

Route::controller(BannerSectionController::class)->group(function(){
    Route::get('/home/banner', 'HomeBanner')->name('home.banner');
    Route::post('/update/banner', 'UpdateBanner')->name('update.banner');
});
Route::controller(AboutContentController::class)->group(function(){
    Route::post('/update/about-content', 'UpdateContent')->name('update.about-content');
    Route::post('/update/multi-image', 'UpdateMultiImage')->name('update.multi-image');
    Route::get('/edit/multi-image/{id}', 'EditMultiImage')->name('edit.multi-image');
    Route::get('/delete/multi-image/{id}', 'DeleteMultiImage')->name('delete.multi-image');
    Route::post('/update/image', 'UpdateImage')->name('update.image');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
