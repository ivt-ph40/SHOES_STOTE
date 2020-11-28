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
// Route::get('/product-detail', function(){
//     return view('users.product-detail');
// })->name('product-detail');

//Show cart
Route::get('/cart', function(){
    return view('users.cart');
})->name('cart');

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

//Show form contact us
Route::get('/contact-us', 'ContactController@showContactForm')->name('contact-form');

//Contact submit
Route::post('/contact-us', 'ContactController@sendMail')->name('send-contact');

//Admin 
Route::get('/admins', function(){
    return view('admins.home');
})->name('home.admins');

//Admin category
Route::get('/categories', 'CategoryController@index')->name('categories.list');
//Admin create Category
Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
//Admin store Category
Route::post('/categories', 'CategoryController@store')->name('categories.store');
//Admin Delete Category 
Route::Delete('/categories/{id}', 'CategoryController@destroy')->name('categories.destroy');
//Admin Show edit form Category
Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');

//Admin update Category
Route::put('/categories/{id}', 'CategoryController@update')->name('categories.update');


//Admin brand
Route::get('/brands', 'BrandController@index')->name('brands.list');
//Admin create brand
Route::get('/brands/create', 'BrandController@create')->name('brands.create');
//Admin store brand
Route::post('/brands', 'BrandController@store')->name('brands.store');
//Admin Delete brands 
Route::Delete('/brands/{id}', 'BrandController@destroy')->name('brands.destroy');
//Admin Show edit form Category
Route::get('/brands/{id}/edit', 'BrandController@edit')->name('brands.edit');

//Admin update brand
Route::put('/brands/{id}', 'BrandController@update')->name('brands.update');

//Admin product
Route::get('/products', 'ProductAdminController@index')->name('products.list');