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
Route::get('/clubProductDetail', function () {
    return view('clubProductDetail');
});


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//testing login and register for myself
//Route::get('/loginPage', [App\Http\Controllers\LoginController::class, 'change'])->name('loginPage');

//Route::get('/registerPage', [App\Http\Controllers\RegisterController::class, 'change'])->name('registerPage');

//Route::post('/registerPage/store', [App\Http\Controllers\RegisterController::class, 'add'])->name('addNewAccount');

//Route::post('/index', [App\Http\Controllers\LoginController::class, 'check'])->name('checkStudentId');
//end

//get the user information 
Route::get('/profile/{userId}', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
// update the user information
Route::post('/profile/{userId}', [App\Http\Controllers\ProfileController::class, 'update'])->name('updateInformation');

//view the club product follow the club id
Route::get('/viewClubProduct/{id}', [App\Http\Controllers\ProductController::class, 'viewClubProduct'])->name('viewClubProduct');

//club crud
//manage club for checking
Route::get('/manageClub', [App\Http\Controllers\ClubController::class, 'manageClub'])->name('manageClub');

//add new club
Route::post('/clubs/store', [App\Http\Controllers\ClubController::class, 'addNewClub'])->name('addNewClub');

//edit the club
Route::get('/editClub/{id}', [App\Http\Controllers\ClubController::class, 'edit'])->name('editClub');

//update the club information
Route::post('/updateClub', [App\Http\Controllers\ClubController::class, 'update'])->name('updateClub');

//delete the club
Route::get('/deleteClub/{id}', [App\Http\Controllers\ClubController::class, 'delete'])->name('deleteClub');


//club product crud
//manage club product for checking
Route::get('/manageClubProduct', [App\Http\Controllers\ProductController::class, 'manageClubProduct'])->name('manageClubProduct');

//add new club product
Route::post('/addClubProduct/store', [App\Http\Controllers\ProductController::class, 'addNewProduct'])->name('addNewProduct');

//edit the club product
Route::get('/editClubProduct/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('editClubProduct');

//update the club product information
Route::post('/updateClubProduct', [App\Http\Controllers\ProductController::class, 'update'])->name('updateClubProduct');

//delete the club
Route::get('/deleteClubProduct/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('deleteClubProduct');

//product detail
Route::get('/clubProductDetail/{id}', [App\Http\Controllers\ProductController::class, 'clubProductDetail'])->name('clubProduct.Detail');

//add to cart and update to database
Route::post('/myCart', [App\Http\Controllers\CartController::class, 'add'])->name('add.to.cart');

//output all cart item in my cart page and follow user id
Route::get('/myCart', [App\Http\Controllers\CartController::class, 'view'])->name('myCart');

//
Route::get('/payment', [App\Http\Controllers\OrderController::class, 'add'])->name('add.to.order');



