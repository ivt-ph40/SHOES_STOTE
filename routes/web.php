<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

//Show homepage
Route::get('/', 'HomeController@index')->name('home');

//Show product's detail
Route::get('/product/{id}', 'ProductController@show')->name('product-detail');

//Show form contact us
Route::get('/contact-us', 'ContactController@showContactForm')->name('contact-form');

//Submit contact
Route::post('/contact-us', 'ContactController@sendMail')->name('send-contact');

//Show cart
Route::get('/cart', 'CartController@showCart')->name('show-cart');
Route::get('/cartAjax', 'CartController@showCartAjax');

//Add to cart
Route::post('/cart', 'CartController@addCart')->name('add-cart');

//Show all men shoes
Route::get('/all-men-shoes', 'ProductController@showAllMenShoes')->name('all-men-shoes-list');

//Show all women shoes
Route::get('/all-women-shoes', 'ProductController@showAllWomenShoes')->name('all-women-shoes-list');

//Show list of products
Route::get('/product-list', function(){
    return view('users.product-listing');
})->name('product-list');

//Show order detail
Route::get('/checkout', function(){
    return view('users.checkout');
})->name('checkout');

//Show favorite product list
Route::get('/wishlist', function(){
    return view('users.wishlist');
})->name('wishlist');

//Compare products
Route::get('/compare', function(){
    return view('users.compare');
})->name('compare');

//Show company info
Route::get('/company', function(){
    return view('users.about');
})->name('company-info');

//Show 404 page
Route::get('/404', function(){
    return view('users.404');
})->name('notfound');

//Show profile
Route::get('/profile', function(){
    return view('users.profile');
})->name('profile');



