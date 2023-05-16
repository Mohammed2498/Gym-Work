<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\SubscriptionController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(callback: function () {
    Route::resource('/subscribers', SubscriberController::class);
    Route::get('/subscriptions', [SubscriptionController::class,'index'])->name('subscriptions.index');
    Route::get('/subscriptions/create/{subscriber_id}', [SubscriptionController::class,'create'])->name('subscriptions.create');
    Route::post('/subscriptions/store', [SubscriptionController::class, 'store'])->name('subscriptions.store');

});


require __DIR__ . '/auth.php';
