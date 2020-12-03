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

//Search product
Route::post('/search-product', 'ProductController@search')->name('search-product');

//Show product's detail
Route::get('/product/{id}', 'ProductController@show')->name('product-detail');

//Show form contact us
Route::get('/contact-us', 'ContactController@showContactForm')->name('contact-form');

//Submit contact
Route::post('/contact-us', 'ContactController@sendMail')->name('send-contact');

//Show cart
Route::get('/cart', 'CartController@showCart')->name('show-cart');
Route::post('/cart/update/quantity', 'CartController@updateQuantity')->name('cart.update.quantity');

//Add to cart
Route::post('/cart', 'CartController@addCart')->name('add-cart');

//Show order info
Route::get('/checkout', 'OrderController@showOrderInfo')->name('checkout');

//Submit order
Route::post('/place-order','OrderController@submitOrder')->name('submit-order');

//Remove cart
Route::get('/cart_remove', 'CartController@cart_remove')->name('cart_remove');

//Show all men shoes
Route::get('/all-men-shoes', 'ProductController@showAllMenShoes')->name('all-men-shoes-list');

//Show lifestyle shoes of men
Route::get('/lifestyle-men-shoes', 'ProductController@showLifestyleMenShoes')->name('lifestyle-men-shoes-list');

//Show running shoes of men
Route::get('/running-men-shoes', 'ProductController@showRunningMenShoes')->name('running-men-shoes-list');

//Show training shoes of men
Route::get('/training-men-shoes', 'ProductController@showTrainingMenShoes')->name('training-men-shoes-list');

//Show football shoes of men
Route::get('/football-men-shoes', 'ProductController@showFootballMenShoes')->name('football-men-shoes-list');

//Show Nike's men shoes
Route::get('/Nike-men-shoes', 'ProductController@showNikeMenShoes')->name('Nike-men-shoes-list');

//Show Adidas's men shoes
Route::get('/Adidas-men-shoes', 'ProductController@showAdidasMenShoes')->name('Adidas-men-shoes-list');

//Show all women shoes
Route::get('/all-women-shoes', 'ProductController@showAllWomenShoes')->name('all-women-shoes-list');

//Show lifestyle shoes of women
Route::get('/lifestyle-women-shoes', 'ProductController@showLifestyleWomenShoes')->name('lifestyle-women-shoes-list');

//Show running shoes of women
Route::get('/running-women-shoes', 'ProductController@showRunningWomenShoes')->name('running-women-shoes-list');

//Show training shoes of women
Route::get('/training-women-shoes', 'ProductController@showTrainingWomenShoes')->name('training-women-shoes-list');

//Show football shoes of women
Route::get('/football-women-shoes', 'ProductController@showFootballWomenShoes')->name('football-women-shoes-list');

//Show Nike's women shoes
Route::get('/Nike-women-shoes', 'ProductController@showNikeWomenShoes')->name('Nike-women-shoes-list');

//Show Adidas's women shoes
Route::get('/Adidas-women-shoes', 'ProductController@showAdidasWomenShoes')->name('Adidas-women-shoes-list');

//Show all lifestyle shoes
Route::get('/lifestyle-shoes', 'ProductController@showLifestyleShoes')->name('lifestyle-shoes-list');

//Show all running shoes
Route::get('/running-shoes', 'ProductController@showRunningShoes')->name('running-shoes-list');

//Show all training shoes
Route::get('/training-shoes', 'ProductController@showTrainingShoes')->name('training-shoes-list');

//Show all football shoes
Route::get('/football-shoes', 'ProductController@showFootballShoes')->name('football-shoes-list');

//Show all Nike shoes
Route::get('/Nike-shoes-list', 'ProductController@showNikeShoes')->name('Nike-shoes-list');

//Show all Adidas shoes
Route::get('/Adidas-shoes-list', 'ProductController@showAdidasShoes')->name('Adidas-shoes-list');

//Sort product by name
Route::get('/Sort-product-by-name', 'ProductController@sortProductByName')->name('sort-by-name');

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



