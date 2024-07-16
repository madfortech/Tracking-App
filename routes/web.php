<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
 
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
    
    return view('index');
});


// Admin Routes
Route::group(['middleware' => ['auth','role:admin']], function () { 

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth'])->name('admin.dashboard');
 
  
});

// User Routes
Route::group(['middleware' => ['auth']], function () { 

    Route::get('/dashboard', function () {
       
        return view('dashboard');
    })->name('user.dashboard');
 

 
});

 


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
