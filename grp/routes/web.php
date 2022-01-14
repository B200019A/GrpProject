<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/loginPage', function () {
    return view('loginPage');
});

Route::get('/registerPage', function () {
    return view('registerPage');
});

Route::get('/layout', function () {
    return view('layout');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/addClub', function () {
    return view('addClub');
});
Route::get('/addClubProduct', function () {
    return view('addClubProduct',['clubId' => App\Models\Club::all()]);
});
Route::get('/viewClubProduct', function () {
    return view('viewClubProduct');
});


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//testing login and register for myself
//Route::get('/loginPage', [App\Http\Controllers\LoginController::class, 'change'])->name('loginPage');

//Route::get('/registerPage', [App\Http\Controllers\RegisterController::class, 'change'])->name('registerPage');

//Route::post('/registerPage/store', [App\Http\Controllers\RegisterController::class, 'add'])->name('addNewAccount');

//Route::post('/index', [App\Http\Controllers\LoginController::class, 'check'])->name('checkStudentId');
//end

Route::get('/profile/{userId}', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');

Route::post('/profile/{userId}', [App\Http\Controllers\ProfileController::class, 'update'])->name('updateInformation');

Route::post('/clubs/store', [App\Http\Controllers\ClubController::class, 'addNewClub'])->name('addNewClub');

Route::post('/addClubProduct/store', [App\Http\Controllers\ProductController::class, 'addNewProduct'])->name('addNewProduct');

Route::get('/viewClubProduct/{id}', [App\Http\Controllers\ProductController::class, 'viewClubProduct'])->name('viewClubProduct');
