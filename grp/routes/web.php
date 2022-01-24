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

/*Route::get('/', function () {
    return view('welcome');
});
*/

//for the addClub.blade.php
Route::get('/addClub', function () {
    return view('addClub');
});
//for the addClubProduct.blade.php and get the club id
Route::get('/addClubProduct', function () {
    return view('addClubProduct',['clubId' => App\Models\Club::all()]);
});
//for the viewClubProduct.blade.php 
Route::get('/viewClubProduct', function () {
    return view('viewClubProduct');
});
//for the clubProductDetail.blade.php 
Route::get('/clubProductDetail', function () {
    return view('clubProductDetail');
});
//for the invoicePDF.blade.php 
Route::get('/invoicePDF', function () {
    return view('invoicePDF');
});


Auth::routes();


//laravel initial code for the home.blade.php
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//get the user information in the profile.blade.php
Route::get('/profile/{userId}', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');

// update the user information
//Route::post('/profile/{userId}', [App\Http\Controllers\ProfileController::class, 'update'])->name('updateInformation');

//view the club product follow the club id in the viewClubProduct.blade.php
Route::get('/viewClubProduct/{id}', [App\Http\Controllers\ProductController::class, 'viewClubProduct'])->name('viewClubProduct');

//view all product in product.blade.php
Route::get('/product', [App\Http\Controllers\ProductController::class, 'product'])->name('product');
Route::get('/', [App\Http\Controllers\ProductController::class, 'product'])->name('product');

//////////////////club crud//////////////////////////////////////////
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
///////////////end crud///////////////////////////////////////////////

//////////////club product crud//////////////////////////////////////
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
///////////////////////end crud////////////////////////////////////

//product detail in clubProductDetail.blade.php
Route::get('/clubProductDetail/{id}', [App\Http\Controllers\ProductController::class, 'clubProductDetail'])->name('clubProduct.Detail');

//add to cart and update to database and go back to the myCart.blade.php
Route::post('/myCart', [App\Http\Controllers\CartController::class, 'add'])->name('add.to.cart');

//output all cart item in my cart page and follow user id in myCart.blade.php
Route::get('/myCart', [App\Http\Controllers\CartController::class, 'view'])->name('myCart');

//add order and then go to payment.blade.php
Route::post('/payment', [App\Http\Controllers\OrderController::class, 'addOrder'])->name('add.new.order');

//create payment and done the payment will be back to myCart.blade.php
Route::post('/myCart', [App\Http\Controllers\PaymentController::class, 'paymentPost'])->name('payment.post');

//view all order for payment status done in viewOrder.blade.php
Route::get('/viewOrder', [App\Http\Controllers\OrderController::class, 'viewOrder'])->name('viewOrder');

//print invoice for pdf in the invoicePDF.blade.php
Route::get('/invoicePDF/{id}', [App\Http\Controllers\OrderController::class, 'printInvoice'])->name('printInvoice');
